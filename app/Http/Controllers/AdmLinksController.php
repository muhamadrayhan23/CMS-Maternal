<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdmLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('adm-links.index', [
            'links' => Link::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('adm-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request): RedirectResponse
    {
        Link::create($request->validated());

        return redirect()->route('adm-links.index')
            ->withSuccess('New links is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link): View
    {
        return view('adm-links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link): View
    {
        return view('adm-links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link): RedirectResponse
    {
        $link->update($request->validated());

        return redirect()->back()
            ->withSuccess('Link is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link): RedirectResponse
    {
        $link->delete();

        return redirect()->route('adm-links.index')
            ->withSuccess('Link is deleted successfully.');
    }
}
