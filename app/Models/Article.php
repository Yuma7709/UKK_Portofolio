<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public const KATEGORI = [
        'Catatan Ngoding',
        'Tutorial',
        'Troubleshooting',
        'Pengalaman',
        'Tips & Trik',
    ];

    protected $fillable = [
        'judul', 'slug', 'kategori', 'ringkasan', 'isi', 'tags', 'gambar', 'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /** ['laravel', 'php'] dari "laravel, php" */
    public function getTagListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $this->tags ?? ''))));
    }

    /** URL gambar kalau filenya ada di public/img, selain itu null */
    public function getGambarUrlAttribute(): ?string
    {
        return ($this->gambar && file_exists(public_path('img/' . $this->gambar)))
            ? asset('img/' . $this->gambar)
            : null;
    }

    /**
     * Ubah isi artikel (teks biasa) menjadi HTML yang aman.
     *  - baris kosong      = paragraf baru
     *  - ## Judul          = sub judul
     *  - ```kode```        = blok kode
     *  - `kode`            = kode satu baris
     *  - **tebal**         = teks tebal
     */
    public function getIsiHtmlAttribute(): string
    {
        $text   = e($this->isi);          // escape dulu supaya aman dari XSS
        $blocks = [];

        $text = preg_replace_callback('/```[\w-]*\R(.*?)```/s', function ($m) use (&$blocks) {
            $blocks[] = '<pre><code>' . rtrim($m[1]) . '</code></pre>';
            return "\n\n@@BLOCK" . (count($blocks) - 1) . "@@\n\n";
        }, $text);

        $html = '';

        foreach (preg_split('/\R{2,}/', trim($text)) as $para) {
            $para = trim($para);
            if ($para === '') {
                continue;
            }

            if (preg_match('/^@@BLOCK(\d+)@@$/', $para, $m)) {
                $html .= $blocks[(int) $m[1]];
                continue;
            }

            if (str_starts_with($para, '## ')) {
                $html .= '<h2>' . substr($para, 3) . '</h2>';
                continue;
            }

            $para = preg_replace('/`([^`\n]+)`/', '<code>$1</code>', $para);
            $para = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $para);

            $html .= '<p>' . nl2br($para) . '</p>';
        }

        return $html;
    }
}