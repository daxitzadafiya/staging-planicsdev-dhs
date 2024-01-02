<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\ProfileRequest;
use App\Mail\EnquiryMail;
use App\Models\Achievement;
use App\Models\ClientReview;
use App\Models\Enquiry;
use App\Models\Goal;
use App\Models\HeroSection;
use App\Models\KeyFeature;
use App\Models\OurClient;
use App\Models\OurProcess;
use App\Models\PointOfDifference;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class FrontEndController extends Controller
{
    public function dashboard(): View
    {
        $total_goals = Goal::where('is_active', 1)->count();

        $total_clients_and_partners = OurClient::where('is_active', 1)->count();

        $total_enquiries = Enquiry::count();

        $total_portfolios = Portfolio::where('is_active', 1)->count();

        return view('pages.dashboard', compact('total_goals', 'total_clients_and_partners', 'total_enquiries', 'total_portfolios'));
    }

    public function index(): View
    {
        $heroSections = HeroSection::where('is_active', 1)->get();
        $setting = Setting::first();
        $pointOfDifferences = PointOfDifference::where('is_active', 1)->get();
        $services = Service::where('is_active', 1)->with('service_categories')->get();
        $portfolios = Portfolio::with('service')->latest()->limit(3)->get();
        $key_features = KeyFeature::where('is_active', 1)->get();
        $our_processes = OurProcess::where('is_active', 1)->get();
        $client_reviews = ClientReview::where('is_active', 1)->get();

        return view('frontend.index', compact('heroSections', 'setting', 'pointOfDifferences', 'services', 'portfolios', 'key_features', 'our_processes', 'client_reviews'));
    }

    public function about(): View
    {
        $setting = Setting::first();
        $services = Service::where('is_active', 1)->with('service_categories')->get();
        $goals = Goal::where('is_active', 1)->get();
        $ourClients = OurClient::where('is_active', 1)->get();

        return view('frontend.about', compact('setting', 'services', 'goals', 'ourClients'));
    }

    public function show(Request $request): View
    {
        $setting = Setting::first();
        $services = Service::where('is_active', 1)->with('service_categories')->get();
        $service = Service::where('is_active', 1)->where('slug', $request->path())->with('service_categories', 'core_values', 'technologies')->first();
        
        $core_values = $service->core_values->chunk(3)->toArray();

        return view('frontend.service', compact('setting', 'services', 'service', 'core_values'));
    }

    public function services(): View
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

    public function portfolio(): View
    {
        $setting = Setting::first();
        $services = Service::where('is_active', 1)->with('service_categories', 'portfolios')->get();
        $portfolios = Portfolio::with('service')->get();

        return view('frontend.portfolio', compact('setting', 'services', 'portfolios'));
    }

    public function contactUs(): View
    {
        $setting = Setting::first();
        $services = Service::where('is_active', 1)->with('service_categories')->get();

        return view('frontend.contact-us', compact('setting', 'services'));
    }

    public function enquiry(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = $request->except('_token');

        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new EnquiryMail($data));

        Enquiry::create($data);

        return Redirect::back()->with('message', 'Enquiry Send Successfully!');
    }

    public function enquiriesList(): View
    {
        $enquiries = Enquiry::paginate();

        return view('pages.enquiry.index', compact('enquiries'));
    }

    public function destroy(Enquiry $enquiry): RedirectResponse
    {   
        $enquiry->delete();

        return Redirect::route('enquiries.index');
    }

    public function profile(): View
    {
        $user = Auth::user();

        return view('pages.profile.create', compact('user'));
    }

    public function profileUpdate(ProfileRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        if($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return Redirect::back();
    }

    public function restrictedPage(): View
    {
        return view('restricted-page');
    }
}