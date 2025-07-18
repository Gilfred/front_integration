<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticconfidentialiteController extends Controller
{
    //
    public function mention_legale()
    {
        return view('politic_confident.mentions-legales');
    }

    public function contact()
    {
        return view('politic_confident.contact');
    }

    public function politique_de_confidentialite()
    {
        return view('politic_confident.politique-de-confidentialite');
    }
}
