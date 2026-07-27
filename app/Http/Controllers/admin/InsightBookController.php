<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Insight;
use App\Models\InsightBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class InsightBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('insight-book-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }

    public function index()
    {
        $insights = Insight::orderBy('title')->get();

        $books = InsightBook::with('insight')
            ->latest()
            ->get();

        return view('admin.pages.insightBook.index', compact('books', 'insights'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'insight_id' => 'required|exists:insights,id',
                'chapter_no' => 'nullable|integer',
                'title'      => 'required|max:255',
                'details'    => 'nullable',
            ]);

            InsightBook::create([
                'insight_id' => $request->insight_id,
                'chapter_no' => $request->chapter_no,
                'title'      => $request->title,
                'slug'       => Str::slug($request->title) . '-' . time(),
                'details'    => $request->details,

            ]);

            return redirect()->back()->with('success', 'Insight Book Added Successfully');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'insight_id' => 'required|exists:insights,id',
                'chapter_no' => 'nullable|integer',
                'title'      => 'required|max:255',
                'details'    => 'nullable',
            ]);

            $book = InsightBook::findOrFail($id);

            $book->insight_id = $request->insight_id;
            $book->chapter_no = $request->chapter_no;
            $book->title = $request->title;
            $book->slug = Str::slug($request->title) . '-' . $book->id;
            $book->details = $request->details;

            $book->save();

            return redirect()->back()->with('success', 'Insight Book Updated Successfully');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function destroy($id)
    {
        try {

            $book = InsightBook::findOrFail($id);

            $book->delete();

            return redirect()->back()->with('success', 'Insight Book Deleted Successfully');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
