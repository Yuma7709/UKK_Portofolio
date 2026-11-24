<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->judul }} | Blog Yuma</title>

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
        #theme-toggle{border:1px solid var(--border);background:rgba(255,255,255,.04);color:var(--text);padding:10px 16px;border-radius:50px;font-weight:600;font-size:.85rem;cursor:pointer;display:inline-flex;align-items:center;gap:8px}
        [data-theme="light"] #theme-toggle{background:#fff}
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
            max-width:900px;
            margin:auto;
        }

        .back{
            display:inline-block;
            margin-bottom:25px;
            color:var(--primary);
            text-decoration:none;
            font-weight:600;
        }

        .article{
            background:rgba(22,22,26,.85);
            border:1px solid var(--border);
            border-radius:26px;
            padding:35px;
            box-shadow:var(--shadow);
        }

        .meta{
            display:flex;
            align-items:center;
            gap:12px;
            flex-wrap:wrap;
            margin-bottom:18px;
        }

        .kategori{
            background:rgba(248,113,113,.12);
            color:var(--primary);
            padding:6px 14px;
            border-radius:50px;
            font-size:.78rem;
            font-weight:700;
        }

        .meta small{
            color:var(--muted);
        }

        h1{
            font-size:2.2rem;
            line-height:1.3;
            margin-bottom:16px;
        }

        .ringkasan{
            color:var(--muted);
            font-size:1.05rem;
            line-height:1.8;
            margin-bottom:25px;
        }

        .cover{
            width:100%;
            max-height:420px;
            object-fit:cover;
            border-radius:18px;
            margin-bottom:28px;
        }

        .tags{
            display:flex;
            flex-wrap:wrap;
            gap:8px;
            margin-bottom:28px;
        }

        .tags span{
            background:rgba(255,255,255,.05);
            border:1px solid var(--border);
            color:var(--muted);
            padding:5px 12px;
            border-radius:50px;
            font-size:.78rem;
            font-weight:600;
        }

        .isi{
            color:#a1a1aa;
            line-height:1.9;
            font-size:1rem;
        }

        .isi h2{
            color:var(--primary);
            font-size:1.4rem;
            margin:28px 0 12px;
        }

        .isi p{
            margin-bottom:16px;
        }

        .isi code{
            background:rgba(248,113,113,.1);
            color:#a5f3fc;
            padding:2px 6px;
            border-radius:6px;
            font-size:.9em;
        }

        .isi pre{
            background:#16161a;
            border:1px solid var(--border);
            border-radius:14px;
            padding:18px;
            overflow-x:auto;
            margin-bottom:18px;
        }

        .isi pre code{
            background:none;
            padding:0;
            color:#a1a1aa;
        }

        .related{
            margin-top:45px;
        }

        .related h2{
            font-size:1.4rem;
            margin-bottom:20px;
        }

        .blog-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:22px;
        }

        .blog-card{
            display:flex;
            flex-direction:column;
            background:rgba(255,255,255,.03);
            border:1px solid var(--border);
            border-radius:22px;
            overflow:hidden;
            box-shadow:var(--shadow);
            text-decoration:none;
            color:var(--text);
            transition:.3s;
        }

        .blog-card:hover{
            transform:translateY(-6px);
            border-color:var(--primary);
        }

        .blog-card img{
            width:100%;
            height:150px;
            object-fit:cover;
        }

        .blog-body{
            padding:18px;
            display:flex;
            flex-direction:column;
            gap:9px;
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
            padding:5px 12px;
            border-radius:50px;
            font-size:.72rem;
            font-weight:700;
        }

        .blog-body h3{
            color:var(--primary);
            font-size:1rem;
            line-height:1.4;
        }

        .blog-body p{
            color:var(--muted);
            line-height:1.6;
            font-size:.88rem;
        }

        .blog-tags{
            display:flex;
            flex-wrap:wrap;
            gap:8px;
            margin-top:auto;
        }

        .blog-tags span{
            color:var(--muted);
            font-size:.75rem;
            font-weight:600;
        }

        @media(max-width:600px){
            .article{
                padding:22px;
            }

            h1{
                font-size:1.6rem;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>
<body data-theme="dark">
<script>(function(){try{var s=localStorage.getItem('theme');var t=(s==='light'||s==='dark')?s:(window.matchMedia&&window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark');document.body.setAttribute('data-theme',t);}catch(e){}})();</script>
<div id="theme-wave" aria-hidden="true"></div>

<div class="container">

    <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:25px">
        <a href="{{ route('blog.index') }}" class="back" style="margin-bottom:0">← Kembali ke Blog</a>
        <button id="theme-toggle" type="button" aria-label="Ganti tema"><span class="theme-icon">☀️</span><span class="theme-label">Mode Terang</span></button>
    </div>

    <article class="article">
        <div class="meta">
            <span class="kategori">{{ $article->kategori }}</span>
            <small>Diterbitkan {{ $article->created_at?->format('d M Y') }}</small>
        </div>

        <h1>{{ $article->judul }}</h1>
        <p class="ringkasan">{{ $article->ringkasan }}</p>

        @if($article->gambar_url)
            <img src="{{ $article->gambar_url }}" alt="{{ $article->judul }}" class="cover">
        @endif

        @if($article->tag_list)
            <div class="tags">
                @foreach($article->tag_list as $tag)
                    <span>#{{ $tag }}</span>
                @endforeach
            </div>
        @endif

        <div class="isi">
            {!! $article->isi_html !!}
        </div>
    </article>

    @if($related->count())
        <div class="related">
            <h2>Artikel Terkait</h2>

            <div class="blog-grid">
                @foreach($related as $a)
                    @include('blog._card', ['a' => $a])
                @endforeach
            </div>
        </div>
    @endif

</div>

<script>
const body=document.body,toggleBtn=document.getElementById('theme-toggle'),themeWave=document.getElementById('theme-wave'),tm=window.matchMedia?window.matchMedia('(prefers-color-scheme: light)'):null;
function getSaved(){try{const s=localStorage.getItem('theme');return (s==='light'||s==='dark')?s:null;}catch(e){return null;}}
function render(mode,anim){body.setAttribute('data-theme',mode);const i=toggleBtn.querySelector('.theme-icon'),l=toggleBtn.querySelector('.theme-label');if(i)i.textContent=mode==='dark'?'☀️':'🌙';if(l)l.textContent=mode==='dark'?'Mode Terang':'Mode Gelap';if(anim){toggleBtn.classList.remove('clicked');void toggleBtn.offsetWidth;toggleBtn.classList.add('clicked');}}
function apply(mode,persist,anim){render(mode,anim);if(persist){try{localStorage.setItem('theme',mode);}catch(e){}}}
apply(getSaved()||body.getAttribute('data-theme')||'dark',false,false);requestAnimationFrame(()=>document.documentElement.classList.add('theme-ready'));
if(tm){const sync=e=>{if(!getSaved())apply(e.matches?'light':'dark',false,false);}; if(tm.addEventListener)tm.addEventListener('change',sync); else if(tm.addListener)tm.addListener(sync);}
toggleBtn.addEventListener('click',()=>{const next=body.getAttribute('data-theme')==='dark'?'light':'dark';const r=toggleBtn.getBoundingClientRect();themeWave.style.setProperty('--theme-x',(r.left+r.width/2)+'px');themeWave.style.setProperty('--theme-y',(r.top+r.height/2)+'px');themeWave.style.background=next==='light'?'#faf9f9':'#0d0d10';themeWave.classList.remove('run');void themeWave.offsetWidth;themeWave.classList.add('run');apply(next,true,true);});
</script></body>
</html>
