<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_id',
        'meta_title',
        'meta_description',
    ];


    /**
     * Get the product that owns the ProductMeta
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTO
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
