<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Insight;
use App\Models\InsightType;
use App\Models\ManagementBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class InsightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('insight-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $insights = Insight::with('type')
            ->latest()
            ->get();

        $types = InsightType::where('status', 1)->latest()->get();

        $managements = ManagementBoard::latest()->get();

        return view(
            'admin.pages.insight.index',
            compact(
                'insights',
                'types',
                'managements'
            )
        );
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'type_id' => 'required|exists:insight_types,id',
                'title' => 'required|max:255',
                'date' => 'nullable|date',
                'remark' => 'nullable',
                'tag' => 'nullable',
                'multiple_management_board_id' => 'nullable|array',
                'multiple_management_board_id.*' => 'exists:management_boards,id',
                'cover_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
                'pdf_file'    => 'nullable|mimes:pdf|max:10240',
            ]);

            $insight = new Insight();

            $insight->type_id = $request->type_id;
            $insight->title = $request->title;
            $insight->slug = Str::slug($request->title);
            $insight->date = $request->date;
            $insight->remark = $request->remark;
            $insight->tag = $request->tag;
            $insight->multiple_management_board_id = $request->multiple_management_board_id;

            if ($request->hasFile('cover_image')) {

                $file = time() . '.' . $request->cover_image->extension();

                $request->cover_image->move(
                    public_path('images/insight'),
                    $file
                );

                $insight->cover_image = $file;
            }

            if ($request->hasFile('pdf_file')) {

                $pdf = time() . '_pdf.' . $request->pdf_file->extension();

                $request->pdf_file->move(
                    public_path('files/insight-pdf'),
                    $pdf
                );

                $insight->pdf_file = $pdf;
            }

            $insight->save();

            return redirect()->back()->with(
                'success',
                'Insight Added Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'type_id' => 'required|exists:insight_types,id',
                'title' => 'required|max:255',
                'date' => 'nullable|date',
                'remark' => 'nullable',
                'tag' => 'nullable',
                'multiple_management_board_id' => 'nullable|array',
                'multiple_management_board_id.*' => 'exists:management_boards,id',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
                'pdf_file'    => 'nullable|mimes:pdf|max:10240',
            ]);

            $insight = Insight::findOrFail($id);

            $insight->type_id = $request->type_id;
            $insight->title = $request->title;
            $insight->slug = Str::slug($request->title);
            $insight->date = $request->date;
            $insight->remark = $request->remark;
            $insight->tag = $request->tag;
            $insight->multiple_management_board_id = $request->multiple_management_board_id;

            if ($request->hasFile('cover_image')) {

                if (
                    $insight->cover_image &&
                    file_exists(public_path('images/insight/' . $insight->cover_image))
                ) {
                    unlink(public_path('images/insight/' . $insight->cover_image));
                }

                $file = time() . '.' . $request->cover_image->extension();

                $request->cover_image->move(
                    public_path('images/insight'),
                    $file
                );

                $insight->cover_image = $file;
            }

            if ($request->hasFile('pdf_file')) {

                if (
                    $insight->pdf_file &&
                    file_exists(public_path('files/insight-pdf/' . $insight->pdf_file))
                ) {
                    unlink(public_path('files/insight-pdf/' . $insight->pdf_file));
                }

                $pdf = time() . '_pdf.' . $request->pdf_file->extension();

                $request->pdf_file->move(
                    public_path('files/insight-pdf'),
                    $pdf
                );

                $insight->pdf_file = $pdf;
            }

            $insight->save();

            return redirect()->back()->with(
                'success',
                'Insight Updated Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }

    public function destroy($id)
    {
        try {

            $insight = Insight::findOrFail($id);

            if (
                $insight->cover_image &&
                file_exists(public_path('images/insight/' . $insight->cover_image))
            ) {
                unlink(public_path('images/insight/' . $insight->cover_image));
            }

            if (
                $insight->pdf_file &&
                file_exists(public_path('files/insight-pdf/' . $insight->pdf_file))
            ) {
                unlink(public_path('files/insight-pdf/' . $insight->pdf_file));
            }

            $insight->delete();

            return redirect()->back()->with(
                'success',
                'Insight Deleted Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());

        }
    }
}
