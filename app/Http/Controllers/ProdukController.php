<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('home.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('home.produk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'nama_produk' => 'required|min:5',
            'harga' => 'required|numeric',
            'satuan' => 'required|min:3',
            'barcode' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
    

    //   upload image
        $image = $request->file('gambar');
        $image->storeAs('products', $image->hashName(),'public');

    

        // membuat product
        Produk::create([
            
            'gambar' => $image->hashName(),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'barcode' => $request->barcode,
            'stok' => $request->stok
        ]);

        // redirect to index
        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $produk = Produk::find($id);
        return view('home.produk.edit', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        // $produk = Produk::find($id);
        // $produk->update([
           'gambar' => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'nama_produk' => 'required|min:5',
            'harga' => 'required|numeric',
            'satuan' => 'required|min:3',
            'barcode' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $produk = Produk::find($id);

        if ($request->hasFile('gambar')) {

            $image = $request->file('gambar');
            $image->storeAs('products', $image->hashName(),'public');

            Storage::delete('public/products' . $produk->gambar);

            $produk->update([
            'gambar' => $image->hashName(),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'barcode' => $request->barcode,
            'stok' => $request->stok
        ]);
        } else {

        $produk->update([
            'gambar' => $image->hashName(),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,     
            'satuan' => $request->satuan,     
            'barcode' => $request->barcode,     
            'stok' => $request->stok
        ]);
    } 

    return redirect('/produk')->with(['succes' => 'Data Berhasil Diubah!']);
} 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $produk = Produk::find($id);

            Storage::delete('public/products/' . $produk->gambar);

            
            // Produk::delete('public/products/' .$produk->gambar );
            $produk->delete();
            return redirect('/produk')->with(['succes' => 'Data berhasil dihapus!']);
    }
}
