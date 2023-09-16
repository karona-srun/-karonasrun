<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SievphowBookCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = BookCategory::orderBy('updated_at','desc')->paginate(5);
        return view('sievphow.book_categories.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sievphow.book_categories.create');
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
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $category = new BookCategory();
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/book_category'), $filename);
            $category->images = 'images/sievphow/book_category/'.$filename;
        }
        $category->name_kh = $request->name_kh;
        $category->name_en = $request->name_en;
        $category->status = $request->status;
        $category->save();

        return redirect('/sievphow/book-category')->with('code', 1);
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
        $category = BookCategory::find($id);
        return view('sievphow.book_categories.edit', compact('category'));
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
            File::delete($category->images);
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/book_category'), $filename);
            $category->images = 'images/sievphow/book_category/'.$filename;
        }
        $category->name_kh = $request->name_kh;
        $category->name_en = $request->name_en;
        $category->status = $request->status;
        $category->save();

        return redirect('/sievphow/book-category')->with('code', 2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = BookCategory::find($id);
        File::delete($category->images);
        $category->delete();
        
        return redirect('/sievphow/book-category')->with('code', 3);
    }
}
