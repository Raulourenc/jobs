<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'address',]; 

    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
