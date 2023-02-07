<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class webController extends Controller
{
    public function index(){
        $Category=Category::with('project')->get();

        return view('vega.index',compact('Category'));
    }
    public function DetailsProject($id){
        $project= Project::findOrFail($id);
        $Category=Category::with('project')->get();
        $alpum=explode(',',$project->alpum);

        return view('vega.details_website',with([
            'project'=>$project,
            'alpum'=>$alpum,
            'Category'=>$Category
        ]));
    }

    public function AllProject(){
        $Category=Category::with('project')->get();
        return view('vega.see_all',compact('Category'));
    }
}
