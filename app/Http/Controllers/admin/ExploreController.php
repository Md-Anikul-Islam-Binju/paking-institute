<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Explore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ExploreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('explore-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $explores = Explore::latest()->get();

        return view(
            'admin.pages.explore.index',
            compact('explores')
        );
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'title'   => 'required|max:255',
                'topic'   => 'nullable|max:255',
                'tag'     => 'nullable|max:255',
                'details' => 'nullable',
            ]);

            Explore::create([
                'title'   => $request->title,
                'topic'   => $request->topic,
                'tag'     => $request->tag,
                'details' => $request->details,
            ]);

            return redirect()->back()->with(
                'success',
                'Explore Added Successfully'
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
                'title'   => 'required|max:255',
                'topic'   => 'nullable|max:255',
                'tag'     => 'nullable|max:255',
                'details' => 'nullable',
            ]);

            $explore = Explore::findOrFail($id);

            $explore->title = $request->title;
            $explore->topic = $request->topic;
            $explore->tag = $request->tag;
            $explore->details = $request->details;

            $explore->save();

            return redirect()->back()->with(
                'success',
                'Explore Updated Successfully'
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

            $explore = Explore::findOrFail($id);

            $explore->delete();

            return redirect()->back()->with(
                'success',
                'Explore Deleted Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
