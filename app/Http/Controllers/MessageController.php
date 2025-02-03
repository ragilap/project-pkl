<?php

namespace App\Http\Controllers;

use App\Models\message;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function crud(Request $request)
    {
        $q = $request->input('q');

        $query = message::where('name', 'like', '%' . $q . '%')->orderBy('created_at', 'desc');
        // ->orWhere('intro', 'like', '%' . $q . '%')

        $perPage = 10;

        $currentPage = $request->query('page', 1);
        $startingIndex = ($currentPage - 1) * $perPage;

        // $messages = message::all();
        $messages = $query->paginate($perPage);
        $messages->appends(['q' => $q]);

        $messages->startingIndex = $startingIndex;
        // Contoh menggunakan Eloquent untuk mendapatkan pesan yang belum dibaca
        $unreadMessages = Message::where('id')
        ->where('haveread', false)->get();
        return view('about.message.crud', compact('messages', 'q', 'startingIndex', 'unreadMessages'));
    }

    public function openinbox($id)
    {
        $message = message::find($id);
        $message->update(['haveread' => true]);

        $nextMessage  = message::where('created_at', '<', $message->created_at)
            ->orderBy('created_at', 'desc')
            ->first();

        // Mendapatkan artikel berikutnya berdasarkan created_at
        $previousMessage = message::where('created_at', '>', $message->created_at)
            ->orderBy('created_at')
            ->first();
        // dd($previousMessage);

        // $previousArticleId = Article::where('id', '>', $id)->max('id');
        // $nextArticleId = Article::where('id', '<', $id)->min('id');

        $isi = [
            'subject' => $message->subject,
        ];
        return view('about.message.detail', compact('message', 'previousMessage', 'nextMessage'));
    }

    public function MarkAsRead(Request $request, $id)
    {
        $message = message::find($id);
        $message->update([
            'haveread' => 1
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pesan berhasil di baca'
        ], 200);
    }

    public function UnreadMark(Request $request, $id)
    {
        $message = message::find($id);
        $message->update([
            'haveread' => 0
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pesan berhasil di baca'
        ], 200);
    }

    public function create()
    {
        return view('about.information.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message['haveread'] = false;
        $message->save();

        return redirect('/info/index')->with('success', 'Your message has been sent. Thank you!');
    }

    public function destroy(Request $request, $id)
    {
        $message = message::find($id);
        $message->delete();

        if ($request->isJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Pesan Berhasil Dihapus'
            ], 200);
        }

        return redirect('/message/crud')->with('success', 'pesan berhasil di hapus');
    }
    // public function delete(Request $request,$id)
    // {
    //     $message = message::find($id);
    //     $message = $request->MarkAsRead;
    //     $message->delete();
    //     return redirect('/message/crud')->with('Success', 'pesan berhasil di hapus');
    // }
}
