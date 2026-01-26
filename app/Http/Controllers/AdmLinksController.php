<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class AdmLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::all();
        return view('adm-links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm-links.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'link_name' => 'required|string|max:100|unique:link,link_name,NULL,id_link,deleted_at,NULL',
            'link_address' => 'required|string|max:255',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        Link::create($data);

        return redirect()->route('adm-links.index')
            ->with('success', 'Link berhasil ditambahkan');
    }


    public function toggle(Link $link)
    {
        $link->update([
            'is_active' => ! $link->is_active
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
        $link = Link::findOrfail($id);
        return view('adm-links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $link = Link::where('id_link', $id)->firstOrFail();

        $request->validate([
            'link_name' => 'required|string|max:100|unique:link,link_name,' . $id . ',id_link,deleted_at,NULL',
            'link_address' => 'required|string|max:255',
        ]);

        $link->update([
            'link_name' => $request->link_name,
            'link_address' => $request->link_address,
        ]);

        return redirect()->route('adm-links.index')
            ->with('success', 'Link berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link = Link::findOrfail($id);
        $link->delete();

        return redirect()->route('adm-links.index')
            ->with('success', 'Link berhasil dihapus');
    }
}
