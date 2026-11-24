<!DOCTYPE html>
<html lang="id" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->judul }} | Yuma Portfolio</title>

    <style>
        :root{
            --primary:#f87171;
            --secondary:#dc2626;
            --dark:#0d0d10;
            --dark2:#111114;
            --card:#16161a;
            --text:#ffffff;
            --muted:#a1a1aa;
            --border:rgba(255,255,255,.1);
            --shadow:0 10px 40px rgba(0,0,0,.35);
            --on-btn:#fff;
        }
        [data-theme="light"]{
            --primary:#dc2626;
            --secondary:#b91c1c;
            --dark:#faf9f9;
            --dark2:#fff;
            --card:#fff;
            --text:#18181b;
            --muted:#52525b;
            --border:#e7e5e4;
            --shadow:0 10px 30px rgba(24,24,27,.07);
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Inter','Segoe UI',system-ui,sans-serif;
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            background:linear-gradient(to bottom,var(--dark),var(--dark2));
            color:var(--text);
            min-height:100vh;
            padding:40px 20px;
        }
        html.theme-ready body,html.theme-ready body *,html.theme-ready body *::before,html.theme-ready body *::after{
            transition:background-color .35s ease,color .35s ease,border-color .35s ease,box-shadow .35s ease,fill .35s ease,stroke .35s ease!important;
        }

        .wrap{
            max-width:900px;
            margin:auto;
        }

        .top-actions{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:25px}
        .back{
            display:inline-block;
            color:var(--primary);
            text-decoration:none;
            font-weight:700;
        }
        #theme-toggle{border:1px solid var(--border);background:rgba(255,255,255,.04);color:var(--text);padding:10px 16px;border-radius:50px;font-weight:600;font-size:.85rem;cursor:pointer;display:inline-flex;align-items:center;gap:8px}
        [data-theme="light"] #theme-toggle{background:#fff}
        #theme-toggle:hover{border-color:var(--primary);color:var(--primary);transform:translateY(-2px)}
        #theme-toggle .theme-icon{display:inline-block;transition:transform .45s ease}
        #theme-toggle.clicked .theme-icon{transform:rotate(360deg) scale(1.2)}
        #theme-wave{position:fixed;inset:0;z-index:10000;pointer-events:none;opacity:0;clip-path:circle(0% at var(--theme-x,50%) var(--theme-y,50%))}
        #theme-wave.run{animation:themeWave .65s ease-out}
        @keyframes themeWave{0%{opacity:.92;clip-path:circle(0% at var(--theme-x,50%) var(--theme-y,50%))}55%{opacity:.92;clip-path:circle(145% at var(--theme-x,50%) var(--theme-y,50%))}100%{opacity:0;clip-path:circle(145% at var(--theme-x,50%) var(--theme-y,50%))}}

        .box{
            background:var(--card);
            border:1px solid var(--border);
            border-radius:30px;
            padding:40px;
            box-shadow:var(--shadow);
        }

        .cover{
            width:100%;
            max-height:420px;
            object-fit:cover;
            border-radius:20px;
            margin-bottom:25px;
        }

        h1{
            font-size:2.4rem;
            margin-bottom:10px;
        }

        .avg{
            color:#fbbf24;
            font-size:1rem;
            margin-bottom:6px;
        }

        .avg small{
            color:var(--muted);
            font-size:.85rem;
        }

        .tags{
            display:flex;
            flex-wrap:wrap;
            gap:10px;
            margin:15px 0 25px;
        }

        .tags span{
            background:rgba(248,113,113,.12);
            color:var(--primary);
            padding:8px 15px;
            border-radius:50px;
            font-size:.8rem;
            font-weight:700;
        }

        .links{
            display:flex;
            flex-wrap:wrap;
            gap:12px;
            margin-bottom:30px;
        }

        .links a{
            padding:12px 22px;
            border-radius:12px;
            font-weight:700;
            text-decoration:none;
        }

        .links .demo{
            background:var(--primary);
            color:#000;
        }

        .links .git{
            border:1px solid var(--border);
            color:var(--text);
        }

        .block{
            background:rgba(255,255,255,.03);
            border:1px solid var(--border);
            border-left:5px solid var(--primary);
            border-radius:18px;
            padding:22px;
            margin-bottom:20px;
        }

        .block h3{
            color:var(--primary);
            margin-bottom:10px;
        }

        .block p{
            color:var(--muted);
            line-height:1.8;
        }

        /* FITUR */
        .features{
            list-style:none;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:10px;
        }

        .features li{
            color:var(--muted);
            line-height:1.6;
            padding-left:28px;
            position:relative;
        }

        .features li::before{
            content:'✓';
            position:absolute;
            left:0;
            top:0;
            width:20px;
            height:20px;
            border-radius:50%;
            background:rgba(248,113,113,.15);
            color:var(--primary);
            font-size:.75rem;
            font-weight:700;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        /* LANGKAH */
        .steps{
            list-style:none;
            counter-reset:step;
            display:grid;
            gap:12px;
        }

        .steps li{
            counter-increment:step;
            color:var(--muted);
            line-height:1.7;
            padding-left:42px;
            position:relative;
        }

        .steps li::before{
            content:counter(step);
            position:absolute;
            left:0;
            top:0;
            width:30px;
            height:30px;
            border-radius:50%;
            background:var(--primary);
            color:#000;
            font-weight:700;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:.85rem;
        }

        /* GALERI */
        .gallery{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
            gap:15px;
        }

        .gallery img{
            width:100%;
            height:180px;
            object-fit:cover;
            border-radius:14px;
            border:1px solid var(--border);
            cursor:zoom-in;
        }

        /* FEEDBACK */
        .alert{
            background:rgba(34,197,94,.15);
            border:1px solid rgba(34,197,94,.4);
            color:#22c55e;
            padding:12px 16px;
            border-radius:12px;
            font-size:.92rem;
            margin-bottom:15px;
        }

        .alert-error{
            background:rgba(239,68,68,.15);
            border-color:rgba(239,68,68,.4);
            color:#ef4444;
        }

        .fb-form label.lbl{
            display:block;
            font-weight:600;
            margin-bottom:8px;
        }

        .fb-form input[type="text"],
        .fb-form textarea{
            width:100%;
            padding:13px;
            border-radius:12px;
            border:1px solid var(--border);
            background:rgba(255,255,255,.04);
            color:var(--text);
            outline:none;
            margin-bottom:15px;
        }

        .fb-form textarea{
            resize:none;
        }

        .rating{
            display:flex;
            flex-direction:row-reverse;
            justify-content:flex-end;
            gap:4px;
            margin-bottom:15px;
        }

        .rating input{
            display:none;
        }

        .rating label{
            font-size:2rem;
            line-height:1;
            color:#64748b;
            cursor:pointer;
        }

        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label{
            color:#fbbf24;
        }

        .btn-send{
            width:100%;
            padding:13px;
            border:none;
            border-radius:12px;
            background:var(--primary);
            color:#000;
            font-weight:700;
            cursor:pointer;
        }

        .fb-item{
            border-top:1px solid var(--border);
            padding:16px 0;
            position:relative;
        }

        .fb-item:first-of-type{
            margin-top:20px;
        }

        .fb-item h4{
            font-size:.95rem;
        }

        .fb-stars{
            color:#fbbf24;
            letter-spacing:2px;
            margin:3px 0;
        }

        .fb-item p{
            color:var(--muted);
            line-height:1.7;
            font-size:.92rem;
        }

        .fb-date{
            color:var(--muted);
            font-size:.75rem;
        }

        .fb-del{
            position:absolute;
            top:14px;
            right:0;
            background:#ef4444;
            color:#fff;
            border:none;
            padding:6px 12px;
            border-radius:8px;
            cursor:pointer;
            font-size:.75rem;
        }

        .fb-empty{
            color:var(--muted);
            text-align:center;
            padding:18px;
            border:1px dashed var(--border);
            border-radius:12px;
            margin-top:20px;
        }

        .lightbox{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.85);
            display:none;
            align-items:center;
            justify-content:center;
            z-index:5000;
            padding:20px;
            cursor:zoom-out;
        }

        .lightbox.show{
            display:flex;
        }

        .lightbox img{
            max-width:100%;
            max-height:90vh;
            border-radius:12px;
        }

        @media(max-width:600px){
            .box{
                padding:25px 20px;
            }

            h1{
                font-size:1.8rem;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>

<body data-theme="dark">
<script>
    (function(){try{var s=localStorage.getItem('theme');var t=(s==='light'||s==='dark')?s:(window.matchMedia&&window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark');document.body.setAttribute('data-theme',t);}catch(e){}})();
</script>
<div id="theme-wave" aria-hidden="true"></div>

<div class="wrap">

    <div class="top-actions">
        <a href="{{ route('portfolio') }}#project" class="back">← Kembali ke Portofolio</a>
        <button id="theme-toggle" type="button" aria-label="Ganti tema"><span class="theme-icon">☀️</span><span class="theme-label">Mode Terang</span></button>
    </div>

    <div class="box">

        @if($project->gambar && file_exists(public_path('img/' . $project->gambar)))
            <img src="{{ asset('img/' . $project->gambar) }}" alt="{{ $project->judul }}" class="cover">
        @endif

        <h1>{{ $project->judul }}</h1>

        @php
            $techs   = $project->teknologi ? array_filter(array_map('trim', explode(',', $project->teknologi))) : [];
            $galeri  = $project->galeri ? array_filter(array_map('trim', explode(',', $project->galeri))) : [];
            $langkah = $project->dokumentasi ? array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $project->dokumentasi))) : [];
            $fitur   = $project->fitur ? array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $project->fitur))) : [];

            $feedbacks = $project->feedbacks ?? collect();
            $rataRata  = $feedbacks->count() ? round($feedbacks->avg('rating'), 1) : null;
        @endphp

        @if($rataRata)
            <div class="avg">
                {{ str_repeat('★', (int) round($rataRata)) }}{{ str_repeat('☆', 5 - (int) round($rataRata)) }}
                <small>{{ $rataRata }} / 5 dari {{ $feedbacks->count() }} feedback</small>
            </div>
        @endif

        @if(count($techs))
            <div class="tags">
                @foreach($techs as $tech)
                    <span>{{ $tech }}</span>
                @endforeach
            </div>
        @endif

        <div class="links">
            @if($project->link_demo)
                <a href="{{ $project->link_demo }}" target="_blank" rel="noopener" class="demo">Lihat Demo</a>
            @endif

            @if($project->link_github)
                <a href="{{ $project->link_github }}" target="_blank" rel="noopener" class="git">Source Code GitHub</a>
            @endif
        </div>

        <div class="block">
            <h3>Deskripsi Proyek</h3>
            <p>{{ $project->deskripsi }}</p>
        </div>

        @if($project->masalah)
        <div class="block">
            <h3>Permasalahan yang Ingin Diselesaikan</h3>
            <p>{{ $project->masalah }}</p>
        </div>
        @endif

        @if($project->tujuan)
        <div class="block">
            <h3>Tujuan Pembuatan Proyek</h3>
            <p>{{ $project->tujuan }}</p>
        </div>
        @endif

        @if($project->peran)
        <div class="block">
            <h3>Peran dalam Proyek</h3>
            <p>{{ $project->peran }}</p>
        </div>
        @endif

        @if(count($fitur))
        <div class="block">
            <h3>Fitur-Fitur Proyek</h3>
            <ul class="features">
                @foreach($fitur as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($project->detail)
        <div class="block">
            <h3>Detail Proyek</h3>
            <p>{!! nl2br(e($project->detail)) !!}</p>
        </div>
        @endif

        @if(count($langkah))
        <div class="block">
            <h3>Dokumentasi Proses Pengerjaan</h3>
            <ol class="steps">
                @foreach($langkah as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ol>
        </div>
        @endif

        @if(count($galeri))
        <div class="block">
            <h3>Galeri Screenshot</h3>
            <div class="gallery">
                @foreach($galeri as $img)
                    @if(file_exists(public_path('img/' . $img)))
                        <img src="{{ asset('img/' . $img) }}" alt="Dokumentasi {{ $project->judul }}" loading="lazy" class="zoomable">
                    @endif
                @endforeach
            </div>
        </div>
        @endif

        <!-- FEEDBACK USER -->
        <div class="block" id="feedback">
            <h3>Feedback Pengguna</h3>

            @if(session('success_feedback'))
                <div class="alert">{{ session('success_feedback') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('feedback.store', $project->id) }}" method="POST" class="fb-form">
                @csrf

                <label class="lbl" for="fb-nama">Nama</label>
                <input type="text" name="nama" id="fb-nama" value="{{ old('nama') }}" maxlength="100" required>

                <span class="lbl" style="display:block;font-weight:600;margin-bottom:8px;">Penilaian</span>
                <div class="rating">
                    @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="fb-star{{ $i }}" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required>
                        <label for="fb-star{{ $i }}" title="{{ $i }} bintang">★</label>
                    @endfor
                </div>

                <label class="lbl" for="fb-komentar">Feedback</label>
                <textarea name="komentar" id="fb-komentar" rows="4" maxlength="1000" required placeholder="Bagaimana pendapat kamu tentang proyek ini?">{{ old('komentar') }}</textarea>

                <button type="submit" class="btn-send">Kirim Feedback</button>
            </form>

            @forelse($feedbacks as $fb)
                <div class="fb-item">

                    @if(session('admin_login'))
                        <form action="{{ route('feedback.destroy', $fb->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fb-del" onclick="return confirm('Hapus feedback ini?')">Hapus</button>
                        </form>
                    @endif

                    <h4>{{ $fb->nama }}</h4>
                    <div class="fb-stars">{{ str_repeat('★', $fb->rating) }}{{ str_repeat('☆', 5 - $fb->rating) }}</div>
                    <p>{{ $fb->komentar }}</p>
                    <span class="fb-date">{{ $fb->created_at->format('d M Y') }}</span>
                </div>
            @empty
                <div class="fb-empty">Belum ada feedback. Jadilah yang pertama!</div>
            @endforelse
        </div>

    </div>
</div>

<div class="lightbox" id="lightbox">
    <img src="" alt="Pratinjau gambar" id="lightbox-img">
</div>

<script>
    const body = document.body;
    const toggleBtn = document.getElementById('theme-toggle');
    const themeWave = document.getElementById('theme-wave');
    const themeMedia = window.matchMedia ? window.matchMedia('(prefers-color-scheme: light)') : null;
    function getSavedTheme(){ try { const s = localStorage.getItem('theme'); return (s==='light'||s==='dark')?s:null; } catch(e){ return null; } }
    function renderTheme(mode, animate){
        body.setAttribute('data-theme', mode);
        const icon = toggleBtn.querySelector('.theme-icon');
        const label = toggleBtn.querySelector('.theme-label');
        if(icon) icon.textContent = mode === 'dark' ? '☀️' : '🌙';
        if(label) label.textContent = mode === 'dark' ? 'Mode Terang' : 'Mode Gelap';
        if(animate){ toggleBtn.classList.remove('clicked'); void toggleBtn.offsetWidth; toggleBtn.classList.add('clicked'); }
    }
    function applyTheme(mode, persist, animate){
        renderTheme(mode, animate);
        if(persist){ try { localStorage.setItem('theme', mode); } catch(e){} }
    }
    applyTheme(getSavedTheme() || body.getAttribute('data-theme') || 'dark', false, false);
    requestAnimationFrame(() => document.documentElement.classList.add('theme-ready'));
    if(themeMedia){
        const sync = (e)=>{ if(!getSavedTheme()) applyTheme(e.matches?'light':'dark', false, false); };
        if(themeMedia.addEventListener) themeMedia.addEventListener('change', sync); else if(themeMedia.addListener) themeMedia.addListener(sync);
    }
    toggleBtn.addEventListener('click', ()=>{
        const next = body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        const r = toggleBtn.getBoundingClientRect();
        themeWave.style.setProperty('--theme-x', `${r.left + r.width/2}px`);
        themeWave.style.setProperty('--theme-y', `${r.top + r.height/2}px`);
        themeWave.style.background = next === 'light' ? '#faf9f9' : '#0d0d10';
        themeWave.classList.remove('run'); void themeWave.offsetWidth; themeWave.classList.add('run');
        applyTheme(next, true, true);
    });

    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');

    document.querySelectorAll('.zoomable').forEach(img => {
        img.addEventListener('click', () => {
            lightboxImg.src = img.src;
            lightbox.classList.add('show');
        });
    });

    lightbox.addEventListener('click', () => lightbox.classList.remove('show'));
</script>

</body>
</html>