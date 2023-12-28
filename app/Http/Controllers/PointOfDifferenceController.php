<?php

namespace App\Http\Controllers;

use App\Http\Request\PointOfDifferenceStoreRequest;
use App\Http\Request\PointOfDifferenceUpdateRequest;
use App\Models\PointOfDifference;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PointOfDifferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $pointOfDifferences = PointOfDifference::paginate();

        return view('pages.points_of_difference.index', compact('pointOfDifferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.points_of_difference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointOfDifferenceStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('point_of_difference', ['disk' => 'public']);
        }

        PointOfDifference::create($data);

        return Redirect::route('point-of-differences.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointOfDifference  $pointOfDifference
     * @return \Illuminate\Http\Response
     */
    public function edit(PointOfDifference $pointOfDifference): View
    {
        return view('pages.points_of_difference.create', compact('pointOfDifference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointOfDifference  $pointOfDifference
     * @return \Illuminate\Http\Response
     */
    public function update(PointOfDifferenceUpdateRequest $request, PointOfDifference $pointOfDifference): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($pointOfDifference->image) && Storage::disk('public')->exists($pointOfDifference->image)) {
                Storage::disk('public')->delete($pointOfDifference->image);
            }

            $data['image'] = $request->file('image')->store('point_of_difference', ['disk' => 'public']);
        }

        $pointOfDifference->update($data);

        return Redirect::route('point-of-differences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointOfDifference  $pointOfDifference
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointOfDifference $pointOfDifference): RedirectResponse
    {
        $pointOfDifference->delete();

        return Redirect::route('point-of-differences.index');
    }
}
