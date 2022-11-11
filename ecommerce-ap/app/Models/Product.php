<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Client;
use App\Model\Provider;
use App\Model\Acategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'weight', 'quantity', 'categorie_id', 'provider_id']; 

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function provider()
    {
        return $this->hasMany(Provider::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Acategory::class);
    }
}
