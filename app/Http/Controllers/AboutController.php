<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $companyName = 'My Company';
        $companyDescription = 'We are a leading provider of innovative solutions. Founded in 2010, our company has grown to become a trusted partner for businesses of all sizes.';

        return view('about.index', compact('companyName', 'companyDescription'));
    }
}