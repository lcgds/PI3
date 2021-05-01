<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\Product;

class Categories extends Controller
{
    public function index() {
        return view('category.index')->with('categories', Category::all());
    }

    public function create() {
        return view('category.create');
    }

    public function store(Request $request) {
        if($request->image) {
            $image = $request->file('image')->store('category');
            $image = 'storage/' . $image;
        } else {
            $image = 'storage/category/default.png';
        }

        Category::create([
            'name' => $request->name,
            'image' => $image 
        ]);

        session()->flash('success', 'Corredor cadastrado com sucesso!');

        return redirect(route('category.index'));
    }

    public function show(Category $category)
    {
        return view('category.show')
            ->with('category', $category)
            ->with('products', $category->products()->paginate(12));
    }

    public function edit(Category $category) {
        return view('category.edit')->with('category', $category);
    }

    public function update(Request $request, Category $category) {
        if($request->image) {
            $image = $request->file('image')->store('category');
            $image = 'storage/' . $image;

            if ($category->image !== 'storage/category/default.png') {
                Storage::delete(\str_replace('storage/','', $category->image));
            }

        } else if($category->image === '') {
            $image = 'storage/category/default.png';
        } else {
            $image = $category->image;
        }

        $category->update([
            'name' => $request->name,
            'image' => $image 
        ]);

        session()->flash('success', 'Corredor atualizado com sucesso!');
        return redirect(route('category.index'));
    }

    public function destroy(Category $category) {
        if($category->products()->count() > 0) {
            session()->flash('warning', 'Não é possível desativar uma categoria que contenha produtos ativos.');
            return redirect(route('category.index'));
        } else {
            $category->delete();
            session()->flash('success', 'Corredor desativado com sucesso!');
            return redirect(route('category.index'));
        }        
    }

    public function trash() {
        return view('category.trash')->with('categories', Category::onlyTrashed()->get());
    }

    public function restore($id) {
        $category = Category::onlyTrashed()
                            ->where('id', $id)
                            ->firstOrFail();
        $category->restore();
        session()->flash('success', 'Corredor restaurado com sucesso!');
        return redirect(route('category.trash'));
    }
}
