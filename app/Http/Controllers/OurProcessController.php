<?php

namespace App\Http\Controllers;

use App\Http\Request\OurProcessStoreRequest;
use App\Http\Request\OurProcessUpdateRequest;
use App\Models\OurProcess;
use Illuminate\Support\Facades\Storage;

class OurProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourProcesses = OurProcess::paginate();

        return view('pages.our-processes.index', compact('ourProcesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.our-processes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OurProcessStoreRequest $request)
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')) {
            $data['image'] = $request->file('image')->store('our_process/image', ['disk' => 'public']);
        }

        OurProcess::create($data);

        return redirect()->route('our-processes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurProcess  $ourProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(OurProcess $ourProcess)
    {
        return view('pages.our-processes.create', compact('ourProcess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurProcess  $ourProcess
     * @return \Illuminate\Http\Response
     */
    public function update(OurProcessUpdateRequest $request, OurProcess $ourProcess)
    {
        $data = $request->validated();

        $data['is_active'] = $request->is_active == "on" ? 1 : 0;

        if($request->has('image')){
            if (isset($ourProcess->image) && Storage::disk('public')->exists($ourProcess->image)) {
                Storage::disk('public')->delete($ourProcess->image);
            }

            $data['image'] = $request->file('image')->store('our_process/image', ['disk' => 'public']);
        }

        $ourProcess->update($data);

        return redirect()->route('our-processes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurProcess  $ourProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurProcess $ourProcess)
    {
        $ourProcess->delete();

        return redirect()->route('our-processes.index');
    }
}
