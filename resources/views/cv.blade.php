<!DOCTYPE html>
<html lang="id" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ profile('nama', 'Yuma Achmad Fairuza') }}</title>

    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Inter','Segoe UI',system-ui,sans-serif;}
        :root{--accent:#dc2626;--accent-dark:#b91c1c;--ink:#111114;--muted:#475569;--line:#e7e5e4;--side:#111114;--paper:#fff;--bg:#faf9f9;--on-btn:#fff;}
        [data-theme="dark"]{--ink:#f4f4f5;--muted:#d4d4d8;--line:#3f3f46;--side:#18181b;--paper:#111114;--bg:#09090b;}
        html.theme-ready body,html.theme-ready body *,html.theme-ready body *::before,html.theme-ready body *::after{transition:background-color .35s ease,color .35s ease,border-color .35s ease,box-shadow .35s ease!important;}

        body{
            background:#faf9f9;
            color:var(--ink);
            padding:24px 14px 40px;
            font-size:16px;
            line-height:1.55;
        }

        .toolbar{
            max-width:920px;
            margin:0 auto 18px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:10px;
            flex-wrap:wrap;
        }

        .toolbar a,
        .toolbar button{
            padding:11px 20px;
            border-radius:50px;
            font-weight:700;
            font-size:.92rem;
            text-decoration:none;
            border:none;
            cursor:pointer;
        }

        .btn-back{
            background:#fff;
            color:var(--ink);
            border:1px solid var(--line);
        }

        .toolbar-right{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }

        .btn-print{
            background:var(--accent);
            color:#fff;
        }

        .btn-pdf{
            background:var(--ink);
            color:#fff;
        }

        .paper{
            max-width:920px;
            margin:0 auto;
            background:#fff;
            display:grid;
            grid-template-columns:270px 1fr;
            box-shadow:0 10px 40px rgba(0,0,0,.15);
        }

        .side{
            background:var(--side);
            color:#e7e5e4;
            padding:32px 22px;
        }

        .photo{
            width:140px;
            height:140px;
            object-fit:cover;
            border-radius:50%;
            border:5px solid var(--accent);
            display:block;
            margin:0 auto 18px;
        }

        .side h1{
            font-size:1.5rem;
            text-align:center;
            color:#fff;
            line-height:1.25;
        }

        .side .role{
            text-align:center;
            color:var(--accent);
            font-size:.92rem;
            font-weight:600;
            margin:6px 0 24px;
        }

        .side h2{
            font-size:.85rem;
            letter-spacing:.12em;
            text-transform:uppercase;
            color:var(--accent);
            border-bottom:1px solid rgba(255,255,255,.15);
            padding-bottom:6px;
            margin:22px 0 10px;
        }

        .contact-item{
            font-size:.9rem;
            margin-bottom:10px;
            word-break:break-word;
            line-height:1.45;
        }

        .contact-item b{
            display:block;
            color:#a1a1aa;
            font-size:.72rem;
            font-weight:600;
            text-transform:uppercase;
            letter-spacing:.05em;
        }

        .contact-item a{
            color:#e7e5e4;
            text-decoration:none;
        }

        .main{
            padding:30px 34px;
        }

        .block{
            margin-bottom:20px;
            break-inside:avoid;
        }

        .block h2{
            font-size:1.12rem;
            text-transform:uppercase;
            letter-spacing:.06em;
            color:var(--accent-dark);
            border-bottom:2px solid var(--accent);
            padding-bottom:5px;
            margin-bottom:10px;
        }

        .block p{
            font-size:.98rem;
            line-height:1.6;
            color:var(--muted);
        }

        .block p.focus{
            color:var(--ink);
            font-weight:600;
            margin-top:4px;
        }

        .entry{
            margin-bottom:10px;
            padding-left:13px;
            border-left:3px solid var(--line);
            break-inside:avoid;
        }

        .entry strong{
            display:block;
            font-size:.98rem;
        }

        .entry .meta{
            font-size:.85rem;
            color:var(--accent-dark);
            font-weight:600;
        }

        .entry p{
            font-size:.9rem;
            margin-top:2px;
        }

        .skill-group{
            margin-bottom:14px;
        }

        .skill-group h3{
            font-size:.92rem;
            color:var(--accent-dark);
            margin-bottom:7px;
            text-transform:uppercase;
            letter-spacing:.06em;
        }

        .chips{
            display:flex;
            flex-wrap:wrap;
            gap:8px;
        }

        .chips span{
            background:rgba(248,113,113,.12);
            color:var(--accent-dark);
            font-size:.85rem;
            font-weight:600;
            padding:5px 13px;
            border-radius:50px;
        }

        .bullets{
            list-style:none;
        }

        .bullets li{
            font-size:.94rem;
            color:var(--muted);
            line-height:1.5;
            padding-left:16px;
            position:relative;
            margin-bottom:5px;
        }

        .bullets li::before{
            content:'';
            position:absolute;
            left:0;
            top:8px;
            width:6px;
            height:6px;
            border-radius:50%;
            background:var(--accent);
        }

        .bullets strong{
            color:var(--ink);
        }

        @media(max-width:760px){
            .paper{
                grid-template-columns:1fr;
            }

            .main{
                padding:28px 22px;
            }
        }

        @page{
            size:A4;
            margin:0;
        }

        @media print{
            body{background:#fff;padding:0;color:#111114;}
            .toolbar,#theme-wave,#theme-toggle{display:none!important;}
            .paper{box-shadow:none;max-width:none;background:#fff;}

            .paper{
                box-shadow:none;
                max-width:none;
            }

            .side,
            .chips span{
                -webkit-print-color-adjust:exact;
                print-color-adjust:exact;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>

<body data-theme="light">
<script>(function(){try{var s=localStorage.getItem('theme');var t=(s==='light'||s==='dark')?s:(window.matchMedia&&window.matchMedia('(prefers-color-scheme: light)').matches?'light':'dark');document.body.setAttribute('data-theme',t);}catch(e){}})();</script>
<div id="theme-wave" aria-hidden="true"></div>

<div class="toolbar">
    <a href="{{ route('portfolio') }}" class="btn-back">← Kembali ke Portofolio</a>

    <div class="toolbar-right">
        <button id="theme-toggle" type="button" aria-label="Ganti tema"><span class="theme-icon">🌙</span><span class="theme-label">Mode Gelap</span></button>
        <button type="button" class="btn-print" onclick="window.print()">Cetak / Simpan PDF</button>

        @if(file_exists(public_path('cv/CV-Yuma.pdf')))
            <a href="{{ asset('cv/CV-Yuma.pdf') }}" class="btn-pdf" download>Download CV (PDF)</a>
        @endif
    </div>
</div>

@php
    $ach = $achievements ?? collect();
    $exp = $experiences ?? collect();
    $orgExp = $exp->where('kategori', 'organisasi');
    $orgGroups = $orgExp->groupBy('instansi')->take(3);
    $organisasi = $orgExp->isNotEmpty() ? [] : array_slice(\App\Models\Profile::organisasi(), 0, 3);
    $panitiaGroups = $exp->where('kategori', 'kepanitiaan')->groupBy('instansi')->take(3);
    $pklExp = $exp->where('kategori', 'pkl')->take(3);
    $prestasi = $ach->where('kategori', '!=', 'sertifikat')->take(4);
    $lomba = $exp->where('kategori', 'lomba')->take(4);
    $sertifikat = $ach->where('kategori', 'sertifikat')->take(6);
@endphp

<div class="paper">

    <aside class="side">
        <img src="{{ asset('img/' . profile('foto', 'Yuma.jpeg')) }}" alt="Foto {{ profile('nama', 'Yuma Achmad Fairuza') }}" class="photo">

        <h1>{{ profile('nama', 'Yuma Achmad Fairuza') }}</h1>
        <div class="role">{{ profile('role', 'Front-End Developer') }}</div>

        <h2>Kontak</h2>

        <div class="contact-item">
            <b>Email</b>
            <a href="mailto:{{ profile('email', 'yumaachmad2@gmail.com') }}">{{ profile('email', 'yumaachmad2@gmail.com') }}</a>
        </div>

        <div class="contact-item">
            <b>WhatsApp</b>
            <a href="https://wa.me/{{ profile('whatsapp_link', '6288242814157') }}">{{ profile('whatsapp', '088242814157') }}</a>
        </div>

        <div class="contact-item">
            <b>Instagram</b>
            {{ profile('instagram', '@yuma_rayhan') }}
        </div>

        <div class="contact-item">
            <b>Domisili</b>
            {{ profile('domisili', 'Banjarmasin') }}
        </div>

        <div class="contact-item">
            <b>GitHub</b>
            <a href="{{ profile('github', 'https://github.com/Yuma7709') }}" target="_blank" rel="noopener">
                {{ \Illuminate\Support\Str::after(profile('github', 'https://github.com/Yuma7709'), 'https://') }}
            </a>
        </div>
    </aside>

    <main class="main">
        <div class="block">
            <h2>Profil Singkat</h2>
            <p>{{ profile('bio_singkat', 'Siswa SMKN 2 Banjarmasin jurusan PPLG yang fokus pada Front-End Development, UI/UX Design, dan Laravel Development.') }}</p>
            <p class="focus">Fokus: {{ profile('minat', 'Web Development, UI/UX Design, Laravel.') }}</p>
        </div>

        <div class="block">
            <h2>Pendidikan</h2>
            @foreach(array_slice(\App\Models\Profile::pendidikan(), 0, 3) as $item)
                @if(($item['nama'] ?? '') !== '')
                    <div class="entry">
                        <strong>{{ $item['nama'] }}</strong>
                        @if(($item['waktu'] ?? '') !== '')
                            <div class="meta">{{ $item['waktu'] }}</div>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>

        @if($pklExp->count())
            <div class="block">
                <h2>Pengalaman PKL</h2>

                @foreach($pklExp as $item)
                    <div class="entry">
                        <strong>{{ $item->instansi }}</strong>
                        @php
                            $pklMeta = collect([$item->periode, $item->jabatan])->filter()->implode(' · ');
                        @endphp
                        @if($pklMeta !== '')
                            <div class="meta">{{ $pklMeta }}</div>
                        @endif
                        @if($item->deskripsi)
                            <p>{{ \Illuminate\Support\Str::limit($item->deskripsi, 140) }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        @if(count($organisasi) || $orgGroups->count())
            <div class="block">
                <h2>Pengalaman Organisasi</h2>

                @foreach($organisasi as $item)
                    <div class="entry">
                        <strong>{{ $item['nama'] ?? '' }}</strong>
                        @if(($item['waktu'] ?? '') !== '')
                            <div class="meta">{{ $item['waktu'] }}</div>
                        @endif
                        @if(($item['keterangan'] ?? '') !== '')
                            <p>{{ \Illuminate\Support\Str::limit($item['keterangan'], 110) }}</p>
                        @endif
                    </div>
                @endforeach

                @foreach($orgGroups as $instansi => $items)
                    <div class="entry">
                        <strong>{{ $instansi !== '' ? $instansi : $items->first()->jabatan }}</strong>
                        @foreach($items as $item)
                            @php
                                $detail = collect([
                                    $item->judul,
                                    $item->periode,
                                    $item->jabatan,
                                ])->filter()->implode(' · ');
                            @endphp
                            @if($detail !== '')
                                <div class="meta">{{ $detail }}</div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif

        @if($panitiaGroups->count())
            <div class="block">
                <h2>Pengalaman Kepanitiaan</h2>

                @foreach($panitiaGroups as $instansi => $items)
                    <div class="entry">
                        <strong>{{ $instansi !== '' ? $instansi : $items->first()->jabatan }}</strong>
                        @foreach($items as $item)
                            @php
                                $detail = collect([
                                    $item->judul,
                                    $item->periode,
                                    $item->jabatan,
                                ])->filter()->implode(' · ');
                            @endphp
                            @if($detail !== '')
                                <div class="meta">{{ $detail }}</div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif

        @if($prestasi->count() || $lomba->count())
            <div class="block">
                <h2>Prestasi &amp; Pencapaian</h2>

                <ul class="bullets">
                    @foreach($prestasi as $item)
                        <li>
                            <strong>{{ $item->judul }}</strong>
                            @if($item->penyelenggara || $item->tahun) — {{ $item->penyelenggara }} {{ $item->tahun }} @endif
                        </li>
                    @endforeach

                    @foreach($lomba as $item)
                        <li>
                            <strong>{{ $item->jabatan ?: $item->instansi }}</strong>
                            @if($item->instansi && $item->jabatan) — {{ $item->instansi }} @endif
                            @if($item->periode) · {{ $item->periode }} @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="block">
            <h2>Hard Skill &amp; Soft Skill</h2>

            <div class="skill-group">
                <h3>Hard Skill</h3>
                <div class="chips">
                    @foreach(\App\Models\Profile::skillTeknis() as $skill)
                        @if(($skill['nama'] ?? '') !== '')
                            <span>{{ $skill['nama'] }}</span>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="skill-group">
                <h3>Soft Skill</h3>
                <div class="chips">
                    @foreach(\App\Models\Profile::skillNonTeknis() as $skill)
                        @if(($skill['nama'] ?? '') !== '')
                            <span>{{ $skill['nama'] }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        @if($sertifikat->count())
            <div class="block">
                <h2>Sertifikat</h2>

                <ul class="bullets">
                    @foreach($sertifikat as $item)
                        <li>
                            <strong>{{ $item->judul }}</strong>
                            @if($item->penyelenggara || $item->tahun) — {{ $item->penyelenggara }} {{ $item->tahun }} @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>

</div>

<script>
const body=document.body,toggleBtn=document.getElementById('theme-toggle'),themeWave=document.getElementById('theme-wave'),tm=window.matchMedia?window.matchMedia('(prefers-color-scheme: light)'):null;
function getSaved(){try{const s=localStorage.getItem('theme');return (s==='light'||s==='dark')?s:null;}catch(e){return null;}}
function render(mode,anim){body.setAttribute('data-theme',mode);const i=toggleBtn.querySelector('.theme-icon'),l=toggleBtn.querySelector('.theme-label');if(i)i.textContent=mode==='dark'?'☀️':'🌙';if(l)l.textContent=mode==='dark'?'Mode Terang':'Mode Gelap';if(anim){toggleBtn.classList.remove('clicked');void toggleBtn.offsetWidth;toggleBtn.classList.add('clicked');}}
function apply(mode,persist,anim){render(mode,anim);if(persist){try{localStorage.setItem('theme',mode);}catch(e){}}}
apply(getSaved()||body.getAttribute('data-theme')||'light',false,false);requestAnimationFrame(()=>document.documentElement.classList.add('theme-ready'));
if(tm){const sync=e=>{if(!getSaved())apply(e.matches?'light':'dark',false,false);}; if(tm.addEventListener)tm.addEventListener('change',sync); else if(tm.addListener)tm.addListener(sync);}
toggleBtn.addEventListener('click',()=>{const next=body.getAttribute('data-theme')==='dark'?'light':'dark';const r=toggleBtn.getBoundingClientRect();themeWave.style.setProperty('--theme-x', (r.left+r.width/2)+'px');themeWave.style.setProperty('--theme-y',(r.top+r.height/2)+'px');themeWave.style.background=next==='light'?'#faf9f9':'#0d0d10';themeWave.classList.remove('run');void themeWave.offsetWidth;themeWave.classList.add('run');apply(next,true,true);});
</script>
</body>
</html>
