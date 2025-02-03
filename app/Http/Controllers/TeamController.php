<?php

namespace App\Http\Controllers;

use App\Models\team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function details($id)
    {

        $team= team::find($id);

        return view('about.team.detail', ['team' => $team]);
    }

    public function crud(Request $request)

    {
        $q = $request->input('q');

        $query = team::where('nama', 'like', '%' . $q . '%')
            // ->orWhere('intro', 'like', '%' . $q . '%')
            ->orderBy('order', 'desc');
        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;
        $teams = $query->paginate($perPage);
        $teams->appends(['q' => $q]);

        return view('about.team.crud', compact('teams', 'q', 'startingIndex'));
    }

    public function create()
    {
        return view('about.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'quote' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image'
        ]);
        $teams = new team();
        $teams->nama = $request->nama;
        $teams->jabatan = $request->jabatan;
        $teams->quote = $request->quote;
        $teams->deskripsi = $request->deskripsi;
        $teams->image = $request->image->store('teams', 'public');
        $teams->save();
        return redirect('/team/crud')->with('success', 'Team telah di tambahkan');
    }

    public function edit($id)
    {
        $team = team::find($id);
        return view('about.team.edit', compact('team'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'quote' => 'required',
            'jabatan' => 'required'
        ]);

        $team = team::find($id);
        $team->nama = $request->nama;
        $team->deskripsi = $request->deskripsi;
        $team->quote = $request->quote;
        $team->jabatan = $request->jabatan;

        if ($request->hasFile('image')) {
            $team->image = $request->image->store('teams', 'public');
        }
        $team->save();
        return redirect('/team/crud')->with('success', 'Team telah di update');
    }
    public function destroy($id)
    {
        $team = team::find($id);
        $team->delete();

        return redirect('/team/crud')->with('success', 'Team Berhasil di hapus');
    }
    public function moveUp(team $team)
    {
        // dd($album->order);
        $team->moveOrderUp();
        // dd($album);
        return redirect()->back();
    }

    public function moveDown(team $team)
    {
        $team->moveOrderDown();
        return redirect()->back();
    }
}
