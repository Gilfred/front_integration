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

    public function mention_legale_welcome()
    {
        return view('politique_accueil.mentions-legales');
    }

    public function contact_welcome()
    {
        return view('politique_accueil.contact');
    }

    public function politique_de_confidentialite_welcome()
    {
        return view('politique_accueil.politique-de-confidentialite');
    }
}
