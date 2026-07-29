<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExploreVision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ExploreVisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('explore-vision-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $visions = ExploreVision::latest()->get();

        return view(
            'admin.pages.exploreVision.index',
            compact('visions')
        );
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|max:255',
                'tag' => 'nullable|max:255',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $vision = new ExploreVision();

            $vision->name = $request->name;
            $vision->slug = Str::slug($request->name) . '-' . time();
            $vision->tag = $request->tag;

            if ($request->hasFile('cover_image')) {

                $file = time() . '.' . $request->cover_image->extension();

                $request->cover_image->move(
                    public_path('images/explore-vision'),
                    $file
                );

                $vision->cover_image = $file;
            }

            $vision->save();

            return redirect()->back()->with(
                'success',
                'Explore Vision Added Successfully'
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
                'name' => 'required|max:255',
                'tag' => 'nullable|max:255',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $vision = ExploreVision::findOrFail($id);

            $vision->name = $request->name;
            $vision->slug = Str::slug($request->name) . '-' . $vision->id;
            $vision->tag = $request->tag;

            if ($request->hasFile('cover_image')) {

                if (
                    $vision->cover_image &&
                    file_exists(public_path('images/explore-vision/' . $vision->cover_image))
                ) {
                    unlink(public_path('images/explore-vision/' . $vision->cover_image));
                }

                $file = time() . '.' . $request->cover_image->extension();

                $request->cover_image->move(
                    public_path('images/explore-vision'),
                    $file
                );

                $vision->cover_image = $file;
            }

            $vision->save();

            return redirect()->back()->with(
                'success',
                'Explore Vision Updated Successfully'
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

            $vision = ExploreVision::findOrFail($id);

            if (
                $vision->cover_image &&
                file_exists(public_path('images/explore-vision/' . $vision->cover_image))
            ) {
                unlink(public_path('images/explore-vision/' . $vision->cover_image));
            }

            $vision->delete();

            return redirect()->back()->with(
                'success',
                'Explore Vision Deleted Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
