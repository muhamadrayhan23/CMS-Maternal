<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AdmLinksController extends Controller
{
    //tampil semua link
    public function index(Request $request)
    {
        session(['link_back' => url()->current()]);
        $search = $request->search;

        $links = Link::when($search, function ($q) use ($search) {
            $q->where('link_name', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        $announcements = Announcement::latest()
            ->paginate(8);

        if ($request->ajax()) {
            return view('admin.link.tablelink', compact('links'))->render();
        }

        return view('admin.link.index', compact('links', 'announcements'));
    }


    //tampil semua announcement
    public function announcement(Request $request)
    {
        $search = $request->search;

        $announcement = Announcement::when($search, function ($q) use ($search) {
            $q->where('announcement_name', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        if ($request->ajax()) {
            return view('admin.link.announcement', compact('announcements'))->render();
        }

        return view('admin.link.index', compact('announcements'));
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
        ],
        [
            'links.*.name.required' => 'Link Name is required',
            'links.*.name.max' => 'Link Name may not be greater than 100 characters',

            'links.*.address.required' => 'Link Address is required',
            'links.*.address.max' => 'Link Address may not be greater than 255 characters',
        ]
        );

        foreach ($request->links as $i => $link) {

            Link::create([
                'link_name'    => $link['name'],
                'link_address' => $link['address'],
                'is_active'    => 1,
            ]);
        }

        return redirect()->route('homeLink')
            ->with('success', 'Links successfully added');
    }

    //tampil form buat tambah announcement
    public function createAnnouncement()
    {
        return view('admin.link.creannouncement');
    }

    //simpan link announcement
    public function storeAnnouncement(Request $request)
    {
        $request->validate(
            [
                'announcements.*.name' => 'required|string|max:100',
                'announcements.*.address' => 'required|string|max:255',
                'announcements.*.image' => 'required|image|mimes:jpg,jpeg,png,webp',
            ],
            [
                'announcements.*.name.required' => 'Announcement Name is required',
                'announcements.*.name.max' => 'Announcement Name may not be greater than 100 characters',

                'announcements.*.address.required' => 'Announcement Address is required',
                'announcements.*.address.max' => 'Announcement Address may not be greater than 255 characters',

                'announcements.*.image.required' => 'Announcement Image is required',
                'announcements.*.image.image' => 'Announcement Image must be an image',
                'announcements.*.image.mimes' => 'Announcement Image must be a file of type: jpg, jpeg, png',
            ]
        );

        foreach ($request->announcements as $i => $announcement) {
            $file = $request->file("announcements.$i.image");
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('link_pic'), $filename);

            Announcement::create([
                'announcement_image'    => 'link_pic/' . $filename,
                'announcement_name'    => $announcement['name'],
                'announcement_address' => $announcement['address'],
                'is_active'    => 1,
            ]);
        }

        return redirect()->route('homeLink')
            ->with('success', 'Links successfully added');
    }


    //panggil edit link
    public function edit(Link $link)
    {
        return view('admin.link.edit', compact('link'));
    }

    //update link
    public function update(Request $request, Link $link)
    {
        try{
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
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while updating the link: ' . $e->getMessage()]);
        }
        

        
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
        return redirect()->route('homeLink')->with('success', 'Link successfully restored');
    }

    //forced delete
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
