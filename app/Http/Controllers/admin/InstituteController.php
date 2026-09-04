<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InstituteEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InstituteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('institute-event-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $instituteEvent = InstituteEvent::first();

        return view(
            'admin.pages.institute.index',
            compact('instituteEvent')
        );
    }

    public function createOrUpdateInstituteEvent(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'title'              => 'required|string|max:255',
            'slug'               => 'nullable|string|max:255',
            'remark'             => 'nullable|string',
            'details'            => 'nullable|string',
            'image'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sub_title'          => 'nullable|string|max:255',
            'sub_details'        => 'nullable|string',
            'sub_remark'         => 'nullable|string',
            'sub_remark_details' => 'nullable|string',
            'sub_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $instituteEvent = $id
            ? InstituteEvent::findOrFail($id)
            : new InstituteEvent();

        $instituteEvent->title = $request->title;

        $instituteEvent->slug = $request->slug
            ?: Str::slug($request->title);

        $instituteEvent->remark = $request->remark;
        $instituteEvent->details = $request->details;
        $instituteEvent->sub_title = $request->sub_title;
        $instituteEvent->sub_details = $request->sub_details;
        $instituteEvent->sub_remark = $request->sub_remark;
        $instituteEvent->sub_remark_details = $request->sub_remark_details;

        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $instituteEvent->image &&
                file_exists(public_path($instituteEvent->image))
            ) {
                unlink(public_path($instituteEvent->image));
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('images/institute-event'),
                $imageName
            );

            $instituteEvent->image = 'images/institute-event/' . $imageName;
        }

        if ($request->hasFile('sub_image')) {

            // Delete old sub image
            if (
                $instituteEvent->sub_image &&
                file_exists(public_path($instituteEvent->sub_image))
            ) {
                unlink(public_path($instituteEvent->sub_image));
            }

            $subImageName = time() . '_sub.' . $request->sub_image->extension();

            $request->sub_image->move(
                public_path('images/institute-event'),
                $subImageName
            );

            $instituteEvent->sub_image = 'images/institute-event/' . $subImageName;
        }

        $instituteEvent->save();

        flash()->success(
            $id
                ? 'Institute Event updated successfully!'
                : 'Institute Event created successfully!'
        );

        return redirect()->back();
    }
}
