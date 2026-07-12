<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        ContactMessage::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return back();
    }

    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->delete();

        return back();
    }
}