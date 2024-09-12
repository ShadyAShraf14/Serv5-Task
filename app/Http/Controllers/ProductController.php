<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('pages.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'nullable|string',
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('products', $imageName, 'public');
            $data['image'] = $imageName;
        } else {
            $data['image'] = null;
        }


        Product::create($data);

        //dd($request);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('pages.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('products', $imageName, 'public');
            $data['image'] = $imageName;
        } else {
            $data['image'] = $product->image;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function products()
    {
        return view('auth.products', compact('products'));
    }


    public function search(Request $request)
    {
        $query = Product::with('category');
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('brand', 'like', "%{$search}%")
                ->orWhere('price', $search);
        }

        $products = $query->paginate(10);
        return view('auth.products', compact('products'));
    }
}
