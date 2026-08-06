<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->first();
        $newsLetters = NewsLetter::latest()->get();
        return view('frontend.index',compact('slider','newsLetters'));
    }
}
