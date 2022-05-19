<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $empresas = User::where('foto', '!=', null)->where('capa', '!=', null)->where('empresa', '!=', null)->get();
        return view('app.home.index', compact('empresas'));
    }
}
