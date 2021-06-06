<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\TagGroup;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    public function index()
    {
        return view('tag.index')->with('tags', Tag::orderBy('name', 'asc')->get());
    }

    public function create()
    {
        return view('tag.create')->with('tagsGroups', TagGroup::all());
    }

    public function store(Request $request)
    {
        if ($request->has('addNewTag')) {
            Tag::create($request->all());
            
            session()->flash('success', 'Tag foi alterada com sucesso!');
            return redirect(route('tag.index'));
        }

        if ($request->has('addNewTagGroup')) {
            TagGroup::create($request->all());
            session()->flash('success', 'Grupo de tags foi adicionado com sucesso!');
            return redirect(route('tag.create'));
        }

    }

    public function show(Tag $tag)
    {
        return view('tag.show')->with(['tag' => $tag, 'products' => $tag->products()->paginate(9)]);
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit')->with(['tag'=>$tag, 'tagsGroups'=>TagGroup::all()]);
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
        $tagGroup = TagGroup::onlyTrashed()->where('id', $tag->tag_group_id);
        if ($tagGroup) {
            $tagGroup->restore();
        }
        $tag->restore();
        session()->flash('success', 'Tag restaurada com sucesso!');
        return redirect(route('tag.trash'));
    }
}
