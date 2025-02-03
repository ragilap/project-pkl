<?php

namespace App\Http\Controllers;

use App\Models\albumvideo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\type;
use App\Models\video;
use Illuminate\Support\Carbon;

class AlbumVideoController extends Controller
{
    public function index()
    {
        $albums = albumvideo::with('video');

        if (request('category')) {
            $albums = albumvideo::whereHas('categories', function ($query) {
                $query->where('slug', request('category'));
            });
        }
        if (request('sort') == 'latest') {
            $albums->orderBy('created_at', 'desc');
            // dd($albums);
        } else if (request('sort') == 'last') {
            $albums->orderBy('created_at', 'asc');
        }
         else {
$albums->orderBy('order');
        }
        $albums = $albums->paginate(6);

        $categories = Category::all();
        return view('album_video.index', [
            'albums' => $albums,
            'request' => request('sort'),
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('album_video.create', compact('categories'));
    }

    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = albumvideo::where('nama_album', 'like', '%' . $q . '%')
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
        return view('album_video.crud', compact('albums', 'q'));
    }

    // Menyimpan album baru ke database
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_album' => 'required|max:255',
            'gambar_album' => 'required|image',
            // 'gambar_album' => 'mimes:jpeg,png,jpg,gif,mp4,avi,mov|max:20480',
            'scheduled_at' => 'required',
            'category_id' => 'required|exists:categories,id',

        ]);
        $gambarAlbum = $request->file('gambar_album');
        $gambarPath = $gambarAlbum ? $gambarAlbum->store('albums', 'public') : null;

        $albums = new albumvideo();
        $type = 2;
        $albums->nama_album = $request->input('nama_album');
        $albums->gambar_album = $gambarPath;
        $albums->type_id = $type;
        $albums->category_id = $request->category_id;

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
        return redirect('/Albums/admin')->with('success', 'Album berhasil ditambahkan');
    }


    public function edit($id)
    {
        $categories = Category::all();
        $album = albumvideo::find($id);
        return view('album_video.edit', compact('album', 'categories'));
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
            // 'gambar_album' => 'image|mimes:jpeg,png,jpg,gif,mp4,avi,mov|max:20480',
            'gambar_album' => 'image',
            'scheduled_at' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $type = 2;

        $albums = albumvideo::find($id);

        $albums->nama_album = $request->nama_album;
        $albums->type_id = $type;
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
                $albums->published_at = Carbon::parse($request->scheduled_at);
                $albums->scheduled_at = $request->scheduled_at;
            }
        }
        if ($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
            $albums->draft = 1;
            $albums->published_at = null;
            $albums->scheduled_at = null;
            if ($request->status == 1  && Carbon::parse($request->scheduled_at)->gt(Carbon::now())) {
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
            }
        }

        // dd($albums);
        $albums->save();
        return redirect('/Albums/admin')->with('success', 'Album berhasil diperbarui');
    }

    // Menghapus album beserta sub-album yang terkait
    public function destroy(albumvideo $album)
    {
        $album->video()->delete(); // Menghapus sub-album terkait
        $album->delete(); // Menghapus album

        return redirect('/Albums/admin')->with('success', 'Album berhasil dihapus');
    }
    public function moveUp(albumvideo $album)
    {
        // dd($album->order);
        $album->moveOrderUp();
        // dd($album);
        return redirect()->back();
    }

    public function moveDown(albumvideo $album)
    {
        $album->moveOrderDown();
        return redirect()->back();
    }
}
