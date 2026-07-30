<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NewsLetterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('news-letter-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');

    }


    public function index()
    {
        $newsLetters = NewsLetter::latest()->get();

        return view(
            'admin.pages.newsLetter.index',
            compact('newsLetters')
        );
    }


    public function store(Request $request)
    {
        try {

            $request->validate([
                'title'  => 'required|max:255',
                'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
                'status' => 'required',
            ]);


            $newsLetter = new NewsLetter();

            $newsLetter->title = $request->title;
            $newsLetter->status = $request->status;


            if ($request->hasFile('image')) {

                $image = time().'.'.$request->image->extension();

                $request->image->move(
                    public_path('images/news-letter'),
                    $image
                );

                $newsLetter->image = $image;
            }


            $newsLetter->save();


            return back()->with(
                'success',
                'News Letter Created Successfully'
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
                'title'  => 'required|max:255',
                'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
                'status' => 'required',
            ]);


            $newsLetter = NewsLetter::findOrFail($id);


            $newsLetter->title = $request->title;
            $newsLetter->status = $request->status;


            if ($request->hasFile('image')) {


                if (
                    $newsLetter->image &&
                    file_exists(public_path('images/news-letter/'.$newsLetter->image))
                ) {
                    unlink(
                        public_path('images/news-letter/'.$newsLetter->image)
                    );
                }


                $image = time().'.'.$request->image->extension();


                $request->image->move(
                    public_path('images/news-letter'),
                    $image
                );


                $newsLetter->image = $image;

            }


            $newsLetter->save();


            return back()->with(
                'success',
                'News Letter Updated Successfully'
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


            $newsLetter = NewsLetter::findOrFail($id);


            if (
                $newsLetter->image &&
                file_exists(public_path('images/news-letter/'.$newsLetter->image))
            ) {

                unlink(
                    public_path('images/news-letter/'.$newsLetter->image)
                );

            }


            $newsLetter->delete();


            return back()->with(
                'success',
                'News Letter Deleted Successfully'
            );


        } catch (\Exception $e) {


            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
