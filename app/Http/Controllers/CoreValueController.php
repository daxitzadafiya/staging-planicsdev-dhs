<?php

namespace App\Http\Controllers;

use App\Http\Request\CoreValueStoreRequest;
use App\Http\Request\CoreValueUpdateRequest;
use App\Models\CoreValue;
use App\Models\Service;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CoreValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $coreValues = CoreValue::paginate();

        return view('pages.service.core_value.index', compact('coreValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $services = Service::all();

        return view('pages.service.core_value.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoreValueStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        CoreValue::create($data);

        return Redirect::route('core-values.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return \Illuminate\Http\Response
     */
    public function edit(CoreValue $coreValue): View
    {
        $services = Service::all();

        return view('pages.service.core_value.create', compact('coreValue', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreValue  $coreValue
     * @return \Illuminate\Http\Response
     */
    public function update(CoreValueUpdateRequest $request, CoreValue $coreValue): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        $coreValue->update($data);

        return Redirect::route('core-values.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreValue  $coreValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoreValue $coreValue): RedirectResponse
    {
        $coreValue->delete();

        return Redirect::route('core-values.index');
    }
}
