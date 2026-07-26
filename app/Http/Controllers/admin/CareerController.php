<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('career-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $career = Career::first();
        return view('admin.pages.career.index', compact('career'));
    }

    public function createOrUpdateCareer(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255',
            'link'        => 'nullable|url|max:500',
            'details'     => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $career = $id ? Career::findOrFail($id) : new Career();

        $career->title = $request->title;
        $career->slug = $request->slug ?: Str::slug($request->title);
        $career->link = $request->link;
        $career->details = $request->details;

        if ($request->hasFile('cover_image')) {

            if ($career->cover_image && file_exists(public_path($career->cover_image))) {
                unlink(public_path($career->cover_image));
            }

            $imageName = time() . '.' . $request->cover_image->extension();

            $request->cover_image->move(
                public_path('images/career'),
                $imageName
            );

            $career->cover_image = 'images/career/' . $imageName;
        }

        $career->save();

        return redirect()->back()->with(
            'success',
            $id ? 'Career updated successfully!' : 'Career created successfully!'
        );
    }
}
