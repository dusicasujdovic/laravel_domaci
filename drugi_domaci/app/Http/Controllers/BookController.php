<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();
        return new BookCollection($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'number_of_pages' => 'required',
            'genre_id' => 'required',
            'author_id' => 'required',
            'year_of_release' => 'required'
            
    
           ]);   
    
           if($validator->fails()){
           return response()->json($validator->errors());
           }
    
           $book=Book::create([
            'title' => $request->title,
            'number_of_pages' => $request->number_of_pages,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
            'year_of_release' => $request->year_of_release,
            'user_id' => Auth::user()->id
    
           ]);
    
           return response()->json(['Book is created successfully.', new BookResource($book)]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($book)
    {
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:255',
            'number_of_pages' => 'required',
            'genre_id' => 'required',
            'author_id' => 'required',
            'year_of_release' => 'required'
    
           ]);   
    
         if($validator->fails()){
            return response()->json($validator->errors());
            }

          
          $book->title = $request->title; 
          $book->number_of_pages = $request->number_of_pages;
          $book->genre_id = $request->genre_id;
          $book->author_id = $request->author_id;
          $book->year_of_release = $request->year_of_release;

          $book->save();

          return response()->json(['Book is updated successfully.', new BookResource($book)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($book)
    {
        $book->delete();
        return response()->json(['Book is deleted successfully']);
    }
}
