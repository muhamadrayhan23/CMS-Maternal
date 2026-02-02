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
        $search = $request->input('search');
        $status = $request->input('status');

        $banner = Banner::query()
        ->when($search, function ($query, $search){
            return $query->where('banner_name', 'like', '%{$search}%');
        })
        ->when($status !== null && $status !== '', function ($query) use ($status){
            return $query->where('is_active', $status);
        })
        ->latest()
        ->paginate(6) 
        ->withQueryString(); 

        if ($request->ajax()) {
        return view('admin.banner.search_cardH', compact('banner'))->render();
        }
        return view('admin.banner.Banner', compact('banner'));
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
        'banners.*.image' => 'required|image',
    ]);


    // looping ini meng insert data ke database 
    foreach ($request->banners as $item) {
        $file = $item['image'];
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename);

        Banner::create([
            'banner_name'  => $item['name'],
            'banner_image' => 'img/' . $filename,
            'created_by'   => auth()->id(),
            'is_active'    => true, 
        ]);
    }

    return redirect()->route('Bhome')->with('success', 'Banner berhasil ditambahkan');
    }


    public function status(Banner $banner)
    {
        $banner->update([
            'is_active' => ! $banner->is_active
        ]);

        return back();
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
        return view ('admin.banner.Bupdate', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $banner = Banner::where('id_banner', $id)->firstOrFail();
        $request->validate([
        'banner_name' => 'required',
        'banner_image' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);


        $filename = $banner->banner_image;

        if ($request->hasFile('banner_image')) {
            $filename = time() . '_' . $request->banner_image->getClientOriginalName();
            $request->banner_image->move(public_path('img'), $filename);
        }

        $banner->update([
        'banner_name' => $request->banner_name,
        'banner_image' => $filename,
        ]);
        return redirect()->route('Bhome');
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
        ->route('Bhome');
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
        return view('admin.banner.search_cardT', compact('banner'))->render();
        }
        return view ('admin.banner.btrash', compact ('banner'));
    }

    public function restoreProses($id){
        $banner = Banner::withTrashed()->findOrFail($id);
        
        $banner->is_active = 0; 

        $banner->restore();

        return redirect()->route('Btrash');
    }

    public function forceDelete($id){
        Banner::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('Btrash')->with('succes', 'berhasil di hapus');
    }

    public function tooggle($id){
        $banner = Banner::findOrFail($id);

        $banner->update([
            'is_active' => !$banner->is_active,
            'updated_by' => auth()->id()
        ]);

        return back()->with('success', 'Status produk diperbarui');
    }
}
