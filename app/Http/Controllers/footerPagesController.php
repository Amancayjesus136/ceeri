<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class footerPagesController extends Controller
{
    public function Politicas(Request $request): View
    {
        return view('footer-pages-company.pages-privacy-policy');
    }

    public function Condiciones(Request $request): View
    {
        return view('footer-pages-company.pages-term-conditions');
    }

    public function Seguridad(Request $request): View
    {
        return view('footer-pages-company.pages-security-policy');
    }
}
