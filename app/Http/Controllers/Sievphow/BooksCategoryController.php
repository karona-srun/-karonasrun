<?php

namespace App\Http\Controllers\Sievphow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sievphow\BookCategory;
use Illuminate\Support\Facades\Validator;

class BooksCategoryController extends Controller
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
        $category = BookCategory::all();
        return response()->json([
            "message" => "Book Category list",
            "success" => true,
            "data" => $category
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
            'name_kh' => 'required|string|between:2,100',
            'name_en' => 'required|string|between:2,100',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/book_category'), $filename);
        }

        $category = new BookCategory();
        $category->name_kh = $request->name_kh;
        $category->name_en = $request->name_en;
        $category->images = $filename ?? null;
        $category->status = $request->status ?? true;
        $category->save();

        return response()->json([
            "message" => "Book Category list",
            "success" => true,
            "data" => $category
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
        $category = BookCategory::find($id);
        return response()->json([
            "message" => "Book Category",
            "success" => true,
            "data" => $category
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
        $category = BookCategory::find($id);
        return response()->json([
            "message" => "Book Category",
            "success" => true,
            "data" => $category
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
            'name_kh' => 'required|string|between:2,100',
            'name_en' => 'required|string|between:2,100',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $category = BookCategory::find($id);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/book_category'), $filename);
            $category->images = $filename;
        }
        $category->name_kh = $request->name_kh;
        $category->name_en = $request->name_en;
        $category->status = $request->status;
        $category->save();

        return response()->json([
            "message" => "Book Category list",
            "success" => true,
            "data" => $category
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
        $book = BookCategory::find($id);
        $book->delete();
        return response()->json([
            "message" => "Books list",
            "success" => true,
            "data" => $book
        ]);
    }
}
