<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExpertCategory;
use App\Models\ManagementBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('management-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $categories = ExpertCategory::latest()->get();
        $managements = ManagementBoard::with('category')->latest()->get();
        return view('admin.pages.management.index', compact('managements','categories'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|max:255',
                'details' => 'nullable',
                'designation' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $management = new ManagementBoard();

            $management->name = $request->name;
            $management->expert_category_id = $request->expert_category_id;
            $management->slug = Str::slug($request->name);
            $management->designation = $request->designation;
            $management->details = $request->details;

            if ($request->hasFile('image')) {

                $file = time().'.'.$request->image->extension();

                $request->image->move(
                    public_path('images/management'),
                    $file
                );

                $management->image = $file;
            }

            $management->save();

            return redirect()->back()->with('success', 'Management Board Member Added Successfully');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'name' => 'required|max:255',
                'designation' => 'required|max:255',
                'details' => 'nullable',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $management = ManagementBoard::findOrFail($id);

            $management->name = $request->name;
            $management->expert_category_id = $request->expert_category_id;
            $management->slug = Str::slug($request->name);
            $management->designation = $request->designation;
            $management->details = $request->details;

            if ($request->hasFile('image')) {

                if (
                    $management->image &&
                    file_exists(public_path('images/management/'.$management->image))
                ) {
                    unlink(public_path('images/management/'.$management->image));
                }

                $file = time().'.'.$request->image->extension();

                $request->image->move(
                    public_path('images/management'),
                    $file
                );

                $management->image = $file;
            }

            $management->save();

            return redirect()->back()->with('success', 'Management Board Member Updated Successfully');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function destroy($id)
    {
        try {

            $management = ManagementBoard::findOrFail($id);

            if (
                $management->image &&
                file_exists(public_path('images/management/'.$management->image))
            ) {
                unlink(public_path('images/management/'.$management->image));
            }

            $management->delete();

            return redirect()->back()->with('success', 'Management Board Member Deleted Successfully');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
