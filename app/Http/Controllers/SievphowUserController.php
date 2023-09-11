<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SievphowUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::where('app_name','sievphow')->orderBy('updated_at', 'desc')->paginate(5);
        return view('sievphow.users.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sievphow.users.create');
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
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'phone' => 'required|string|unique:users,phone',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $userEmailCheck = User::where('email', $request->email);
        if ($userEmailCheck->count()) {
            return redirect()->back()->withErrors(["msg" => "Email address already in use!",])->withInput();
        } 

        $userPhoneCheck = User::where('phone', $request->phone);
        if ($userPhoneCheck->count()) {
            return redirect()->back()->withErrors(["msg" => "Phone number already in use!"])->withInput();
        } 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $filename = "logo/user.png";
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/users'), $filename);
        }
        
        $user = new User();
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
        
        return redirect('/sievphow/user')->with('success','label_created_successfully');
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
        $user = User::find($id);
        return view('sievphow.users.edit', compact('user'));
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
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'phone' => 'unique:users,phone,'.$id,
            'email' => 'unique:users,email,'.$id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = User::find($id);

        $filename = "logo/user.png";
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').str_replace(' ', '_', $file->getClientOriginalName());
            $file-> move(public_path('images/sievphow/users'), $filename);
        }
        
        $user->app_name = "sievphow";
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->username = strtolower($request->first_name.$request->last_name);
        $user->image = $filename;
        $user->save();
        
        return redirect('/sievphow/user')->with('success','label_created_successfully');
    }

    public function changePasswordForm($id)
    {
        $user = User::find($id);
        return view('sievphow.users.change_password', compact('user'));
    }

    /**
     * 
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = User::find($request->id);
        $user->password = bcrypt($request->password);
        $user->save(); 

        return redirect('/sievphow/user')->with('success','label_created_successfully');
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
        
        return redirect('/sievphow/user')->with('success','label_created_successfully');
    }
}
