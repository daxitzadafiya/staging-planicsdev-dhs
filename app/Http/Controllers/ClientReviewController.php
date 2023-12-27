<?php

namespace App\Http\Controllers;

use App\Http\Request\ClientReviewStoreRequest;
use App\Http\Request\ClientReviewUpdateRequest;
use App\Models\ClientReview;
use Illuminate\Support\Facades\Storage;

class ClientReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientReviews = ClientReview::paginate();

        return view('pages.client-reviews.index', compact('clientReviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.client-reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientReviewStoreRequest $request)
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('client_review/image', ['disk' => 'public']);
        }

        ClientReview::create($data);

        return redirect()->route('client-reviews.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientReview  $clientReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientReview $clientReview)
    {
        return view('pages.client-reviews.create', compact('clientReview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientReview  $clientReview
     * @return \Illuminate\Http\Response
     */
    public function update(ClientReviewUpdateRequest $request, ClientReview $clientReview)
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($clientReview->image) && Storage::disk('public')->exists($clientReview->image)) {
                Storage::disk('public')->delete($clientReview->image);
            }

            $data['image'] = $request->file('image')->store('client_review/image', ['disk' => 'public']);
        }

        $clientReview->update($data);

        return redirect()->route('client-reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientReview  $clientReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientReview $clientReview)
    {
        $clientReview->delete();

        return redirect()->route('client-reviews.index');
    }
}
