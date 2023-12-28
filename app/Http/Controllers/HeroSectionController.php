<?php

namespace App\Http\Controllers;

use App\Http\Request\HeroSectionStoreRequest;
use App\Http\Request\HeroSectionUpdateRequest;
use App\Models\HeroSection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $heroSections = HeroSection::paginate();

        return view('pages.hero_section.index', compact('heroSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.hero_section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeroSectionStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('hero_section', ['disk' => 'public']);
        }

        HeroSection::create($data);

        return Redirect::route('hero-sections.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeroSection  $heroSection
     * @return \Illuminate\Http\Response
     */
    public function edit(HeroSection $heroSection): View
    {
        return view('pages.hero_section.create', compact('heroSection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeroSection  $heroSection
     * @return \Illuminate\Http\Response
     */
    public function update(HeroSectionUpdateRequest $request, HeroSection $heroSection): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($heroSection->image) && Storage::disk('public')->exists($heroSection->image)) {
                Storage::disk('public')->delete($heroSection->image);
            }

            $data['image'] = $request->file('image')->store('hero_section', ['disk' => 'public']);
        }

        $heroSection->update($data);

        return Redirect::route('hero-sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeroSection  $heroSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeroSection $heroSection): RedirectResponse
    {
        $heroSection->delete();

        return Redirect::route('hero-sections.index');
    }
}
