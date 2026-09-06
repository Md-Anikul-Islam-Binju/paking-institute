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

                'primary_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'secondary_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

                'color_code' => [
                    'nullable',
                    'regex:/^#[0-9A-Fa-f]{6}$/',
                ],
            ]);

            $primaryImage = null;
            $secondaryImage = null;

            // Primary Image
            if ($request->hasFile('primary_image')) {

                $imageName = time() . '_primary.' . $request->primary_image->extension();

                $request->primary_image->move(
                    public_path('images/insight-types'),
                    $imageName
                );

                $primaryImage = 'images/insight-types/' . $imageName;
            }

            // Secondary Image
            if ($request->hasFile('secondary_image')) {

                $imageName = time() . '_secondary.' . $request->secondary_image->extension();

                $request->secondary_image->move(
                    public_path('images/insight-types'),
                    $imageName
                );

                $secondaryImage = 'images/insight-types/' . $imageName;
            }

            InsightType::create([
                'type' => $request->type,
                'slug' => Str::slug($request->type),
                'status' => $request->status,
                'primary_image' => $primaryImage,
                'secondary_image' => $secondaryImage,
                'color_code' => $request->color_code,
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

                'primary_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'secondary_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

                'color_code' => [
                    'nullable',
                    'regex:/^#[0-9A-Fa-f]{6}$/',
                ],
            ]);

            $type = InsightType::findOrFail($id);

            $type->type = $request->type;
            $type->slug = Str::slug($request->type);
            $type->status = $request->status;
            $type->color_code = $request->color_code;

            /*
            |--------------------------------------------------------------------------
            | Primary Image
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('primary_image')) {

                // Delete old image
                if (
                    $type->primary_image &&
                    file_exists(public_path($type->primary_image))
                ) {
                    unlink(public_path($type->primary_image));
                }

                $imageName = time() . '_primary.' .
                    $request->primary_image->extension();

                $request->primary_image->move(
                    public_path('images/insight-types'),
                    $imageName
                );

                $type->primary_image =
                    'images/insight-types/' . $imageName;
            }

            /*
            |--------------------------------------------------------------------------
            | Secondary Image
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('secondary_image')) {

                // Delete old image
                if (
                    $type->secondary_image &&
                    file_exists(public_path($type->secondary_image))
                ) {
                    unlink(public_path($type->secondary_image));
                }

                $imageName = time() . '_secondary.' .
                    $request->secondary_image->extension();

                $request->secondary_image->move(
                    public_path('images/insight-types'),
                    $imageName
                );

                $type->secondary_image =
                    'images/insight-types/' . $imageName;
            }

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

            // Prevent deleting if any Insight exists
            if ($type->insights()->count() > 0) {

                return redirect()->back()
                    ->with(
                        'error',
                        'This Insight Type cannot be deleted because it contains Insights.'
                    );
            }

            // Delete primary image
            if (
                $type->primary_image &&
                file_exists(public_path($type->primary_image))
            ) {
                unlink(public_path($type->primary_image));
            }

            // Delete secondary image
            if (
                $type->secondary_image &&
                file_exists(public_path($type->secondary_image))
            ) {
                unlink(public_path($type->secondary_image));
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
