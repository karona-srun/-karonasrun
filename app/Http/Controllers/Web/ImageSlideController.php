<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ImageSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imageSlide = ImageSlide::orderBy('id','desc')->paginate(5);
    
        return view('image_slides.index',compact('imageSlide'));
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
            $file-> move(public_path('images/image_slides'), $filename);
        }

        if($request->id){
            $imageSlide = ImageSlide::find($request->id);
            $imageSlide->image = $request->file('image') ? '/images/image_slides/'.$filename : '';
        }else{
            $imageSlide = new ImageSlide();
            $imageSlide->image = '/images/image_slides/'.$filename ?? '';
        }
        $imageSlide->status = $request->status;
        $imageSlide->save();

        return response()->json($imageSlide);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageSlide  $imageSlide
     * @return \Illuminate\Http\Response
     */
    public function show(ImageSlide $imageSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageSlide  $imageSlide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = ImageSlide::where($where)->first();

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageSlide  $imageSlide
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
            $file-> move(public_path('images/image_slides'), $filename);
        }

        $imageSlide = ImageSlide::find($request->id);
        $imageSlide->image = '/images/image_slides/'.$filename ?? '';
        $imageSlide->status = $request->status;
        $imageSlide->save();

        return response()->json($imageSlide);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageSlide  $imageSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageSlide = ImageSlide::find($id);
        $imageSlide->delete();

        return response()->json($imageSlide);
    }
}
