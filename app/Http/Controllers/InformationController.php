<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\image;
use App\Models\information;
use App\Models\infovalue;
use App\Models\map;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function details($id)
    {

        $info = information::find($id);

        return view('galery.detail', ['info' => $info]);
    }

    public function index()
    {
        $contacts = contact::orderBy('order','desc')->get();
        $contactModel = new Contact();
        $contactTypes = $contactModel->getContactTypes();
        $infos = information::all();
        $image = image::first();
        $values = infovalue::orderBy('order','desc')->get();
        $map = map::first();
        return view('about.information.index', compact('infos', 'contacts', 'contactTypes','image','values','map'));
    }
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = information::where('judul', 'like', '%' . $q . '%');
        // ->orWhere('intro', 'like', '%' . $q . '%')

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;
        $infos = $query->paginate($perPage);
        $infos->appends(['q' => $q]);



        $infos->startingIndex = $startingIndex;
        return view('about.information.crud', compact('infos', 'q', 'startingIndex'));
    }
    public function create()
    {
        return view('about.information.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required',
            'image' => 'required|image',
        ]);

        $image = $request->file('image');
        $infoimage = $image ? $image->store('infos', 'public') : null;

        $infos = new information();
        $infos->judul = $request->judul;
        $infos->isi = $request->isi;
        $infos->image = $infoimage;
        $infos->save();

        return redirect('/info/crud')->with('Success', 'berhasil menambahkan about us');
    }

    public function edit($id)
    {
        $infos = information::find($id);
        return view('about.information.edit', compact('infos'));
    }
    public function update(Request $request, $id)
    {


        $infos = information::find($id);
        $infos->judul = $request->judul;
        $infos->isi = $request->isi;
        if ($request->input('image')) {
            $gambarAlbum = $request->file('image');
            $image = $gambarAlbum ? $gambarAlbum->store('info', 'public') : null;
            $infos->image = $image;
        }

        $infos->save();
        return redirect('/info/crud')->with('success', 'Album berhasil diperbarui');
    }
}
