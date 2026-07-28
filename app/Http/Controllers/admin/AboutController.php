<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('about-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }


    public function index()
    {
        $about = About::first();
        return view('admin.pages.about.index', compact('about'));
    }


    public function createOrUpdateAbout(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $about = $id ? About::findOrFail($id) : new About();

        $about->title = $request->title;
        $about->slug = $request->slug ?: Str::slug($request->title);

        if ($request->hasFile('cover_image')) {

            // Delete old image
            if ($about->cover_image && file_exists(public_path($about->cover_image))) {
                unlink(public_path($about->cover_image));
            }

            $imageName = time() . '.' . $request->cover_image->extension();

            $request->cover_image->move(
                public_path('images/about'),
                $imageName
            );

            $about->cover_image = 'images/about/' . $imageName;
        }

        $about->save();
        //flash()->success('Operation completed successfully.');
        flash()->success(
            $id ? 'About updated successfully!' : 'About created successfully!'
        );

        return redirect()->back();
    }
}
