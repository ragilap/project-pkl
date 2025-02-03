<?php

namespace App\Http\Controllers;

use App\Models\social;
use App\Models\SocialTeam;
use App\Models\team;
use Illuminate\Http\Request;

class SocialTeamController extends Controller
{
    public function create($id)
    {
        $teams = team::find($id);
        return view('about.social_team.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'nama' => 'required',
            'link' => 'required',
            'icon' => 'required',

        ]);
        $socialteam = new SocialTeam();
        // $socialteam->nama = $request->nama;
        $socialteam->parent_id = $request->teams;
        // dd($request->teams);
        $socialteam->link = $request->link;
        $socialteam->icon = $request->icon;
        $socialteam->save();

        return redirect("/socialteams/crud?id=$socialteam->parent_id");
    }
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = SocialTeam::where('icon', 'like', '%' . $q . '%');
        // ->orWhere('intro', 'like', '%' . $q . '%')

        $perPage = 5;
        $socialteams = $query->paginate($perPage);
        $socialteams->appends(['q' => $q]);
        $teamId = Request('id');
        $team = team::find(Request('id'));
        $socialteams = SocialTeam::where('parent_id', request('id'))->orderBy('created_at', 'desc')->get();
        return view('about.social_team.crud', compact('socialteams', 'q', 'teamId','team'));
    }
    public function edit($id)
    {
        $socialteam = SocialTeam::find($id);

        return view('about.social_team.edit', compact('socialteam'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'link' => 'required',
            'icon' => 'required'
        ]);

        $socialteam = SocialTeam::find($id);
        // $socialteam->nama = $request->nama;
        $socialteam->link = $request->link;
        // $socialteam->parent_id = $request->teams;
        $socialteam->icon = $request->icon;
        $socialteam->save();

        return redirect("/socialteams/crud?id=$socialteam->parent_id")->with('success', 'social telah di update');
    }

    public function destroy($id)
    {
        $socialteam = SocialTeam::find($id);
        $socialteam->delete();
        return redirect("/socialteams/crud?id=$socialteam->parent_id")->with('success', 'Social telah berhasil di hapus');
    }
}
