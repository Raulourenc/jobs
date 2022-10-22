<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    public function Principal(){

        $motivo_contatos = MotivoContato::all();
        
        return view('site.principal', ['titulo' => 'Home', 'motivo_contatos' => $motivo_contatos]);
    }
}