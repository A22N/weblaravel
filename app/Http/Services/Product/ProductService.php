<?php


namespace App\Http\Services\Product;


use App\Models\Product;
use App\Models\Menu;

class ProductService
{
    const LIMITA = 8;
    const LIMITB = 4;
    public function get($menu_id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb', 'menu_id')
            ->where('menu_id',$menu_id)
            ->orderByDesc('id')
            ->limit(self::LIMITA)
            ->get();
    }
    public function get1($menu_id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb', 'menu_id')
            ->where('menu_id',$menu_id)
            ->orderByDesc('id')
            ->limit(self::LIMITB)
            ->get();
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
