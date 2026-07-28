<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Approach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ApproachController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (! Gate::allows('approach-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $approach = Approach::first();

        return view('admin.pages.approach.index', compact('approach'));
    }

    public function createOrUpdateApproach(Request $request, $id = null)
    {
        try {

            $request->validate([
                'title'       => 'required|max:255',
                'details'     => 'nullable',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $approach = $id
                ? Approach::findOrFail($id)
                : Approach::first();

            if (!$approach) {
                $approach = new Approach();
            }

            $approach->title = $request->title;
            $approach->slug = Str::slug($request->title);
            $approach->details = $request->details;

            if ($request->hasFile('cover_image')) {

                if (
                    $approach->cover_image &&
                    file_exists(public_path('images/approach/' . $approach->cover_image))
                ) {
                    unlink(public_path('images/approach/' . $approach->cover_image));
                }

                $imageName = time() . '.' . $request->cover_image->extension();

                $request->cover_image->move(
                    public_path('images/approach'),
                    $imageName
                );

                $approach->cover_image = $imageName;
            }

            $approach->save();

            return redirect()->back()->with(
                'success',
                'Approach information saved successfully.'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
