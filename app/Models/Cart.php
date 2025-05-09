<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    //
    use HasFactory;
    //
    protected $guarded = [
        'id',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class); // <- ganti ini
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
