<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'price',
        'image',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
