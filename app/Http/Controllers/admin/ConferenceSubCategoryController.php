<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ConferenceCategory;
use App\Models\ConferenceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ConferenceSubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('conference-sub-category-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $subCategories = ConferenceSubCategory::with('category')
            ->latest()
            ->get();

        $categories = ConferenceCategory::where('status', 1)
            ->latest()
            ->get();

        return view(
            'admin.pages.conferenceSubCategory.index',
            compact(
                'subCategories',
                'categories'
            )
        );
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'conference_category_id' => 'required|exists:conference_categories,id',
                'name' => 'required|max:255',
                'status' => 'required|boolean',
            ]);

            ConferenceSubCategory::create([
                'conference_category_id' => $request->conference_category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name) . '-' . time(),
                'status' => $request->status,
            ]);

            return redirect()->back()->with(
                'success',
                'Conference Sub Category Added Successfully'
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
                'conference_category_id' => 'required|exists:conference_categories,id',
                'name' => 'required|max:255',
                'status' => 'required|boolean',
            ]);

            $subCategory = ConferenceSubCategory::findOrFail($id);

            $subCategory->conference_category_id = $request->conference_category_id;
            $subCategory->name = $request->name;
            $subCategory->slug = Str::slug($request->name) . '-' . $subCategory->id;
            $subCategory->status = $request->status;

            $subCategory->save();

            return redirect()->back()->with(
                'success',
                'Conference Sub Category Updated Successfully'
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

            $subCategory = ConferenceSubCategory::findOrFail($id);

            $subCategory->delete();

            return redirect()->back()->with(
                'success',
                'Conference Sub Category Deleted Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
