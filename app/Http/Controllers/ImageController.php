<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = image::where('kalimat3', 'like', '%' . $q . '%');
        // ->orWhere('intro', 'like', '%' . $q . '%')

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;
        $images = $query->paginate($perPage);
        $images->appends(['q' => $q]);



        $images->startingIndex = $startingIndex;
        return view('about.image_info.crud', compact('images', 'q', 'startingIndex'));
    }
    public function create()
    {
        return view('about.image_info.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'kalimat3' => 'required',
            'kalimat1' => 'required',
            'kalimat2' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $background_image = $image ? $image->store('images', 'public') : null;

        $images = new image();
        $images->kalimat3 = $request->kalimat3;
        $images->kalimat1 = $request->kalimat1;
        $images->kalimat2 = $request->kalimat2;
        $images->image = $background_image ;
        $images->save();

        return redirect('/image/crud')->with('Success', 'berhasil menambahkan about us');
    }

    public function edit($id)
    {
        $image = image::find($id);
        return view('about.image_info.edit', compact('image'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->file('image'));
        $images = image::find($id);
        $images->kalimat1 = $request->kalimat1;
        $images->kalimat2 = $request->kalimat2;
        $images->kalimat3 = $request->kalimat3;
        if ($request->hasFile('image')) {
            $gambarAlbum = $request->file('image');
            $image = $gambarAlbum ? $gambarAlbum->store('info', 'public') : null;
            $images->image = $image;
        }

        $images->save();
        return redirect('/image/crud')->with('success', 'Album berhasil diperbarui');
    }

}
