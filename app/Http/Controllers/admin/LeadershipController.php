<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Leadership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LeadershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('leadership-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $leadership = Leadership::first();

        return view('admin.pages.leadership.index', compact('leadership'));
    }

    public function createOrUpdateLeadership(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [

            'title' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $leadership = $id
            ? Leadership::findOrFail($id)
            : new Leadership();

        $leadership->title = $request->title;
        $leadership->slug = Str::slug($request->title);

        if ($request->hasFile('cover_image')) {

            if ($leadership->cover_image && file_exists(public_path($leadership->cover_image))) {
                unlink(public_path($leadership->cover_image));
            }

            $imageName = time().'.'.$request->cover_image->extension();

            $request->cover_image->move(
                public_path('images/leadership'),
                $imageName
            );

            $leadership->cover_image = 'images/leadership/'.$imageName;
        }

        $leadership->save();

        return redirect()->back()->with(
            'success',
            $id
                ? 'Leadership updated successfully!'
                : 'Leadership created successfully!'
        );
    }
}
