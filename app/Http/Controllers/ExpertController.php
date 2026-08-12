<?php

namespace App\Http\Controllers;

use App\Models\ExpertCategory;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function expert()
    {
        $categories = ExpertCategory::with('managementBoards')
            ->where('status', 1)
            ->limit(5)
            ->get();
        return view('frontend.pages.expert.expert', compact('categories'));
    }
}
