<?php

namespace App\Http\Controllers;

use App\Models\logo;
use App\Models\type;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function details($id)
    {

        $logo = logo::find($id);

        return view('backend.Logo.detail', ['logo' => $logo]);
    }


    public function footer()
    {
        $logos = Logo::first(); // Use first() instead of firstl()
        return view('components.byte-craft.footer', compact('logos'));
    }

    public function Navbar()
    {
        $logos = logo::first();
        return view('layouts.byte-craft', compact('logos'));
    }

    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = logo::where('nama', 'like', '%' . $q . '%');
        // ->orWhere('intro', 'like', '%' . $q . '%')

        $perPage = 5;


        $logos = $query->paginate($perPage);
        $logos->appends(['q' => $q]);

        $logos = logo::with('type')->get();
// dd($logos->type_id->nama);
        return view('backend.Logo.crud', compact('logos', 'q'));
    }

    public function edit($id)
    {
        $logo = logo::find($id);
        return view('backend.Logo.edit', compact('logo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'quote' => 'required',

        ]);

        $logos = logo::find($id);
        $logos->nama = $request->nama;
        $logos->deskripsi = $request->deskripsi;
        $logos->quote = $request->quote;
        $logos->type_id = $request->type;
        if ($request->hasFile('image')) {
            $logos->image = $request->image->store('infos', 'public');
        }
        $logos->save();

        return redirect('/Logo/crud')->with('Success', 'Logo has been Updated');
    }
}
