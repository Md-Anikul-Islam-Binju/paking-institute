<?php

namespace App\Http\Controllers;

use App\Models\About;
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

    //Careers
}
