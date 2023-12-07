<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Specification extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'product_id',
        'body'
    ];





    /**
     * Get the product that owns the Specification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }





}
