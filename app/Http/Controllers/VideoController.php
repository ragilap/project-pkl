<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\albumvideo;
use App\Models\video;

class VideoController extends Controller
{

    public function index()
    {
        $albums = albumvideo::find(Request('id'));
        $videos = video::where('parent_id', Request('id'))->with('albumvideo');

        if (request('sort')=='latest') {
            $videos->orderBy('created_at', 'desc');
            // dd($videos);
        }else if (request('sort')=='last') {
            $videos->orderBy('created_at', 'asc');
        }
        return view('video.index',
        ['videos' =>$videos->paginate(6),
        'albums' => $albums,
        'request' => request('sort'),
    ]);
    }

    public function crud(Request $request)
    {
        $q = $request->input('q');
        $album = albumvideo::find(Request('id'));
        $query = video::where('judul', 'like', '%' . $q . '%')
            ->orWhereHas('types', function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            });
        // $query = Category::where('name','like','%'.$q.'%');

        $perPage = 3;
        $currentPage = $request->query('page', 1); // Get current page or default to 1
        $startingIndex = ($currentPage - 1) * $perPage;

        $galeriId = request('id');

        $videos = video::where('parent_id', request('id'))->orderBy('created_at','desc')->get();
        // ->paginate($perPage);// Append the search query to pagination links
        $videos->startingIndex = $startingIndex;

        return view('video.crud', compact('galeriId', 'videos', 'q', 'startingIndex', 'album'));
    }

    public function create($id, albumvideo $album)
    {
        $galeriId = $id;
        $galery = video::all();
        $album = albumvideo::find($id);

        return view('video.create', compact('galeriId', 'album', 'galery'));
    }


    public function store(Request $request)
    { // dd($request);
        $request->validate([
            'judul' => 'required',
            'file_path' => 'required|mimes:gif,mp4,avi,mov|max:50480',
            'scheduled_at' => 'required',
            'deskripsi' => 'required'
        ]);

        $type =  2;
        $videos = new video(); // Use the correct case for the model name
        $videos->judul = $request->judul; // Assign values to the properties of the model
        $videos->deskripsi = $request->deskripsi;
        $videos->parent_id = $request->album;
        $videos->file_path = $request->file_path->store('videos', 'public');
        $videos->type_id = $type;


        if ($request->status == 0 && $request->scheduled_at) {
            if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                $videos->draft = false;
                $videos->published_at = $request->scheduled_at;
                $videos->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $videos->draft = true;
                $videos->published_at = Carbon::parse($request->scheduled_at);
                $videos->scheduled_at = $request->scheduled_at;
            }
        }
        if ($request->status == 1) {
            $videos->published_at = null;
            $videos->scheduled_at = null;
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $videos->draft = false;
                    $videos->published_at = $request->scheduled_at;
                    $videos->scheduled_at = $request->scheduled_at;
                } else {
                    $videos->draft = true;
                    $videos->published_at = null;
                    $videos->scheduled_at = $request->scheduled_at;
                }
            } else {
                $videos->draft = false;
                $videos->published_at = Carbon::now();
                $videos->scheduled_at = null;
            }
        }

        $videos->save();

        return redirect("/video/crud?id=$videos->parent_id")->with('success', 'Image added to gallery successfully.');
    }
    public function edit(albumvideo $album, $id)
    {
        $galery = video::find($id);
        $albums = albumvideo::all();
        return view('video.edit', compact('galery', 'album', 'albums'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'scheduled_at' => 'required ',
            // 'file_path' => 'gif,mp4,avi,mov|max:20480',
        ]);



        $videos = video::find($id);
        $type = 2;
        $videos->type_id = $type;
        $videos->judul = $request->judul;
        $videos->deskripsi = $request->deskripsi;
        $videos->parent_id = $request->album;
        if ($request->hasFile('file_path')) {
            $videos->file_path = $request->file_path->store('videos', 'public');
        }
        if ($request->status == 0 && $request->schedule) {
            if (Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
                $videos->draft = 0;
                $videos->published_at = $request->scheduled_at;
                $videos->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $videos->draft = 1;
                $videos->published_at = Carbon::parse($request->scheduled_at);
                $videos->scheduled_at = $request->scheduled_at;
            }
        }
        if ($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
            $videos->draft = 1;
            $videos->published_at = null;
            $videos->scheduled_at = null;
            if ($request->status == 1  && Carbon::parse($request->scheduled_at)->gt(Carbon::now())) {
                $videos->draft = 1;
                $videos->published_at = null;
                $videos->scheduled_at = null;
            }
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $videos->draft = 0;
                    $videos->published_at = $request->scheduled_at;
                    $videos->scheduled_at = $request->scheduled_at;
                } else {
                    $videos->draft = 1;
                    $videos->published_at = null;
                    $videos->scheduled_at = $request->scheduled_at;
                }
            } else {
                $videos->draft = 0;
                if ($request->status == 1) {
                    $videos->draft = 1;
                }
                $videos->published_at = Carbon::now();
                $videos->scheduled_at = null;
            }
        }

        $videos->save();
        return redirect("/video/crud?id=$videos->parent_id")->with('Success', 'Galery telah di perbarui');
    }


    public function destroy($id)
    {
        $videos = video::find($id);
        $videos->delete();
        return redirect("/video/crud?id=$videos->parent_id")->with('success', 'Galery berhasil dihapus');
    }
}
