<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (session('admin_login')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function adminEntry()
    {
        return session('admin_login')
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    }

    public function processLogin(Request $request)
    {
        $identifier = trim((string) $request->input('email', $request->input('username')));
        $password = (string) $request->input('password');

        if ($identifier === 'admin' && $password === '12345') {
            return $this->grantAdminAccess(config('app.admin_fallback_email'));
        }

        $user = $identifier !== '' ? User::where('email', $identifier)->first() : null;

        if ($user && Hash::check($password, $user->password)) {
            session([
                'user_login' => true,
                'user_email' => $user->email,
            ]);

            if ($user->is_admin || $user->email === config('app.admin_email')) {
                return $this->grantAdminAccess($user->email);
            }

            return redirect()->route('admin.login')
                ->with('error', 'Akun ini tidak memiliki akses admin.');
        }

        return redirect()->route('admin.login')->with('error', 'Login gagal');
    }

    private function grantAdminAccess(string $email)
    {
        session([
            'user_login' => true,
            'user_email' => $email,
            'admin_login' => true,
            'admin_email' => $email,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        $projects = Project::latest()->get();
        $messages = Message::latest()->get();
        $contacts = ContactMessage::latest()->get();
        $achievements = Achievement::where('kategori', 'sertifikat')->latest()->get();
        $experiences = Experience::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $articles = Article::latest()->get();
        $kategoriList = Article::KATEGORI;
        $groups = Profile::groups();
        $values = Profile::pluck('value', 'key');
        $defaults = Profile::defaults();
        $profileUpdatedAt = Profile::latest('updated_at')->value('updated_at');
        $pendidikan = Profile::pendidikan();
        $organisasi = Profile::organisasi();
        $skillTeknis = Profile::skillTeknis();
        $skillNonTeknis = Profile::skillNonTeknis();
        $teknologi = Profile::teknologi('HTML|CSS|JavaScript|PHP|Laravel|MySQL|Git');

        return view('admin.dashboard', compact(
            'projects',
            'messages',
            'contacts',
            'achievements',
            'experiences',
            'testimonials',
            'articles',
            'kategoriList',
            'groups',
            'values',
            'defaults',
            'profileUpdatedAt',
            'pendidikan',
            'organisasi',
            'skillTeknis',
            'skillNonTeknis',
            'teknologi'
        ));
    }

    public function profile()
    {
        return redirect()->to(route('admin.dashboard').'#profil-konten');
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'values' => 'array',
            'values.*' => 'nullable|string|max:5000',
            'items' => 'array',
            'items.*' => 'array',
            'items.*.*.nama' => 'nullable|string|max:255',
            'items.*.*.waktu' => 'nullable|string|max:255',
            'items.*.*.keterangan' => 'nullable|string|max:500',
            'items.*.*.persen' => 'nullable|integer|min:0|max:100',
            'foto_upload' => 'nullable|image|max:2048',
        ]);

        $defaults = Profile::defaults();

        foreach ($validated['values'] ?? [] as $key => $value) {
            if (! array_key_exists($key, $defaults)) {
                continue;
            }

            Profile::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $itemKeys = [
            'pendidikan' => 'pendidikan_items',
            'organisasi' => 'organisasi_items',
            'skill_teknis' => 'skill_teknis_items',
            'skill_non_teknis' => 'skill_non_teknis_items',
            'teknologi' => 'teknologi_items',
        ];

        $items = $request->input('items', []);

        foreach ($itemKeys as $group => $key) {
            if (! array_key_exists($group, $items)) {
                continue;
            }

            $rows = [];

            foreach ($items[$group] as $index => $row) {
                if (! is_numeric($index) || ! is_array($row)) {
                    continue;
                }

                $nama = trim($row['nama'] ?? '');

                if ($nama === '') {
                    continue;
                }

                $clean = ['nama' => $nama];

                if (array_key_exists('waktu', $row)) {
                    $clean['waktu'] = trim($row['waktu'] ?? '');
                }

                if (array_key_exists('keterangan', $row)) {
                    $clean['keterangan'] = trim($row['keterangan'] ?? '');
                }

                if (array_key_exists('persen', $row)) {
                    $clean['persen'] = (string) max(0, min(100, (int) ($row['persen'] ?? 0)));
                }

                $rows[] = $clean;
            }

            Profile::updateOrCreate(['key' => $key], ['value' => json_encode($rows, JSON_UNESCAPED_UNICODE)]);
        }

        if ($request->hasFile('foto_upload')) {
            $file = $request->file('foto_upload');
            $name = 'profil-'.time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('img'), $name);
            Profile::updateOrCreate(['key' => 'foto'], ['value' => $name]);
        }

        Profile::flushCache();

        return redirect()->to(route('admin.dashboard').'#profil-konten')
            ->with('success', 'Profil dan konten berhasil diperbarui.')
            ->with('updated', ['type' => 'profile']);
    }

    public function logout()
    {
        session()->forget(['user_login', 'user_email', 'admin_login', 'admin_email']);

        return redirect()->route('admin.login');
    }
}
