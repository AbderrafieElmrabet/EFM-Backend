<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = "produit";
    protected $fillable = ['name', 'stock', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}