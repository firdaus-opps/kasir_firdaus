@extends('layouts.master');
@section('tittle', 'penjualan');
@section('content')

<div class="content-wrapper">
    <section class="conntent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Data Penjualan</h3>
                            <a class="btn btn-primary" href="/penjualan/tambah">Tambah</a>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Kasir</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Tanggal Pembayaran</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $penjualan as $penjualan )
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>daus</td>
                                                <td>{{ $penjualan->total}}</td>
                                                <td>{{ $penjualan->created_at}}</td>
                                                <td>{{ $penjualan->status}}</td>
                                                <td>
                                                    @if ($penjualan->status == 'Belum Selesai')
                                                    <a class="btn btn-primary" 
                                                    href="/penjualan/transaksi/{{ $penjualan->id }}">Lengkapi Transaksi</a>
                                                    @else 
                                                    @endif
                                                    <a class="btn btn-primary" href="/penjualan/struk{{ $penjualan->id }}">Cetak Struk</a>
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection