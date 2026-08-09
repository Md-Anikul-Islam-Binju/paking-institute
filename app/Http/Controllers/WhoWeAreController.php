<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ExpertCategory;
use App\Models\ManagementBoard;
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
        return view('frontend.pages.whoWeAre.aboutUs',compact('aboutUs','ourVision'));
    }

    //Executive

    public function executiveLeadership()
    {
        $ourGoal = OurGoal::first();
        $tonyBlair = ManagementBoard::where('slug', '=', 'tony-blair')->first();
        $catherineRimmer = ManagementBoard::where('slug', '=', 'catherine-rimmer')->first();

        $managingDirector = ExpertCategory::where('slug', '=', 'managing-director')->first();
        $managementBoards = $managingDirector->managementBoards;
        return view('frontend.pages.whoWeAre.executiveLeadership',compact('ourGoal','tonyBlair','catherineRimmer',
        'managementBoards'));
    }

    //Careers
}
