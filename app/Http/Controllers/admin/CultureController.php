<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OurCulture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CultureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('culture-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $culture = OurCulture::first();

        return view('admin.pages.culture.index', compact('culture'));
    }

    public function createOrUpdateCulture(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'details'     => 'nullable|string',
            'videos_file' => 'nullable|mimes:mp4,mov,avi,mkv,webm|max:51200', // 50MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $culture = $id ? OurCulture::findOrFail($id) : new OurCulture();

        $culture->title = $request->title;
        $culture->details = $request->details;

        if ($request->hasFile('videos_file')) {

            if ($culture->videos_file && file_exists(public_path($culture->videos_file))) {
                unlink(public_path($culture->videos_file));
            }

            $videoName = time() . '.' . $request->videos_file->extension();

            $request->videos_file->move(
                public_path('videos/culture'),
                $videoName
            );

            $culture->videos_file = 'videos/culture/' . $videoName;
        }

        $culture->save();

        return redirect()->back()->with(
            'success',
            $id ? 'Culture updated successfully!' : 'Culture created successfully!'
        );
    }
}
