<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OurGoalMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OurGoalMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {

            if (!Gate::allows('member-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $members = OurGoalMember::latest()->get();
        return view('admin.pages.member.index', compact('members'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name'    => 'required|max:255',
                'details' => 'nullable',
                'designation' => 'required|max:255',
                'image'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $member = new OurGoalMember();

            $member->name = $request->name;
            $member->designation = $request->designation;
            $member->details = $request->details;


            if ($request->hasFile('image')) {

                $file = time().'.'.$request->image->extension();

                $request->image->move(
                    public_path('images/goal-member'),
                    $file
                );

                $member->image = $file;
            }

            $member->save();
            //Toastr::success('Member Added Successfully');
            return redirect()->back()->with('success', 'Member Added Successfully');
            //return redirect()->back();

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'name'    => 'required|max:255',
                'details' => 'nullable',
                'designation' => 'required|max:255',
                'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $member = OurGoalMember::findOrFail($id);

            $member->name = $request->name;
            $member->designation = $request->designation;
            $member->details = $request->details;

            if ($request->hasFile('image')) {

                if (
                    $member->image &&
                    file_exists(public_path('images/goal-member/'.$member->image))
                ) {
                    unlink(public_path('images/goal-member/'.$member->image));
                }

                $file = time().'.'.$request->image->extension();

                $request->image->move(
                    public_path('images/goal-member'),
                    $file
                );

                $member->image = $file;
            }

            $member->save();
            return redirect()->back()->with('success', 'Member Update Successfully');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }

    public function destroy($id)
    {
        try {

            $member = OurGoalMember::findOrFail($id);

            if (
                $member->image &&
                file_exists(public_path('images/goal-member/'.$member->image))
            ) {
                unlink(public_path('images/goal-member/'.$member->image));
            }
            $member->delete();
            return redirect()->back();

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }
}
