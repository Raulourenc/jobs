<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Client;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'number', 'city', 'state', 'complement']; 

    public function address()
    {
        return $this->hasOne(Client::class);
    }
}
