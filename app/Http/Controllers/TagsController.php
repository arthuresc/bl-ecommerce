<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function index()
    {
        return view('tag.index')->with('tags', Tag::all());
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        Tag::create($request->all());
        
        session()->flash('success', 'Tag foi alterada com sucesso!');
        return redirect(route('tag.index'));
    }

    public function show(Tag $tag)
    {
        
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        session()->flash('success', 'Tag foi alterada com sucesso!');
        return redirect(route('tag.index'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete($tag);
        session()->flash('success', 'Tag foi excluída com sucesso!');
        return redirect(route('tag.index'));
    }

    public function trash() {
        return view('tag.trash')->with('tags', Tag::onlyTrashed()->get());
    }

    public function restore($id) {
        $tag = Tag::onlyTrashed()->where('id', $id)->firstOrFail();
        $tag->restore();
        session()->flash('success', 'Tag restaurada com sucesso!');
        return redirect(route('tag.trash'));
    }
}
