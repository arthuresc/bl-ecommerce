<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

class ProductsController extends Controller
{
    public function index()
    {
        return view('product.index')->with(['products' => Product::all(), 'categories' => Category::all()]);
    }

    public function create()
    {
        return view('product.create')->with(['categories' => Category::all(), 'tags' => Tag::all()->sortBy('name')]);
    }

    public function store(Request $request)
    {
        $mainImage = $request->file('mainImage')->store('imageProduct');
        $mainImage = "storage/" . $mainImage;

        $arrayImages =  $request->file('arrayImages');
        $arrayImagesJson = [];
        if($arrayImages) {
            foreach ($arrayImages as $key => $image) {
                $image->store('arrayImageProduct');
                $arrayImagesJson[$key] = "storage/" . $image;
            }
        }

        $arrayImagesJson = json_encode($arrayImagesJson);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'minQuantity' => $request->minQuantity,
            'mainImage' => $mainImage,
            'arrayImages' => $arrayImagesJson,
            'category_id' => $request->category_id,
            'highlight' => ($request->highlight === 'true') ? 1 : 0
        ]);

        $product->tags()->sync($request->tags);
        
        session()->flash('success', 'Produto cadastrado com sucesso');
        return redirect(route('product.index'));
    }

    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);
    }

    public function edit(Product $product)
    {
        return view('product.edit')->with([
            'product'=>$product, 
            'selectedTags'=>$product->tags->sortBy('name'),
            'allTags'=>Tag::all()->sortBy('name')
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $mainImage = $request->file('mainImage')->store('imageProduct');
        $mainImage = "storage/" . $mainImage;

        $arrayImages =  $request->file('arrayImages');
        $arrayImagesJson = [];
        if($arrayImages) {
            foreach ($arrayImages as $key => $image) {
                $image->store('arrayImageProduct');
                $arrayImagesJson[$key] = "storage/" . $image;
            }
        }

        $arrayImagesJson = json_encode($arrayImagesJson);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'minQuantity' => $request->minQuantity,
            'mainImage' => $mainImage,
            'arrayImages' => $arrayImagesJson,
            'highlight' => ($request->highlight === 'true') ? 1 : 0
        ]);

        $product->tags()->sync($request->tags);
        
        session()->flash('success', 'Produto editado com sucesso');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Produto deletado com sucesso');
        return redirect(route('product.index'));
    }

    public function trash() {
        return view('product.trash')->with('products', Product::onlyTrashed()->get());
    }

    public function restore($id) {
        $product = Product::onlyTrashed()->where('id', $id)->firstOrFail();
        $product->restore();
        session()->flash('success', 'Produto restaurado com sucesso');
        return redirect(route('product.trash'));
    }

}
