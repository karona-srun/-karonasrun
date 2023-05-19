<?php

namespace App\Http\Controllers\Sievphow;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $users = User::all();
        return response()->json([
            "message" => "Users list",
            "success" => true,
            "data" => $users
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
            'app_name' => 'required',
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'image' => 'required',
            'phone' => 'required|string|unique:users,phone',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/users'), $filename);
        }

        $user =  new User();
        $user->app_name = "sievphow";
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->username = strtolower($request->first_name.$request->last_name);
        $user->image = $filename;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return response()->json([
            'message' => 'User',
            "success" => true,
            'user' => $user
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
        $user = User::find($id);
        return response()->json([
            "message" => "Users",
            "success" => true,
            "data" => $user
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
        $user = User::find($id);
        return response()->json([
            "message" => "Users",
            "success" => true,
            "data" => $user
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
            'app_name' => 'required',
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $user = User::find($id);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/users'), $filename);
            $user->image = $filename;
        }

        $user->app_name = "sievphow";
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->username = strtolower($request->first_name.$request->last_name);
        $user->password = bcrypt($request->password);
        $user->save();
        
        return response()->json([
            'message' => 'User',
            "success" => true,
            'user' => $user
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
        $user = User::find($id);
        $user->delete();
        return response()->json([
            "message" => "Users",
            "success" => true,
            "data" => $user
        ]);
    }
}
