<?php

namespace App\Http\Controllers;

use App\Models\map;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class MapController extends Controller
{

    public function edit($id)
    {
        $map = map::find($id);
        return view('backend.Map.edit', compact('map'));
    }
    public function update(Request $request, $id)
    {
        $map = map::find($id);
        $map->marker = $request->marker;
        $map->latitude = $request->latitude;
        $map->save();
        return redirect('/map/crud')->with('success', 'Map berhasil di ubah');
    }
    public function crud()
    {
        $maps = map::all();
        return view('backend.Map.crud', compact('maps'));
    }
}
