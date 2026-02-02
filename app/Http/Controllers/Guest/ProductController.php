<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with(['details', 'links']);

        if ($request->search) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        if ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        }

        $products = $query->where('is_active', true)->paginate(10)->withQueryString();

        if($request->ajax()) {
            return view('guest.searchProducts', compact('products'));
        }

        return view('guest.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail($id)
    {
        $product = Product::with(['details', 'links'])
            ->findOrFail($id);
        
        $products = Product::with(['details', 'links']);

        return view('guest.detProduct', compact('product', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
