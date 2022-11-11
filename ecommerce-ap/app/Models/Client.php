<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'email', 'address', 'product_id']; 

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
