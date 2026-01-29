<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProdukDetail;
use App\Models\LinkProduk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['details', 'links'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                    ->orWhere('desc', 'like', "%{$search}%");
            });
        }

        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        $produk = $query->paginate(5)->withQueryString();;

        return view('admin.produk.kelola_produk', compact('produk'));
    }

    public function kelola_card(Request $request)
    {
        $query = Product::with(['details', 'links'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                    ->orWhere('desc', 'like', "%{$search}%");
            });
        }

        $produk = $query->paginate(10);
        return view('admin.produk.kelola_produk_card', compact('produk'));
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
            'is_active' => $request->is_active ?? 0,
            'desc' => $request->desc,
            'created_by'   => auth()->id(),
        ]);
        $product['is_active'] = $request->boolean('is_active');

        if ($request->atribut_value) {
            foreach ($request->atribut_value as $i => $value) {

                if (!$value && empty($request->file('image_product')[$i])) {
                    continue;
                }

                $imagePath = null;
                $image_name = null;

                if (!empty($request->file('image_product')[$i])) {
                    $file = $request->file('image_product')[$i];
                    $image_name = $file->getClientOriginalName();
                    $imagePath = $file->store('produk', 'public');
                }

                ProdukDetail::create([
                    'id_product'     => $product->id_product,
                    'atribute_name'  => $request->atribute_name[$i] ?? null,
                    'atribute_value' => $value,
                    'image_name'     => $image_name,
                    'image_product'  => $imagePath,
                ]);
            }
        }

        if ($request->link_address) {
            foreach ($request->link_address as $i => $address) {

                if (!$address) continue;

                $imagePath = null;
                if (!empty($request->file('link_image')[$i])) {
                    $imagePath = $request->file('link_image')[$i]
                        ->store('link_produk', 'public');
                }

                LinkProduk::create([
                    'id_product'   => $product->id_product,
                    'link_name'    => $request->link_name[$i] ?? 'Link',
                    'link_address' => $address,
                    'link_image'   => $imagePath,
                ]);
            }
        }


        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }


    public function edit($id)
    {
        $produk = Product::with(['details', 'links'])->latest();
        return view('admin.produk.tambah_produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        $produk->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'is_active' => $request->is_active ?? 0,
            'desc' => $request->desc,
            'updated_by'   => auth()->id(),
        ]);

        foreach ($request->atribut_value as $i => $value) {

            $detailId  = $request->detail_id[$i] ?? null;
            $imageFile = $request->file('image_product')[$i] ?? null;

            if (!$value && !$imageFile) {
                continue;
            }

            $data = [
                'atribute_name'  => $request->atribute_name[$i] ?? null,
                'atribute_value' => $value,
            ];

            if ($imageFile) {
                $data['image_name'] = $imageFile->getClientOriginalName();
                $data['image_product'] = $imageFile->store('produk', 'public');
            }

            if ($detailId) {
                ProdukDetail::find($detailId)?->update($data);
            } else {
                ProdukDetail::create(array_merge($data, [
                    'id_product' => $produk->id_product,
                ]));
            }
        }

        foreach ($request->link_address as $i => $link) {

            $linkId  = $request->link_id[$i] ?? null;
            $imageFile = $request->file('link_image')[$i] ?? null;

            if (!$link && !$imageFile) {
                continue;
            }

            $data = [
                'link_name'  => $request->link_name[$i] ?? null,
                'link_address' => $link,
            ];

            if ($imageFile) {
                $data['link_image'] = $imageFile->getClientOriginalName();
                $data['link_image'] = $imageFile->store('link_produk', 'public');
            }

            if ($linkId) {
                LinkProduk::find($linkId)?->update($data);
            } else {
                LinkProduk::create(array_merge($data, [
                    'id_product' => $produk->id_product,
                ]));
            }
        }
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
    }


    public function destroy($id)
    {
        $produk = Product::findOrFail($id);

        $produk->deleted_by = auth()->id();
        $produk->save();
        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }

    public function restore(Request $request)
    {
        $search = $request->search;
        $query = Product::onlyTrashed();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                    ->orWhere('desc', 'like', "%{$search}%");
            });
        }

        $produk = $query->paginate(10);

        return view('admin.produk.restore', compact('produk'));
    }

    public function showDetailTrash($id)
    {
        $produk = Product::onlyTrashed()->findOrFail($id);
        return view('admin.produk.detail_trash', compact('produk'));
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
        $produk = Product::with(['details', 'links', 'creator', 'updater', 'deleter'])
            ->findOrFail($id);

        return view('admin.produk.detail_produk', compact('produk'));
    }

    public function toggle($id)
    {
        $produk = Product::findOrFail($id);

        $produk->update([
            'is_active' => !$produk->is_active,
            'updated_by' => auth()->id()
        ]);

        return back()->with('success', 'Status produk diperbarui');
    }
}
