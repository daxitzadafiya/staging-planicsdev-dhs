<?php

namespace App\Http\Controllers;

use App\Http\Request\PortfolioStoreRequest;
use App\Http\Request\PortfolioUpdateRequest;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $portfolios = Portfolio::paginate();

        return view('pages.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $services = Service::all();

        return view('pages.portfolio.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('portfolio/image', ['disk' => 'public']);
        }

        Portfolio::create($data);

        return Redirect::route('portfolios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio): View
    {
        $services = Service::all();

        return view('pages.portfolio.create', compact('portfolio', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioUpdateRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($portfolio->image) && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $data['image'] = $request->file('image')->store('portfolio/image', ['disk' => 'public']);
        }

        $portfolio->update($data);

        return Redirect::route('portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        $portfolio->delete();

        return Redirect::route('portfolios.index');
    }
}
