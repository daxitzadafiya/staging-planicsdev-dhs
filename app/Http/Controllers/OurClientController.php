<?php

namespace App\Http\Controllers;

use App\Http\Request\OurClientStoreRequest;
use App\Http\Request\OurClientUpdateRequest;
use App\Models\OurClient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OurClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $ourClients = OurClient::paginate();

        return view('pages.about-us.our-clients.index', compact('ourClients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.about-us.our-clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OurClientStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('our_clients/image', ['disk' => 'public']);
        }

        OurClient::create($data);

        return Redirect::route('our-clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function edit(OurClient $ourClient): View
    {
        return view('pages.about-us.our-clients.create', compact('ourClient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function update(OurClientUpdateRequest $request, OurClient $ourClient): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($ourClient->image) && Storage::disk('public')->exists($ourClient->image)) {
                Storage::disk('public')->delete($ourClient->image);
            }

            $data['image'] = $request->file('image')->store('our_clients/image', ['disk' => 'public']);
        }

        $ourClient->update($data);

        return Redirect::route('our-clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurClient $ourClient): RedirectResponse
    {
        $ourClient->delete();

        return Redirect::route('our-clients.index');
    }
}
