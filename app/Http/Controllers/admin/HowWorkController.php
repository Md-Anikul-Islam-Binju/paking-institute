<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HowWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HowWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('how-work-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $howWork = HowWork::first();

        return view('admin.pages.howWork.index', compact('howWork'));
    }

    public function createOrUpdateHowWork(Request $request, $id = null)
    {
        $request->validate([
            'title'             => 'required|max:255',
            'details'           => 'nullable',

            'strategy_details'  => 'nullable',
            'strategy_logo'     => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',

            'policy_details'    => 'nullable',
            'policy_logo'       => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',

            'delivery_details'  => 'nullable',
            'delivery_logo'     => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $howWork = HowWork::find($id);

        if (!$howWork) {
            $howWork = new HowWork();
        }

        $howWork->title = $request->title;
        $howWork->details = $request->details;

        $howWork->strategy_details = $request->strategy_details;
        $howWork->policy_details = $request->policy_details;
        $howWork->delivery_details = $request->delivery_details;

        // Strategy Logo
        if ($request->hasFile('strategy_logo')) {

            if (
                $howWork->strategy_logo &&
                file_exists(public_path('images/how-work/'.$howWork->strategy_logo))
            ) {
                unlink(public_path('images/how-work/'.$howWork->strategy_logo));
            }

            $file = 'strategy_'.time().'.'.$request->strategy_logo->extension();

            $request->strategy_logo->move(
                public_path('images/how-work'),
                $file
            );

            $howWork->strategy_logo = $file;
        }

        // Policy Logo
        if ($request->hasFile('policy_logo')) {

            if (
                $howWork->policy_logo &&
                file_exists(public_path('images/how-work/'.$howWork->policy_logo))
            ) {
                unlink(public_path('images/how-work/'.$howWork->policy_logo));
            }

            $file = 'policy_'.time().'.'.$request->policy_logo->extension();

            $request->policy_logo->move(
                public_path('images/how-work'),
                $file
            );

            $howWork->policy_logo = $file;
        }

        // Delivery Logo
        if ($request->hasFile('delivery_logo')) {

            if (
                $howWork->delivery_logo &&
                file_exists(public_path('images/how-work/'.$howWork->delivery_logo))
            ) {
                unlink(public_path('images/how-work/'.$howWork->delivery_logo));
            }

            $file = 'delivery_'.time().'.'.$request->delivery_logo->extension();

            $request->delivery_logo->move(
                public_path('images/how-work'),
                $file
            );

            $howWork->delivery_logo = $file;
        }

        $howWork->save();

        return redirect()->back()->with('success', 'How Work Updated Successfully');
    }
}
