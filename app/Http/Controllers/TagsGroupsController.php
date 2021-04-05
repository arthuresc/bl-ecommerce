<?php

namespace App\Http\Controllers;

use App\Models\TagGroup;
use Illuminate\Http\Request;

class TagsGroupsController extends Controller
{

    public function index()
    {
        return view('tagGroup.index')->with('tagsGroups', TagGroup::all());
    }

    public function create()
    {
        return view('tagGroup.create');
    }

    public function store(Request $request)
    {
        TagGroup::create($request->all());
        
        session()->flash('success', 'Grupo de tags foi alterado com sucesso!');
        return redirect(route('tagGroup.index'));
    }

    public function show(TagGroup $tagGroup)
    {
        
    }

    public function edit(TagGroup $tagGroup)
    {
        return view('tagGroup.edit')->with('tagGroup', $tagGroup);
    }

    public function update(Request $request, TagGroup $tagGroup)
    {
        $tagGroup->update($request->all());
        session()->flash('success', 'Grupo de tags foi alterado com sucesso!');
        return redirect(route('tagGroup.index'));
    }

    public function destroy(TagGroup $tagGroup)
    {
        $tagGroup->delete($tagGroup);
        session()->flash('success', 'Grupo de tags foi excluído com sucesso!');
        return redirect(route('tagGroup.index'));
    }

    public function trash() {
        return view('tagGroup.trash')->with('tagsGroups', TagGroup::onlyTrashed()->get());
    }

    public function restore($id) {
        $tagGroup = TagGroup::onlyTrashed()->where('id', $id)->firstOrFail();
        $tagGroup->restore();
        session()->flash('success', 'Grupo de tags restaurado com sucesso!');
        return redirect(route('tagGroup.trash'));
    }
}
