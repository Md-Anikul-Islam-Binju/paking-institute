<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Radical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RadicalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('radical-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $radical = Radical::first();

        return view('admin.pages.radical.index', compact('radical'));
    }

    public function createOrUpdateRadical(Request $request, $id = null)
    {
        try {

            $request->validate([
                'title'   => 'required|max:255',
                'details' => 'nullable',
            ]);

            $radical = $id
                ? Radical::findOrFail($id)
                : new Radical();

            $radical->title = $request->title;
            $radical->details = $request->details;

            $radical->save();

            return redirect()->back()->with(
                'success',
                $id
                    ? 'Radical Updated Successfully'
                    : 'Radical Created Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
