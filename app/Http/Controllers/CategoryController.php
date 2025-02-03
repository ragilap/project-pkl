<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = Category::where('name', 'like', '%' . $q . '%')
            ->orWhere('slug', 'like', '%' . $q . '%')
            ->orderBy('created_at', 'desc');

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $categories = $query->paginate($perPage);
        $categories->appends(['q' => $q]);

        return view('backend.category.crud', compact('categories','q','startingIndex'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'icon' => 'required|image',
            'deskripsi' => 'required'
        ]);
        $categories = new Category();
        $categories->name = $request->name;
        $categories->icon = $request->icon->store('icon','public');
        $categories->deskripsi = $request->deskripsi;
        $categories->slug = $request->slug;
        $categories->save();
        return redirect('/category/crud')->with('success', 'kategory berhasil di tambahkan');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        dd($request);
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'deskripsi' => 'required',
            'icon' => 'required|image',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->deskripsi = $request->deskripsi;

        if ($request->hasFile('icon')) {
            $gambarAlbum = $request->file('icon');
            $gambarPath = $gambarAlbum ? $gambarAlbum->store('icon', 'public') : null;
            $category->icon = $gambarPath;
        }

        $category->slug = $request->slug;
        $category->save();

        return redirect('/category/crud')->with('success', 'kategory berhasil di update');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/crud')->with('Success', 'kategory berhasil di hapus');
    }
}
