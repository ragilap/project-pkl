<?php

namespace App\Http\Controllers;

use App\Models\categoryalbum;
use Illuminate\Http\Request;

class CategoryAlbumController extends Controller
{
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = categoryalbum::where('name', 'like', '%' . $q . '%')
            ->orWhere('slug', 'like', '%' . $q . '%')
            ->orderBy('created_at', 'desc');

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $categories = $query->paginate($perPage);
        $categories->appends(['q' => $q]);

        return view('about.categoryalbum.crud', compact('categories','q','startingIndex'));
    }

    public function create()
    {
        return view('about.categoryalbum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $categories = new categoryalbum();
        $categories->name = $request->name;
        $categories->slug = $request->slug;
        $categories->save();
        return redirect('/categoryalbum/crud')->with('success', 'kategory berhasil di tambahkan');
    }

    public function edit($id)
    {
        $category = categoryalbum::find($id);
        return view('about.categoryalbum.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        $category = categoryalbum::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect('/categoryalbum/crud')->with('success', 'kategory berhasil di update');
    }

    public function destroy($id)
    {
        $category = categoryalbum::find($id);
        $category->delete();
        return redirect('/categoryalbum/crud')->with('Success', 'kategory berhasil di hapus');
    }
}
