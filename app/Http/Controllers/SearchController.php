<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');

        $insights = Insight::with('type')
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'LIKE', '%' . $query . '%');
            })
            ->latest('date')
            ->get();

        return view('frontend.pages.search', compact(
            'insights',
            'query'
        ));
    }
}
