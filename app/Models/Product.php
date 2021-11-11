<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_name',
        'description',
        'style',
        'brand',
        'created_at',
        'updated_at',
        'url',
        'product_type',
        'shipping_price',
        'note',
        'admin_id'
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

}
