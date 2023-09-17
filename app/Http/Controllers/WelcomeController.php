<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function welcome(Request $request) {
        return view('index');
    }

    public function projectDetail() {
        return view('project_detail');
    }

    public function privacyPolicy(){
        return view('privacy_policy');
    }
}
