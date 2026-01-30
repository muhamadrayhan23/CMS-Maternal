<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class AdmLinksController extends Controller
{
    //tampil semua link
    public function index(Request $request)
    {
        $search = $request->search;

        $links = Link::when($search, function ($query, $search) {
            return $query->where('link_name', 'like', "%$search%");
        })->latest()->get();

        return view('admin.link.index', compact('links'));
    }

    //tampil form buat tambah link
    public function create()
    {
        return view('admin.link.create');
    }

    //simpan link baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'link_logo' => 'required|image|mimes:jpg,jpeg,png',
            'link_name' => 'required|string|max:100|unique:link,link_name,NULL,id_link,deleted_at,NULL',
            'link_address' => 'required|string|max:255',
        ]);

        $file = $request->file('link_logo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('link_pic'), $filename);

        $data['link_logo'] = 'link_pic/' . $filename;
        $data['is_active'] = $request->boolean('is_active');

        Link::create($data);

        return redirect()->route('homeLink')
            ->with('success', 'Link berhasil ditambahkan');
    }

    //panggil edit link
    public function edit(Link $link)
    {
        return view('admin.link.edit', compact('link'));
    }

    //update link
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'link_logo' => 'nullable|image|mimes:jpg,jpeg,png',
            'link_name' => 'required|string|max:100|unique:link,link_name,' . $link->id_link . ',id_link',
            'link_address' => 'required|string|max:255',
        ]);

        $filename = $link->link_logo;

        if ($request->hasFile('link_logo')) {
            $file = $request->file('link_logo');
            $newName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('link_pic'), $newName);

            $filename = 'link_pic/' . $newName;
        }

        $link->update([
            'link_logo' => $filename,
            'link_name' => $request->link_name,
            'link_address' => $request->link_address,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('homeLink')
            ->with('success', 'Link berhasil diupdate');
    }


    //delete link
    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->route('homeLink')
            ->with('success', 'Link berhasil dihapus');
    }

    //toggle toggle an
    public function toggle(Link $link)
    {
        $link->update([
            'is_active' => ! $link->is_active
        ]);

        return back();
    }
}
