<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MediaCenter;
use App\Models\ManagementBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MediaCenterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('media-center-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index(Request $request)
    {
        $query = MediaCenter::latest();

        if ($request->filled('search')) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        $mediaCenters = $query
            ->paginate(10)
            ->withQueryString();

        $managements = ManagementBoard::latest()->get();

        return view(
            'admin.pages.mediaCenter.index',
            compact(
                'mediaCenters',
                'managements'
            )
        );
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'title' => 'required|max:255',
                'date' => 'nullable|date',
                'remark' => 'nullable',
                'tag' => 'nullable',
                'management_board_id' => 'nullable|exists:management_boards,id',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $mediaCenter = new MediaCenter();

            $mediaCenter->title = $request->title;
            $mediaCenter->slug = Str::slug($request->title);
            $mediaCenter->date = $request->date;
            $mediaCenter->remark = $request->remark;
            $mediaCenter->tag = $request->tag;
            $mediaCenter->management_board_id = $request->management_board_id;

            if ($request->hasFile('cover_image')) {

                $file = time() . '.' . $request->cover_image->extension();

                $request->cover_image->move(
                    public_path('images/media-center'),
                    $file
                );

                $mediaCenter->cover_image = $file;
            }

            $mediaCenter->save();

            return redirect()->back()->with(
                'success',
                'Media Center Added Successfully'
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
                'title' => 'required|max:255',
                'date' => 'nullable|date',
                'remark' => 'nullable',
                'tag' => 'nullable',
                'management_board_id' => 'nullable|exists:management_boards,id',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            ]);

            $mediaCenter = MediaCenter::findOrFail($id);

            $mediaCenter->title = $request->title;
            $mediaCenter->slug = Str::slug($request->title);
            $mediaCenter->date = $request->date;
            $mediaCenter->remark = $request->remark;
            $mediaCenter->tag = $request->tag;
            $mediaCenter->management_board_id = $request->management_board_id;

            if ($request->hasFile('cover_image')) {

                if (
                    $mediaCenter->cover_image &&
                    file_exists(
                        public_path(
                            'images/media-center/' .
                            $mediaCenter->cover_image
                        )
                    )
                ) {
                    unlink(
                        public_path(
                            'images/media-center/' .
                            $mediaCenter->cover_image
                        )
                    );
                }

                $file = time() . '.' . $request->cover_image->extension();

                $request->cover_image->move(
                    public_path('images/media-center'),
                    $file
                );

                $mediaCenter->cover_image = $file;
            }

            $mediaCenter->save();

            return redirect()->back()->with(
                'success',
                'Media Center Updated Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            $mediaCenter = MediaCenter::findOrFail($id);

            if (
                $mediaCenter->cover_image &&
                file_exists(
                    public_path(
                        'images/media-center/' .
                        $mediaCenter->cover_image
                    )
                )
            ) {
                unlink(
                    public_path(
                        'images/media-center/' .
                        $mediaCenter->cover_image
                    )
                );
            }

            $mediaCenter->delete();

            return redirect()->back()->with(
                'success',
                'Media Center Deleted Successfully'
            );

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
