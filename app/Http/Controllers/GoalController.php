<?php

namespace App\Http\Controllers;

use App\Http\Request\GoalStoreRequest;
use App\Http\Request\GoalUpdateRequest;
use App\Models\Goal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $goals = Goal::paginate();

        return view('pages.about-us.goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.about-us.goals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('goal/image', ['disk' => 'public']);
        }

        Goal::create($data);

        return Redirect::route('goals.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal): View
    {
        return view('pages.about-us.goals.create', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(GoalUpdateRequest $request, Goal $goal): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($goal->image) && Storage::disk('public')->exists($goal->image)) {
                Storage::disk('public')->delete($goal->image);
            }

            $data['image'] = $request->file('image')->store('goal/image', ['disk' => 'public']);
        }

        $goal->update($data);

        return Redirect::route('goals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal): RedirectResponse
    {
        $goal->delete();

        return Redirect::route('goals.index');
    }
}
