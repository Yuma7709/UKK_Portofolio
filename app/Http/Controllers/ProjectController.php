<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;
class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $messages = Message::latest()->get();
        return view('portfolio', compact(
            'projects',
            'messages'
        ));
    }
    public function store(Request $request)
    {
        $gambar = null;
        if ($request->hasFile('gambar')) {
            try {
                $gambar = time() . '.' .
                    $request->gambar->extension();
                $request->gambar->move(
                    public_path('img'),
                    $gambar
                );
            } catch (\Exception $e) {
                $gambar = null;
            }
        }
        Project::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
            'teknologi' => $request->teknologi,
        ]);
        return back()->with(
            'sukses',
            'Project berhasil ditambahkan'
        );
    }
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'teknologi' => $request->teknologi,
        ];
        if ($request->hasFile('gambar')) {
            try {
                $gambar = time() . '.' .
                    $request->gambar->extension();
                $request->gambar->move(
                    public_path('img'),
                    $gambar
                );
                $data['gambar'] = $gambar;
            } catch (\Exception $e) {
            }
        }
        $project->update($data);
        return back()->with(
            'sukses',
            'Project berhasil diupdate'
        );
    }
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        return back()->with(
            'sukses',
            'Project berhasil dihapus'
        );
    }
}