<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PartnershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('partnership-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $partnership = Partnership::first();

        return view('admin.pages.partnership.index', compact('partnership'));
    }

    public function createOrUpdatePartnership(Request $request, $id = null)
    {
        $request->validate([
            'title'       => 'required|max:255',
            'details'     => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $partnership = Partnership::find($id);

        if (!$partnership) {
            $partnership = new Partnership();
        }

        $partnership->title = $request->title;
        $partnership->slug = Str::slug($request->title);
        $partnership->details = $request->details;

        if ($request->hasFile('cover_image')) {

            if (
                $partnership->cover_image &&
                file_exists(public_path('images/partnership/' . $partnership->cover_image))
            ) {
                unlink(public_path('images/partnership/' . $partnership->cover_image));
            }

            $file = time() . '.' . $request->cover_image->extension();

            $request->cover_image->move(
                public_path('images/partnership'),
                $file
            );

            $partnership->cover_image = $file;
        }

        $partnership->save();

        return redirect()->back()->with(
            'success',
            'Partnership Updated Successfully'
        );
    }
}
