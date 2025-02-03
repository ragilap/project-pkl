<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Category;
use App\Models\categoryalbum;
use App\Models\Galery;
use Illuminate\Support\Carbon;

class AlbumController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $albums = Album::with('galery');
        if (request('sort') == 'latest') {
            $albums->orderBy('created_at', 'desc');
        } else if (request('sort') == 'last') {
            $albums->orderBy('created_at', 'asc');
        } else {
           $albums->orderBy('order');
        }
        if (request('category')) {
            $albums = Album::whereHas('categories', function ($query) {
                $query->where('slug', request('category'));
            });
        }
        $albums = $albums->paginate(6);

        return view('album.index',  [
            'categories' => $categories,
            'albums' => $albums,
            'request' => request('sort')
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('album.create', compact('categories'));
    }
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = Album::where('nama_album', 'like', '%' . $q . '%')
            ->orWhereHas('categories', function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            })
            ->orderBy('order', 'desc');

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $albums = $query->paginate($perPage);
        $albums->appends(['q' => $q]);


        $albums->startingIndex = $startingIndex;
        return view('album.crud', compact('albums', 'q'));
    }

    // Menyimpan album baru ke database
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_album' => 'required|max:255',
            'gambar_album' => 'required|image',
            'scheduled_at' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        $gambarAlbum = $request->file('gambar_album');
        $gambarPath = $gambarAlbum ? $gambarAlbum->store('albums', 'public') : null;
        $type_id = 1;
        $albums = new Album();
        $albums->nama_album = $request->input('nama_album');
        $albums->gambar_album = $gambarPath;
        $albums->category_id = $request->category_id;
        $albums->type_id = $type_id;


        if ($request->status == 0 && $request->scheduled_at) {
            if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                $albums->draft = false;
                $albums->published_at = $request->scheduled_at;
                $albums->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $albums->draft = true;
                $albums->published_at = Carbon::parse($request->scheduled_at);
                $albums->scheduled_at = $request->scheduled_at;
            }
        }
        if ($request->status == 1) {
            $albums->published_at = null;
            $albums->scheduled_at = null;
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $albums->draft = false;
                    $albums->published_at = $request->scheduled_at;
                    $albums->scheduled_at = $request->scheduled_at;
                } else {
                    $albums->draft = true;
                    $albums->published_at = null;
                    $albums->scheduled_at = $request->scheduled_at;
                }
            } else {
                $albums->draft = false;
                $albums->published_at = Carbon::now();
                $albums->scheduled_at = null;
            }
        }

        $albums->save();
        return redirect('/albums/admin')->with('success', 'Album berhasil ditambahkan');
    }


    public function edit($id)
    {
        $album = Album::find($id);
        $categories = Category::all();
        return view('album.edit', compact('album', 'categories'));
    }
    // public function detail()
    // {
    //     $categories = Category::all();
    //     $albums = Galery::where('parent_id', request('id'))->get();
    //     return view('articles.galery.album.detail', compact('categories', 'albums'));
    // }

    // Menyimpan perubahan pada album ke database
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'nama_album' => 'required|max:255',
            'gambar_album' => 'image',
            'scheduled_at' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        $type_id = 1;

        $albums = Album::find($id);
        $albums->type_id = $type_id;
        $albums->nama_album = $request->nama_album;
        $albums->category_id = $request->category_id;

        if ($request->hasFile('gambar_album')) {
            $gambarAlbum = $request->file('gambar_album');
            $gambarPath = $gambarAlbum ? $gambarAlbum->store('albums', 'public') : null;
            $albums->gambar_album = $gambarPath;
        }

        if ($request->status == 0 && $request->schedule) {
            if (Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
                $albums->draft = 0;
                $albums->published_at = $request->scheduled_at;
                $albums->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $albums->draft = 1;
                $albums->published_at =  Carbon::parse($request->scheduled_at);
                $albums->scheduled_at =  $request->scheduled_at;
            }
        }
        if ($request->status == 1  &&  Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
            $albums->draft = 1;
            $albums->published_at =   null;
            $albums->scheduled_at =   null;
            if ($request->status == 1 && Carbon::parse($request->scheduled_at)->gt(Carbon::now())) {
                $albums->draft = 1;
                $albums->published_at = null;
                $albums->scheduled_at = null;
            }
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $albums->draft = 0;
                    $albums->published_at = $request->scheduled_at;
                    $albums->scheduled_at = $request->scheduled_at;
                } else {
                    $albums->draft = 1;
                    $albums->published_at = null;
                    $albums->scheduled_at = $request->scheduled_at;
                }
            } else {
                $albums->draft = 0;
                if ($request->status == 1) {
                    $albums->draft = 1;
                }
                $albums->published_at = Carbon::now();
                $albums->scheduled_at = null;
                // dd($galeries);
            }
        }
        // dd($albums);
        $albums->save();
        return redirect('/albums/admin')->with('success', 'Album berhasil diperbarui');
    }

    // Menghapus album beserta sub-album yang terkait
    public function destroy(Album $album)
    {
        $album->galery()->delete(); // Menghapus sub-album terkait
        $album->delete(); // Menghapus album

        return redirect('/albums/admin')->with('success', 'Album berhasil dihapus');
    }
    public function moveUp(Album $album)
    {
        // dd($album->order);
        $album->moveOrderUp();
        // dd($album);
        return redirect()->back();
    }

    public function moveDown(Album $album)
    {
        $album->moveOrderDown();
        return redirect()->back();
    }
}
