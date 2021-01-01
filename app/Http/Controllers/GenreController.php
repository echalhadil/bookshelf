<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;


class GenreController extends Controller
{
    
    public function all()
	{
		$genre = Genre::orderBy('name','asc')->get();
		
		return response()->json($genre);
	}

	public function genresByBook($id)
	{
		
		$genres = Book::find($id)->bookgenres;

		foreach ($genres as $genre) {
			$genre->name = Genre::find($genre->genre_id)->name;

		}

		return response()->json($genres);

	}

	public function booksByGenre($id)
	{
		
		$genres = Genre::find($id)->bookgenres;

		foreach ($genres as $genre) {
			$genre->name = Genre::find($genre->genre_id)->name;

		}

		return response()->json($genres);

	}

}
