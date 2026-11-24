<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required|in:pkl,organisasi,kepanitiaan,lomba',
            'judul' => 'nullable|string|max:255|required_if:kategori,kepanitiaan',
            'instansi' => 'required|string|max:255',
            'periode' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = uniqid('exp_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);
            $data['gambar'] = $nama;
        }

        Experience::create($data);

        return back()->with('success', 'Pengalaman berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $item = Experience::findOrFail($id);

        $data = $request->validate([
            'kategori' => 'required|in:pkl,organisasi,kepanitiaan,lomba',
            'judul' => 'nullable|string|max:255|required_if:kategori,kepanitiaan',
            'instansi' => 'required|string|max:255',
            'periode' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = uniqid('exp_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);

            if ($item->gambar && file_exists(public_path('img/'.$item->gambar))) {
                @unlink(public_path('img/'.$item->gambar));
            }

            $data['gambar'] = $nama;
        }

        $item->update($data);

        return redirect()->to(route('admin.dashboard').'#experience-konten')
            ->with('success', 'Pengalaman berhasil diperbarui.')
            ->with('updated', ['type' => 'experience', 'id' => $item->id]);
    }

    public function destroy($id)
    {
        $item = Experience::findOrFail($id);

        if ($item->gambar && file_exists(public_path('img/'.$item->gambar))) {
            @unlink(public_path('img/'.$item->gambar));
        }

        $item->delete();

        return back()->with('success', 'Pengalaman berhasil dihapus.');
    }
}
