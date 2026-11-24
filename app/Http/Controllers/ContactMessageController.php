<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'pesan' => 'required|string|max:1000',
        ]);

        ContactMessage::create($data);

        return back()->with('contact_success', 'Pesan kamu berhasil dikirim. Terima kasih!');
    }

    public function update(Request $request, $id)
    {
        $contact = ContactMessage::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'pesan' => 'required|string|max:1000',
        ]);

        $contact->update($data);

        return redirect()->to(route('admin.dashboard').'#contact-konten')
            ->with('success', 'Pesan kontak berhasil diperbarui.')
            ->with('updated', ['type' => 'contact', 'id' => $contact->id]);
    }

    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->delete();

        return back()->with('success', 'Pesan kontak berhasil dihapus.');
    }
}
