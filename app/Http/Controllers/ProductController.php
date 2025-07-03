<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request) {
        try {
            $query = Product::query();

            if ($request->has('search') && $request->search != '') {
                $keyword = $request->search;
                $query->where('nama', 'like', "%{$keyword}%")
                      ->orWhere('kategori', 'like', "%{$keyword}%");
            }

            $products = $query->latest()->get();

            return view('products.index', compact('products'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat produk: ' . $e->getMessage());
        }
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'nama' => 'required',
                'kategori' => 'required',
                'harga' => 'required|numeric',
                'gambar' => 'nullable|image|max:2048'
            ]);

            $data = $request->only('nama', 'kategori', 'harga');
            if ($request->hasFile('gambar')) {
                $data['gambar'] = $request->file('gambar')->store('produk', 'public');
            }

            Product::create($data);
            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product) {
        try {
            $request->validate([
                'nama' => 'required',
                'kategori' => 'required',
                'harga' => 'required|numeric',
                'gambar' => 'nullable|image|max:2048'
            ]);

            $data = $request->only('nama', 'kategori', 'harga');
            if ($request->hasFile('gambar')) {
                if ($product->gambar) {
                    Storage::disk('public')->delete($product->gambar);
                }
                $data['gambar'] = $request->file('gambar')->store('produk', 'public');
            }

            $product->update($data);
            return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui produk: ' . $e->getMessage());
        }
    }

    public function destroy(Product $product) {
        try {
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }
}
