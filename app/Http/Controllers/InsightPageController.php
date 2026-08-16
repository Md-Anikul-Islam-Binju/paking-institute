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
                'types','insightTypes','newsLetters'
            )
        );
    }

    public function insightDetails($slug)
    {
        //$insightDetail = Insight::where('slug',$slug)->with('type')->first();
        $insightDetail = Insight::with(['type', 'books'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('frontend.pages.insight.insightDetails', compact('insightDetail'));
    }
}
