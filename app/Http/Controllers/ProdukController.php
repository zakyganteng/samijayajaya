<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Daftar Produk';
        // ELOQUENT
        $produks = Produk::all();

        return view('produk.index', [
            'pageTitle' => $pageTitle,
            'produks' => $produks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Produk';
        /// ELOQUENT
        $kategoris = Kategori::all();
        return view('produk.create', compact('pageTitle', 'kategoris'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required',
            'kodeProduk' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
            'harga' => 'required|numeric',
            'unit' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $gambar = $request->file('gambar');
        $filename = date('Y-m-d') . $gambar->getClientOriginalName();
        $path = 'gambar-produk/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($gambar));

        // ELOQUENT
        $produk = new Produk;
        $produk->namaproduk = $request->namaProduk;
        $produk->kodeproduk = $request->kodeProduk;
        $produk->gambar = $filename;
        $produk->harga = $request->harga;
        $produk->unit = $request->unit;
        $produk->kategori_id = $request->kategori;
        $produk->save();
        return redirect()->route('produks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Detail Produk';
        // ELOQUENT
        $produk = Produk::find($id);
        return view('produk.show', compact('pageTitle', 'produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Produk';
        // ELOQUENT
        $kategoris = Kategori::all();
        $produk = Produk::find($id);
        return view(
            'produk.edit',
            compact(
                'pageTitle',
                'kategoris',
                'produk'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required',
            'kodeProduk' => 'required',
            'gambar' => 'required',
            'harga' => 'required|numeric',
            'unit' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Delete old image
        $oldImage = Produk::find($id)->gambar;
        if ($oldImage) {
            Storage::disk('public')->delete('/gambar-produk/' . $oldImage);
        }


        $gambar = $request->file('gambar');
        $filename = date('Y-m-d') . $gambar->getClientOriginalName();
        $path = '/gambar-produk/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($gambar));

        // ELOQUENT
        $produk = Produk::find($id);
        $produk->namaproduk = $request->namaProduk;
        $produk->kodeproduk = $request->kodeProduk;
        $produk->gambar = $filename;
        $produk->harga = $request->harga;
        $produk->unit = $request->unit;
        $produk->kategori_id = $request->kategori;
        $produk->save();
        return redirect()->route('produks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // Ambil nama file gambar dari tabel
        $produk = Produk::find($id);
        $gambar = $produk->gambar;

        // Hapus gambar dari storage
        if ($gambar) {
            Storage::disk('public')->delete('/gambar-produk/' . $gambar);
        }
        // ELOQUENT
        Produk::find($id)->delete();
        return redirect()->route('produks.index');
    }
}
