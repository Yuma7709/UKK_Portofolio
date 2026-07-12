<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /*
    |-----------------------------------------
    | STORE MESSAGE (CREATE)
    |-----------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pesan' => 'required',
        ]);

        Message::create([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Message berhasil dikirim');
    }

    /*
    |-----------------------------------------
    | UPDATE MESSAGE (EDIT FIX ERROR KAMU)
    |-----------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'pesan' => 'required',
        ]);

        $message = Message::findOrFail($id);

        $message->update([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Message berhasil diupdate');
    }

    /*
    |-----------------------------------------
    | DELETE MESSAGE
    |-----------------------------------------
    */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message berhasil dihapus');
    }
}