<?php

namespace App\Http\Controllers\Sievphow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\BookUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct() {
    //     $this->middleware('auth:api');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();
        return response()->json([
            "message" => "Books list",
            "success" => true,
            "data" => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_kh' => 'required|string|between:2,100',
            'title_en' => 'required|string|between:2,100',
            'book_categories' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'short_description_kh' => 'required',
            'short_description_en' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/books'), $filename);
        }

        if($request->file('audio')){
            $file= $request->file('audio');
            $audio_filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/audios'), $audio_filename);
        }
        
        if($request->file('pdf')){
            $file= $request->file('pdf');
            $pdf_filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/pdfs'), $pdf_filename);
        }

        $book =  new Books();
        $book->title_kh = $request->title_kh;
        $book->title_en = $request->title_en;
        $book->favorite = 10;
        $book->book_categories_id = $request->book_categories;
        $book->publisher = $request->publisher;
        $book->author = $request->author;
        $book->short_description_kh = $request->short_description_kh;
        $book->short_description_en = $request->short_description_en;
        $book->image = $filename ?? null;
        $book->pdf = $pdf_filename ?? null;
        $book->audio = $audio_filename ?? null;
        $book->save();

        return response()->json([
            "message" => "Books list",
            "success" => true,
            "data" => $book
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Books::find($id);
        return response()->json([
            "message" => "Books list",
            "success" => true,
            "data" => $books
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Books::find($id);
        return response()->json([
            "message" => "Books list",
            "success" => true,
            "data" => $books
        ]);
    }
    
    public function filterBookByCategory($id)
    {
        $books = Books::where('book_categories_id',$id)->get();
        return response()->json([
            "message" => "Books list",
            "success" => true,
            "data" => $books
        ]);
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
        $validator = Validator::make($request->all(), [
            'title_kh' => 'required|string|between:2,100',
            'title_en' => 'required|string|between:2,100',
            'book_categories' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'short_description_kh' => 'required',
            'short_description_en' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $book = Books::find($id);
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/books'), $filename);
            $book->image = $filename;
        }

        if($request->file('audio')){
            $file= $request->file('audio');
            $audio_filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/audios'), $audio_filename);
            $book->audio = $audio_filename;
        }
        
        if($request->file('pdf')){
            $file= $request->file('pdf');
            $pdf_filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/pdfs'), $pdf_filename);
            $book->pdf = $pdf_filename;
        }
        
        $book->title_kh = $request->title_kh;
        $book->title_en = $request->title_en;
        $book->publisher = $request->publisher;
        $book->book_categories_id = $request->book_categories;
        $book->author = $request->author;
        $book->short_description_kh = $request->short_description_kh;
        $book->short_description_en = $request->short_description_en;
        $book->save();

        return response()->json([
            "message" => "Books list",
            "success" => true,
            "data" => $book
        ]);
    }


    public function saveBooks(Request $request)
    {
        $book = Books::find($request->book_id);	
        $userIds = User::find(Auth::user()->id)->id;
        $book->users()->attach($userIds);

        return response()->json([
            "message" => "Save books",
            "success" => true,
            "book" => $book
        ]);
    }

    public function unSaveBooks($id)
    {
        $unSave = BookUser::where('book_id',$id);
        $unSave->delete();

        return response()->json([
            "message" => "unSave books",
            "success" => true,
            "book" => $unSave
        ]);
    }

    public function retrieveBook(){
        $user = User::find(Auth::user()->id);	
        $books = $user->books;
        return response()->json([
            "message" => "Retrieve Book",
            "success" => true,
            "book" => $books
        ]);
    }

    public function favorite($id)
    {
        $book = Books::find($id);
        $book->favorite = $book->favorite + 1;
        $book->save();
        return response()->json([
            "message" => "Books",
            "success" => true,
            "data" => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
        return response()->json([
            "message" => "Books list",
            "success" => true,
            "data" => $book
        ]);
    }
}
