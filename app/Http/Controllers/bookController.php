<?php

namespace App\Http\Controllers;
use App\Book;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{

  
    public function recent()
	{
        // $resents = Book::find('all');
        $resents = DB::table('books')
        ->orderByDesc('review')
        ->limit(3)  
        ->get();

        return $resents;

    }

    public function all()
	{
		$books = DB::table('books')->get();
		return $books;
					
    }

    public function books()
	{
		$books = Book::orderBy('title','asc')->paginate(12);
		return $books;
					
    }

    public function index($id)
	{
        return view('book.book')->with('id',$id);
    }
    
    public function getbook($id)
	{
        $book = Book::find($id);
        return response()->json($book);
      
	}
    
    public function relatedbooks($id)
	{
			
			//get book author
        $author = Book::find($id)->author;

        $published_by = Book::find($id)->published_by;

		//get all book with the same author
        $related = DB::table('books')
            ->where('author',$author)
            ->orWhere('published_by',$published_by)
            ->where('id','!=',$id)
            ->limit(8)
            ->get();
       
		return response()->json($related);
    }
    
    // add book
    public function add(Request $request )
    {
        $request->validate([
            'picture'=>'Image|required',
            'title'=>'required|min:1|max:100',
            'author'=>'required|min:4|max:100',
            'description'=>'required|min:210',
            'pdf'=>'File|required',
            
        ]);

        
        $picture = $request->file('picture')->store('images/books');
        $pdf = $request->file('pdf')->store('pdfs'); 
            
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->picture ='storage/'.$picture;
        $book->pdf ='storage/'.$pdf ;
        $book->published_by = 1;
        $book->download = 0;
        $book->review = 0;
        $book->read =0;
        $book->save();
        
        return $book;
    } 

    public function mybooks()
    {
        $published_by =1;
        // $mybooks = Book::find(['published_by' => 1]);
        $mybooks = DB::table('books')
        ->where('published_by', $published_by)
        ->get();

        // $mybooks = User::table('users')
        // ->where('id',$published_by)
        // ->get()
        // ->books();

        return response()->json($mybooks);
    }

    public function read($id)
    {

        $book = Book::find($id);
        $book->read +=1;
        $book->save();

        return view('book.read')->with('book',$book);
    }

    public function download($id)
    {

        $book = Book::find($id);

        $book->download =$book->download+1;
        $book->save();

        return response()->json($book->download);
       
    }

    public function search(Request $request)
    {
        $title = 'search';
        return view('book.search')->with('title',$title)->with('word',$request->word);
    }
    public function searchResult($word)
    {
        $book = Book::where('title','like','%'.$word.'%')->orwhere('author','like','%'.$word.'%')->paginate(12);
        return response()->json($book);
    }


    

}
