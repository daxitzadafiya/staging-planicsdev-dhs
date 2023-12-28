<?php

namespace App\Http\Controllers;

use App\Http\Request\ServiceCategoryStoreRequest;
use App\Http\Request\ServiceCategoryUpdateRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $serviceCategories = ServiceCategory::paginate();

        return view('pages.service.service_category.index', compact('serviceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $services = Service::all();

        return view('pages.service.service_category.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCategoryStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        ServiceCategory::create($data);

        return Redirect::route('service-categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCategory $serviceCategory): View
    {
        $services = Service::all();

        return view('pages.service.service_category.create', compact('serviceCategory', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceCategoryUpdateRequest $request, ServiceCategory $serviceCategory): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        $serviceCategory->update($data);

        return Redirect::route('service-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $serviceCategory): RedirectResponse
    {
        $serviceCategory->delete();

        return Redirect::route('service-categories.index');
    }
}
