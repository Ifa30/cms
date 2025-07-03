<!-- products/create.blade.php -->
@extends('layouts.app')
@section('content')
<h4>Tambah Produk</h4>
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">@csrf
    <div class="mb-3"><label>Nama</label><input name="nama" class="form-control" required></div>
    <div class="mb-3"><label>Kategori</label><input name="kategori" class="form-control" required></div>
    <div class="mb-3"><label>Harga</label><input type="number" name="harga" class="form-control" required></div>
    <div class="mb-3"><label>Gambar</label><input type="file" name="gambar" class="form-control"></div>
    <button type="submit" class="btn btn-dark">Simpan</button>
</form>
@endsection