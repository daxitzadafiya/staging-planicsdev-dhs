<?php

namespace App\Http\Controllers;

use App\Http\Request\ServiceStoreRequest;
use App\Http\Request\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate();

        return view('pages.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title'], '_');

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('icon')) {
            $data['icon'] = $request->file('icon')->store('service/icon', ['disk' => 'public']);
        }

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('service/image', ['disk' => 'public']);
        }

        Service::create($data);

        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('pages.service.create', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title'], '_');

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('icon')){
            if (isset($service->icon) && Storage::disk('public')->exists($service->icon)) {
                Storage::disk('public')->delete($service->icon);
            }

            $data['icon'] = $request->file('icon')->store('service/icon', ['disk' => 'public']);
        }

        if($request->has('image')){
            if (isset($service->image) && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $request->file('image')->store('service/image', ['disk' => 'public']);
        }

        $service->update($data);

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index');
    }
}
