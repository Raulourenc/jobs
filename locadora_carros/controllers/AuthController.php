<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function login(Request $request) {
      
      $credenciais = $request->all(['email', 'password']);

      //autenticacao (email e senha)

      
      $token = auth('api')->attempt($credenciais);

      if($token){ // usuario autenticado com sucesso

         return response()->json(['token' => $token], 200);

      } else { //erro de usuario ou senha

         return response()->json(['erro' => 'Usuário ou senha inválida!'], 403);
         //erro 401 = Unauthorized -> não autorizado
         //erro 403 = forbidden -> proibido (login invalido)
      }
      //retornar um JWT - Json Web Token

      return 'login';
   } 

   public function logout() {
      auth('api')->logout();
      return response()->json(['msg' => 'logout realizado com sucesso !']);
   }

   public function refresh() {
       $token = auth('api')->refresh(); //cliente encaminhe um jwt valido
       return response()->json(['token' => $token]);
   }

   public function me() {
      return response()->json(auth('api')->user());
   }
}
