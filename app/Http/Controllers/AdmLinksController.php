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

        $links = Link::when($search, function ($q) use ($search) {
            $q->where('link_name', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        if ($request->ajax()) {
            return view('admin.link.tablelink', compact('links'))->render();
        }

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
        $request->validate([
            'links.*.name' => 'required|string|max:100',
            'links.*.address' => 'required|string|max:255',
            'links.*.logo_link' => 'required|image|mimes:jpg,jpeg,png',
        ],
        [
            'links.*.name.required' => 'Link Name is required',
            'links.*.name.max' => 'Link Name may not be greater than 100 characters',

            'links.*.address.required' => 'Link Address is required',
            'links.*.address.max' => 'Link Address may not be greater than 255 characters',

            'links.*.logo_link.required' => 'Logo Link is required',
            'links.*.logo_link.image' => 'Logo Link must be an image',
            'links.*.logo_link.mimes' => 'Logo Link must be a file of type: jpg, jpeg, png',
        ]
        );

        foreach ($request->links as $i => $link) {

            $file = $request->file("links.$i.logo_link");
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('link_pic'), $filename);

            Link::create([
                'link_name'    => $link['name'],
                'link_address' => $link['address'],
                'link_logo'    => 'link_pic/' . $filename,
                'is_active'    => 1,
            ]);
        }

        return redirect()->route('homeLink')
            ->with('success', 'Added new link successfully');
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
            ->with('success', 'Link successfully updated');
    }


    //delete link
    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->route('homeLink')
            ->with('success', 'Link successfully deleted');
    }

    //restore
    public function restore(Request $request)
    {
        $search = $request->search;

        $links = Link::onlyTrashed()
            ->when($search, function ($q) use ($search) {
                $q->where('link_name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        if ($request->ajax()) {
            return view('admin.link.tablelinktrash', compact('links'))->render();
        }

        return view('admin.link.trash', compact('links'));
    }


    public function restoreProses($id)
    {
        $link = Link::withTrashed()->findOrFail($id);

        $link->is_active = 0;

        $link->restore();
        return redirect()->route('trashLink')->with('success', 'Link successfully restored');
    }

    public function forceDelete($id)
    {
        Link::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('trashLink')->with('success', 'Link successfully deleted permanently');
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
