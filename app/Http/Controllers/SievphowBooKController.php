<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SievphowBooKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Books::orderBy('updated_at', 'desc')->paginate(5);
        return view('sievphow.books.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = BookCategory::orderBy('name_kh', 'desc')->get();
        return view('sievphow.books.create', compact('datas'));
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
            'book_categories_id' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'favorite' => 'required',
            'image' => 'required',
            'pdf' => 'required',
            'audio' => 'required',
            'short_description_kh' => 'required',
            'short_description_en' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/sievphow/books'), $filename);
        }

        if ($request->file('audio')) {
            $file = $request->file('audio');
            $audio_filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/sievphow/audios'), $audio_filename);
        }

        if ($request->file('pdf')) {
            $file = $request->file('pdf');
            $pdf_filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/sievphow/pdfs'), $pdf_filename);
        }

        $book = new Books();
        $book->title_kh = $request->title_kh;
        $book->title_en = $request->title_en;
        $book->favorite = $request->favorite;
        $book->book_categories_id = $request->book_categories_id;
        $book->publisher = $request->publisher;
        $book->author = $request->author;
        $book->is_free = $request->is_free;
        $book->is_enabled = $request->is_enabled;
        $book->price = $request->price;
        $book->short_description_kh = $request->short_description_kh;
        $book->short_description_en = $request->short_description_en;
        $book->image = $filename ?? null;
        $book->pdf = $pdf_filename ?? null;
        $book->audio = $audio_filename ?? null;
        $book->save();
        
        return redirect('/sievphow/book')->with('success','label_created_successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Books::find($id);
        return view('sievphow.books.show', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Books::find($id);
        $datas = BookCategory::orderBy('name_kh', 'desc')->get();
        return view('sievphow.books.edit', compact('datas','book'));
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
            'book_categories_id' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'favorite' => 'required',
            'short_description_kh' => 'required',
            'short_description_en' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $book = Books::find($id);

        // if ($request->file('image')) {
        //     $file = $request->file('image');
        //     $filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
        //     $file->move(public_path('images/sievphow/books'), $filename);
        // }

        if ($request->hasFile('image')) {
            File::delete('images/sievphow/books/' . $book->image);
            $file = $request->file('image');
            $filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/sievphow/books'), $filename);
            $book->image = $filename;
        }


        if ($request->file('audio')) {
            // $file = $request->file('audio');
            // $audio_filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            // $file->move(public_path('images/sievphow/audios'), $audio_filename);

            File::delete('images/sievphow/audios/' . $book->image);
            $file = $request->file('audio');
            $audio_filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/sievphow/audios'), $audio_filename);
            $book->audio = $audio_filename;

        }

        if ($request->file('pdf')) {
            // $file = $request->file('pdf');
            // $pdf_filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            // $file->move(public_path('images/sievphow/pdfs'), $pdf_filename);

            File::delete('images/sievphow/pdfs/' . $book->pdf);
            $file = $request->file('pdf');
            $pdf_filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/sievphow/pdfs'), $pdf_filename);
            $book->pdf = $pdf_filename;
        }

        $book->title_kh = $request->title_kh;
        $book->title_en = $request->title_en;
        $book->favorite = $request->favorite;
        $book->book_categories_id = $request->book_categories_id;
        $book->publisher = $request->publisher;
        $book->author = $request->author;
        $book->is_free = $request->is_free;
        $book->is_enabled = $request->is_enabled;
        $book->price = $request->price;
        $book->short_description_kh = $request->short_description_kh;
        $book->short_description_en = $request->short_description_en;
        $book->save();
        
        return redirect('/sievphow/book')->with('success','label_created_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
