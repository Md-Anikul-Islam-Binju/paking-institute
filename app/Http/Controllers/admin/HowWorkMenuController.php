<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HowWorkMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HowWorkMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('how-work-menu-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $howWorkMenu = HowWorkMenu::first();

        return view(
            'admin.pages.howWorkmenu.index',
            compact('howWorkMenu')
        );
    }

    public function createOrUpdate(Request $request, $id = null)
    {
        try {

            $request->validate([
                'how_we_work_title'   => 'required|max:255',
                'how_we_work_details' => 'nullable|string',

                'insight_title'        => 'required|max:255',
                'insight_logo'         => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

                'partnership_title'   => 'required|max:255',
                'partnership_logo'    => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

                'approach_title'      => 'required|max:255',
                'approach_logo'       => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            ]);

            if ($id) {

                $howWorkMenu = HowWorkMenu::findOrFail($id);

            } else {

                $howWorkMenu = new HowWorkMenu();
            }

            /*
            |--------------------------------------------------------------------------
            | Text Fields
            |--------------------------------------------------------------------------
            */

            $howWorkMenu->how_we_work_title = $request->how_we_work_title;
            $howWorkMenu->how_we_work_details = $request->how_we_work_details;

            $howWorkMenu->insight_title = $request->insight_title;

            $howWorkMenu->partnership_title = $request->partnership_title;

            $howWorkMenu->approach_title = $request->approach_title;


            /*
            |--------------------------------------------------------------------------
            | Insight Logo
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('insight_logo')) {

                if (
                    $howWorkMenu->insight_logo &&
                    file_exists(
                        public_path('images/how-work-menu/' . $howWorkMenu->insight_logo)
                    )
                ) {
                    unlink(
                        public_path('images/how-work-menu/' . $howWorkMenu->insight_logo)
                    );
                }

                $insightLogoName =
                    'insight_' . time() . '.' .
                    $request->insight_logo->extension();

                $request->insight_logo->move(
                    public_path('images/how-work-menu'),
                    $insightLogoName
                );

                $howWorkMenu->insight_logo = $insightLogoName;
            }


            /*
            |--------------------------------------------------------------------------
            | Partnership Logo
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('partnership_logo')) {

                if (
                    $howWorkMenu->partnership_logo &&
                    file_exists(
                        public_path('images/how-work-menu/' . $howWorkMenu->partnership_logo)
                    )
                ) {
                    unlink(
                        public_path('images/how-work-menu/' . $howWorkMenu->partnership_logo)
                    );
                }

                $partnershipLogoName =
                    'partnership_' . time() . '.' .
                    $request->partnership_logo->extension();

                $request->partnership_logo->move(
                    public_path('images/how-work-menu'),
                    $partnershipLogoName
                );

                $howWorkMenu->partnership_logo = $partnershipLogoName;
            }


            /*
            |--------------------------------------------------------------------------
            | Approach Logo
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('approach_logo')) {

                if (
                    $howWorkMenu->approach_logo &&
                    file_exists(
                        public_path('images/how-work-menu/' . $howWorkMenu->approach_logo)
                    )
                ) {
                    unlink(
                        public_path('images/how-work-menu/' . $howWorkMenu->approach_logo)
                    );
                }

                $approachLogoName =
                    'approach_' . time() . '.' .
                    $request->approach_logo->extension();

                $request->approach_logo->move(
                    public_path('images/how-work-menu'),
                    $approachLogoName
                );

                $howWorkMenu->approach_logo = $approachLogoName;
            }


            $howWorkMenu->save();

            return redirect()
                ->back()
                ->with(
                    'success',
                    $id
                        ? 'How We Work Menu Updated Successfully'
                        : 'How We Work Menu Created Successfully'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
