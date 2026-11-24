<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Article;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::latest()->get();
        $messages = Message::latest()->get();
        $achievements = Achievement::where('kategori', 'sertifikat')->latest()->get();
        $experiences = Experience::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $articles = Article::published()->latest()->take(3)->get();

        $visitorToken = $request->cookie('visitor_token') ?? session('visitor_token');

        if (! $visitorToken) {
            $visitorToken = (string) Str::uuid();
            session(['visitor_token' => $visitorToken]);
        }

        return response()
            ->view('portfolio', compact('projects', 'messages', 'achievements', 'experiences', 'visitorToken', 'testimonials', 'articles'))
            ->cookie('visitor_token', $visitorToken, 525600);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'teknologi' => 'nullable|string',
            'masalah' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'peran' => 'nullable|string|max:255',
            'link_demo' => 'nullable|url',
            'link_github' => 'nullable|url',
            'dokumentasi' => 'nullable|string',
            'detail' => 'nullable|string',
            'fitur' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = uniqid('proj_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);

            if ($project->gambar && file_exists(public_path('img/'.$project->gambar))) {
                @unlink(public_path('img/'.$project->gambar));
            }

            $data['gambar'] = $nama;
        }

        $project->update($data);

        return redirect()->to(route('admin.dashboard').'#project-konten')
            ->with('success', 'Proyek berhasil diupdate.')
            ->with('updated', ['type' => 'project', 'id' => $project->id]);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->gambar && file_exists(public_path('img/'.$project->gambar))) {
            @unlink(public_path('img/'.$project->gambar));
        }

        $project->delete();

        return back()->with('success', 'Proyek berhasil dihapus.');
    }

    public function show(Project $project)
    {
        return view('detail-project', compact('project'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'teknologi' => 'nullable|string',
            'masalah' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'peran' => 'nullable|string|max:255',
            'link_demo' => 'nullable|url',
            'link_github' => 'nullable|url',
            'dokumentasi' => 'nullable|string',
            'detail' => 'nullable|string',
            'fitur' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'galeri.*' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = uniqid('proj_').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $nama);
            $data['gambar'] = $nama;
        }

        $galeri = [];
        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $nama = uniqid('gal_').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('img'), $nama);
                $galeri[] = $nama;
            }
        }
        $data['galeri'] = implode(',', $galeri);

        Project::create($data);

        return back()->with('success', 'Proyek berhasil disimpan.');
    }

    public function cv()
    {
        $experiences = Experience::latest()->get();
        $achievements = Achievement::latest()->get();

        return view('cv', compact('experiences', 'achievements'));
    }
}
