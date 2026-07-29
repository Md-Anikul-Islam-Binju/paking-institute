<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\ConferenceCategory;
use App\Models\ConferenceSubCategory;
use App\Models\ExploreVision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!Gate::allows('conference-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);

        })->only('index');
    }


    public function index()
    {
        $conferences = Conference::with([
            'exploreVision',
            'category',
            'subCategory'
        ])->latest()->get();


        $exploreVisions = ExploreVision::latest()->get();


        return view(
            'admin.pages.conference.index',
            compact(
                'conferences',
                'exploreVisions'
            )
        );
    }



    public function getCategories($id)
    {
        $categories = ConferenceCategory::where('explore_vision_id',$id)
            ->where('status',1)
            ->get();


        return response()->json($categories);
    }



    public function getSubCategories($id)
    {
        $subCategories = ConferenceSubCategory::where('conference_category_id',$id)
            ->where('status',1)
            ->get();


        return response()->json($subCategories);
    }



    public function store(Request $request)
    {

        $request->validate([

            'explore_vision_id'=>'required',
            'conference_category_id'=>'required',
            'conference_sub_category_id'=>'required',

            'title'=>'required',
            'tag'=>'nullable',
            'details'=>'nullable',

            'date'=>'nullable',
            'start_time'=>'nullable',
            'end_time'=>'nullable',

            'cover_image'=>'nullable|image',

            'videos_file'=>'nullable',
            'videos_link'=>'nullable',

        ]);



        $image = null;


        if($request->hasFile('cover_image')){

            $image = time().'.'.$request->cover_image->extension();

            $request->cover_image->move(
                public_path('images/conference'),
                $image
            );

        }



        Conference::create([

            'explore_vision_id'=>$request->explore_vision_id,

            'conference_category_id'=>$request->conference_category_id,

            'conference_sub_category_id'=>$request->conference_sub_category_id,


            'title'=>$request->title,

            'tag'=>$request->tag,

            'details'=>$request->details,


            'date'=>$request->date,

            'start_time'=>$request->start_time,

            'end_time'=>$request->end_time,


            'cover_image'=>$image,

            'videos_link'=>$request->videos_link,

        ]);



        return back()->with(
            'success',
            'Conference Added Successfully'
        );

    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([

                'explore_vision_id' => 'required|exists:explore_visions,id',
                'conference_category_id' => 'required|exists:conference_categories,id',
                'conference_sub_category_id' => 'required|exists:conference_sub_categories,id',

                'title' => 'required',
                'tag' => 'nullable',
                'details' => 'nullable',

                'date' => 'nullable',
                'start_time' => 'nullable',
                'end_time' => 'nullable',

                'cover_image' => 'nullable|image',

                'videos_link' => 'nullable',

            ]);



            $conference = Conference::findOrFail($id);



            $image = $conference->cover_image;



            if($request->hasFile('cover_image')){


                // delete old image

                if($conference->cover_image){

                    @unlink(
                        public_path('images/conference/'.$conference->cover_image)
                    );

                }



                $image = time().'.'.$request->cover_image->extension();


                $request->cover_image->move(
                    public_path('images/conference'),
                    $image
                );

            }




            $conference->update([


                'explore_vision_id' => $request->explore_vision_id,


                'conference_category_id' => $request->conference_category_id,


                'conference_sub_category_id' => $request->conference_sub_category_id,


                'title' => $request->title,


                'tag' => $request->tag,


                'details' => $request->details,


                'date' => $request->date,


                'start_time' => $request->start_time,


                'end_time' => $request->end_time,


                'cover_image' => $image,


                'videos_link' => $request->videos_link,


            ]);




            return back()->with(
                'success',
                'Conference Updated Successfully'
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

        $conference = Conference::findOrFail($id);


        if($conference->cover_image){

            @unlink(
                public_path('images/conference/'.$conference->cover_image)
            );

        }


        $conference->delete();


        return back()->with(
            'success',
            'Conference Deleted Successfully'
        );

    }
}
