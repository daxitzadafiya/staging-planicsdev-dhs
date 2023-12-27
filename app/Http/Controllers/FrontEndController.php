<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EnquiryMail;
use App\Models\Achievement;
use App\Models\Enquiry;
use App\Models\Goal;
use App\Models\HeroSection;
use App\Models\OurClient;
use App\Models\PointOfDifference;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    public function dashboard()
    {
        $total_goals = Goal::where('is_active', 1)->count();

        $total_clients_and_partners = OurClient::where('is_active', 1)->count();

        $total_enquiries = Enquiry::count();

        $total_portfolios = Portfolio::where('is_active', 1)->count();

        return view('pages.dashboard', compact('total_goals', 'total_clients_and_partners', 'total_enquiries', 'total_portfolios'));
    }

    public function index()
    {
        $heroSections = HeroSection::where('is_active', 1)->get();
        $setting = Setting::first();
        $pointOfDifferences = PointOfDifference::where('is_active', 1)->get();
        $services = Service::where('is_active', 1)->with('service_categories')->get();
        $portfolios = Portfolio::with('service')->latest()->limit(3)->get();

        return view('frontend.index', compact('heroSections', 'setting', 'pointOfDifferences', 'services', 'portfolios'));
    }

    public function about()
    {
        $setting = Setting::first();
        $services = Service::where('is_active', 1)->with('service_categories')->get();
        $goals = Goal::where('is_active', 1)->get();
        $ourClients = OurClient::where('is_active', 1)->get();

        return view('frontend.about', compact('setting', 'services', 'goals', 'ourClients'));
    }

    public function show(Request $request)
    {
        $setting = Setting::first();
        $services = Service::where('is_active', 1)->with('service_categories')->get();
        $service = Service::where('is_active', 1)->where('slug', $request->path())->with('service_categories', 'core_values', 'technologies')->first();
        
        $core_values = $service->core_values->chunk(3)->toArray();

        return view('frontend.service', compact('setting', 'services', 'service', 'core_values'));
    }

    public function services()
    {
        $services = Service::where('is_active', 1)->with('service_categories')->get();
        $setting = Setting::first();
        $achievements = Achievement::where('is_active', 1)->get()->toArray();
        $achievements_count = count($achievements);
        $total_rows = ceil(($achievements_count * 2)/5);

        $achievement_rows = [];
        $count = 0;

        for ($row = 0; $row < $total_rows; $row++) { 
            if($row % 2 == 0) {
                for ($i = 0; $i < 2 ; $i++) { 
                    $achievement_rows[$row][] = $achievements[$count];
                    $count++;
                }
            } else {
                for ($j = 0; $j < 3 ; $j++) { 
                    $achievement_rows[$row][] = $achievements[$count];
                    $count++;
                }
            }
        }
        return view('frontend.services', compact('services', 'setting', 'achievement_rows'));
    }

    public function portfolio()
    {
        $setting = Setting::first();
        $services = Service::where('is_active', 1)->with('service_categories', 'portfolios')->get();
        $portfolios = Portfolio::with('service')->get();

        return view('frontend.portfolio', compact('setting', 'services', 'portfolios'));
    }

    public function contactUs()
    {
        $setting = Setting::first();
        $services = Service::where('is_active', 1)->with('service_categories')->get();

        return view('frontend.contact-us', compact('setting', 'services'));
    }

    public function enquiry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = $request->except('_token');

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EnquiryMail($data));

        Enquiry::create($data);

        return redirect()->back()->with('message', 'Enquiry Send Successfully!');
    }

    public function enquiriesList()
    {
        $enquiries = Enquiry::paginate();

        return view('pages.enquiry.index', compact('enquiries'));
    }

    public function destroy(Enquiry $enquiry)
    {   
        $enquiry->delete();

        return redirect()->route('enquiries.index');
    }
}