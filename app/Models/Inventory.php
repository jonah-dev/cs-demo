<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Contracts\FilterableModel;

class Inventory extends Model implements FilterableModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'quantity',
        'color',
        'size',
        'weight',
        'price_cents',
        'sale_price_cents',
        'cost_cents',
        'sku',
        'length',
        'width',
        'height',
        'note'
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // This will get out of scope  if we go any farther here
    public static function getValidFilterColumns() : array
    {
        return ['sku' => 'string', 'product_id' => 'int'];
    }
}
