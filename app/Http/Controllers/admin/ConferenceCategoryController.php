<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ConferenceCategory;
use App\Models\ExploreVision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ConferenceCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('conference-category-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $categories = ConferenceCategory::with('exploreVision')->latest()->get();

        $exploreVisions = ExploreVision::latest()->get();

        return view(
            'admin.pages.conferenceCategory.index',
            compact('categories', 'exploreVisions')
        );
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'explore_vision_id' => 'required|exists:explore_visions,id',
                'name'   => 'required|max:255|unique:conference_categories,name',
                'status' => 'required|boolean',
            ]);

            ConferenceCategory::create([
                'explore_vision_id' => $request->explore_vision_id,
                'name'   => $request->name,
                'slug'   => Str::slug($request->name) . '-' . time(),
                'status' => $request->status,
            ]);

            return redirect()->back()->with(
                'success',
                'Conference Category Added Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'explore_vision_id' => 'required|exists:explore_visions,id',
                'name' => 'required|max:255|unique:conference_categories,name,' . $id,
                'status' => 'required|boolean',
            ]);

            $category = ConferenceCategory::findOrFail($id);
            $category->explore_vision_id = $request->explore_vision_id;
            $category->name = $request->name;
            $category->slug = Str::slug($request->name) . '-' . $category->id;
            $category->status = $request->status;

            $category->save();

            return redirect()->back()->with(
                'success',
                'Conference Category Updated Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }

    public function destroy($id)
    {
        try {

            $category = ConferenceCategory::findOrFail($id);

            $category->delete();

            return redirect()->back()->with(
                'success',
                'Conference Category Deleted Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
