<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlideImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SievphowSlideImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = SlideImage::orderBy('updated_at','desc')->paginate(5);
        return view('sievphow.slide_images.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sievphow.slide_images.create');
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

        $imageSlide = new SlideImage();
        $imageSlide->image = '/images/sievphow/image_slides/'.$filename;
        $imageSlide->status = $request->status;
        $imageSlide->save();

        return redirect('/sievphow/slide-image')->with('code', 1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = SlideImage::find($id);
        return view('sievphow.slide_images.edit', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = SlideImage::find($id);
        return view('sievphow.slide_images.edit', compact('image'));
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
        $imageSlide = SlideImage::find($id);

        if($request->file('image')){
            $file= $request->file('image');
            File::delete($imageSlide->image);
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/image_slides'), $filename);
            $imageSlide->image = '/images/sievphow/image_slides/'.$filename;
        }
        
        $imageSlide->status = $request->status;
        $imageSlide->save();
        
        return redirect('/sievphow/slide-image')->with('code', 2);
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
        File::delete($imageSlide->image);
        $imageSlide->delete();
        
        return redirect('/sievphow/slide-image')->with('code', 3);
    }
}
