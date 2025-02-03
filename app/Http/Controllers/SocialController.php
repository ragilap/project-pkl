<?php

namespace App\Http\Controllers;

use App\Models\social;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SocialController extends Controller
{
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = social::where('nama', 'like', '%' . $q . '%');
        // ->orWhere('intro', 'like', '%' . $q . '%')

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $socials = $query->paginate($perPage);
        $socials->appends(['q' => $q]);


        $socials->startingIndex = $startingIndex;

        return view('backend.social.crud', compact('socials', 'q', 'startingIndex'));
    }
    public function edit($id)
    {
        $social = social::find($id);
        return view('backend.social.edit', compact('social'));
    }
    public function update(Request $request, $id)
    {
        $socials = social::find($id);
        $socials->nama = $request->nama;
        $socials->icon = $request->icon;
        $socials->link = $request->link;
        $socials->save();

        return redirect('/social/crud')->with('success','social telah diupdate');
    }
}
