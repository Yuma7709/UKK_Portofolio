<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required|in:sertifikat',
            'judul' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'tahun' => 'nullable|string|max:10',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|url',
            'gambar' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = uniqid('ach_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);
            $data['gambar'] = $nama;
        }

        Achievement::create($data);

        return back()->with('success', 'Data berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $item = Achievement::findOrFail($id);

        $data = $request->validate([
            'kategori' => 'required|in:sertifikat',
            'judul' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'tahun' => 'nullable|string|max:10',
            'deskripsi' => 'nullable|string',
            'link' => 'nullable|url',
            'gambar' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = uniqid('ach_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);

            if ($item->gambar && file_exists(public_path('img/'.$item->gambar))) {
                @unlink(public_path('img/'.$item->gambar));
            }

            $data['gambar'] = $nama;
        }

        $item->update($data);

        return redirect()->to(route('admin.dashboard').'#achievement-konten')
            ->with('success', 'Data berhasil diperbarui.')
            ->with('updated', ['type' => 'achievement', 'id' => $item->id]);
    }

    public function destroy($id)
    {
        $item = Achievement::findOrFail($id);

        if ($item->gambar && file_exists(public_path('img/'.$item->gambar))) {
            @unlink(public_path('img/'.$item->gambar));
        }

        $item->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
