<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\materi;
use App\Models\submateri;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Jorenvh\Share\Share;

class SubmateriController extends Controller
{
    public function index()
    {
        $submateries = submateri::where('parent_id', request('id'))->orderBy('order', 'desc')->get();
        // $submateries = submateri::find('id');
        // $next = submateri::where('order', '<', $submateries->order)
        //     ->orderBy('order', 'desc')
        //     ->first();

        // // Mendapatkan artikel berikutnya berdasarkan created_at
        // $previous  = submateri::where('order', '>', $submateries->order)
        //     ->orderBy('order')
        //     ->first();

        return view('backend.materi.sub_materi.index', compact('submateries'));
    }
    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = submateri::where('judul', 'like', '%' . $q . '%')
            ->orderBy('created_at', 'desc');

        $perPage = 5;
        $submateri = submateri::where('parent_id', request('id'))->orderBy('created_at', 'desc')->get();

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        $id = request('id');
        $submateries = $query->paginate($perPage);
        $submateries->startingIndex = $startingIndex;
        $submateries->appends(['q' => $q]);

        return view('backend.materi.sub_materi.crud', compact('submateries', 'q', 'id'));
    }
    public function create($id)
    {
        // $submateri = $id;
        $materi = materi::find($id);
        $categories = Category::all();
        return view('backend.materi.sub_materi.create', compact('categories', 'materi'));
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',


        ]);
        $user = auth()->user();
        $submateri = new submateri();
        $submateri->judul = $request->judul;
        $submateri->parent_id = $request->materi;
        $submateri->category_id = $request->category_id;
        $submateri->deskripsi = $request->deskripsi;
        $submateri->type_id = $request->type;
        $submateri->user_id = $user->id;
        $submateri->save();


        return redirect("/sub-materi/crud?id=$submateri->parent_id")->with('success', 'materi telah di tambahkan');
    }

    public function detail($id)
    {
        // $article = DB::table('articles')->where('id', $id)->first();
        $submateri = submateri::with('categories')->get();
        $categories = Category::all();
        $submateri = submateri::with('user')->get();
        $submateri = submateri::find($id);
        $recents = submateri::latest()->limit(6)->orderBy('created_at', 'desc')->get();
        $viewedKey = 'materi_' . $id . '_viewed';
        if (!session($viewedKey)) {
            $submateri->incrementViews();

            // Tandai artikel sudah dilihat dalam sesi
            session([$viewedKey => true]);
        }

        $isi = [
            'intro' => $submateri->intro,
        ];

        $share = new Share();
        $Buttons = $share->page(
            url("/materi/detail/$id"),
            $submateri->judul,
        )
            ->facebook()
            ->whatsapp()
            ->linkedin()
            ->telegram();

        $submateries  = submateri::all();

        return view('backend.materi.sub_materi.detail', compact('materi', 'materies', 'recents', 'previousMateriId', 'nextMateriId', 'categories', 'Buttons'));
    }

    public function edit($id)
    {
        $materi = submateri::find($id);
        $categories = Category::all();
        return view('backend.materi.sub_materi.edit', compact('materi', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',

        ]);



        // if ($request->status == 1  && Carbon::parse($request->scheduled_at)->lt(Carbon::now())) {
        //     return back()->with('erorr', 'For draft, pl');
        // }
        $submateri = submateri::find($id);
        $submateri->judul = $request->judul;
        $submateri->parent_id = $request->materi;
        $submateri->deskripsi = $request->deskripsi;
        $submateri->type_id = $request->type_id;
        $submateri->save();
        return redirect('/sub-materi/crud')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $submateri = submateri::find($id);
        $submateri->delete();

        return redirect("/sub-materi/crud?id=$submateri->parent_id")->with('success', 'Artikel berhasil dihapus');
    }
}
