<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProdukDetail;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Product::with('details')->latest()->get();
        return view('admin.produk.kelola_produk', compact('produk'));
    }

    public function create()
    {
        return view('admin.produk.tambah_produk');
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'product_name' => $request->product_name,
            'price'        => $request->price,
            'is_active' => $request->is_active,
            'link'         => $request->link,
            'created_by'   => auth()->id(),
        ]);

        if ($request->desc) {
            foreach ($request->desc as $i => $desc) {

                if (!$desc && empty($request->file('image_product')[$i])) {
                    continue;
                }

                $imagePath = null;
                if ($request->file('image_product')[$i] ?? false) {
                    $imagePath = $request->file('image_product')[$i]
                        ->store('produk', 'public');
                }

                ProdukDetail::create([
                    'id_product'    => $product->id_product,
                    'desc'          => $desc,
                    'image_product' => $imagePath,
                ]);
            }
        }

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Product::with('details')->findOrFail($id);

        return view('admin.produk.tambah_produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        $produk->update([
            'product_name' => $request->product_name,
            'price'        => $request->price,
            'is_active' => $request->is_active,
            'link'         => $request->link,
            'updated_by'   => auth()->id(),
        ]);

        ProdukDetail::where('id_product', $id)->delete();

        if ($request->desc) {
            foreach ($request->desc as $i => $desc) {

                if (!$desc && empty($request->file('image_product')[$i])) {
                    continue;
                }

                $imagePath = null;
                if ($request->file('image_product')[$i] ?? false) {
                    $imagePath = $request->file('image_product')[$i]
                        ->store('produk', 'public');
                }

                ProdukDetail::create([
                    'id_product'    => $produk->id_product,
                    'desc'          => $desc,
                    'image_product' => $imagePath,
                ]);
            }
        }

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = Product::findOrFail($id);

        $produk->update([
            'deleted_by' => auth()->id(),
        ]);

        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }

    public function history()
    {
        $produk = Product::withTrashed()
            ->with(['creator', 'updater', 'deleter'])
            ->latest()
            ->get();

        return view('admin.produk.history_produk', compact('produk'));
    }

    public function restore()
    {
        $produk = Product::onlyTrashed()->get();

        return view('admin.produk.restore', compact('produk'));
    }

    public function restoreProcess($id)
    {
        Product::withTrashed()->findOrFail($id)->restore();

        return redirect()
            ->route('produk.restore')
            ->with('success', 'Produk berhasil direstore');
    }

    public function forceDelete($id)
    {
        Product::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()
            ->route('produk.restore')
            ->with('success', 'Produk dihapus permanen');
    }

    public function show($id)
    {
        $produk = Product::with('details', 'creator', 'updater', 'deleter')
            ->findOrFail($id);

        return view('admin.produk.detail_produk', compact('produk'));
    }
}
