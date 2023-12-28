<?php

namespace App\Http\Controllers;

use App\Http\Request\TechnologyStoreRequest;
use App\Http\Request\TechnologyUpdateRequest;
use App\Models\Service;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $technologies = Technology::paginate();

        return view('pages.service.technology.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $services = Service::all();

        return view('pages.service.technology.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('technology/image', ['disk' => 'public']);
        }

        Technology::create($data);

        return Redirect::route('technologies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology): View
    {
        $services = Service::all();

        return view('pages.service.technology.create', compact('technology', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(TechnologyUpdateRequest $request, Technology $technology): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($technology->image) && Storage::disk('public')->exists($technology->image)) {
                Storage::disk('public')->delete($technology->image);
            }

            $data['image'] = $request->file('image')->store('technology/image', ['disk' => 'public']);
        }

        $technology->update($data);

        return Redirect::route('technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology): RedirectResponse
    {
        $technology->delete();

        return Redirect::route('technologies.index');
    }
}
