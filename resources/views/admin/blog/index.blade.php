<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Blog | Admin</title>

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
            max-width:1100px;
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
            padding:20px;
        }

        .grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:15px;
            margin-top:20px;
        }

        .card{
            background:rgba(13,13,16,.6);
            border:1px solid var(--border);
            border-radius:14px;
            padding:15px;
        }

        .card img{
            width:100%;
            height:160px;
            object-fit:cover;
            border-radius:10px;
            margin-bottom:10px;
        }

        .badge{
            display:inline-block;
            font-size:11px;
            padding:4px 10px;
            border-radius:999px;
            background:rgba(248,113,113,.15);
            color:var(--primary);
            border:1px solid rgba(248,113,113,.3);
            margin-right:5px;
        }

        .card h3{
            font-size:1rem;
            margin:10px 0 6px;
        }

        .text-muted{
            color:var(--muted);
            font-size:.85rem;
            line-height:1.6;
        }

        .card-actions{
            display:flex;
            gap:8px;
            flex-wrap:wrap;
            margin-top:12px;
            align-items:center;
        }

        .btn{
            padding:8px 12px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-weight:600;
            font-size:13px;
            text-decoration:none;
            display:inline-block;
        }

        .btn-primary{
            background:var(--primary);
            color:#000;
        }

        .btn-secondary{
            background:rgba(255,255,255,.06);
            color:var(--text);
            border:1px solid var(--border);
        }

        .btn-warning{
            background:#f59e0b;
            color:#000;
        }

        .btn-danger{
            background:var(--danger);
            color:#fff;
        }

        .empty{
            grid-column:1/-1;
            text-align:center;
            color:var(--muted);
            padding:40px;
            border:1px dashed var(--border);
            border-radius:12px;
        }

        .alert{
            background:rgba(248,113,113,.12);
            border:1px solid rgba(248,113,113,.3);
            color:#fca5a5;
            padding:12px 15px;
            border-radius:10px;
            margin-bottom:18px;
            font-size:.9rem;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>
<body>

<div class="container">

    <div class="topbar">
<h1 class="brand-logo">Porto<span>folio</span> <small>Blog</small></h1>


        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Dashboard</a>
            <a href="{{ route('blog.index') }}" class="btn btn-secondary" target="_blank">Lihat Blog</a>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">+ Tulis Artikel</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="panel">
        <div class="grid">
            @forelse($articles as $a)
                <div class="card">
                    @if($a->gambar_url)
                        <img src="{{ $a->gambar_url }}" alt="{{ $a->judul }}">
                    @endif

                    <span class="badge">{{ $a->kategori }}</span>
                    <span class="badge" style="{{ $a->published ? '' : 'opacity:.6;' }}">
                        {{ $a->published ? 'Terbit' : 'Draft' }}
                    </span>

                    <h3>{{ $a->judul }}</h3>
                    <p class="text-muted">{{ \Illuminate\Support\Str::limit($a->ringkasan, 100) }}</p>

                    <div class="card-actions">
                        <a href="{{ route('blog.show', $a->slug) }}" target="_blank" class="btn btn-secondary">Lihat</a>
                        <a href="{{ route('admin.blog.edit', $a->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('admin.blog.destroy', $a->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus artikel ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty">Belum ada artikel.</div>
            @endforelse
        </div>
    </div>

</div>

</body>
</html>
