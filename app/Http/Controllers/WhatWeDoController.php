<?php

namespace App\Http\Controllers;

use App\Models\Approach;
use App\Models\Explore;
use App\Models\ExploreVision;
use App\Models\Future;
use App\Models\HowWork;
use App\Models\Involved;
use App\Models\KeyBenefit;
use App\Models\Partnership;
use Illuminate\Http\Request;

class WhatWeDoController extends Controller
{
    //approach
    public function approach()
    {
        $approach = Approach::first();
        $howWork = HowWork::first();
        return view('frontend.pages.whatWeDo.approach',compact('approach','howWork'));
    }

    //partnership
    public function partnership()
    {
        $partnership = Partnership::first();
        $involveds = Involved::all();
        return view('frontend.pages.whatWeDo.partnership',compact('partnership','involveds'));
    }

    public function partnershipDetails($slug)
    {
        $involved = Involved::where('slug',$slug)->first();
        $keyBenefit = KeyBenefit::latest()->get();
        $keyBenefitInvolved = KeyBenefit::where('involved_id',2)->get();
        return view('frontend.pages.whatWeDo.partnershipDetails',compact('involved','keyBenefit','keyBenefitInvolved'));
    }

    //future
    public function future()
    {
        $future = Future::first();
        $visions = ExploreVision::all();
        $explores = Explore::all();
        return view('frontend.pages.whatWeDo.future',compact('future','visions','explores'));
    }
}
