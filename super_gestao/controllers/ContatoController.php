<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function Contato(Request $request) {
        
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {


        //realizar a validação dos dados do formulario recebido do request

        $regras =
         [

            'nome' => 'required|min:3|max:40|unique:site_contatos', //nomes com no minimo 3 caracteres e no maximo 40, unique e em qual tabela ela precisa consultar
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
            
         ];

         $feedback = 
         [
            'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres!',
            'nome.max' => 'O campo nome pode ter no máximo 40 caracteres!',
            'nome.unique' => 'Esse nome já esta registrado!',

          

            'email.email' => 'O campo email precisa ser preenchido com um e-mail válido!',

            'motivo_contatos_id.required' => 'O campo motivo contato deve ser preenchido!',


            'mensagem.max' => 'O campo mensagem pode ter no máximo 2000 caracteres!',

            'required' => 'O campo :attribute deve ser preenchido!'// mensagem gererica o :attribute é substituido automaticamente pra cada campo
         ];


        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
