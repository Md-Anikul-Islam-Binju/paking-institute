<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Involved;
use App\Models\KeyBenefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KeyBenefitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('key-benefit-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $keyBenefits = KeyBenefit::with('involved')
            ->latest()
            ->get();

        $involveds = Involved::latest()->get();

        return view(
            'admin.pages.keyBenefit.index',
            compact(
                'keyBenefits',
                'involveds'
            )
        );
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'involved_id' => 'required|exists:involveds,id',
                'title' => 'required|max:255',
                'details' => 'nullable',
                'videos' => 'nullable|max:500',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
                'multiple_image' => 'nullable|array',
                'multiple_image.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $benefit = new KeyBenefit();

            $benefit->involved_id = $request->involved_id;
            $benefit->title = $request->title;
            $benefit->details = $request->details;
            $benefit->videos = $request->videos;

            // Cover Image
            if ($request->hasFile('image')) {

                $file = time().'_cover.'.$request->image->extension();

                $request->image->move(
                    public_path('images/key-benefit'),
                    $file
                );

                $benefit->image = $file;
            }

            // Multiple Images
            $images = [];

            if ($request->hasFile('multiple_image')) {

                foreach ($request->file('multiple_image') as $img) {

                    $fileName = uniqid().'_'.$img->getClientOriginalName();

                    $img->move(
                        public_path('images/key-benefit/multiple'),
                        $fileName
                    );

                    $images[] = $fileName;
                }
            }

            $benefit->multiple_image = $images;

            $benefit->save();

            return redirect()->back()->with(
                'success',
                'Key Benefit Added Successfully'
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
                'involved_id' => 'required|exists:involveds,id',
                'title' => 'required|max:255',
                'details' => 'nullable',
                'videos' => 'nullable|max:500',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
                'multiple_image' => 'nullable|array',
                'multiple_image.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $benefit = KeyBenefit::findOrFail($id);

            $benefit->involved_id = $request->involved_id;
            $benefit->title = $request->title;
            $benefit->details = $request->details;
            $benefit->videos = $request->videos;

            // Cover Image
            if ($request->hasFile('image')) {

                if (
                    $benefit->image &&
                    file_exists(public_path('images/key-benefit/'.$benefit->image))
                ) {
                    unlink(public_path('images/key-benefit/'.$benefit->image));
                }

                $file = time().'_cover.'.$request->image->extension();

                $request->image->move(
                    public_path('images/key-benefit'),
                    $file
                );

                $benefit->image = $file;
            }

            // Multiple Images
            if ($request->hasFile('multiple_image')) {

                // Delete old gallery
                if (!empty($benefit->multiple_image)) {

                    foreach ($benefit->multiple_image as $oldImage) {

                        if (file_exists(public_path('images/key-benefit/multiple/'.$oldImage))) {
                            unlink(public_path('images/key-benefit/multiple/'.$oldImage));
                        }

                    }

                }

                $images = [];

                foreach ($request->file('multiple_image') as $img) {

                    $fileName = uniqid().'_'.$img->getClientOriginalName();

                    $img->move(
                        public_path('images/key-benefit/multiple'),
                        $fileName
                    );

                    $images[] = $fileName;
                }

                $benefit->multiple_image = $images;
            }

            $benefit->save();

            return redirect()->back()->with(
                'success',
                'Key Benefit Updated Successfully'
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

            $benefit = KeyBenefit::findOrFail($id);

            // Delete Cover Image
            if (
                $benefit->image &&
                file_exists(public_path('images/key-benefit/'.$benefit->image))
            ) {
                unlink(public_path('images/key-benefit/'.$benefit->image));
            }

            // Delete Multiple Images
            if (!empty($benefit->multiple_image)) {

                foreach ($benefit->multiple_image as $image) {

                    if (file_exists(public_path('images/key-benefit/multiple/'.$image))) {
                        unlink(public_path('images/key-benefit/multiple/'.$image));
                    }

                }

            }

            $benefit->delete();

            return redirect()->back()->with(
                'success',
                'Key Benefit Deleted Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
