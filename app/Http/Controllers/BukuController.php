<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = buku::latest()->get();
        return view('perpus.index', compact('buku'));
        // (fungsi compact untuk mewariskan/override variable buku)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perpus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'judul'        => 'required|string|max:255',
        'penulis'      => 'required|string|max:255',
        'penerbit'     => 'required|string|max:255',
        'stok'         => 'required|integer|min:0',
        'tahun_terbit' => 'required|date',
        'cover'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('cover')) {
        $validated['cover'] = $request->file('cover')->store('covers', 'public');
    }

    buku::create($validated);

    return redirect()->route('buku.create')->with('success', 'Berhasil disimpan!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(buku $buku)
    {

        return view('buku.edit', compact('buku'));
        // guna compat untuk ngambil id buku yang di klik dari url tampilan index
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, buku $buku)
{
    $validated = $request->validate([
        'judul'        => 'required|string|max:30',
        'penulis'      => 'required|string|max:30',
        'penerbit'     => 'required|string|max:30',
        'stok'         => 'required|integer|min:0',
        'tahun_terbit' => 'required|date',
        'cover'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $buku->update($validated);

    return redirect()->route('buku.create')->with('success', 'Data berhasil diupdate!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('Success', 'Data berhasil dihapus!');
    }
}
