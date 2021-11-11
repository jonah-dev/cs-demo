<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_name' => $this->product_name,
            'sku' => $this->sku,
            'quantity' => $this->quantity,
            'color' => $this->color,
            'size' => $this->size,
            'cost' => "$" . round((float)$this->cost_cents / 100, 2),
            'price' => "$" . round((float)$this->price_cents / 100, 2),
        ];
    }
}
