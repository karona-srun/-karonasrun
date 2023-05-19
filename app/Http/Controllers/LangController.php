<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function change(Request $request,$lang)
    {
        App::setLocale($lang);
        session()->put('lang', $lang);

        return redirect()->back();
    }
}
