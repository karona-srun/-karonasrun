<?php

namespace App\Http\Controllers\Sievphow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
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
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'min:6'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        
        $login = $request->email;
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    
        $user = User::where($fieldType, $login)->first();

        if (!$user) {
            $success['success'] = false;
            $success['error'] = true;
            $success['mode'] = 0;
            $success['message'] = 'Your email or phone number is incorrect';
            return response()->json($success, 400);
        }

        if (!Hash::check($request->password, $user->password)) {
            $success['success'] = false;
            $success['error'] = true;
            $success['mode'] = 1;
            $success['message'] = 'Your password is incorrect';
            return response()->json($success, 400);
        }

        $this->refreshToken($user);
        $success['message'] = 'You have logged in successfully.';
        $success['success'] = true;
        $success['error'] = false;
        $success['data'] = $user;
        $success['data']['image'] = url('images/sievphow/users/'.$user->image);
        $success['api_token'] = $success['data']['api_token'];
        return response()->json($success, 200);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'app_name' => 'required',
            'first_name' => 'required|string|between:2,100',
            'last_name' => 'required|string|between:2,100',
            'phone' => 'required|string|unique:users,phone',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
        
        $userEmailCheck = User::where('email', $request->email);
        if ($userEmailCheck->count()) {
            return response()->json([
                "success" => false,
                "msg" => "Email address already in use!",
                'mode' => 1
            ], 400);
        } 

        $userPhoneCheck = User::where('phone', $request->phone);
        if ($userPhoneCheck->count()) {
            return response()->json([
                "success" => false,
                "msg" => "Phone number already in use!",
                'mode' => 2
            ], 400);
        } 

        if($validator->fails()){
            return response()->json([
                "success" => false,
                'mode' => 0,
                $validator->errors()], 400);
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
            'message' => 'User successfully registered',
            "success" => true,
            'user' => $user
        ], 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        $user = User::find(auth()->user()->id);
        $user->api_token = Str::random(60);
        $user->save();
        return $user->api_token;
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        $success['data'] = auth()->user();
        $success['data']['image'] = url('images/sievphow/users/'.auth()->user()->image);
        $success['api_token'] = Auth::user()->api_token;
        return response()->json($success, 200);
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $user = User::find(auth()->user()->id);
        $user->api_token = "";
        $user->save();

        $response = [
            'message' => 'Successfully logged out',
            'statusCode' => 403,
            'data' => auth()->user()
        ];
        $response['api_token'] = $user->api_token;
        return response()->json($response);
    }

    public function refreshToken($user){
        $user->api_token = Str::random(60);
        $user->save();
        return $user->api_token;
    }

}
