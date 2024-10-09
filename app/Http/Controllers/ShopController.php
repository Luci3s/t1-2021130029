<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Mendapatkan produk dengan harga retail terbesar
        $highestPrice = Shop::orderBy('retail_price', 'desc')->first();

        // Mendapatkan produk dengan harga retail terendah
        $lowestPrice = Shop::orderBy('retail_price', 'asc')->first();

        // Mendapatkan produk dengan quantity terbanyak
        $highestQuantity = Shop::orderBy('quantity', 'desc')->first();

        // $shops = Shop::all();
        $shops = Shop::paginate(10);
        return view('shops.index', compact('shops', 'highestPrice', 'lowestPrice', 'highestQuantity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'retail_price' => 'required|numeric|min:0',
            'wholesale_price' => 'required|numeric|min:0',
            'origin' => 'required|string|max:2',
            'quantity' => 'required|integer|min:0',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

    // Proses upload gambar jika ada
    $imagePath = null;
    if ($request->hasFile('product_img')) {
        $imagePath = $request->file('product_img')->store('products', 'public'); // Simpan gambar di storage/public/products
    }

    // Simpan data produk ke database
    $shop = Shop::create([
        'id' => Str::random(12), // Menghasilkan ID acak
            'product_name' => $request->product_name,
            'description' => $request->description,
            'retail_price' => $request->retail_price,
            'wholesale_price' => $request->wholesale_price,
            'origin' => $request->origin,
            'quantity' => $request->quantity,
            'product_img' => $imagePath, // Menyimpan path gambar
    ]);
    // Redirect dengan pesan sukses
    return redirect()->route('shops.index')->with('success', 'Product added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        return view('shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        return view('shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'retail_price' => 'required|numeric|min:0',
            'wholesale_price' => 'required|numeric|min:0',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            // Validasi gambar
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Upload gambar dan dapatkan path gambar yang diupload
            $imagePath = $request->file('image')->store('public/images');

            // // Hapus gambar lama jika ada
            // if ($shop->image) {
            //     Storage::delete($shop->image);
            // }

            $validated['image'] = $imagePath;
        }

        // Update produk
        $shop->update([
            'product_name' => $validated['product_name'],
            'description' => $validated['description'],
            'retail_price' => $validated['retail_price'],
            'wholesale_price' => $validated['wholesale_price'],
            // Jika tidak ada gambar baru, gunakan gambar lama
            'image' => $validated['image'] ?? $shop->product_img,
        ]);

        return redirect()->route('shops.index')->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        // Hapus gambar jika ada
        if ($shop->product_img) {
            Storage::delete($shop->product_img);
        }
        return redirect()->route('shops.index')->with('success', 'Product deleted successfully.');
    }
}
