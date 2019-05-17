<?php

namespace TRAINERPOKEMON\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    //
    public function changeLocale($lang)
    {
        \Session::put('locale', $lang);
        return redirect()->back();
    }
}
