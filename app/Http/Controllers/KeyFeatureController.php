<?php

namespace App\Http\Controllers;

use App\Http\Request\KeyFeatureStoreRequest;
use App\Http\Request\KeyFeatureUpdateRequest;
use App\Models\KeyFeature;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KeyFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $keyFeatures = KeyFeature::paginate();

        return view('pages.key-features.index', compact('keyFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.key-features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeyFeatureStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('key_features/image', ['disk' => 'public']);
        }

        KeyFeature::create($data);

        return Redirect::route('key-features.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KeyFeature  $keyFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(KeyFeature $keyFeature): View
    {
        return view('pages.key-features.create', compact('keyFeature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KeyFeature  $keyFeature
     * @return \Illuminate\Http\Response
     */
    public function update(KeyFeatureUpdateRequest $request, KeyFeature $keyFeature): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($keyFeature->image) && Storage::disk('public')->exists($keyFeature->image)) {
                Storage::disk('public')->delete($keyFeature->image);
            }

            $data['image'] = $request->file('image')->store('key_features/image', ['disk' => 'public']);
        }

        $keyFeature->update($data);

        return Redirect::route('key-features.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KeyFeature  $keyFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(KeyFeature $keyFeature): RedirectResponse
    {
        $keyFeature->delete();

        return Redirect::route('key-features.index');
    }
}
