<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Future;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class FutureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('future-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $future = Future::first();
        return view('admin.pages.future.index', compact('future'));
    }

    public function createOrUpdateFuture(Request $request, $id = null)
    {
        try {

            $request->validate([
                'title' => 'required|max:255',
                'details' => 'nullable',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $future = $id
                ? Future::findOrFail($id)
                : new Future();

            $future->title = $request->title;
            $future->slug = Str::slug($request->title);
            $future->details = $request->details;

            if ($request->hasFile('cover_image')) {

                if (
                    $future->cover_image &&
                    file_exists(public_path('images/future/' . $future->cover_image))
                ) {
                    unlink(public_path('images/future/' . $future->cover_image));
                }

                $file = time() . '.' . $request->cover_image->extension();

                $request->cover_image->move(
                    public_path('images/future'),
                    $file
                );

                $future->cover_image = $file;
            }

            $future->save();

            return redirect()->back()->with(
                'success',
                $id
                    ? 'Future Updated Successfully'
                    : 'Future Created Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
