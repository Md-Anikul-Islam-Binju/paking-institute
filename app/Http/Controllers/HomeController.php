<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Models\InsightType;
use App\Models\NewsLetter;
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
        return view('frontend.index',compact('slider','newsLetters','techType','latestInsight'));
    }
}
