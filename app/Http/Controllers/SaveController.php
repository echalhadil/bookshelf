<?php

namespace App\Http\Controllers;

use App\User;
use App\Review;
use App\Save;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class SaveController extends Controller
{
    //


    public function isSaved($book_id)
    {
        $user_id = Auth::user()->id ;
        //  $user_id =2;
        $exist = Save::select()
        ->where('book_id',$book_id)
        ->where('user_id',$user_id)
        ->first();

        if($exist != "")
            return Response("true");
        else
            return Response("false");
    }

    public function save($book_id){
        $id = Auth::user()->id;
        $save = Save::select()
        ->where('book_id',$book_id)
        ->where('user_id',$id)
        ->first();

        if($save != ""){
            $save->delete();
            return response('success',200);
        }
        else{
            $save = new Save();
            $save->book_id = $book_id;
            $save->user_id = $id;
            $save->save();
            return response('Created',200);            
        }

    }


    public function saved()
    {
        $id = Auth::user()->id;

    $saved = User::find($id)->saves()->paginate(4);
    $saved = DB::table('books')
                ->join('saves','books.id','=','saves.book_id')
                ->join('users','users.id','=','saves.user_id')
                ->select('books.*')
                ->where('users.id',$id)
                ->paginate(3);
    
        return response()->json($saved);
    }
}
