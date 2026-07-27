<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExpertCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ExpertCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('expert-category-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }


    public function index()
    {
        $categories = ExpertCategory::latest()->get();

        return view('admin.pages.expertCategory.index', compact('categories'));
    }


    public function store(Request $request)
    {
        try {

            $request->validate([
                'name'   => 'required|max:255|unique:expert_categories,name',
                'status' => 'required|in:0,1',
            ]);

            $category = new ExpertCategory();

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->status = $request->status;

            $category->save();

            return redirect()->back()->with('success', 'Expert Category Added Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }


    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'name'   => 'required|max:255|unique:expert_categories,name,' . $id,
                'status' => 'required|in:0,1',
            ]);

            $category = ExpertCategory::findOrFail($id);

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->status = $request->status;

            $category->save();

            return redirect()->back()->with('success', 'Expert Category Updated Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }


    public function destroy($id)
    {
        try {

            $category = ExpertCategory::findOrFail($id);

            $category->delete();

            return redirect()->back()->with('success', 'Expert Category Deleted Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
