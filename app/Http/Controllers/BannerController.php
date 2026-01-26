<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::all();
        return view ('admin.banner.Banner', compact ('banner'));
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
    $data = $request->validate([
        'banner_name' => 'required|string|max:100',
        'banner_image' => 'required|image|mimes:jpg,jpeg,png',
        'created_by' => auth()->id(),
    ]);

    $data['is_active'] = $request->boolean('is_active');

    $file = $request->file('banner_image');

    $filename = time() . '_' . $file->getClientOriginalName();

    $file->move(public_path('img'), $filename);

    $data['banner_image'] = 'img/' . $filename;

    Banner::create($data);

    return redirect()->route('Bhome')
        ->with('success', 'Banner berhasil ditambahkan');
}


public function toggle(Banner $banner)
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
        $banner->delete();

        return redirect()->route('Bhome');
    }
}
