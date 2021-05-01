<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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

        session()->flash('success', 'Tag cadastrada com sucesso!');

        return redirect(route('tag.index'));
    }

    public function show(Tag $tag)
    {
        return view('tag.show')
            ->with('tag', $tag)
            ->with('products', $tag->products()->paginate(12));
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        session()->flash('success', 'Tag atualizada com sucesso!');

        return redirect(route('tag.index'));
    }

    public function destroy(Tag $tag)
    {
        if($tag->products()->count()>0) {
            session()->flash('warning', 'Não é possível desativar uma categoria que contenha produtos ativos.');
            return redirect(route('tag.index'));
        } else {
            $tag->delete();
            session()->flash('success', 'Tag desativada com sucesso!');
            return redirect(route('tag.index'));
        }    
    }

    public function trash() {
        return view('tag.trash')->with('tags', Tag::onlyTrashed()->get());
    }

    public function restore($id) {
        $tag = Tag::onlyTrashed()
                    ->where('id', $id)
                    ->firstOrFail();
        $tag->restore();
        session()->flash('success', 'Tag restaurada com sucesso!');
        return redirect(route('tag.trash'));

    }
}
