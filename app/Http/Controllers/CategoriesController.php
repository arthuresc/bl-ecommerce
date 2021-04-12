<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoriesController extends Controller
{

    public function index()
    {
        return view('category.index')->with('categories', Category::all());
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        
        session()->flash('success', 'Categoria foi alterada com sucesso!');
        return redirect(route('category.index'));
    }

    public function show(Category $category)
    {
        
    }

    public function edit(Category $category)
    {
        return view('category.edit')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        session()->flash('success', 'Categoria foi alterada com sucesso!');
        return redirect(route('category.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete($category);
        session()->flash('success', 'Categoria foi excluída com sucesso!');
        return redirect(route('category.index'));
    }

    public function trash() {
        return view('category.trash')->with('categories', Category::onlyTrashed()->get());
    }

    public function restore($id) {
        $category = Category::onlyTrashed()->where('id', $id)->firstOrFail();
        $category->restore();
        session()->flash('success', 'Categoria restaurada com sucesso!');
        return redirect(route('category.trash'));
    }
}
