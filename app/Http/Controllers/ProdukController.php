<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProdukDetail;
use App\Models\LinkProduk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {

        session(['produk_back' => url()->full()]);
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

        if ($request->filled('stok')) {
            $query->where('is_available', $request->stok);
        }

        $produk = $query->paginate(10)->withQueryString();;

        return view('admin.produk.kelola_produk', compact('produk'));
    }

    public function kelola_card(Request $request)
    {

        session(['produk_back' => url()->full()]);
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

        if ($request->filled('stok')) {
            $query->where('is_available', $request->stok);
        }

        $produk = $query->paginate(9);
        return view('admin.produk.kelola_produk_card', compact('produk'));
    }

    public function create()
    {
        return view('admin.produk.tambah_produk');
    }

    public function store(Request $request)
    {
        $price = preg_replace('/[^0-9]/', '', $request->price);

        $product = Product::create([
            'product_name' => $request->product_name,
            'price'        => $price,
            'is_active'    => 1,
            'desc'         => $request->desc,
            'created_by'   => auth()->id(),
        ]);

        if ($request->has('atribute_name')) {

            $variantPrices = $request->variant_price ?? [];

            foreach ($request->atribute_name as $i => $nameat) {

                $imageFile = $request->file("image_product.$i");

                if (!$nameat && !$imageFile) {
                    continue;
                }

                $variantPrice = isset($variantPrices[$i])
                    ? preg_replace('/[^0-9]/', '', $variantPrices[$i])
                    : null;

                $data = [
                    'atribute_name' => $nameat,
                    'price'         => $variantPrice,
                ];

                // ===== UPLOAD IMAGE KE PUBLIC/PRODUCT =====
                if ($imageFile) {

                    $fileName = time() . '_' . $imageFile->getClientOriginalName();

                    $imageFile->move(public_path('product'), $fileName);

                    $data['image_name'] = $fileName;
                    $data['image_product'] = 'product/' . $fileName;
                }

                ProdukDetail::create(array_merge($data, [
                    'id_product' => $product->id_product,
                ]));
            }
        }

        // ===== LINK PRODUK =====
        if ($request->filled('link_address')) {

            foreach ($request->link_address as $i => $address) {

                if (!$address) continue;

                LinkProduk::create([
                    'id_product'   => $product->id_product,
                    'link_name'    => $request->link_name[$i] ?? 'Link',
                    'link_address' => $address,
                ]);
            }
        }

        return redirect(session('produk_back', route('produk.index')))
            ->with('success', 'Product successfully added');
    }


    public function edit($id)
    {
        session(['produk_back' => url()->previous()]);
        $produk = Product::with(['details', 'links'])
            ->findOrFail($id);
        return view('admin.produk.edit_produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);
        $price  = preg_replace('/[^0-9]/', '', $request->price);

        $produk->update([
            'product_name' => $request->product_name,
            'price'        => $price,
            'desc'         => $request->desc,
            'updated_by'   => auth()->id(),
        ]);

        /*
    |--------------------------------------------------------------------------
    | DELETE DETAIL YANG DIHAPUS
    |--------------------------------------------------------------------------
    */

        $existingDetailIds = $produk->details->pluck('id')->toArray();
        $sentDetailIds     = array_filter($request->detail_id ?? []);
        $deleteDetailIds   = array_diff($existingDetailIds, $sentDetailIds);

        foreach ($deleteDetailIds as $deleteId) {
            $detail = ProdukDetail::find($deleteId);

            if ($detail && $detail->image_product) {
                $oldPath = public_path($detail->image_product);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $detail?->delete();
        }

        /*
    |--------------------------------------------------------------------------
    | VARIANT DETAIL UPDATE / CREATE
    |--------------------------------------------------------------------------
    */

        if ($request->has('atribute_name')) {

            $variantPrices = $request->variant_price ?? [];

            foreach ($request->atribute_name as $i => $nameat) {

                $detailId  = $request->detail_id[$i] ?? null;
                $imageFile = $request->file("image_product.$i");

                if (!$nameat && !$imageFile) {
                    continue;
                }

                $variantPrice = isset($variantPrices[$i]) && $variantPrices[$i] !== ''
                    ? preg_replace('/[^0-9]/', '', $variantPrices[$i])
                    : $price;

                $data = [
                    'atribute_name' => $nameat,
                    'price'         => $variantPrice,
                ];

                /*
            |--------------------------------------------------------------------------
            | HANDLE UPLOAD KE PUBLIC/PRODUCT
            |--------------------------------------------------------------------------
            */

                if ($imageFile) {

                    // Hapus gambar lama jika update
                    if ($detailId) {
                        $oldDetail = ProdukDetail::find($detailId);
                        if ($oldDetail && $oldDetail->image_product) {
                            $oldPath = public_path($oldDetail->image_product);
                            if (file_exists($oldPath)) {
                                unlink($oldPath);
                            }
                        }
                    }

                    $fileName = time() . '_' . $imageFile->getClientOriginalName();
                    $imageFile->move(public_path('product'), $fileName);

                    $data['image_name']    = $fileName;
                    $data['image_product'] = 'product/' . $fileName;
                }

                if ($detailId) {
                    ProdukDetail::where('id', $detailId)->update($data);
                } else {
                    ProdukDetail::create(array_merge($data, [
                        'id_product' => $produk->id_product,
                    ]));
                }
            }
        }

        /*
    |--------------------------------------------------------------------------
    | LINK PRODUK
    |--------------------------------------------------------------------------
    */

        if ($request->has('link_address')) {

            foreach ($request->link_address as $i => $link) {

                $linkId    = $request->link_id[$i] ?? null;
                $imageFile = $request->file("link_image.$i");

                if (!$link && !$imageFile) {
                    continue;
                }

                $data = [
                    'link_name'    => $request->link_name[$i] ?? 'Link',
                    'link_address' => $link,
                ];

                if ($imageFile) {

                    $fileName = time() . '_' . $imageFile->getClientOriginalName();
                    $imageFile->move(public_path('product'), $fileName);

                    $data['link_image'] = 'product/' . $fileName;
                }

                if ($linkId) {
                    LinkProduk::where('id_link_produk', $linkId)->update($data);
                } else {
                    LinkProduk::create(array_merge($data, [
                        'id_product' => $produk->id_product,
                    ]));
                }
            }
        }

        return redirect(session('produk_back', route('produk.index')))
            ->with('success', 'Product successfully updated');
    }



    public function destroy(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        $produk->deleted_by = auth()->id();
        $produk->save();
        $produk->delete();

        return redirect(session('produk_back', route('produk.index')))
            ->with('success', 'The product has been move to trash');
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

        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        $produk = $query->paginate(10);

        return view('admin.produk.restore', compact('produk'));
    }

    public function showDetailTrash($id)
    {
        $produk = Product::onlyTrashed()->findOrFail($id);
        return view('admin.produk.detail_trash', compact('produk'));
    }

    public function restoreProcess(request $request, $id)
    {
        Product::withTrashed()->findOrFail($id)->restore();

        return redirect()
            ->route('produk.restore', ['page' => $request->page])
            ->with('success', 'Product successfully restored');
    }

    public function forceDelete(Request $request, $id)
    {
        $product = Product::withTrashed()
            ->with(['details', 'links'])
            ->findOrFail($id);

        /*
    |--------------------------------------------------------------------------
    | HAPUS SEMUA GAMBAR DETAIL
    |--------------------------------------------------------------------------
    */
        foreach ($product->details as $detail) {

            if ($detail->image_product) {
                $imagePath = public_path($detail->image_product);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $detail->forceDelete(); // hapus detail permanent
        }

        /*
    |--------------------------------------------------------------------------
    | HAPUS GAMBAR LINK (JIKA ADA)
    |--------------------------------------------------------------------------
    */
        foreach ($product->links as $link) {

            if ($link->link_image) {
                $imagePath = public_path($link->link_image);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $link->forceDelete(); // hapus link permanent
        }

        /*
    |--------------------------------------------------------------------------
    | HAPUS PRODUCT
    |--------------------------------------------------------------------------
    */
        $product->forceDelete();

        return redirect()
            ->route('produk.restore', ['page' => $request->page])
            ->with('success', 'The product has been successfully deleted permanently');
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

        return back()->with('success', 'Product status updated successfully');
    }

    public function toggleLagi($id)
    {
        $produk = Product::findOrFail($id);

        $produk->update([
            'is_available' => !$produk->is_available,
            'updated_by' => auth()->id()
        ]);

        return back()->with('success', 'Product stock status updated successfully');
    }
}
