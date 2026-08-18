<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutSlider;
use App\Models\Career;
use App\Models\ExpertCategory;
use App\Models\JoinUs;
use App\Models\Leadership;
use App\Models\ManagementBoard;
use App\Models\OurCulture;
use App\Models\OurGoal;
use App\Models\Vision;
use Illuminate\Http\Request;

class WhoWeAreController extends Controller
{
    //About Us
    public function aboutUs()
    {
        $aboutUs = About::first();
        $ourVision = Vision::first();
        $join = JoinUs::first();
        $aboutSliders = AboutSlider::latest()->get();
        return view('frontend.pages.whoWeAre.aboutUs',compact('aboutUs','ourVision','join','aboutSliders'));
    }

    //Executive

    public function executiveLeadership()
    {
        $ourGoal = OurGoal::first();
        $tonyBlair = ManagementBoard::where('slug', '=', 'tony-blair')->first();
        $catherineRimmer = ManagementBoard::where('slug', '=', 'catherine-rimmer')->first();

        $managingDirector = ExpertCategory::where('slug', '=', 'managing-director')->first();
        $managementBoards = $managingDirector->managementBoards;

        $leadership  = Leadership::first();
        return view('frontend.pages.whoWeAre.executiveLeadership',compact('ourGoal','tonyBlair','catherineRimmer',
        'managementBoards','leadership'));
    }

    //Careers
    public function career()
    {
        $career = Career::first();
        $culture = OurCulture::first();
        return view('frontend.pages.whoWeAre.career',compact('career','culture'));
    }
}
