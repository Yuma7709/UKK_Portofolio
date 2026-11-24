<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleAdminController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    public function create()
    {
        return redirect()->route('admin.dashboard');
    }

    public function store(Request $request)
    {
        Article::create($this->data($request));

        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Article $article)
    {
        return redirect()->route('admin.dashboard');
    }

    public function update(Request $request, Article $article)
    {
        $data = $this->data($request, $article);

        // hapus gambar lama kalau diganti
        if (isset($data['gambar']) && $article->gambar) {
            @unlink(public_path('img/'.$article->gambar));
        }

        $article->update($data);

        return redirect()->to(route('admin.dashboard').'#blog-konten')
            ->with('success', 'Artikel berhasil diperbarui.')
            ->with('updated', ['type' => 'blog', 'id' => $article->id]);
    }

    public function destroy(Article $article)
    {
        if ($article->gambar) {
            @unlink(public_path('img/'.$article->gambar));
        }

        $article->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil dihapus.');
    }

    private function data(Request $request, ?Article $article = null): array
    {
        $data = $request->validate([
            'judul' => 'required|max:150',
            'kategori' => ['required', Rule::in(Article::KATEGORI)],
            'ringkasan' => 'required|max:300',
            'isi' => 'required',
            'tags' => 'nullable|max:150',
            'gambar' => 'nullable|image|max:3072',
        ]);

        $data['published'] = $request->boolean('published');

        if (! $article || $article->judul !== $data['judul']) {
            $data['slug'] = $this->uniqueSlug($data['judul'], $article?->id);
        }

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $name = 'blog-'.time().'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $name);
            $data['gambar'] = $name;
        } else {
            unset($data['gambar']);
        }

        return $data;
    }

    private function uniqueSlug(string $judul, ?int $ignoreId = null): string
    {
        $base = Str::slug($judul) ?: 'artikel';
        $slug = $base;
        $i = 2;

        while (Article::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}
