<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ReviewController extends Controller
{
    //
    public function add(Request $request){

        $user_id = Auth::user()->id;

        //Search for review
        $exists = Review::select()
            ->where('book_id',$request->book_id)
            ->where('user_id',$user_id)
            ->first();

        if($exists!="")
        {
            //updating the review if exists
            $exists->stars=$request->stars;
            $exists->save();
        }
        else
        {
            //Create New review 
            $review = new Review();          
            $review->user_id = $user_id;
            $review->book_id = $request->book_id;
            $review->stars= $request->stars;
            $review->save();
        }

        // //find Avg of Books reviews
       

        $avg = Review::all()->where('book_id',$request->book_id)->avg('stars');
        

        // //updating book review 
        $rev = round($avg,2);
        
        $book = Book::select()->where('id',$request->book_id)->first();
        $book->review = "$rev";
        $book->save();

        return response()->json($book->review,200);


    }
}
