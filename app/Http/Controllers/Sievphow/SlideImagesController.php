<?php

namespace App\Http\Controllers\Sievphow;

use App\Http\Controllers\Controller;
use App\Models\Sievphow\BookCategory;
use App\Models\Sievphow\Books;
use Illuminate\Http\Request;
use App\Models\Sievphow\SlideImage;
use Illuminate\Support\Facades\Validator;

class SlideImagesController extends Controller
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
        $imageSlide = SlideImage::all();
        $bookTop = Books::orderBy('favorite', 'desc')  
        ->take(10)                         
        ->get();
        $bookPop = Books::orderBy('favorite', 'desc') 
        ->take(10)                         
        ->get();
        $books = Books::orderBy('created_at', 'desc') 
        ->take(14)                         
        ->get();
        return response()->json([
            "message" => "SlideImage",
            "success" => true,
            "data" => [
                'imageSlide' => $imageSlide,
                'bookTop' => $bookTop,
                'bookPop' => $bookPop,
                'books' => $books
            ],
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
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/image_slides'), $filename);
        }

        if($request->id){
            $imageSlide = SlideImage::find($request->id);
            $imageSlide->image = $request->file('image') ? '/images/sievphow/image_slides/'.$filename : '';
        }else{
            $imageSlide = new SlideImage();
            $imageSlide->image = '/images/sievphow/image_slides/'.$filename ?? '';
        }
        $imageSlide->status = $request->status;
        $imageSlide->save();

        return response()->json([
            "message" => "SlideImage",
            "success" => true,
            "data" => $imageSlide
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
        $imageSlide = SlideImage::find($id);
        return response()->json([
            "message" => "SlideImage",
            "success" => true,
            "data" => $imageSlide
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
        $imageSlide = SlideImage::find($id);
        return response()->json([
            "message" => "SlideImage",
            "success" => true,
            "data" => $imageSlide
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
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/image_slides'), $filename);
        }

        if($request->id){
            $imageSlide = SlideImage::find($request->id);
            $imageSlide->image = $request->file('image') ? '/images/sievphow/image_slides/'.$filename : '';
        }else{
            $imageSlide = new SlideImage();
            $imageSlide->image = '/images/sievphow/image_slides/'.$filename ?? '';
        }
        $imageSlide->status = $request->status;
        $imageSlide->save();

        return response()->json([
            "message" => "SlideImage",
            "success" => true,
            "data" => $imageSlide
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
        $imageSlide = SlideImage::find($id);
        $imageSlide->delete();
        return response()->json([
            "message" => "SlideImage",
            "success" => true,
            "data" => $imageSlide
        ]);
    }
}
