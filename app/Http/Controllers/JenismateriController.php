<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\modul;
use App\Models\jenismateri;
use App\Models\materi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Jorenvh\Share\Share;

class JenismateriController extends Controller
{
    public function index()
    {
        $materies = jenismateri::all();
        // Contoh penulisan yang benar
        $materies = jenismateri::with('categories')->orderBy('created_at', 'desc')->get();

        $categories = Category::all();

        if (request('category')) {
            $materies = jenismateri::whereHas('categories', function ($query) {
                $query->where('slug', request('category'));
            });
        }
        return view('jenis_materi.index', [
            'materies' => $materies->where('draft',0)->paginate(5),
            'categories' => $categories
        ]);
    }
    public function crud(Request $request)
    {
        $q = $request->input('q');
        $query = jenismateri::where('judul', 'like', '%' . $q . '%')
            ->orWhereHas('categories', function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            })
            ->orderBy('created_at', 'desc');

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $moduls = $query->paginate($perPage);
        $moduls->startingIndex = $startingIndex;
        $moduls->appends(['q' => $q]);

        return view('jenis_materi.crud', compact('moduls', 'q'));
    }
    public function create()
    {

        $categories = Category::all();
        return view('jenis_materi.create', compact('categories'));
    }

    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'category_id' => 'required|exists:categories,id',
            'scheduled_at' => 'required'

        ]);
        $user = auth()->user();
        $modul = new jenismateri;
        $modul->judul = $request->judul;
        $modul->deskripsi = $request->deskripsi;
        $modul->category_id = $request->category;
        $modul->user_id = $user->id;
        // $tagIds = $request->input('tags');

        // $article->tags()->attach($article->id, $tagIds);
        //   if (!empty($kategori)) {
        //     $article->categories()->create(['nama' => $kategori]);
        // }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $modul->image_path = 'images/' . $imageName;
        }



        if ($request->status == 0 && $request->scheduled_at) {
            if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                $modul->draft = false;
                $modul->published_at = $request->scheduled_at;
                $modul->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $modul->draft = true;
                $modul->published_at = Carbon::parse($request->scheduled_at);
                $modul->scheduled_at = $request->scheduled_at;
            }
        }
        // if ($request->status == 1) {
        //     $article->published_at = null;
        //     $article->scheduled_at = null;
        // }
        else {
            if ($request->status == 1 && $request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $modul->draft = true;
                    $modul->published_at = null;
                    $modul->scheduled_at = null;
                } else {
                    $modul->draft = true;
                    $modul->published_at = null;
                    $modul->scheduled_at = $request->scheduled_at;
                }
            } else {
                $modul->draft = false;
                $modul->published_at = Carbon::now();
                $modul->scheduled_at = null;
            }
        }
        $modul->save();


        return redirect()->route('modul.crud');
    }

    public function detail($id)
    {
        // $article = DB::table('articles')->where('id', $id)->first();
        // $modul = jenismateri::with('categories')->get();
        // $categories = Category::all();
        // $modul = jenismateri::with('user')->get();
        // $modul = jenismateri::find($id);
        // $recents = jenismateri::latest()->limit(6)->orderBy('created_at', 'desc')->get();



        // // $previousArticleId = Article::where('id', '>', $id)->max('id');
        // // $nextArticleId = Article::where('id', '<', $id)->min('id');
        // $viewedKey = 'article_' . $id . '_viewed';

        // if (!session($viewedKey)) {
        //     $modul->incrementViews();

        //     // Tandai artikel sudah dilihat dalam sesi
        //     session([$viewedKey => true]);
        // }

        // $isi = [
        //     $modul->intro,
        // ];

        // $share = new Share();
        // $Buttons = $share->page(
        //     url("/article/detail/$id"),
        //     $modul->judul,
        // )
        //     ->facebook()
        //     ->whatsapp()
        //     ->linkedin()
        //     ->telegram();
        // $modul = jenismateri::all();

        return view(
            'jenis_materi.detail',
            // compact('article', 'articles', 'recents', 'previousArticleId', 'nextArticleId', 'categories', 'Buttons')
        );
    }

    public function edit($id)
    {
        $modul = jenismateri::find($id);
        $categories = Category::all();
        return view('jenis_materi.edit', compact('modul', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'category_id' => 'required|exists:categories,id',
            'scheduled_at' => 'required'

        ]);

        $modul = materi::find($id);
        $modul->judul = $request->judul;
        $modul->deskripsi = $request->deskripsi;
        $modul->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Hapus gambar lama jika ada
            if ($modul->image_path && Storage::exists('public/' . $modul->image_path)) {
                Storage::delete('public/' . $modul->image_path);
            }

            $modul->image_path = 'images/' . $imageName;
        }

        // Set waktu jadwal dan published_at sesuai dengan kondisi

        if ($request->status == 0 && $request->schedule) {
            if (Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
                $modul->draft = 0;
                $modul->published_at = $request->scheduled_at;
                $modul->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $modul->draft = 1;
                $modul->published_at = Carbon::parse($request->scheduled_at);
                $modul->scheduled_at = $request->scheduled_at;
            }
        }
        if ($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
            $modul->draft = 1;
            $modul->published_at = null;
            $modul->scheduled_at = null;
            if ($request->status == 1  && Carbon::parse($request->scheduled_at)->gt(Carbon::now())) {
                $modul->draft = 1;
                $modul->published_at = null;
                $modul->scheduled_at = null;
            }
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $modul->draft = 0;
                    $modul->published_at = $request->scheduled_at;
                    $modul->scheduled_at = $request->scheduled_at;
                } else {
                    $modul->draft = 1;
                    $modul->published_at = null;
                    $modul->scheduled_at = $request->scheduled_at;
                }
            } else {
                $modul->draft = 0;
                if ($request->status == 1) {
                    $modul->draft = 1;
                }
                $modul->published_at = Carbon::now();
                $modul->scheduled_at = null;
                // dd($modul);
            }
        }

        $modul->save();
        return redirect('/materi/crud')->with('success', 'Artikel berhasil diperbarui');
    }


    public function destroy($id)
    {
        $modul = jenismateri::find($id);
        $modul->delete();

        return redirect('/')->with('success', 'Artikel berhasil dihapus');
    }
}
