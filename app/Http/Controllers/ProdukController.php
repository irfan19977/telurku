<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produk::orderBy('nama', 'desc')->get();

        return view('produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'stok' => 'required|numeric',
        ]);

        // Simpan data produk baru ke dalam database menggunakan fungsi create pada model Produk
        Produk::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'stok' => $request->stok,
        ]);

        // Redirect ke halaman lain atau tampilkan pesan sukses, dll.
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Produk::findOrFail($id);

        // Lakukan penghapusan
        $products->delete();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }}
