<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Models\Product;
use App\Http\Resources\InventoryResource;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    // Doing a raw query for the sake of performance
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = DB::table('inventories as i')
            ->join('products as p', 'p.id', '=', 'i.product_id')
            ->select('p.product_name', 'i.sku', 'i.quantity', 'i.color', 'i.size', 'i.cost_cents', 'i.price_cents');


        $query = $this->addFilters($request->all(), $query);

        return InventoryResource::collection($query->paginate(15));
    }

    private function addFilters($params, $query)
    {
        if (!empty($params['sku'])) {
            $sku = $params['sku'];
            $query->where('i.sku', 'LIKE', "%$sku%");
        }
        if (!empty($params['product_id'])) {
            $productId = $params['product_id'];
            $query->where('p.id', $productId);
        }
        return $query;
    }
}
