<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InsightType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class InsightTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('insight-type-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $types = InsightType::latest()->get();

        return view('admin.pages.insightType.index', compact('types'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'type' => 'required|max:255|unique:insight_types',
                'status' => 'required|boolean',
            ]);

            InsightType::create([
                'type'   => $request->type,
                'slug'   => Str::slug($request->type),
                'status' => $request->status,
            ]);

            return redirect()->back()
                ->with('success', 'Insight Type Added Successfully');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }

    public function update(Request $request, $id)
    {

        try {

            $request->validate([
                'type' => 'required|max:255',
                'status' => 'required|boolean',
            ]);
            $type = InsightType::findOrFail($id);
            $type->type = $request->type;
            $type->slug = Str::slug($request->type);
            $type->status = $request->status;

            $type->save();

            return redirect()->back()
                ->with('success', 'Insight Type Updated Successfully');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }

    public function destroy($id)
    {
        try {

            $type = InsightType::findOrFail($id);

            // Prevent deleting if any Insight exists under this type
            if ($type->insights()->count() > 0) {

                return redirect()->back()
                    ->with('error', 'This Insight Type cannot be deleted because it contains Insights.');

            }

            $type->delete();

            return redirect()->back()
                ->with('success', 'Insight Type Deleted Successfully');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }
}
