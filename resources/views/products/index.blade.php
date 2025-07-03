@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Produk</h4>
    <div class="d-flex">
        <form action="{{ route('products.index') }}" method="GET" class="d-flex me-2">
            <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
            <button class="btn btn-outline-primary ms-2">Cari</button>
        </form>
        <a href="{{ route('products.create') }}" class="btn btn-dark">Tambah</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th width="160px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $p)
        <tr>
            <td>
                @if($p->gambar)
                    <img src="{{ asset('storage/' . $p->gambar) }}" width="60">
                @else
                    <span class="text-muted">Tidak ada</span>
                @endif
            </td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->kategori }}</td>
            <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
            <td class="d-flex gap-2">
                <a href="{{ route('products.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('products.destroy', $p) }}">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus produk?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">Tidak ada produk ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
