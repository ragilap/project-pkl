<?php

namespace App\Http\Controllers;

use App\Models\imageslider;
use Illuminate\Http\Request;

class ImageSliderController extends Controller
{
    public function details($id)
    {

        $slider = imageslider::find($id);

        return view('backend.slider_image.detail', ['slider' => $slider]);
    }

    public function crud(Request $request)
    { $q = $request->input('q');

        $query = imageslider::where('nama', 'like', '%' . $q . '%')
            // ->orWhere('intro', 'like', '%' . $q . '%')
            ->orderBy('order', 'desc');

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $sliders = $query->paginate($perPage);
        $sliders->appends(['q' => $q]);


        return view('backend.slider_image.crud', compact('sliders','startingIndex','q'));
    }

    public function create()
    {
        return view('backend.slider_image.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'required'
        ]);

        $slider = new imageslider();
        $slider->nama = $request->nama;
        $slider->deskripsi = $request->deskripsi;
        $slider->image = $request->image->store('sliderhome','public');

        $slider->save();

        return redirect('/sliderimage/crud');

    }

    public function edit($id)
    {
        $slider = imageslider::find($id);
        return view('backend.slider_image.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $sliders = imageslider::find($id);
        $sliders->nama = $request->nama;
        $sliders->deskripsi = $request->deskripsi;
        if ($request->hasFile('image')) {
            $sliders->image = $request->image->store('sliderhome', 'public');
        }
        $sliders->save();

        return redirect('/sliderimage/crud')->with('success', 'slider telah di update');
    }
    public function destroy($id)
    {
        $slider = imageslider::find($id);
        $slider->delete();
        return redirect('/sliderimage/crud')->with('success', 'slider telah di hapus');
    }
    public function moveUp(imageslider $slider)
    {
        // dd($album->order);
        $slider->moveOrderUp();
        // dd($album);
        return redirect()->back();
    }

    public function moveDown(imageslider $slider)
    {
        $slider->moveOrderDown();
        return redirect()->back();
    }
}
