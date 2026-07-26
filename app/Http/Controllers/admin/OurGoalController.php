<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OurGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class OurGoalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('goal-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $goal = OurGoal::first();

        return view('admin.pages.goal.index', compact('goal'));
    }

    public function createOrUpdateGoal(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required|string|max:255',
            'details' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $goal = $id
            ? OurGoal::findOrFail($id)
            : new OurGoal();

        $goal->title = $request->title;
        $goal->details = $request->details;

        $goal->save();

        return redirect()->back()->with(
            'success',
            $id
                ? 'Our Goal updated successfully!'
                : 'Our Goal created successfully!'
        );
    }
}
