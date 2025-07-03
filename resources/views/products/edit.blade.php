<!-- products/edit.blade.php -->
@extends('layouts.app')
@section('content')
<h4>Edit Produk</h4>
<form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">@csrf @method('PUT')
    <div class="mb-3"><label>Nama</label><input name="nama" value="{{ $product->nama }}" class="form-control" required></div>
    <div class="mb-3"><label>Kategori</label><input name="kategori" value="{{ $product->kategori }}" class="form-control" required></div>
    <div class="mb-3"><label>Harga</label><input type="number" name="harga" value="{{ $product->harga }}" class="form-control" required></div>
    <div class="mb-3">
        <label>Gambar</label><br>
        @if($product->gambar)<img src="{{ asset('storage/' . $product->gambar) }}" width="80" class="mb-2"><br>@endif
        <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-dark">Update</button>
</form>
@endsection