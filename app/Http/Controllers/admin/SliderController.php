<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('slider-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $slider = Slider::first();

        return view(
            'admin.pages.slider.index',
            compact('slider')
        );
    }

    public function createOrUpdateSlider(Request $request, $id = null)
    {
        try {

            $request->validate([
                'title'  => 'required|max:255',
                'videos' => 'nullable|mimes:mp4,mov,avi,mkv,webm|max:51200', // 50MB
            ]);

            if ($id) {

                $slider = Slider::findOrFail($id);

            } else {

                $slider = new Slider();

            }

            $slider->title = $request->title;
            $slider->slug  = Str::slug($request->title);

            if ($request->hasFile('videos')) {

                if (
                    $slider->videos &&
                    file_exists(public_path('videos/slider/' . $slider->videos))
                ) {
                    unlink(public_path('videos/slider/' . $slider->videos));
                }

                $videoName = time() . '.' . $request->videos->extension();

                $request->videos->move(
                    public_path('videos/slider'),
                    $videoName
                );

                $slider->videos = $videoName;
            }

            $slider->save();

            return redirect()->back()->with(
                'success',
                $id
                    ? 'Slider Updated Successfully'
                    : 'Slider Created Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
