<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class VisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('vision-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $vision = Vision::first();

        return view('admin.pages.vision.index', compact('vision'));
    }

    public function createOrUpdateVision(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'details' => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'support_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'video_file' => 'nullable|mimes:mp4,mov,avi,mkv,webm|max:51200',
            'staff_creating_change_no' => 'nullable|integer',
            'making_an_impact_no' => 'nullable|integer',
            'bold_partners_no' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $vision = $id ? Vision::findOrFail($id) : new Vision();

        $vision->title = $request->title;
        $vision->details = $request->details;
        $vision->staff_creating_change_no = $request->staff_creating_change_no ?? 0;
        $vision->making_an_impact_no = $request->making_an_impact_no ?? 0;
        $vision->bold_partners_no = $request->bold_partners_no ?? 0;

        // Cover Image
        if ($request->hasFile('cover_image')) {

            if ($vision->cover_image && file_exists(public_path($vision->cover_image))) {
                unlink(public_path($vision->cover_image));
            }

            $name = time() . '_cover.' . $request->cover_image->extension();

            $request->cover_image->move(
                public_path('images/vision'),
                $name
            );

            $vision->cover_image = 'images/vision/' . $name;
        }

        // Support Image
        if ($request->hasFile('support_image')) {

            if ($vision->support_image && file_exists(public_path($vision->support_image))) {
                unlink(public_path($vision->support_image));
            }

            $name = time() . '_support.' . $request->support_image->extension();

            $request->support_image->move(
                public_path('images/vision'),
                $name
            );

            $vision->support_image = 'images/vision/' . $name;
        }

        // Video
        if ($request->hasFile('video_file')) {

            if ($vision->video_file && file_exists(public_path($vision->video_file))) {
                unlink(public_path($vision->video_file));
            }

            $name = time() . '_video.' . $request->video_file->extension();

            $request->video_file->move(
                public_path('videos/vision'),
                $name
            );

            $vision->video_file = 'videos/vision/' . $name;
        }

        $vision->save();

        return redirect()->back()->with(
            'success',
            $id ? 'Vision updated successfully!' : 'Vision created successfully!'
        );
    }
}
