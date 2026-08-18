<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AboutSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('about-slider-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }


    public function index()
    {
        $aboutSliders = AboutSlider::latest()->get();

        return view(
            'admin.pages.aboutSlider.index',
            compact('aboutSliders')
        );
    }


    public function store(Request $request)
    {
        try {

            $request->validate([
                'title' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            ]);


            $aboutSlider = new AboutSlider();

            $aboutSlider->title = $request->title;


            if ($request->hasFile('image')) {

                $image = time() . '.' . $request->image->extension();

                $request->image->move(
                    public_path('images/about-slider'),
                    $image
                );

                $aboutSlider->image = $image;
            }


            $aboutSlider->save();


            return back()->with(
                'success',
                'About Slider Created Successfully'
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }


    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'title' => 'required|max:255',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            ]);


            $aboutSlider = AboutSlider::findOrFail($id);


            $aboutSlider->title = $request->title;


            if ($request->hasFile('image')) {


                if (
                    $aboutSlider->image &&
                    file_exists(
                        public_path(
                            'images/about-slider/' . $aboutSlider->image
                        )
                    )
                ) {

                    unlink(
                        public_path(
                            'images/about-slider/' . $aboutSlider->image
                        )
                    );

                }


                $image = time() . '.' . $request->image->extension();


                $request->image->move(
                    public_path('images/about-slider'),
                    $image
                );


                $aboutSlider->image = $image;

            }


            $aboutSlider->save();


            return back()->with(
                'success',
                'About Slider Updated Successfully'
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }


    public function destroy($id)
    {
        try {


            $aboutSlider = AboutSlider::findOrFail($id);


            if (
                $aboutSlider->image &&
                file_exists(
                    public_path(
                        'images/about-slider/' . $aboutSlider->image
                    )
                )
            ) {

                unlink(
                    public_path(
                        'images/about-slider/' . $aboutSlider->image
                    )
                );

            }


            $aboutSlider->delete();


            return back()->with(
                'success',
                'About Slider Deleted Successfully'
            );


        } catch (\Exception $e) {


            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
