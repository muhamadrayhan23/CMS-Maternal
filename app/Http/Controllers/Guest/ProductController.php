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

        if ($request->filled('search')) {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        if ($request->sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } elseif ($request->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'latest') {
            $query->latest(); 
        }


        $products = $query->paginate(8)->withQueryString();

        if ($request->ajax()) {
            return view('guest.searchProducts', compact('products', 'request'))->render();
        }

        return view('guest.products', compact('products', 'request'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function detail($id)
    {
        $product = Product::with(['details', 'links'])
            ->findOrFail($id);

        $products = Product::with(['details', 'links'])
            ->where('id_product', '!=', $id)
            ->limit(8)
            ->get();

        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Products', 'url' => route('products')],
            ['title' => $product->product_name]
        ];

        return view('guest.detProduct', compact('product', 'products', 'breadcrumbs'));
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
