<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the form for creating or updating the setting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $setting = Setting::firstOrNew();

        return view('pages.setting.create', compact('setting'));
    }

    /**
     * Store a newly created or updated setting in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->except('id');

        if($request->has('header_logo')) {

            $setting = Setting::first();

            if (isset($setting->header_logo) && Storage::disk('public')->exists($setting->header_logo)) {
                Storage::disk('public')->delete($setting->header_logo);
            }

            $data['header_logo'] = $request->file('header_logo')->store('setting/image', ['disk' => 'public']);
        }

        if($request->has('about_us_image')) {

            $setting = Setting::first();

            if (isset($setting->about_us_image) && Storage::disk('public')->exists($setting->about_us_image)) {
                Storage::disk('public')->delete($setting->about_us_image);
            }

            $data['about_us_image'] = $request->file('about_us_image')->store('setting/image', ['disk' => 'public']);
        }

        if($request->has('contact_us_image')) {

            $setting = Setting::first();

            if (isset($setting->contact_us_image) && Storage::disk('public')->exists($setting->contact_us_image)) {
                Storage::disk('public')->delete($setting->contact_us_image);
            }

            $data['contact_us_image'] = $request->file('contact_us_image')->store('setting/image', ['disk' => 'public']);
        }

        if($request->has('achievement_logo')) {

            $setting = Setting::first();

            if (isset($setting->achievement_logo) && Storage::disk('public')->exists($setting->achievement_logo)) {
                Storage::disk('public')->delete($setting->achievement_logo);
            }

            $data['achievement_logo'] = $request->file('achievement_logo')->store('setting/image', ['disk' => 'public']);
        }

        if($request->has('success_story_logo')) {

            $setting = Setting::first();

            if (isset($setting->success_story_logo) && Storage::disk('public')->exists($setting->success_story_logo)) {
                Storage::disk('public')->delete($setting->success_story_logo);
            }

            $data['success_story_logo'] = $request->file('success_story_logo')->store('setting/image', ['disk' => 'public']);
        }

        if($request->has('client_says_logo')) {

            $setting = Setting::first();

            if (isset($setting->client_says_logo) && Storage::disk('public')->exists($setting->client_says_logo)) {
                Storage::disk('public')->delete($setting->client_says_logo);
            }

            $data['client_says_logo'] = $request->file('client_says_logo')->store('setting/image', ['disk' => 'public']);
        }

        if($request->has('footer_logo')) {

            $setting = Setting::first();

            if (isset($setting->footer_logo) && Storage::disk('public')->exists($setting->footer_logo)) {
                Storage::disk('public')->delete($setting->footer_logo);
            }

            $data['footer_logo'] = $request->file('footer_logo')->store('setting/image', ['disk' => 'public']);
        }

        Setting::updateOrCreate(['id' => $request->id], $data);

        return Redirect::back();
    }
}
