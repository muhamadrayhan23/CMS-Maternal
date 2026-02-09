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

        $produk = $query->paginate(8);
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
            'is_active' => 1,
            'desc' => $request->desc,
            'created_by'   => auth()->id(),
        ]);

        if ($request->has('atribute_name')) {

            $variantPrices = $request->variant_price ?? [];
            foreach ($request->atribute_name as $i => $nameat) {

                $detailId  = $request->detail_id[$i] ?? null;
                $imageFile = $request->file("image_product.$i");
                $removeImg = $request->remove_image[$i] ?? 0;

                if (!$nameat && !$imageFile) {
                    continue;
                }

                $variantPrice = isset($variantPrices[$i])
                    ? preg_replace('/[^0-9]/', '', $variantPrices[$i])
                    : null;

                $data = [
                    'atribute_name' => $nameat,
                    'price'        => $variantPrice,
                ];

                if ($detailId && $removeImg == 1) {

                    $detail = ProdukDetail::find($detailId);

                    if ($detail && $detail->image_product) {
                        Storage::disk('public')->delete($detail->image_product);
                        $data['image_product'] = null;
                        $data['image_name'] = null;
                    }
                }

                if ($imageFile) {
                    if ($detailId) {
                        $detail = ProdukDetail::find($detailId);
                        if ($detail && $detail->image_product) {
                            Storage::disk('public')->delete($detail->image_product);
                        }
                    }

                    $data['image_name'] = $imageFile->getClientOriginalName();
                    $data['image_product'] = $imageFile->store('produk', 'public');
                }

                if ($detailId) {

                    ProdukDetail::where('id', $detailId)->update($data);
                } else {

                    ProdukDetail::create(array_merge($data, [
                        'id_product' => $product->id_product,
                    ]));
                }
            }
        }
        if ($request->filled('link_address')) {

            foreach ($request->link_address as $i => $address) {

                if (!$address) continue;

                LinkProduk::create([
                    'id_product' => $product->id_product,
                    'link_name' => $request->link_name[$i] ?? 'Link',
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
        $price = preg_replace('/[^0-9]/', '', $request->price);

        $produk->update([
            'product_name' => $request->product_name,
            'price'        => $price,
            'desc' => $request->desc,
            'updated_by'   => auth()->id(),
        ]);

        $existingDetailIds = $produk->details->pluck('id')->toArray();
        $sentDetailIds = array_filter($request->detail_id ?? []);
        $deleteDetailIds = array_diff($existingDetailIds, $sentDetailIds);
        ProdukDetail::whereIn('id', $deleteDetailIds)->delete();

        $existingLinkIds = $produk->links->pluck('id_link_produk')->toArray();
        $sentLinkIds = array_filter($request->link_id ?? []);
        $deleteLinkIds = array_diff($existingLinkIds, $sentLinkIds);
        LinkProduk::whereIn('id_link_produk', $deleteLinkIds)->delete();

        if ($request->has('atribute_name')) {

            $variantPrices = $request->variant_price ?? [];
            foreach ($request->atribute_name as $i => $nameat) {

                $detailId = $request->detail_id[$i] ?? null;
                $imageFile = $request->file("image_product.$i");

                if (!$nameat && !$imageFile) {
                    continue;
                }

                $variantPrice = isset($variantPrices[$i]) && $variantPrices[$i] !== ''
                    ? preg_replace('/[^0-9]/', '', $variantPrices[$i])
                    : $price;

                $data = [
                    'atribute_name' => $nameat,
                    'price'        => $variantPrice,
                ];

                if ($imageFile) {
                    $data['image_name'] = $imageFile->getClientOriginalName();
                    $data['image_product'] = $imageFile->store('produk', 'public');
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

        if ($request->has('link_address')) {

            foreach ($request->link_address as $i => $link) {

                $linkId = $request->link_id[$i] ?? null;

                $imageFile = $request->file("link_image.$i");

                if (!$link && !$imageFile) {
                    continue;
                }

                $data = [
                    'link_name'    => $request->link_name[$i] ?? 'Link',
                    'link_address' => $link,
                ];

                if ($imageFile) {
                    $data['link_image'] = $imageFile->store('link_produk', 'public');
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
            ->with('success', 'Product deleted successfully');
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
        Product::withTrashed()->findOrFail($id)->forceDelete();

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

        return back()->with('success', 'Status produk diperbarui');
    }

    public function toggleLagi($id)
    {
        $produk = Product::findOrFail($id);

        $produk->update([
            'is_available' => !$produk->is_available,
            'updated_by' => auth()->id()
        ]);

        return back()->with('success', 'Status produk diperbarui');
    }
}
