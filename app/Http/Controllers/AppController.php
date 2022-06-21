<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Produto;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        $produtos = Produto::all();
        return view('app.home.index', compact('grupos', 'produtos'));
    }
}
