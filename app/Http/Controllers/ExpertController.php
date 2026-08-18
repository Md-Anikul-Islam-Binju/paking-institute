<?php

namespace App\Http\Controllers;

use App\Models\ExpertCategory;
use App\Models\Insight;
use App\Models\ManagementBoard;
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

    public function expertDetail($slug)
    {
//        $expertDetail = ManagementBoard::where('slug', $slug)->first();
//        return view('frontend.pages.expert.expertDetails', compact('expertDetail'));

        $expertDetail = ManagementBoard::where(
            'slug',
            $slug
        )->firstOrFail();

        $insights = Insight::whereJsonContains(
            'multiple_management_board_id',
            (string) $expertDetail->id
        )
            ->latest()
            ->get();

        $expertDetail->setRelation('insights', $insights);

        $expertDetail->setAttribute(
            'insight_count',
            $insights->count()
        );

        return view(
            'frontend.pages.expert.expertDetails',
            compact('expertDetail')
        );

    }
}
