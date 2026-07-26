<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JoinUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class JoinUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('join-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $join = JoinUs::first();

        return view('admin.pages.join.index', compact('join'));
    }

    public function createOrUpdateJoin(Request $request, $id = null)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'details' => 'nullable',
            'multiple_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $join = $id ? JoinUs::findOrFail($id) : new JoinUs();

        $join->title = $request->title;
        $join->details = $request->details;

        if ($request->hasFile('multiple_image')) {

            // Delete old images
            if (!empty($join->multiple_image)) {
                foreach ($join->multiple_image as $image) {
                    if (file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                }
            }

            $images = [];

            foreach ($request->file('multiple_image') as $key => $file) {

                $name = time().'_'.$key.'.'.$file->extension();

                $file->move(
                    public_path('images/join'),
                    $name
                );

                $images[] = 'images/join/'.$name;
            }

            $join->multiple_image = $images;
        }

        $join->save();

        return redirect()->back()->with(
            'success',
            $id
                ? 'Join Us updated successfully!'
                : 'Join Us created successfully!'
        );
    }
}
