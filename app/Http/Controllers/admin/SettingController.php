<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('setting-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $setting = Setting::first();
        return view('admin.pages.setting.index',compact('setting'));
    }

    public function createOrUpdateSetting(Request $request, $id = null)
    {
        try {

            $request->validate([
                'name'        => 'required|max:255',
                'logo'        => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
                'site_url'    => 'nullable|max:255',
                'twitter'     => 'nullable|max:255',
                'facebook'    => 'nullable|max:255',
                'instagram'   => 'nullable|max:255',
                'youtube'     => 'nullable|max:255',
                'linkedin'    => 'nullable|max:255',
                'description' => 'nullable',
            ]);

            if ($id) {

                $setting = Setting::findOrFail($id);

            } else {

                $setting = new Setting();

            }

            $setting->name = $request->name;
            $setting->site_url = $request->site_url;
            $setting->twitter = $request->twitter;
            $setting->facebook = $request->facebook;
            $setting->instagram = $request->instagram;
            $setting->youtube = $request->youtube;
            $setting->linkedin = $request->linkedin;
            $setting->description = $request->description;

            if ($request->hasFile('logo')) {

                if (
                    $setting->logo &&
                    file_exists(public_path('images/setting/' . $setting->logo))
                ) {
                    unlink(public_path('images/setting/' . $setting->logo));
                }

                $logo = time() . '.' . $request->logo->extension();

                $request->logo->move(
                    public_path('images/setting'),
                    $logo
                );

                $setting->logo = $logo;
            }

            $setting->save();

            return redirect()->back()->with(
                'success',
                $id
                    ? 'Setting Updated Successfully'
                    : 'Setting Created Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
