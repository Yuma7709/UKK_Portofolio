<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Pengembang | Yuma Portfolio</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Inter',sans-serif;
        }

        :root{--primary:#f87171;--secondary:#dc2626;--dark:#0d0d10;--dark2:#111114;--card:#16161a;--text:#ffffff;--muted:#a1a1aa;--border:rgba(255,255,255,.1);--shadow:0 10px 40px rgba(0,0,0,.35);}
        [data-theme="light"]{--primary:#dc2626;--secondary:#b91c1c;--dark:#faf9f9;--dark2:#fff;--card:#fff;--text:#18181b;--muted:#52525b;--border:#e7e5e4;--shadow:0 10px 30px rgba(24,24,27,.07);}
        html.theme-ready body,html.theme-ready body *,html.theme-ready body *::before,html.theme-ready body *::after{transition:background-color .35s ease,color .35s ease,border-color .35s ease,box-shadow .35s ease!important;}
        #theme-toggle{display:inline-flex;align-items:center;gap:8px}
        #theme-toggle .theme-icon{display:inline-block;transition:transform .45s ease}
        #theme-toggle.clicked .theme-icon{transform:rotate(360deg) scale(1.2)}
        #theme-wave{position:fixed;inset:0;z-index:10000;pointer-events:none;opacity:0;clip-path:circle(0% at var(--theme-x,50%) var(--theme-y,50%))}
        #theme-wave.run{animation:themeWave .65s ease-out}
        @keyframes themeWave{0%{opacity:.92;clip-path:circle(0% at var(--theme-x,50%) var(--theme-y,50%))}55%{opacity:.92;clip-path:circle(145% at var(--theme-x,50%) var(--theme-y,50%))}100%{opacity:0;clip-path:circle(145% at var(--theme-x,50%) var(--theme-y,50%))}}

        body{
            min-height:100vh;
            color:var(--text);
            padding:30px 20px 60px;
            background:
                radial-gradient(circle at top left, rgba(248,113,113,.12), transparent 30%),
                radial-gradient(circle at bottom right, rgba(220,38,38,.10), transparent 30%),
                linear-gradient(to bottom,var(--dark),var(--dark2));
        }

        .container{
            width:100%;
            max-width:1100px;
            margin:auto;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:15px;
            flex-wrap:wrap;
            margin-bottom:30px;
        }

        h1{
            font-size:2.2rem;
            margin-bottom:8px;
        }

        .subtitle{
            color:var(--muted);
            line-height:1.7;
        }

        .btn{
            display:inline-block;
            padding:11px 18px;
            border-radius:12px;
            font-size:.9rem;
            font-weight:700;
            text-decoration:none;
            border:1px solid transparent;
            cursor:pointer;
            transition:.25s;
        }

        .btn-primary{
            background:linear-gradient(to right,var(--primary),var(--secondary));
            color:#fff;
        }

        .btn-secondary{
            background:rgba(255,255,255,.05);
            border-color:var(--border);
            color:var(--text);
        }

        .btn:hover{
            transform:translateY(-2px);
        }

        .filter{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
            background:rgba(22,22,26,.8);
            border:1px solid var(--border);
            border-radius:20px;
            padding:18px;
            margin-bottom:30px;
        }

        .filter input,
        .filter select{
            padding:12px 14px;
            border-radius:12px;
            border:1px solid var(--border);
            background:#16161a;
            color:var(--text);
            outline:none;
        }

        .filter input{
            flex:1;
            min-width:220px;
        }

        .filter input:focus,
        .filter select:focus{
            border-color:var(--primary);
        }

        .blog-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:28px;
        }

        .blog-card{
            display:flex;
            flex-direction:column;
            background:rgba(255,255,255,.03);
            border:1px solid var(--border);
            border-radius:26px;
            overflow:hidden;
            box-shadow:var(--shadow);
            text-decoration:none;
            color:var(--text);
            transition:.3s;
        }

        .blog-card:hover{
            transform:translateY(-8px);
            border-color:var(--primary);
        }

        .blog-card img{
            width:100%;
            height:180px;
            object-fit:cover;
        }

        .blog-body{
            padding:22px;
            display:flex;
            flex-direction:column;
            gap:10px;
            flex:1;
        }

        .blog-meta{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:10px;
        }

        .blog-meta small{
            color:var(--muted);
        }

        .blog-cat{
            background:rgba(248,113,113,.12);
            color:var(--primary);
            padding:5px 13px;
            border-radius:50px;
            font-size:.75rem;
            font-weight:700;
        }

        .blog-body h3{
            color:var(--primary);
            font-size:1.12rem;
            line-height:1.4;
        }

        .blog-body p{
            color:var(--muted);
            line-height:1.7;
            font-size:.92rem;
        }

        .blog-tags{
            display:flex;
            flex-wrap:wrap;
            gap:8px;
            margin-top:auto;
        }

        .blog-tags span{
            color:var(--muted);
            font-size:.78rem;
            font-weight:600;
        }

        .empty{
            grid-column:1/-1;
            text-align:center;
            padding:50px 20px;
            color:var(--muted);
            border:1px dashed var(--border);
            border-radius:20px;
        }

        .pagination{
            display:flex;
            justify-content:center;
            gap:8px;
            margin-top:35px;
            flex-wrap:wrap;
        }

        .pagination a,
        .pagination span{
            padding:9px 14px;
            border-radius:10px;
            border:1px solid var(--border);
            color:var(--text);
            text-decoration:none;
            font-size:.85rem;
        }

        .pagination .active span{
            border-color:var(--primary);
            color:var(--primary);
        }

        @media(max-width:600px){
            h1{
                font-size:1.7rem;
            }

            .filter input,
            .filter select,
            .filter .btn{
                width:100%;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>
<body data-theme="dark">
<script>(function(){try{var s=localStorage.getItem('theme');var t=(s==='light'||s==='dark')?s:(window.matchMedia&&window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark');document.body.setAttribute('data-theme',t);}catch(e){}})();</script>
<div id="theme-wave" aria-hidden="true"></div>

<div class="container">

    <div class="topbar">
        <div>
            <h1>Blog Pengembang</h1>
            <p class="subtitle">Catatan ngoding, tutorial singkat, dan dokumentasi penyelesaian masalah.</p>
        </div>

        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <button id="theme-toggle" type="button" class="btn btn-secondary" aria-label="Ganti tema"><span class="theme-icon">☀️</span> <span class="theme-label">Mode Terang</span></button>
            <a href="{{ route('portfolio') }}" class="btn btn-secondary">← Portfolio</a>
        </div>
    </div>

    <form action="{{ route('blog.index') }}" method="GET" class="filter">
        <input type="text" name="q" value="{{ $q }}" placeholder="Cari judul, ringkasan, atau tag...">

        <select name="kategori">
            <option value="">Semua Kategori</option>
            @foreach($kategoriList as $item)
                <option value="{{ $item }}" {{ $kategori === $item ? 'selected' : '' }}>{{ $item }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <div class="blog-grid">
        @forelse($articles as $a)
            @include('blog._card', ['a' => $a])
        @empty
            <div class="empty">Belum ada artikel yang cocok.</div>
        @endforelse
    </div>

    {{ $articles->links() }}

</div>

<script>
const body=document.body,toggleBtn=document.getElementById('theme-toggle'),themeWave=document.getElementById('theme-wave'),tm=window.matchMedia?window.matchMedia('(prefers-color-scheme: light)'):null;
function getSaved(){try{const s=localStorage.getItem('theme');return (s==='light'||s==='dark')?s:null;}catch(e){return null;}}
function render(mode,anim){body.setAttribute('data-theme',mode);const i=toggleBtn.querySelector('.theme-icon'),l=toggleBtn.querySelector('.theme-label');if(i)i.textContent=mode==='dark'?'☀️':'🌙';if(l)l.textContent=mode==='dark'?'Mode Terang':'Mode Gelap';if(anim){toggleBtn.classList.remove('clicked');void toggleBtn.offsetWidth;toggleBtn.classList.add('clicked');}}
function apply(mode,persist,anim){render(mode,anim);if(persist){try{localStorage.setItem('theme',mode);}catch(e){}}}
apply(getSaved()||body.getAttribute('data-theme')||'dark',false,false);requestAnimationFrame(()=>document.documentElement.classList.add('theme-ready'));
if(tm){const sync=e=>{if(!getSaved())apply(e.matches?'light':'dark',false,false);}; if(tm.addEventListener)tm.addEventListener('change',sync); else if(tm.addListener)tm.addListener(sync);}
toggleBtn.addEventListener('click',()=>{const next=body.getAttribute('data-theme')==='dark'?'light':'dark';const r=toggleBtn.getBoundingClientRect();themeWave.style.setProperty('--theme-x',(r.left+r.width/2)+'px');themeWave.style.setProperty('--theme-y',(r.top+r.height/2)+'px');themeWave.style.background=next==='light'?'#faf9f9':'#0d0d10';themeWave.classList.remove('run');void themeWave.offsetWidth;themeWave.classList.add('run');apply(next,true,true);});
</script>
</body>
</html>
