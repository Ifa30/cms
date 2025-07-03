<!-- laporan/index.blade.php -->
@extends('layouts.app')
@section('content')
<h4>Laporan Produk</h4>
<ul class="list-group">
    @foreach ($products as $p)
        <li class="list-group-item d-flex justify-content-between">
            {{ $p->nama }} - {{ $p->kategori }}
            <span class="badge bg-success">Rp {{ number_format($p->harga) }}</span>
        </li>
    @endforeach
</ul>
@endsection