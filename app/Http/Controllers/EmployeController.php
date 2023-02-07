<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employe::paginate(10);
        return view('employe' , compact('emp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('addEmploye');
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
            'git' =>  'required' ,
            'desc' =>  'required' ,
            'image' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $imagename = 'emp_' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('upload/images'), $imagename);
        }


        Employe::create([
            'name' => $request->name ,
            'git' => $request->git ,
            'desc' => $request->desc ,
            'image' => $imagename ,
            'protofolyo' => $request->protofolyo
        ]);

        return redirect()->back();

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
        $emp = Employe::findOrFail($id);
        return view('editEmploye' , compact('emp'));
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
            'git' =>  'required' ,
            'desc' =>  'required' ,
            'image' => 'nullable|image|mimes:png,jpg',
        ]);
        $employe = Employe::findOrFail($id);
        $imagename = $employe->image;

        if ($request->hasFile('image')) {
            File::delete(public_path('upload/images/' . $employe->image));
            $imagename = 'emp_' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('upload/images'), $imagename);
        }

        $employe->update([
            'name' => $request->name ,
            'git' => $request->git ,
            'desc' => $request->desc ,
            'image' => $imagename ,
            'protofolyo' => $request->protofolyo
        ]);
        return redirect()->route('employe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $emp = Employe::findOrFail($id);
        File::delete(public_path('upload/images/' . $emp->image));
        $emp->delete();

        return redirect()->back();
    }
}
