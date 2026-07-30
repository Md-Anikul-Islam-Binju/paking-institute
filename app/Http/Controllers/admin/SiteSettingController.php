<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('site-setting-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }



    public function index()
    {
        $siteSettings = SiteSetting::latest()->get();

        return view(
            'admin.pages.siteSettings.index',
            compact('siteSettings')
        );
    }




    public function store(Request $request)
    {
        try {

            $request->validate([

                'page'    => 'required|max:255',
                'title'   => 'required|max:255',
                'details' => 'nullable',

            ]);


            SiteSetting::create([

                'page'    => $request->page,
                'title'   => $request->title,
                'details' => $request->details,

            ]);



            return back()->with(
                'success',
                'Site Setting Created Successfully'
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

                'page'    => 'required|max:255',
                'title'   => 'required|max:255',
                'details' => 'nullable',

            ]);



            $siteSetting = SiteSetting::findOrFail($id);



            $siteSetting->update([

                'page'    => $request->page,
                'title'   => $request->title,
                'details' => $request->details,

            ]);




            return back()->with(
                'success',
                'Site Setting Updated Successfully'
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


            $siteSetting = SiteSetting::findOrFail($id);


            $siteSetting->delete();



            return back()->with(
                'success',
                'Site Setting Deleted Successfully'
            );


        } catch (\Exception $e) {


            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
