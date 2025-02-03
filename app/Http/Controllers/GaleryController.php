<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\galery;
use App\Models\Album;
use App\Models\type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class GaleryController extends Controller
{
    public function details($id)
    {

        $galery = galery::find($id);

        return view('galery.detail', ['galery' => $galery]);
    }

    public function index()
    {
        $albums = Album::find(Request('id'));
        // dd($albums);
        $categories = Category::all();
        $galeries = galery::where('parent_id', Request('id'))->with('album');
        if (request('sort') == 'latest') {
            $galeries->orderBy('created_at', 'desc');
            // dd($galeries);
        } else if
         (request('sort') == 'last') {
            $galeries->orderBy('created_at', 'asc');
        }
        $galeries = $galeries->paginate(6);
        return view('galery.index', [
            'galeries' => $galeries,
            'categories' => $categories,
            'albums' => $albums,
            'request' => request('sort')
        ]);
    }

    public function crud(Request $request)
    {
        $q = $request->input('q');
        $album = Album::find(Request('id'));
        $query = galery::where('judul', 'like', '%' . $q . '%')
            ->orWhereHas('types', function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            });


        $perPage = 3;
        $currentPage = $request->query('page', 1); // Get current page or default to 1
        $startingIndex = ($currentPage - 1) * $perPage;

        $galeriId = request('id');

        $galeries = galery::where('parent_id', request('id'))->orderBy('created_at', 'desc')->get();
        // ->paginate($perPage);// Append the search query to pagination links
        $galeries->startingIndex = $startingIndex;

        return view('galery.admin', compact('galeriId', 'galeries', 'q', 'startingIndex', 'album'));
    }

    public function create($id, Album $album)
    {
        $galeriId = $id;
        $galery = galery::all();
        $categories = Category::all();
        $album = Album::find($id);

        return view('galery.create', compact('galeriId', 'album', 'galery', 'categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file_path' => 'required|mimes:jpeg,png,jpg|max:20480',
            'scheduled_at' => 'nullable',
        ]);


        $type = 1;


        $galeries = new Galery();
        $galeries->judul = $request->judul;
        $galeries->parent_id = $request->album;
        $galeries->deskripsi = $request->deskripsi;
        $galeries->file_path = $request->file_path->store('galeries', 'public');
        $galeries->type_id = $type;


        if ($request->status == 0 && $request->scheduled_at) {
            if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                $galeries->draft = false;
                $galeries->published_at = $request->scheduled_at;
                $galeries->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $galeries->draft = true;
                $galeries->published_at = Carbon::parse($request->scheduled_at);
                $galeries->scheduled_at = $request->scheduled_at;
            }
        }

        if ($request->status == 1) {
            $galeries->published_at = null;
            $galeries->scheduled_at = null;
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $galeries->draft = false;
                    $galeries->published_at = $request->scheduled_at;
                    $galeries->scheduled_at = $request->scheduled_at;
                } else {
                    $galeries->draft = true;
                    $galeries->published_at = null;
                    $galeries->scheduled_at = $request->scheduled_at;
                }
            } else {
                $galeries->draft = false;
                $galeries->published_at = Carbon::now();
                $galeries->scheduled_at = null;
            }
        }

        $galeries->save();

        return redirect("/crud?id=$galeries->parent_id")->with('success', 'Image added to gallery successfully.');
    }
    public function edit($id, Album $album)
    {
        $galery = galery::find($id);
        $categories = Category::all();
        $albums =  Album::all()->first();
        // dd($album);
        return view('galery.edit', compact('galery', 'categories', 'album'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'file_path' => 'mimes:jpeg,png,jpg|max:40000',
            'scheduled_at' => 'nullable',
            'deskripsi' => 'nullable'
        ]);




        $galeries = galery::find($id);
        $type = 1;
        $galeries->type_id = $type;
        $galeries->judul = $request->judul;
        $galeries->parent_id = $request->album;
        $galeries->deskripsi = $request->deskripsi;


        if ($request->hasFile('file_path')) {
            $galeries->file_path = $request->file_path->store('galeries', 'public');
        }


        if ($request->status == 0 && $request->schedule) {
            if (Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
                $galeries->draft = 0;
                $galeries->published_at = $request->scheduled_at;
                $galeries->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $galeries->draft = 1;
                $galeries->published_at = Carbon::parse($request->scheduled_at);
                $galeries->scheduled_at = $request->scheduled_at;
            }
        }


        if ($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
            $galeries->draft = 1;
            $galeries->published_at = null;
            $galeries->scheduled_at = null;
            if ($request->status == 1  && Carbon::parse($request->scheduled_at)->gt(Carbon::now())) {
                $galeries->draft = 1;
                $galeries->published_at = null;
                $galeries->scheduled_at = null;
            }
            // dd($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now()));
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $galeries->draft = 0;
                    $galeries->published_at = $request->scheduled_at;
                    $galeries->scheduled_at = $request->scheduled_at;
                } else {
                    $galeries->draft = 1;
                    $galeries->published_at = null;
                    $galeries->scheduled_at = $request->scheduled_at;
                }
            } else {
                $galeries->draft = 0;
                if ($request->status == 1) {
                    $galeries->draft = 1;
                }
                $galeries->published_at = Carbon::now();
                $galeries->scheduled_at = null;
            }
        }
        // dd($galeries);

        $galeries->save();
        return redirect("/crud?id=$galeries->parent_id")->with('Success', 'Galery telah di perbarui');
    }


    public function destroy($id)
    {
        $galeries = galery::find($id);
        $galeries->delete();
        return redirect("/crud?id=$galeries->parent_id")->with('success', 'Galery berhasil dihapus');
    }
}
