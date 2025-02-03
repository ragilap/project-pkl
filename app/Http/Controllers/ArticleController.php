<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\albumvideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Article;
use App\Models\imageslider;

use App\Models\SocialTeam;
use App\Models\team;
use App\Models\type;
use Illuminate\Support\Carbon;
use Jorenvh\Share\Share;

class ArticleController extends Controller
{
    public function home()
    {
        $articles = Article::with('categories')->latest()->take(6)->get();
        $galeries['album'] = Album::latest()->take(6)->get();
        $galeries['video'] = albumvideo::with('video')->latest()->take(6)->get();
        $categories = Category::all();
        $types = type::all();
        
        $teams = team::orderBy('order', 'desc')->get();
        $sliders = imageslider::orderBy('order', 'desc')->get();
        $socialteams = Team::with('SocialTeam')->get();
        $seemore = type::find(1);
        $morevideo = type::find(2);
        return view('articles.home', compact('articles','morevideo', 'galeries', 'categories', 'types', 'sliders', 'teams', 'socialteams','seemore'));
    }

    public function index()
    {
        $categories = Category::all();
        $articles = Article::with('categories')->orderBy('created_at', 'desc');
        $recents = Article::latest()->limit(6)->get();
        if (request('category')) {
            $articles = Article::whereHas('categories', function ($query) {
                $query->where('slug', request('category'));
            });
        }

        if (request('sort') == 'latest') {
            $articles = Article::orderBy('created_at', 'desc');
        }

        if (request('sort') == 'last') {
            $articles = Article::orderBy('created_at', 'asc');
        }

        return view('articles.index', [
            'articles' => $articles->where('draft', 0)->paginate(6),
            'recents' => $recents,
            'categories' => $categories,
            'request' => request('sort'),
        ]);
    }

    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = Article::where('judul', 'like', '%' . $q . '%')
            ->orWhere('intro', 'like', '%' . $q . '%')
            ->orWhereHas('categories', function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%');
            })
            ->orderBy('created_at', 'desc');

        $perPage = 5;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $articles = $query->paginate($perPage);
        $articles->startingIndex = $startingIndex;
        $articles->appends(['q' => $q]);

        return view('articles.editadmin', compact('articles', 'q'));
    }
    public function create()
    {

        $categories = Category::all();
        return view('articles.create', compact('categories'));
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
        $article = new Article;
        $article->judul = $request->judul;
        $article->deskripsi = $request->deskripsi;

        $article->intro = $request->intro;
        $article->category_id = $request->category_id;
        $article->user_id = $user->id;
        // $tagIds = $request->input('tags');

        // $article->tags()->attach($article->id, $tagIds);
        //   if (!empty($kategori)) {
        //     $article->categories()->create(['nama' => $kategori]);
        // }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $article->image_path = 'images/' . $imageName;
        }



        if ($request->status == 0 && $request->scheduled_at) {
            if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                $article->draft = false;
                $article->published_at = $request->scheduled_at;
                $article->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $article->draft = true;
                $article->published_at = Carbon::parse($request->scheduled_at);
                $article->scheduled_at = $request->scheduled_at;
            }
        }
        // if ($request->status == 1) {
        //     $article->published_at = null;
        //     $article->scheduled_at = null;
        // }
        else {
            if ($request->status == 1 && $request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $article->draft = true;
                    $article->published_at = null;
                    $article->scheduled_at = null;
                } else {
                    $article->draft = true;
                    $article->published_at = null;
                    $article->scheduled_at = $request->scheduled_at;
                }
            } else {
                $article->draft = false;
                $article->published_at = Carbon::now();
                $article->scheduled_at = null;
            }
        }
        $article->save();


        return redirect()->route('article.crud');
    }

    public function detail($id)
    {
        // $article = DB::table('articles')->where('id', $id)->first();
        $article = Article::with('categories')->get();
        $categories = Category::all();
        $article = Article::with('user')->get();
        $article = Article::find($id);
        $recents = Article::latest()->limit(6)->orderBy('created_at', 'desc')->get();

        $nextArticleId  = Article::where('created_at', '<', $article->created_at)
            ->orderBy('created_at', 'desc')
            ->first();

        // Mendapatkan artikel berikutnya berdasarkan created_at
        $previousArticleId  = Article::where('created_at', '>', $article->created_at)
            ->orderBy('created_at')
            ->first();


        // $previousArticleId = Article::where('id', '>', $id)->max('id');
        // $nextArticleId = Article::where('id', '<', $id)->min('id');
        $viewedKey = 'article_' . $id . '_viewed';

        if (!session($viewedKey)) {
            $article->incrementViews();

            // Tandai artikel sudah dilihat dalam sesi
            session([$viewedKey => true]);
        }

        $isi = [
            'intro' => $article->intro,
        ];

        $share = new Share();
        $Buttons = $share->page(
            url("/article/detail/$id"),
            $article->judul,
        )
            ->facebook()
            ->whatsapp()
            ->linkedin()
            ->telegram();

        $articles = Article::all();

        return view('articles.detail', compact('article', 'articles', 'recents', 'previousArticleId', 'nextArticleId', 'categories', 'Buttons'));
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
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
        $article = Article::find($id);
        $article->judul = $request->judul;
        $article->deskripsi = $request->deskripsi;
        $article->intro = $request->intro;
        $article->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            // Hapus gambar lama jika ada
            if ($article->image_path && Storage::exists('public/' . $article->image_path)) {
                Storage::delete('public/' . $article->image_path);
            }

            $article->image_path = 'images/' . $imageName;
        }

        // Set waktu jadwal dan published_at sesuai dengan kondisi

        if ($request->status == 0 && $request->schedule) {
            if (Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
                $article->draft = 0;
                $article->published_at = $request->scheduled_at;
                $article->scheduled_at = $request->scheduled_at;
            } else {
                // Jika status publish dan ada jadwal, set sebagai draft
                $article->draft = 1;
                $article->published_at = Carbon::parse($request->scheduled_at);
                $article->scheduled_at = $request->scheduled_at;
            }
        }
        if ($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
            $article->draft = 1;
            $article->published_at = null;
            $article->scheduled_at = null;
            if ($request->status == 1  && Carbon::parse($request->scheduled_at)->gt(Carbon::now())) {
                $article->draft = 1;
                $article->published_at = null;
                $article->scheduled_at = null;
            }
        } else {
            if ($request->scheduled_at) {
                if (Carbon::parse($request->scheduled_at)->lte(Carbon::now())) {
                    $article->draft = 0;
                    $article->published_at = $request->scheduled_at;
                    $article->scheduled_at = $request->scheduled_at;
                } else {
                    $article->draft = 1;
                    $article->published_at = null;
                    $article->scheduled_at = $request->scheduled_at;
                }
            } else {
                $article->draft = 0;
                if ($request->status == 1) {
                    $article->draft = 1;
                }
                $article->published_at = Carbon::now();
                $article->scheduled_at = null;
                // dd($article);
            }
        }

        $article->save();
        return redirect('/admin')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/admin')->with('success', 'Artikel berhasil dihapus');
    }
}
