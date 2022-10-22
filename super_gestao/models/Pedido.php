<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos() {
        //return $this->belongsToMany('App\produto', 'pedidos_produtos');

        return $this->belongsToMany('App\item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at', 'updated_at', 'id');

        /*
            1 parametro - Modelo do relaciomento NxN em relacao ao Modelo que estamo implementando

            2 parametro - é atabela auxiliar que armazena os registros de relacionameto

            3 parametro - representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento

            4 parametro - representa o nome da Fk da tabela mapead apelo model ultilizado no relacionameto que estamos imprementando

        */
    }
}
