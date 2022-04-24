<?php

namespace App\Http\Controllers;

use App\Models\cotacao;
use Illuminate\Http\Request;

class CotacaoController extends Controller
{
    public function index()
    {
        $historico = cotacao::all();
        return view('historico',compact('historico'));
    }
}
