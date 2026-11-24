<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['key', 'value'];

    protected static array $cache = [];

    public static function defaults(): array
    {
        return [
            'meta_title' => 'Yuma Portfolio | Front-End Developer',
            'meta_description' => 'Portofolio Yuma Achmad Fairuza, siswa PPLG SMKN 2 Banjarmasin yang fokus pada Front-End Development, UI/UX Design, dan Laravel.',
            'nama' => 'Yuma Achmad Fairuza',
            'role' => 'Front-End Developer',
            'kelas' => 'XII PPLG A',
            'kompetensi' => 'Pengembangan Perangkat Lunak dan Gim',
            'bio_singkat' => 'Siswa SMKN 2 Banjarmasin jurusan PPLG yang fokus pada Front-End Development, UI/UX Design, dan Laravel Development.',
            'tag_hero' => 'Front-End Development|Laravel|UI/UX Design',
            'foto' => 'Yuma.jpeg',
            'tentang_judul' => 'Tentang Saya',
            'tentang_subtitle' => 'Sedikit tentang diri saya',
            'sekolah' => 'SMKN 2 Banjarmasin',
            'domisili' => 'Banjarmasin',
            'minat' => 'Web Development, UI/UX Design, Laravel.',
            'tag_teknologi' => 'HTML|CSS|JavaScript|PHP|Laravel|MySQL',
            'skill_teknis' => 'HTML:90|CSS:85|JavaScript:70|PHP:75|Laravel:70|MySQL:70|UI/UX Design:65',
            'skill_non_teknis' => 'Komunikasi:80|Kerja Sama Tim:85|Kepemimpinan:75|Manajemen Waktu:75|Pemecahan Masalah:80|Adaptasi & Belajar Cepat:85',
            'pendidikan_1_nama' => 'SMKN 2 Banjarmasin',
            'pendidikan_1_waktu' => '2024 - Sekarang',
            'pendidikan_2_nama' => 'MTs Al-Huda',
            'pendidikan_2_waktu' => '2021 - 2024',
            'pendidikan_3_nama' => 'SDN Belitung Selatan 5',
            'pendidikan_3_waktu' => '2015 - 2021',
            'organisasi_nama' => 'OSIS SMKN 2 Banjarmasin',
            'organisasi_waktu' => '2024 - Sekarang',
            'cita_cita' => 'Menjadi Front-End Developer profesional yang mampu membuat tampilan modern dan pengalaman pengguna terbaik, serta terus belajar mengikuti perkembangan teknologi.',
            'keahlian_judul' => 'Keahlian',
            'keahlian_subtitle' => 'Kemampuan teknis dan non teknis saya',
            'project_judul' => 'Proyek',
            'project_subtitle' => 'Proyek yang pernah saya buat',
            'pencapaian_judul' => 'Sertifikat',
            'pencapaian_subtitle' => 'Sertifikat yang pernah saya peroleh',
            'pengalaman_judul' => 'Pengalaman',
            'pengalaman_subtitle' => 'Perjalanan PKL, organisasi, kepanitiaan, dan lomba yang pernah saya ikuti',
            'cv_judul' => 'CV Digital',
            'cv_subtitle' => 'Ringkasan riwayat dan kemampuan saya dalam satu halaman',
            'testimoni_judul' => 'Testimoni',
            'testimoni_subtitle' => 'Apa kata guru, teman, pengguna, dan tempat PKL tentang saya',
            'blog_judul' => 'Blog Pengembang',
            'blog_subtitle' => 'Catatan ngoding, tutorial singkat, dan dokumentasi penyelesaian masalah',
            'pesan_judul' => 'Kesan dan Pesan',
            'pesan_subtitle' => 'Bagikan kesan dan pesan kamu setelah melihat portofolio saya',
            'kontak_judul' => 'Hubungi Saya',
            'kontak_subtitle' => 'Hubungi saya melalui form atau sosial media',
            'email' => 'yumaachmad2@gmail.com',
            'whatsapp' => '088242814157',
            'whatsapp_link' => '6288242814157',
            'instagram' => '@yuma_rayhan',
            'github' => 'https://github.com/Yuma7709',
            'kontak_ajakan' => 'Silakan kirim pesan jika ingin kerja sama atau diskusi proyek.',
            'footer' => '© 2026 Yuma Achmad Fairuza — All Rights Reserved',
        ];
    }

    public static function groups(): array
    {
        return [
            [
                'title' => 'Identitas & Beranda',
                'fields' => [
                    ['key' => 'nama', 'label' => 'Nama Lengkap', 'type' => 'text'],
                    ['key' => 'role', 'label' => 'Role / Jabatan', 'type' => 'text'],
                    ['key' => 'kelas', 'label' => 'Kelas', 'type' => 'text'],
                    ['key' => 'kompetensi', 'label' => 'Kompetensi Keahlian', 'type' => 'text'],
                    ['key' => 'bio_singkat', 'label' => 'Bio Singkat', 'type' => 'textarea'],
                    ['key' => 'tag_hero', 'label' => 'Tag Beranda', 'type' => 'text', 'hint' => 'Pisahkan dengan tanda |'],
                    ['key' => 'foto', 'label' => 'Nama File Foto Profil', 'type' => 'text', 'hint' => 'File di folder public/img, atau unggah di bawah'],
                ],
            ],
            [
                'title' => 'Tentang Saya',
                'fields' => [
                    ['key' => 'tentang_judul', 'label' => 'Judul Section Tentang', 'type' => 'text'],
                    ['key' => 'tentang_subtitle', 'label' => 'Subtitle Section Tentang', 'type' => 'text'],
                    ['key' => 'sekolah', 'label' => 'Nama Sekolah', 'type' => 'text'],
                    ['key' => 'domisili', 'label' => 'Domisili', 'type' => 'text'],
                    ['key' => 'minat', 'label' => 'Minat', 'type' => 'textarea'],
                    ['key' => 'cita_cita', 'label' => 'Cita-cita & Tujuan Karir', 'type' => 'textarea'],
                ],
            ],
            [
                'title' => 'Keahlian',
                'fields' => [
                    ['key' => 'keahlian_judul', 'label' => 'Keahlian - Judul', 'type' => 'text'],
                    ['key' => 'keahlian_subtitle', 'label' => 'Keahlian - Subtitle', 'type' => 'text'],
                ],
            ],
            [
                'title' => 'Judul & Subtitle Section',
                'fields' => [
                    ['key' => 'project_judul', 'label' => 'Proyek - Judul', 'type' => 'text'],
                    ['key' => 'project_subtitle', 'label' => 'Proyek - Subtitle', 'type' => 'text'],
                    ['key' => 'pencapaian_judul', 'label' => 'Sertifikat - Judul', 'type' => 'text'],
                    ['key' => 'pencapaian_subtitle', 'label' => 'Sertifikat - Subtitle', 'type' => 'text'],
                    ['key' => 'pengalaman_judul', 'label' => 'Pengalaman - Judul', 'type' => 'text'],
                    ['key' => 'pengalaman_subtitle', 'label' => 'Pengalaman - Subtitle', 'type' => 'text'],
                    ['key' => 'cv_judul', 'label' => 'CV - Judul', 'type' => 'text'],
                    ['key' => 'cv_subtitle', 'label' => 'CV - Subtitle', 'type' => 'text'],
                    ['key' => 'testimoni_judul', 'label' => 'Testimoni - Judul', 'type' => 'text'],
                    ['key' => 'testimoni_subtitle', 'label' => 'Testimoni - Subtitle', 'type' => 'text'],
                    ['key' => 'blog_judul', 'label' => 'Blog - Judul', 'type' => 'text'],
                    ['key' => 'blog_subtitle', 'label' => 'Blog - Subtitle', 'type' => 'text'],
                    ['key' => 'pesan_judul', 'label' => 'Kesan & Pesan - Judul', 'type' => 'text'],
                    ['key' => 'pesan_subtitle', 'label' => 'Kesan & Pesan - Subtitle', 'type' => 'text'],
                    ['key' => 'kontak_judul', 'label' => 'Kontak - Judul', 'type' => 'text'],
                    ['key' => 'kontak_subtitle', 'label' => 'Kontak - Subtitle', 'type' => 'text'],
                ],
            ],
            [
                'title' => 'Kontak & Lainnya',
                'fields' => [
                    ['key' => 'email', 'label' => 'Email', 'type' => 'text'],
                    ['key' => 'whatsapp', 'label' => 'Nomor WhatsApp (tampilan)', 'type' => 'text'],
                    ['key' => 'whatsapp_link', 'label' => 'Nomor WhatsApp (link wa.me)', 'type' => 'text', 'hint' => 'Tanpa tanda +, misal 6288242814157'],
                    ['key' => 'instagram', 'label' => 'Instagram', 'type' => 'text'],
                    ['key' => 'github', 'label' => 'Link GitHub', 'type' => 'text', 'hint' => 'Contoh: https://github.com/Yuma7709'],
                    ['key' => 'kontak_ajakan', 'label' => 'Teks Ajakan Kontak', 'type' => 'textarea'],
                    ['key' => 'footer', 'label' => 'Teks Footer', 'type' => 'text'],
                    ['key' => 'meta_title', 'label' => 'Judul Tab Browser', 'type' => 'text'],
                    ['key' => 'meta_description', 'label' => 'Deskripsi Meta', 'type' => 'textarea'],
                ],
            ],
        ];
    }

    public static function items(string $key, array $fallback = []): array
    {
        $raw = static::val($key);

        if ($raw === null || trim($raw) === '') {
            return $fallback;
        }

        $decoded = json_decode($raw, true);

        if (! is_array($decoded)) {
            return $fallback;
        }

        $items = [];

        foreach ($decoded as $row) {
            if (is_array($row)) {
                $items[] = array_map(fn ($value) => is_scalar($value) ? (string) $value : '', $row);
            }
        }

        return $items;
    }

    public static function pendidikan(): array
    {
        return static::items('pendidikan_items', static::legacyPendidikan());
    }

    public static function organisasi(): array
    {
        return static::items('organisasi_items', static::legacyOrganisasi());
    }

    public static function skillTeknis(): array
    {
        return static::items('skill_teknis_items', static::parseSkillPipe(static::val('skill_teknis', 'HTML:90|CSS:85|JavaScript:70|PHP:75|Laravel:70|MySQL:70|UI/UX Design:65')));
    }

    public static function skillNonTeknis(): array
    {
        return static::items('skill_non_teknis_items', static::parseSkillPipe(static::val('skill_non_teknis', 'Komunikasi:80|Kerja Sama Tim:85|Kepemimpinan:75|Manajemen Waktu:75|Pemecahan Masalah:80|Adaptasi & Belajar Cepat:85')));
    }

    public static function teknologi(string $fallback = 'HTML|CSS|JavaScript|PHP|Laravel|MySQL'): array
    {
        $names = array_filter(array_map('trim', explode('|', static::val('tag_teknologi', $fallback) ?? '')));

        return static::items('teknologi_items', array_map(fn ($name) => ['nama' => $name], array_values($names)));
    }

    private static function legacyPendidikan(): array
    {
        $rows = [];
        $defaults = [
            1 => ['SMKN 2 Banjarmasin', '2024 - Sekarang'],
            2 => ['MTs Al-Huda', '2021 - 2024'],
            3 => ['SDN Belitung Selatan 5', '2015 - 2021'],
        ];

        foreach ($defaults as $i => [$defaultNama, $defaultWaktu]) {
            $nama = static::val('pendidikan_'.$i.'_nama', $defaultNama);

            if ($nama !== null && $nama !== '') {
                $rows[] = [
                    'nama' => $nama,
                    'waktu' => static::val('pendidikan_'.$i.'_waktu', $defaultWaktu) ?? '',
                    'keterangan' => '',
                ];
            }
        }

        return $rows;
    }

    private static function legacyOrganisasi(): array
    {
        $nama = static::val('organisasi_nama', 'OSIS SMKN 2 Banjarmasin');

        if ($nama === null || $nama === '') {
            return [];
        }

        return [[
            'nama' => $nama,
            'waktu' => static::val('organisasi_waktu', '2024 - Sekarang') ?? '',
            'keterangan' => '',
        ]];
    }

    private static function parseSkillPipe(?string $value): array
    {
        $rows = [];

        foreach (array_filter(array_map('trim', explode('|', $value ?? ''))) as $skill) {
            $parts = array_pad(explode(':', $skill, 2), 2, '0');
            $nama = trim($parts[0]);

            if ($nama !== '') {
                $rows[] = [
                    'nama' => $nama,
                    'persen' => (string) max(0, min(100, (int) trim($parts[1]))),
                ];
            }
        }

        return $rows;
    }

    public static function val(string $key, ?string $default = null): ?string
    {
        if (! array_key_exists($key, static::$cache)) {
            $value = static::where('key', $key)->value('value');
            static::$cache[$key] = $value !== null ? (string) $value : $default;
        }

        return static::$cache[$key];
    }

    public static function flushCache(): void
    {
        static::$cache = [];
    }
}
