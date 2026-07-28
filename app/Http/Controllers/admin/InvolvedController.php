<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Involved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class InvolvedController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('involved-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $involveds = Involved::latest()->get();

        return view('admin.pages.involved.index', compact('involveds'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'title'   => 'required|max:255',
                'details' => 'nullable',
                'image'   => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $involved = new Involved();

            $involved->title = $request->title;
            $involved->slug = Str::slug($request->title) . '-' . time();
            $involved->details = $request->details;

            if ($request->hasFile('image')) {

                $file = time() . '.' . $request->image->extension();

                $request->image->move(
                    public_path('images/involved'),
                    $file
                );

                $involved->image = $file;
            }

            $involved->save();

            return redirect()->back()->with(
                'success',
                'Involved Added Successfully'
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
                'title'   => 'required|max:255',
                'details' => 'nullable',
                'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $involved = Involved::findOrFail($id);

            $involved->title = $request->title;
            $involved->slug = Str::slug($request->title) . '-' . $id;
            $involved->details = $request->details;

            if ($request->hasFile('image')) {

                if (
                    $involved->image &&
                    file_exists(public_path('images/involved/' . $involved->image))
                ) {
                    unlink(public_path('images/involved/' . $involved->image));
                }

                $file = time() . '.' . $request->image->extension();

                $request->image->move(
                    public_path('images/involved'),
                    $file
                );

                $involved->image = $file;
            }

            $involved->save();

            return redirect()->back()->with(
                'success',
                'Involved Updated Successfully'
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

            $involved = Involved::findOrFail($id);

            if (
                $involved->image &&
                file_exists(public_path('images/involved/' . $involved->image))
            ) {
                unlink(public_path('images/involved/' . $involved->image));
            }

            $involved->delete();

            return redirect()->back()->with(
                'success',
                'Involved Deleted Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
