<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\jenismateri;
use App\Models\materi;
use App\Models\submateri;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Jorenvh\Share\Share;

class MateriController extends Controller
{

    public function index($id)
    {
        $materies = materi::where('parent_id', request('id'))->orderBy('created_at', 'desc')->get();
        return view('backend.materi.index', compact('materies'));
    }
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = materi::where('judul', 'like', '%' . $q . '%')
            ->orWhere('intro', 'like', '%' . $q . '%')
            // ->orWhereHas('categories', function ($query) use ($q) {
            //     $query->where('name', 'like', '%' . $q . '%');
            // })
            ->orderBy('created_at', 'desc');

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;
        $id = request('id');
        $materies = $query->paginate($perPage);
        $materies->startingIndex = $startingIndex;
        $materies->appends(['q' => $q]);

        return view('backend.materi.crud', compact('materies', 'q', 'id'));
    }
    public function create($id)
    {
        $module = jenismateri::find($id);
        $categories = Category::all();
        return view('backend.materi.create', compact('categories','module'));
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'intro' => 'required',
            'category_id' => 'required|exists:categories,id',
            'scheduled_at' => 'required'

        ]);
        $user = auth()->user();
        $materi = new materi();
        $materi->judul = $request->judul;
        $materi->parent_id = $request->module;
        $materi->intro = $request->intro;
        $materi->deskripsi = $request->deskripsi;
        $materi->category_id = $request->category_id;
        $materi->user_id = $user->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $materi->image_path = 'images/' . $imageName;
        }
        if ($request->status == 0 && $request->scheduled_at) {
            if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                $materi->draft = false;
                $materi->published_at = $request->scheduled_at;
                $materi->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $materi->draft = true;
                $materi->published_at = Carbon::parse($request->scheduled_at);
                $materi->scheduled_at = $request->scheduled_at;
            }
        } else {
            if ($request->status == 1 && $request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $materi->draft = true;
                    $materi->published_at = null;
                    $materi->scheduled_at = null;
                } else {
                    $materi->draft = true;
                    $materi->published_at = null;
                    $materi->scheduled_at = $request->scheduled_at;
                }
            } else {
                $materi->draft = false;
                $materi->published_at = Carbon::now();
                $materi->scheduled_at = null;
            }
        }
        $materi->save();


        return redirect("/materi/crud?id=$materi->parent_id");
    }

    public function detail($id)
    {
        // $article = DB::table('articles')->where('id', $id)->first();
        $materi = materi::with('categories')->get();
        $categories = Category::all();
        $materi = materi::with('user')->get();
        $materi = materi::find($id);
        $recents = materi::latest()->limit(6)->orderBy('created_at', 'desc')->get();
        $viewedKey = 'materi_' . $id . '_viewed';
        if (!session($viewedKey)) {
            $materi->incrementViews();

            // Tandai artikel sudah dilihat dalam sesi
            session([$viewedKey => true]);
        }

        $isi = [
            'intro' => $materi->intro,
        ];

        $share = new Share();
        $Buttons = $share->page(
            url("/materi/detail/$id"),
            $materi->judul,
        )
            ->facebook()
            ->whatsapp()
            ->linkedin()
            ->telegram();

        $materies = materi::all();

        return view('materis.detail', compact('materi', 'materies', 'recents', 'previousMateriId', 'nextMateriId', 'categories', 'Buttons'));
    }

    public function edit($id)
    {
        $materi = materi::find($id);
        $categories = Category::all();
        return view('backend.materi.edit', compact('materi', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'intro' => 'required',
            'category_id' => 'required|exists:categories,id',
            'scheduled_at' => 'required'

        ]);



        // if ($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
        //     return back()->with('erorr', 'For draft, pl');
        // }
        $materi = materi::find($id);
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->intro = $request->intro;
        $materi->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Hapus gambar lama jika ada
            if ($materi->image_path && Storage::exists('public/' . $materi->image_path)) {
                Storage::delete('public/' . $materi->image_path);
            }

            $materi->image_path = 'images/' . $imageName;
        }

        // Set waktu jadwal dan published_at sesuai dengan kondisi

        if ($request->status == 0 && $request->schedule) {
            if (Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
                $materi->draft = 0;
                $materi->published_at = $request->scheduled_at;
                $materi->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $materi->draft = 1;
                $materi->published_at = Carbon::parse($request->scheduled_at);
                $materi->scheduled_at = $request->scheduled_at;
            }
        }
        if ($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
            $materi->draft = 1;
            $materi->published_at = null;
            $materi->scheduled_at = null;
            if ($request->status == 1  && Carbon::parse($request->scheduled_at)->gt(Carbon::now())) {
                $materi->draft = 1;
                $materi->published_at = null;
                $materi->scheduled_at = null;
            }
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $materi->draft = 0;
                    $materi->published_at = $request->scheduled_at;
                    $materi->scheduled_at = $request->scheduled_at;
                } else {
                    $materi->draft = 1;
                    $materi->published_at = null;
                    $materi->scheduled_at = $request->scheduled_at;
                }
            } else {
                $materi->draft = 0;
                if ($request->status == 1) {
                    $materi->draft = 1;
                }
                $materi->published_at = Carbon::now();
                $materi->scheduled_at = null;
                // dd($materi);
            }
        }

        $materi->save();
        return redirect('/materi/crud')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $materi = materi::find($id);
        $materi->delete();

        return redirect('/materi/crud')->with('success', 'Artikel berhasil dihapus');
    }
}
