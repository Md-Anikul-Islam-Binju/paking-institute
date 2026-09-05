<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Models\InsightType;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class InsightPageController extends Controller
{
    public function insight()
    {


        $politicsType = InsightType::where('slug', 'politics-governance')
            ->where('status', 1)
            ->first();

        $featuredInsight = null;

        if ($politicsType) {
            $featuredInsight = Insight::with('type')
                ->where('type_id', $politicsType->id)
                ->orderByDesc('date')
                ->orderByDesc('id')
                ->first();
        }



        $insights = Insight::with('type')
            ->when($featuredInsight, function ($query) use ($featuredInsight) {
                $query->where('id', '!=', $featuredInsight->id);
            })
            ->inRandomOrder()
            ->latest()
            ->limit(12)
            ->get();


        $insightsAgain = Insight::with('type')
            ->when($featuredInsight, function ($query) use ($featuredInsight) {
                $query->where('id', '!=', $featuredInsight->id);
            })
            ->get();




        $types = InsightType::where('status', 1)
            ->orderBy('id')
            ->get();

        $insightTypes = InsightType::with([
            'insights' => function ($query) {
                $query->latest('date');
            }
        ])
            ->where('status', 1)
            ->get();
        $newsLetters = NewsLetter::latest()->get();


        return view(
            'frontend.pages.insight.insight',
            compact(
                'featuredInsight',
                'insights',
                'types','insightTypes','newsLetters','insightsAgain'
            )
        );
    }

//    public function insightDetails($slug)
//    {
//        $insightDetail = Insight::with(['type', 'books'])
//            ->where('slug', $slug)
//            ->firstOrFail();
//        return view('frontend.pages.insight.insightDetails', compact('insightDetail'));
//    }


    public function insightDetails($slug)
    {
        $insightDetail = Insight::with([
            'type',
            'books' => function ($query) {
                $query->orderBy('chapter_no', 'asc');
            }
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Multiple Experts Count
        |--------------------------------------------------------------------------
        | multiple_management_board_id is stored as JSON array.
        | Example: [1, 5, 8, 10]
        */
        $multipleExpertCount = 0;

        if (!empty($insightDetail->multiple_management_board_id)) {
            $multipleExpertCount = count(
                array_filter($insightDetail->multiple_management_board_id)
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Related Articles
        |--------------------------------------------------------------------------
        | Randomly get 3 insights excluding current insight.
        */
        $relatedInsights = Insight::with('type')
            ->where('id', '!=', $insightDetail->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Insight Types
        |--------------------------------------------------------------------------
        | For dynamic newsletter ticker.
        */
        $insightTypes = InsightType::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view(
            'frontend.pages.insight.insightDetails',
            compact(
                'insightDetail',
                'multipleExpertCount',
                'relatedInsights',
                'insightTypes'
            )
        );
    }
}
