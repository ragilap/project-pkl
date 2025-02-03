<?php

namespace App\Http\Controllers;

use App\Models\infovalue;
use Illuminate\Http\Request;

class InfovalueController extends Controller
{
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = infovalue::where('judul', 'like', '%' . $q . '%')
            // ->orWhere('intro', 'like', '%' . $q . '%')
            ->orderBy('order','desc');
        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;
        $infos = $query->paginate($perPage);
        $infos->appends(['q' => $q]);

        $infos->startingIndex = $startingIndex;

        return view('about.infovalue.crud', compact('infos', 'q', 'startingIndex'));
    }
    public function create()
    {
        return view('about.infovalue.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required',
            'icon' => 'required',
        ]);
        // dd($request);

        $infos = new infovalue();
        $infos->judul = $request->judul;
        $infos->deskripsi = $request->deskripsi;
        $infos->icon = $request->icon;
        $infos->save();

        return redirect('/infovalue/crud')->with('Success', 'berhasil menambahkan about us');
    }

    public function edit($id)
    {
        $infos = infovalue::find($id);
        return view('about.infovalue.edit', compact('infos'));
    }
    public function update(Request $request, $id)
    {


        $infos = infovalue::find($id);
        $infos->judul = $request->judul;
        $infos->deskripsi = $request->deskripsi;
        $infos->icon = $request->icon;
        $infos->save();
        return redirect('/infovalue/crud')->with('success', 'Album berhasil diperbarui');
    }
    public function moveUp(infovalue $info)
    {
        // dd($info);
         $info->moveOrderUp();
         return redirect()->back();
    }

    public function moveDown(infovalue $info)
    {
        $info->moveOrderDown();
        return redirect()->back();
    }

}
