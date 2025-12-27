<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\User;
use App\Models\peminjaman;

class ControllerPeminjaman extends Controller
{
    /**
     * Show the form for creating the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $buku = peminjaman::with([
            'buku', 'user'
        ])->latest()->get();

        return view('peminjaman.index', compact('buku'));
         // (fungsi compact untuk mewariskan/override variable buku)
    }

    public function create()
    {
        $buku = buku::all();
        $user = User::all();
        return view('peminjaman.create', compact('buku', 'user'));
         // (fungsi compact untuk mewariskan/override variable buku dan user)
    }

    /**
     * Store the newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'user_id' => 'required|exists:users_perpus,id',
            'buku_id' => 'required|exists:buku,id',
            'tanggal_pinjam' => 'required|date' ,
            'tanggal_kembali' => 'required|date' ,
            'status' => 'dipinjam'
        ]);

        peminjaman::create($request->all());
        return redirect()->route('peminjaman.index')->with('Success', 'Data Peminjaman buku berhasil ditambahkan!');
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $buku = buku::all();
        $user = User::all();
        return view('peminjaman.create', compact('peminjaman', 'buku', 'user'));
    }

    /**
     * Update the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users_perpus,id',
            'buku_id' => 'required|exists:buku,id',
            'tanggal_pinjam' => 'required|date' ,
            'tanggal_kembali' => 'required|date' ,
            'status' => 'dipinjam'
        ]);

        peminjaman::upadate($request->all());
        return redirect()->route('peminjaman.index')->with('Success', 'Data Peminjaman buku berhasil diupdate!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('Success', 'Data Peminjaman buku berhasil didelete!');

    }
}
