<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Models\InsightType;
use App\Models\NewsLetter;
use App\Models\SiteSetting;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->first();
        $newsLetters = NewsLetter::latest()->get();
        $techType = InsightType::where('slug', 'tech-digitalisation')->first();
        $latestInsight = Insight::where('type_id', $techType->id)->with('type')
            ->latest('created_at')
            ->first();

        $insights = Insight::with('type')->limit(6)->get();
        return view('frontend.index',compact('slider','newsLetters','techType','latestInsight','insights'));
    }
    public function conference()
    {
        return view('frontend.pages.conference');
    }

    public function contact()
    {
        return view('frontend.pages.contactus');
    }
    public function media()
    {
        return view('frontend.pages.media');
    }

    public function accessibility()
    {
        $accessibility = SiteSetting::where('page', 'Accessibility')->first();
        return view('frontend.pages.accessibility',compact('accessibility'));
    }

    public function cookies()
    {
        $cookies = SiteSetting::where('page', 'Cookies')->first();


        return view(
            'frontend.pages.cookies',
            compact('cookies')
        );
    }

    public function terms()
    {
        $terms = SiteSetting::where('page', 'Terms of use')->first();

        return view(
            'frontend.pages.terms',
            compact('terms')
        );
    }

    public function privacy()
    {
        $privacy = SiteSetting::where('page', 'Privacy Policy')->first();

        return view(
            'frontend.pages.privacy',
            compact('privacy')
        );
    }


    public function financialStatements()
    {
        $financialStatements = SiteSetting::where(
            'page',
            'Financial Statements'
        )->first();

        return view(
            'frontend.pages.financialStatements',
            compact('financialStatements')
        );
    }


}
