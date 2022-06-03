<?php

namespace App\Http\Controllers;

class LocalizationController extends Controller
{
    public function getLang()
    {
        return \App::getLocale();
    }

    public function setLang($lang)
    {
        \Session::put('lang', $lang);
        return redirect()->back();
    }
}
