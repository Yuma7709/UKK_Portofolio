<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function storePublic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'testi_nama' => 'required|string|max:100',
            'testi_kategori' => 'required|in:guru,teman,pengguna,pkl',
            'testi_rating' => 'required|integer|min:1|max:5',
            'testi_isi' => 'required|string|max:1000',
            'testi_foto' => 'nullable|image|max:2048',
        ], [
            'testi_nama.required' => 'Nama wajib diisi.',
            'testi_kategori.required' => 'Peran wajib dipilih.',
            'testi_rating.required' => 'Penilaian wajib dipilih.',
            'testi_isi.required' => 'Testimoni wajib diisi.',
            'testi_isi.max' => 'Testimoni maksimal 1000 karakter.',
            'testi_foto.image' => 'Foto harus berupa gambar.',
            'testi_foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->to(route('portfolio').'#testimoni')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        $payload = [
            'kategori' => $data['testi_kategori'],
            'nama' => $data['testi_nama'],
            'isi' => $data['testi_isi'],
            'rating' => $data['testi_rating'],
        ];

        if ($request->hasFile('testi_foto')) {
            $file = $request->file('testi_foto');
            $nama = uniqid('testi_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);
            $payload['foto'] = $nama;
        }

        Testimonial::create($payload);

        return redirect()->to(route('portfolio').'#testimoni')
            ->with('testimonial_success', 'Terima kasih, testimoni kamu berhasil dikirim!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required|in:guru,teman,pengguna,pkl',
            'nama' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:150',
            'rating' => 'nullable|integer|min:1|max:5',
            'isi' => 'required|string|max:1000',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = uniqid('testi_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);
            $data['foto'] = $nama;
        }

        Testimonial::create($data);

        return back()->with('success', 'Testimoni berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $item = Testimonial::findOrFail($id);

        $data = $request->validate([
            'kategori' => 'required|in:guru,teman,pengguna,pkl',
            'nama' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:150',
            'rating' => 'nullable|integer|min:1|max:5',
            'isi' => 'required|string|max:1000',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = uniqid('testi_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);

            if ($item->foto && file_exists(public_path('img/'.$item->foto))) {
                @unlink(public_path('img/'.$item->foto));
            }

            $data['foto'] = $nama;
        }

        $item->update($data);

        return redirect()->to(route('admin.dashboard').'#testimonial-konten')
            ->with('success', 'Testimoni berhasil diperbarui.')
            ->with('updated', ['type' => 'testimonial', 'id' => $item->id]);
    }

    public function destroy($id)
    {
        $item = Testimonial::findOrFail($id);

        if ($item->foto && file_exists(public_path('img/'.$item->foto))) {
            @unlink(public_path('img/'.$item->foto));
        }

        $item->delete();

        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
