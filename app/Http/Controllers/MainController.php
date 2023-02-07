<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Throwable;

class MainController extends Controller
{
    function index(){
        return view('dash.index');
    }
    function contact(){
          $contact=Contact::paginate(20);
        return view('dash.Contact.index',compact('contact'));
    }
    public function contactpost(Request $request){
        $validator = Validator($request->all(),[
            'name'=>'required',
            'email' => ['required', 'string','email' ],
            'message' => ['required', 'string',],
        ]);
        if ($validator->fails()){
            return response()->json([
                'error' => $validator->getMessageBag()->first()
            ]);
        }
        DB::beginTransaction();
        try {

        $Contact=Contact::create($request->all());
            DB::commit();
            return response()->json([
                'success' => 'true',
            ]);
        }catch (Throwable $e){
            DB::rollBack();
            return response()->json([
                'error' => $e
            ]);
        }


    }
    public function destroy($id){
        DB::beginTransaction();
        try {
            $Contact=Contact::destroy($id);
            DB::commit();
            return response()->json([
                'success' => 'true',
            ]);
        }catch (Throwable $e){
            DB::rollBack();
            return response()->json([
                'error' => $e
            ]);
        }


    }

    function comment(){
        $contact=Comment::paginate(20);
        return view('dash.Comment.index',compact('contact'));
    }
    public function commentpost(Request $request){
        $validator = Validator($request->all(),[
            'name'=>'required',
            'message' => ['required', 'string',],
        ]);
        if ($validator->fails()){
            return response()->json([
                'error' => $validator->getMessageBag()->first()
            ]);
        }
        DB::beginTransaction();
        try {

            $Comment=Comment::create($request->all());
            DB::commit();
            return response()->json([
                'success' => 'true',
            ]);
        }catch (Throwable $e){
            DB::rollBack();
            return response()->json([
                'error' => $e
            ]);
        }


    }
    public function destroycomment($id){
        DB::beginTransaction();
        try {
            $Contact=Comment::destroy($id);
            DB::commit();
            return response()->json([
                'success' => 'true',
            ]);
        }catch (Throwable $e){
            DB::rollBack();
            return response()->json([
                'error' => $e
            ]);
        }


    }

}
