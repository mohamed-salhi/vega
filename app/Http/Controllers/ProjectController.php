<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Project::paginate(10);
        return view('dash.project' , compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('dash.addProject' , compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $request->validate([
             'name' => 'required',
              'video' =>'required',
              'category' => 'required',
             'image' => 'required',
             'alpum' => 'required' ,
             'desc' => 'required'
         ]);

        if ($request->hasFile('image')) {
            $imagename = 'emp_' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('upload/images'), $imagename);
        }


        $album = [];
        if ($request->hasFile('alpum')) {
            foreach($request->File('alpum') as $file){
                $albumname = 'project_' . time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/images'), $albumname);
                $album[] = $albumname ;
            }
        }

        $album = implode(',' , $album);

        Project::create([
           'name' => $request->name ,
            'desc' => $request->desc ,
             'category_id' => $request->category ,
            'image' => $imagename ,
             'alpum' => $album ,
              'video' => $request->video
        ]);

         return  redirect()->route('project.index')->with('msg', 'Category added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro = Project::findOrFail($id);
        $category = Category::all()->except($pro->category_id);
        return  view('dash.editProject' , compact('pro' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'video' =>'required',
            'desc' => 'required'
        ]);

         $project = Project::findOrFail($id);
         $imagename = $project->image ;

         if ($request->has('image')){

             $imagename = 'emp_' . time() . '_' . $request->file('image')->getClientOriginalName();
             $request->file('image')->move(public_path('upload/images'), $imagename);
         }
         if ($request->has('alpum')){
             $album = null ;
             $images = explode(',' , $project->alpum) ;
             foreach ($images as $i){
                 File::delete(public_path('upload/images/' . $i ));
             }



             foreach($request->File('alpum') as $file){
                 $albumname = 'project_' . time() . '_' . $file->getClientOriginalName();
                 $file->move(public_path('upload/images'), $albumname);
                 $album[] = $albumname ;
             }
             $album = implode(',' , $album);
         }else{
             $album = $project->alpum ;
         }
         $project->update([
             'name' => $request->name ,
             'desc' => $request->desc ,
             'image' => $imagename ,
             'alpum' => $album ,
             'video' => $request->video,
             'category_id'=>$request->category
         ]);
        return redirect()->route('project.index')->with('type' , 'success')->with('msg' , 'Updated Project Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Project::find($id);
        File::delete(public_path('upload/images/' . $pro->image));
        $pro->delete();
        $images = explode(',' , $pro->alpum) ;
        foreach ($images as $i){
            File::delete(public_path('upload/images/' . $i ));
            $pro->delete();
        }
        return response()->json(['success' => 'Record has been deleted']);
    }

    function alpumView($id){


         $pro = Project::findOrFail($id);
        return view('dash.alpumView' , compact('pro'));
    }
   function getprojectById($id){
        $project = Project::findOrFail($id);
        return response()->json($project);
   }

}
