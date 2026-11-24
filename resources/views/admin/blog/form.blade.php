<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->exists ? 'Edit Artikel' : 'Tulis Artikel' }} | Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Inter',sans-serif;
        }

        :root{
            --primary:#f87171;
            --primary2:#dc2626;
            --dark:#0d0d10;
            --dark2:#111114;
            --border:#2a2a2f;
            --text:#ececf0;
            --muted:#a1a1aa;
            --danger:#ef4444;
        }

        body{
            background:linear-gradient(to bottom,var(--dark),var(--dark2));
            color:var(--text);
            padding:25px;
            min-height:100vh;
        }

        .container{
            max-width:800px;
            margin:auto;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:12px;
            flex-wrap:wrap;
            margin-bottom:20px;
        }

        h1{
            font-size:1.6rem;
        }

        .panel{
            background:rgba(17,17,20,.8);
            border:1px solid var(--border);
            border-radius:16px;
            padding:25px;
        }

        label{
            display:block;
            font-size:13px;
            font-weight:600;
            color:var(--muted);
            margin-bottom:6px;
        }

        input,
        select,
        textarea{
            width:100%;
            padding:11px;
            margin-bottom:14px;
            border-radius:10px;
            border:1px solid var(--border);
            background:#16161a;
            color:var(--text);
            outline:none;
        }

        input:focus,
        select:focus,
        textarea:focus{
            border-color:var(--primary);
        }

        input[type="file"]{
            padding:8px;
        }

        textarea{
            resize:vertical;
            min-height:110px;
        }

        textarea#isi{
            min-height:260px;
            line-height:1.7;
        }

        .form-row{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:14px;
        }

        .checkbox{
            display:flex;
            align-items:center;
            gap:10px;
            margin-bottom:18px;
            color:var(--text);
            font-size:.9rem;
            font-weight:600;
        }

        .checkbox input{
            width:auto;
            margin:0;
        }

        .btn{
            padding:9px 14px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-weight:600;
            font-size:13px;
            text-decoration:none;
            display:inline-block;
        }

        .btn-secondary{
            background:rgba(255,255,255,.06);
            color:var(--text);
            border:1px solid var(--border);
        }

        .btn-submit{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background:linear-gradient(to right,var(--primary),var(--primary2));
            color:#fff;
            font-weight:700;
            cursor:pointer;
        }

        .alert{
            background:rgba(239,68,68,.12);
            border:1px solid rgba(239,68,68,.3);
            color:#fecaca;
            padding:12px 15px;
            border-radius:10px;
            margin-bottom:18px;
            font-size:.9rem;
        }

        .hint{
            color:var(--muted);
            font-size:.78rem;
            margin:-6px 0 14px;
            line-height:1.6;
        }

        .preview{
            max-width:220px;
            border-radius:10px;
            margin-bottom:14px;
        }

        @media(max-width:600px){
            .form-row{
                grid-template-columns:1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>
<body>

<div class="container">

    <div class="topbar">
<h1 class="brand-logo">Porto<span>folio</span> <small>{{ $article->exists ? 'Edit Artikel' : 'Tulis Artikel Baru' }}</small></h1>

        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">← Kembali</a>
    </div>

    <div class="panel">
        @if($errors->any())
            <div class="alert">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if($article->gambar_url)
            <img src="{{ $article->gambar_url }}" alt="{{ $article->judul }}" class="preview">
        @endif

        <form action="{{ $article->exists ? route('admin.blog.update', $article) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($article->exists)
                @method('PUT')
            @endif

            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $article->judul) }}" maxlength="150" required>

            <div class="form-row">
                <div>
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" required>
                        @foreach($kategoriList as $item)
                            <option value="{{ $item }}" {{ old('kategori', $article->kategori) === $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="tags">Tags</label>
                    <input type="text" id="tags" name="tags" value="{{ old('tags', $article->tags) }}" maxlength="150" placeholder="laravel, php, debugging">
                    <p class="hint">Pisahkan dengan koma.</p>
                </div>
            </div>

            <label for="ringkasan">Ringkasan</label>
            <textarea id="ringkasan" name="ringkasan" maxlength="300" required>{{ old('ringkasan', $article->ringkasan) }}</textarea>

            <label for="isi">Isi Artikel</label>
            <textarea id="isi" name="isi" required>{{ old('isi', $article->isi) }}</textarea>
            <p class="hint">Gunakan <code>## Judul</code> untuk sub judul, <code>**tebal**</code>, dan <code>```kode```</code> untuk blok kode.</p>

            <label for="gambar">Gambar Sampul</label>
            <input type="file" id="gambar" name="gambar" accept="image/*">
            <p class="hint">Opsional. Maksimal 3 MB.</p>

            <label class="checkbox">
                <input type="checkbox" name="published" value="1" {{ old('published', $article->published) ? 'checked' : '' }}>
                Terbitkan artikel
            </label>

            <button type="submit" class="btn-submit">Simpan Artikel</button>
        </form>
    </div>

</div>

</body>
</html>
