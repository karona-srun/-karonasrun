<?php

namespace App\Http\Controllers;

use App\Models\Broadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SievphowBroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Broadcast::orderBy('updated_at', 'desc')->paginate(5);
        return view('sievphow.broadcasts.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sievphow.broadcasts.create');
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
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/sievphow/broadcasts'), $filename);
        }

        $broadcast = new Broadcast();
        $broadcast->title = $request->title;
        $broadcast->image = $filename;
        $broadcast->body = $request->body;
        $broadcast->save(); 

        return redirect('/sievphow/broadcasts')->with('success','label_created_successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $broadcast = Broadcast::find($id);
        return view('sievphow.broadcasts.edit', compact('broadcast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Broadcast  $broadcast)
    {
        $broadcast = Broadcast::find($broadcast->id);
        return view('sievphow.broadcasts.edit', compact('broadcast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Broadcast $broadcast)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $broadcast = Broadcast::find($broadcast->id);
        if($request->file('image')){
            File::delete('images/sievphow/broadcasts/' . $broadcast->image);
            $file= $request->file('image');
            $image_filename = date('YmdHi') . str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path('images/sievphow/broadcasts'), $image_filename);
            $broadcast->image = $image_filename;
        }

        $broadcast->title = $request->title;
        $broadcast->body = $request->body;
        $broadcast->save(); 

        return redirect('/sievphow/broadcasts')->with('success','label_created_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $broadcast = Broadcast::find($id);
        $broadcast->delete();
        return response()->json([
            "message" => "Broadcast list",
            "success" => true,
            "data" => $broadcast
        ]);
    }
}
