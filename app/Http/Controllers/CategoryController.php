<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->paginate(20);
        return view('dash.category' , compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.addCategory');
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
           'name' => 'required'
        ]);

        Category::create([
           'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('msg', 'Category added successfully')->with('type', 'success');
    }



    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return  view('dash.editCategory' , compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('msg', 'Category Updated successfully')->with('type', 'success');

    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['success' => 'Record has been deleted']);

    }
    function getCategoryById($id){
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
}
