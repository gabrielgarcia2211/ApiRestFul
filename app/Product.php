<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    const PRODUCTO_DISPONIBLE = 'disponible';
    const PRODUCTO_NO_DISPONIBLE = 'no disponible';

    public $transformer = ProductTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    public function estaDisponible()
    {
        return $this->status == Product::PRODUCTO_DISPONIBLE;
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
