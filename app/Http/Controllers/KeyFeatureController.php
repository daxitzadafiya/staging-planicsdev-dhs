<?php

namespace App\Http\Controllers;

use App\Http\Request\KeyFeatureStoreRequest;
use App\Http\Request\KeyFeatureUpdateRequest;
use App\Models\KeyFeature;
use Illuminate\Support\Facades\Storage;

class KeyFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyFeatures = KeyFeature::paginate();

        return view('pages.key-features.index', compact('keyFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.key-features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeyFeatureStoreRequest $request)
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('key_features/image', ['disk' => 'public']);
        }

        KeyFeature::create($data);

        return redirect()->route('key-features.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KeyFeature  $keyFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(KeyFeature $keyFeature)
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
    public function update(KeyFeatureUpdateRequest $request, KeyFeature $keyFeature)
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

        return redirect()->route('key-features.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KeyFeature  $keyFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(KeyFeature $keyFeature)
    {
        $keyFeature->delete();

        return redirect()->route('key-features.index');
    }
}
