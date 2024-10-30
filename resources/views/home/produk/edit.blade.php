@extends('layouts.master');
@section('title'.'produk');
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data Produk</h3>
                            <a class ="btn btn-warning" href="/produk">Kembali</a>
                        </div>
                        <div class="card-body">
                           <form action="/produk/{{ $produk->id }}/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for=""class="form-label"> Gambar </label>
                                <input 
                                    type="file"
                                    class="form-control"
                                    name="gambar"
                                    id=""
                                    aria-describedby="helpid"
                                    placeholder =""
                                />
                                @error('gambar')
                                <div class="alert alert-danger mt-2">
                                 {{ $message }}
                                </div>
                                @enderror
                                 </div>
                                 <div class="mb-3">
                                <label for=""class="form-label"> Nama produk </label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    name="nama_produk"
                                    id=""
                                    value="{{ old('nama_produk',$produk->nama_produk) }}"
                                    aria-describedby="helpid"
                                    placeholder =""
                                />
                                @error('nama_produk')
                                <div class="alert alert-danger mt-2">
                                 {{ $message }}
                                </div>
                                @enderror
                                 </div>
                                 <div class="mb-3">
                                <label for=""class="form-label"> Harga </label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    name="harga"
                                    id=""
                                    value="{{ old('harga',$produk->harga) }}"
                                    aria-describedby="helpid"
                                    placeholder =""
                                />
                                @error('harga')
                                <div class="alert alert-danger mt-2">
                                 {{ $message }}
                                </div>
                                @enderror
                                 </div>
                                 <div class="mb-3">
                                <label for=""class="form-label"> Satuan </label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    name="satuan"
                                    id=""
                                    value="{{ old('satuan',$produk->satuan) }}"
                                    aria-describedby="helpid"
                                    placeholder =""
                                />
                                @error('satuan')
                                <div class="alert alert-danger mt-2">
                                 {{ $message }}
                                </div>
                                @enderror
                                 </div>
                                 <div class="mb-3">
                                <label for=""class="form-label"> Barcode </label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    name="barcode"
                                    id=""
                                    value="{{ old('barcode',$produk->barcode) }}"
                                    aria-describedby="helpid"
                                    placeholder =""
                                />
                                @error('barcode')
                                <div class="alert alert-danger mt-2">
                                 {{ $message }}
                                </div>
                                @enderror
                                 </div>
                                 <div class="mb-3">
                                <label for=""class="form-label"> Stok </label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    name="stok"
                                    id=""
                                    value="{{ old('stok',$produk->stok) }}"
                                    aria-describedby="helpid"
                                    placeholder =""
                                />
                                @error('stok')
                                <div class="alert alert-danger mt-2">
                                 {{ $message }}
                                </div>
                                @enderror
                                 </div>
                                 <small id="helpid" class="form-text text-muted">Help text</small>
                            </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            
                           </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection