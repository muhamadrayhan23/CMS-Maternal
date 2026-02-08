<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        session(['banner_back' => url()->full()]);
        $status = $request->input('status');
        $search = $request->input('search');


        $banner = Banner::query()
            ->when($search, function ($query, $search) {
                return $query->where('banner_name', 'like', "%{$search}%");
            })
            ->when($status !== null && $status !== '', function ($query) use ($status) {
                return $query->where('is_active', $status);
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        if ($request->ajax()) {
            return view('admin.banner.search_cardH', compact('banner','search','status'))->render();
        }
        return view('admin.banner.Banner', compact('banner', 'status', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.Bcreate');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // request ini menerima banyak input 'banners' samakan dengan name di blade agar data terkirim JANGAN TYPO

        $request->validate([
            'banners' => 'required|array',
            'banners.*.name' => 'required|string',
            'banners.*.image' => 'required|image|mimes:jpg,png,jpeg,webp',
        ]);


        // looping ini insert data ke database 
        foreach ($request->banners as $item) {
            $file = $item['image'];
            $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);

            Banner::create([
                'banner_name'  => $item['name'],
                'banner_image' => 'img/' . $filename,
                'created_by'   => auth()->id(),
                'is_active'    => true,
            ]);
        }

        return redirect()->route('Bhome')->with('success', 'Banner successfully added');
    }



    public function status(Banner $banner)
    {
        $banner->update([
            'is_active' => ! $banner->is_active
        ]);
        return back()
        ->with('success', 'Banner status updated succesfully!');
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
        $banner = Banner::findOrfail($id);
        return view('admin.banner.Bupdate', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    // Cari data, pastiin dapet
    $banner = Banner::where('id_banner', $id)->firstOrFail();

    $request->validate([
        'banner_name' => 'required',
        'banner_image' => 'nullable|image|mimes:jpg,png,jpeg,webp'
    ]);

    $data = $request->only(['banner_name']);

    if($request->hasFile('banner_image')){
        //hapus foto lama
        if($banner->banner_image && file_exists(public_path($banner->banner_image))) {
            unlink(public_path($banner->banner_image));
        }
    

    $file = $request->file('banner_image');
    $filename = time(). '_' . $file->getClientOriginalName();
    $file->move(public_path('img'), $filename);

    $data['banner_image'] = 'img/' . $filename;
    }

    $banner->update($data);

    return redirect()->route('Bhome')->with('success', 'Banner succesfully updated!');
    }
       

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrfail($id);

        $banner->deleted_by = auth()->id();

        $banner->save();
        $banner->delete();

        return redirect()
            ->route('Bhome')
            ->with('success', 'Banner has been moved to trash!');
    }

    public function restore(Request $request)
    {
        $search = $request->input('search');
        $banner = Banner::onlyTrashed()
            ->when($search, function ($query, $search) {
                return $query->where('banner_name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        if ($request->ajax()) {
            return view('admin.banner.search_cardT', compact('banner', 'search'))->render();
        }
        return view('admin.banner.btrash', compact('banner', 'search'));
    }

    public function restoreProses($id)
    {
        $banner = Banner::withTrashed()->findOrFail($id);

        $banner->is_active = 0;

        $banner->restore();

        return redirect()->route('Btrash')
        ->with('success', 'Banner successfully restored');
    }

    public function forceDelete($id)
    {
        Banner::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('Btrash')->with('success', 'This banner deleted permanently !');
    }

    public function tooggle($id)
    {
        $banner = Banner::findOrFail($id);

        $banner->update([
            'is_active' => !$banner->is_active,
            'updated_by' => auth()->id()
        ]);

        return back()->with('success', 'Status produk diperbarui');
    }
}
