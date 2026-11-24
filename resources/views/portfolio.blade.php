@php
use Illuminate\Support\Str;

$achievements = $achievements ?? collect();
$experiences  = $experiences ?? collect();
$testimonials = $testimonials ?? collect();
$visitorToken = $visitorToken ?? '';
$articles     = $articles ?? \App\Models\Article::published()->latest()->take(3)->get();
@endphp
<!DOCTYPE html>
<html lang="id" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ profile('meta_description', 'Portofolio Yuma Achmad Fairuza, siswa PPLG SMKN 2 Banjarmasin yang fokus pada Front-End Development, UI/UX Design, dan Laravel.') }}">
    <title>{{ profile('meta_title', 'Yuma Portfolio | Front-End Developer') }}</title>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

/* ============ TOKEN ============ */
:root{
  --primary:#f87171; --btn:#dc2626; --on-btn:#fff;
  --primary-soft:rgba(248,113,113,.12);
  --dark:#0d0d10; --dark2:#111114; --card:#16161a;
  --surface:rgba(255,255,255,.035);
  --text:#ececf0; --muted:#a1a1aa;
  --border:rgba(255,255,255,.1);
  --shadow:0 1px 2px rgba(0,0,0,.35),0 12px 32px rgba(0,0,0,.28);
  --radius:16px;
}
[data-theme="light"]{
  --primary:#dc2626; --btn:#dc2626; --on-btn:#fff;
  --primary-soft:rgba(220,38,38,.08);
  --dark:#faf9f9; --dark2:#fff; --card:#fff;
  --surface:#f7f5f5;
  --text:#18181b; --muted:#52525b;
  --border:#e7e5e4;
  --shadow:0 1px 2px rgba(24,24,27,.05),0 10px 30px rgba(24,24,27,.07);
}

*{margin:0;padding:0;box-sizing:border-box;font-family:'Inter','Segoe UI',system-ui,sans-serif}
a,button,.project-card{transition:.25s}
html{scroll-behavior:smooth}
body{background:var(--dark);color:var(--text);overflow-x:hidden;line-height:1.7;font-size:16.5px;-webkit-font-smoothing:antialiased}
html.theme-ready body,html.theme-ready body *,html.theme-ready body *::before,html.theme-ready body *::after{
  transition:background-color .35s ease,color .35s ease,border-color .35s ease,box-shadow .35s ease,fill .35s ease,stroke .35s ease!important;
}
section{padding:0;scroll-margin-top:90px}
.container{width:100%;max-width:1200px;margin:auto;padding:0 24px}
:focus-visible{outline:2px solid var(--primary);outline-offset:2px}

/* ============ NAVBAR ============ */
nav{position:fixed;width:100%;top:0;z-index:1000;backdrop-filter:blur(14px);background:rgba(8,17,31,.72);border-bottom:1px solid var(--border)}
[data-theme="light"] nav{background:rgba(255,255,255,.8)}
nav .container{display:flex;justify-content:space-between;align-items:center;padding:16px 24px}
.logo{color:var(--text);text-decoration:none;font-size:1.35rem;font-weight:800;letter-spacing:-.03em}
.logo span{color:var(--primary)}
nav ul{display:flex;gap:2px;list-style:none}
nav ul li a{color:var(--muted);text-decoration:none;font-size:.82rem;font-weight:600;white-space:nowrap;padding:8px 12px;border-radius:50px;display:inline-block}
nav ul li a:hover{color:var(--text);background:var(--surface)}
nav ul li a.active{color:var(--primary);background:var(--primary-soft)}
nav ul li a::after{display:none}
.nav-right{display:flex;align-items:center;gap:10px}
.hamburger{display:none;flex-direction:column;gap:5px;cursor:pointer;background:none;border:none;padding:6px}
.hamburger span{width:24px;height:2px;border-radius:10px;background:var(--text);display:block}
#theme-toggle,.btn-admin{border:1px solid var(--border);padding:9px 18px;border-radius:50px;font-weight:600;font-size:.82rem;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;justify-content:center;gap:8px}
#theme-toggle{background:transparent;color:var(--text);position:relative;overflow:hidden}
#theme-toggle:hover{border-color:var(--primary);color:var(--primary);transform:translateY(-2px)}
#theme-toggle .theme-icon{display:inline-block;line-height:1;transition:transform .45s ease}
#theme-toggle.clicked{animation:themeBtnPop .45s ease}
#theme-toggle.clicked .theme-icon{transform:rotate(360deg) scale(1.2)}
.btn-admin{background:var(--btn);color:var(--on-btn);border-color:var(--btn)}
#theme-wave{position:fixed;inset:0;z-index:10000;pointer-events:none;opacity:0;clip-path:circle(0% at var(--theme-x,50%) var(--theme-y,50%))}
#theme-wave.run{animation:themeWave .65s ease-out}
@keyframes themeWave{0%{opacity:.92;clip-path:circle(0% at var(--theme-x,50%) var(--theme-y,50%))}55%{opacity:.92;clip-path:circle(145% at var(--theme-x,50%) var(--theme-y,50%))}100%{opacity:0;clip-path:circle(145% at var(--theme-x,50%) var(--theme-y,50%))}}
@keyframes themeBtnPop{0%{transform:scale(1)}45%{transform:scale(.92)}100%{transform:scale(1)}}

/* ============ HERO ============ */
.hero{min-height:100vh;display:flex;align-items:center;padding:130px 0 80px;position:relative}
.hero::before{content:'';position:absolute;width:420px;height:420px;background:var(--primary);filter:blur(120px);opacity:.09;top:60px;right:-80px;pointer-events:none}
.hero-wrapper{display:grid;grid-template-columns:1.15fr .85fr;gap:72px;align-items:center}
.hero-left h4{display:inline-flex;align-items:center;gap:8px;color:var(--primary);background:var(--primary-soft);border:1px solid var(--border);padding:7px 14px;border-radius:50px;margin-bottom:22px;font-size:.78rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.hero-left h4::before{content:'';width:7px;height:7px;border-radius:50%;background:var(--btn)}
.hero-left h1{font-size:clamp(2.4rem,5vw,4.2rem);line-height:1.08;letter-spacing:-.04em;font-weight:800;text-transform:uppercase;margin-bottom:22px}
.hero-left p{color:var(--muted);line-height:1.8;font-size:1.06rem;max-width:560px;margin-bottom:20px}
.hero-info{display:grid;grid-template-columns:1fr 1.6fr;gap:12px;margin-bottom:20px}
.info-item{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:12px 18px;text-align:left}
.info-item small{display:block;color:var(--muted);font-size:.75rem;margin-bottom:3px}
.info-item strong{font-size:.95rem}
.hero-tags{margin:0 0 28px}
.hero-btns{display:flex;gap:12px;flex-wrap:wrap}
.btn-primary,.btn-secondary{padding:14px 26px;border-radius:50px;font-weight:600;font-size:.92rem;text-decoration:none;display:inline-block}
.btn-primary{background:var(--btn);color:var(--on-btn);border:1px solid var(--btn)}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(220,38,38,.28);filter:brightness(1.08)}
.btn-secondary{border:1px solid var(--border);color:var(--text);background:transparent;cursor:pointer}
.btn-secondary:hover{border-color:var(--primary);color:var(--primary);transform:translateY(-2px)}
.hero-card{position:relative;padding:0;background:none;border:none;box-shadow:none;text-align:center}
.hero-card::before{content:'';position:absolute;inset:18px -18px -18px 18px;border:1px solid var(--border);border-radius:32px;z-index:0}
.profile-img{position:relative;z-index:1;width:100%;max-width:420px;aspect-ratio:4/5;height:auto;object-fit:cover;border-radius:28px;border:1px solid var(--border);box-shadow:var(--shadow)}

/* ============ SECTION UMUM ============ */
.section-box{background:transparent;border:none;border-top:1px solid var(--border);border-radius:0;padding:88px 0;box-shadow:none}
.section-title{text-align:left;font-size:clamp(1.9rem,3.6vw,2.9rem);font-weight:800;letter-spacing:-.03em;text-transform:uppercase;margin-bottom:10px;line-height:1.1}
.section-title::before{content:'';display:block;width:36px;height:4px;border-radius:4px;background:var(--primary);margin-bottom:18px}
.section-subtitle{text-align:left;color:var(--muted);margin-bottom:44px;font-size:1.02rem}
.ach-empty{grid-column:1/-1;text-align:center;color:var(--muted);padding:32px;border:1px dashed var(--border);border-radius:var(--radius)}

/* ============ ABOUT & KONTAK ============ */
.about-grid,.contact-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px}
.about-card,.contact-card{background:var(--card);border:1px solid var(--border);padding:28px;border-radius:var(--radius)}
.about-card:hover{border-color:var(--primary)}
.about-card h3,.contact-card h3{color:var(--text);font-size:1.02rem;font-weight:700;margin-bottom:16px;letter-spacing:-.01em}
.contact-icons{display:flex;flex-wrap:wrap;gap:12px;margin:6px 0 4px}
.contact-icon{width:46px;height:46px;display:inline-flex;align-items:center;justify-content:center;border-radius:50%;background:var(--surface);border:1px solid var(--border);transition:transform .2s ease,border-color .2s ease,background .2s ease}
.contact-icon:hover{transform:translateY(-4px);border-color:var(--primary);background:var(--primary-soft)}
.contact-icon img{width:24px;height:24px;object-fit:contain}
[data-theme="light"] .contact-icon img.logo-github{filter:invert(1)}
.about-card p,.contact-card p{color:var(--muted);line-height:1.8}
.about-card a,.contact-card a{color:var(--primary);text-decoration:none;font-weight:600}
.about-list{list-style:none;display:grid;gap:10px}
.about-list li{color:var(--muted);font-size:.95rem;padding-bottom:10px;border-bottom:1px solid var(--border)}
.about-list li:last-child{border-bottom:none;padding-bottom:0}
.about-list li span{display:inline-block;width:84px;color:var(--text);font-weight:600}
.mini-timeline{display:grid;gap:14px}
.mini-item{border-left:2px solid var(--primary);padding-left:14px}
.mini-item strong{display:block;font-size:.95rem}
.mini-item small{display:block;color:var(--muted)}
.about-tags{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.about-tags span{background:var(--primary-soft);color:var(--primary);padding:6px 14px;border-radius:50px;font-size:.78rem;font-weight:600;border:1px solid transparent}

/* ============ SKILLS ============ */
.skills-wrapper{display:grid;grid-template-columns:1fr 1fr;gap:24px}
.skill-group{background:var(--card);border:1px solid var(--border);padding:28px;border-radius:var(--radius)}
.skill-group h3{color:var(--text);font-size:1.02rem;font-weight:700;margin-bottom:24px}
.skill-bar{margin-bottom:20px}
.skill-info{display:flex;justify-content:space-between;font-size:.88rem;font-weight:600;margin-bottom:8px}
.skill-info span:last-child{color:var(--primary)}
.bar{height:6px;background:var(--border);border-radius:50px;overflow:hidden}
.bar-fill{height:100%;width:0;background:var(--btn);border-radius:50px;transition:width 1.2s ease}

/* ============ PROYEK ============ */
.project-filter{max-width:none;margin:0 0 32px}
.project-filter input[type="search"]{margin-bottom:16px}
.filter-chips,.testi-filter{display:flex;flex-wrap:wrap;justify-content:flex-start;gap:8px}
.testi-filter{margin-bottom:30px}
.chip,.testi-chip,.tab-btn,.exp-tab-btn{border:1px solid var(--border);background:transparent;color:var(--muted);padding:8px 18px;border-radius:50px;font-size:.82rem;font-weight:600;cursor:pointer}
.tab-btn,.exp-tab-btn{padding:10px 22px;font-size:.9rem}
.chip:hover,.testi-chip:hover,.tab-btn:hover,.exp-tab-btn:hover{border-color:var(--primary);color:var(--text)}
.chip.active,.testi-chip.active,.tab-btn.active,.exp-tab-btn.active{background:var(--btn);color:var(--on-btn);border-color:var(--btn)}
.filter-info{text-align:left;color:var(--muted);font-size:.85rem;margin-top:12px;min-height:1.2em}
.project-empty{text-align:center;color:var(--muted);padding:32px;border:1px dashed var(--border);border-radius:var(--radius);margin-top:20px}
.project-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:28px}
.project-grid.single-project{grid-template-columns:1fr;max-width:820px;margin:0}
.single-project .project-card img{height:380px}
.project-card{background:var(--card);border:1px solid var(--border);border-radius:20px;overflow:hidden;box-shadow:none}
.project-card:hover{transform:translateY(-6px);border-color:var(--primary);box-shadow:var(--shadow)}
.project-card img{width:100%;height:220px;object-fit:cover;transition:transform .5s ease}
.project-card:hover img{transform:scale(1.03)}
.project-content{padding:24px}
.project-content h3{margin-bottom:10px;color:var(--text);font-size:1.15rem;letter-spacing:-.02em}
.project-content p{color:var(--muted);line-height:1.75;margin-bottom:18px;font-size:.94rem}
.project-tags{display:flex;flex-wrap:wrap;gap:8px}
.project-tags span{background:var(--primary-soft);color:var(--primary);padding:6px 13px;border-radius:50px;font-size:.76rem;font-weight:600}
.project-links{display:flex;flex-wrap:wrap;gap:10px;margin-top:20px}
.btn-sm{padding:9px 18px;font-size:.82rem;border-radius:50px}
.action-buttons{display:flex;gap:12px;margin-top:20px;flex-wrap:wrap}
.btn-delete,.btn-submit,.btn-cancel{border:none;padding:13px 22px;border-radius:50px;font-weight:600;cursor:pointer}
.btn-delete{background:#ef4444;color:#fff}
.btn-submit{background:var(--btn);color:var(--on-btn);width:100%}
.btn-submit:hover{transform:translateY(-2px);box-shadow:0 10px 24px var(--primary-soft);filter:brightness(1.06)}
.btn-cancel{display:none;width:100%;margin-top:10px;background:transparent;border:1px solid var(--border);color:var(--text)}

/* ============ SERTIFIKAT ============ */
.tabs{display:flex;justify-content:flex-start;gap:8px;flex-wrap:wrap;margin-bottom:32px}
.tab-panel,.exp-panel{display:none}
.tab-panel.active,.exp-panel.active{display:block}
.ach-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:24px}
.ach-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden}
.ach-card:hover{border-color:var(--primary)}
.ach-card img{width:100%;height:190px;object-fit:cover;cursor:zoom-in}
.ach-body{padding:20px}
.ach-body h3{color:var(--text);font-size:1.02rem;margin-bottom:6px}
.ach-meta{color:var(--muted);font-size:.84rem;margin-bottom:10px}
.ach-body p{color:var(--muted);line-height:1.7;font-size:.92rem}
.ach-link{display:inline-block;margin-top:12px;color:var(--primary);font-weight:600;font-size:.88rem;text-decoration:none}
.lightbox{position:fixed;inset:0;background:rgba(0,0,0,.85);display:none;align-items:center;justify-content:center;z-index:5000;padding:20px;cursor:zoom-out}
.lightbox.show{display:flex}
.lightbox img{max-width:100%;max-height:90vh;border-radius:12px}

/* ============ PENGALAMAN ============ */
.timeline{position:relative;max-width:820px;margin:0;padding-left:32px}
.timeline::before{content:'';position:absolute;left:7px;top:0;bottom:0;width:2px;background:var(--border);border-radius:2px}
.timeline-entry{position:relative;margin-bottom:24px}
.timeline-dot{position:absolute;left:-32px;top:24px;width:16px;height:16px;border-radius:50%;background:var(--btn);border:3px solid var(--dark)}
.timeline-content{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:22px}
.timeline-content:hover{border-color:var(--primary)}
.timeline-date{display:inline-block;color:var(--primary);font-size:.78rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase;margin-bottom:6px}
.timeline-content h3{font-size:1.05rem;margin-bottom:4px}
.timeline-org{color:var(--muted);font-size:.9rem;margin-bottom:10px}
.timeline-badge{display:inline-block;background:var(--primary-soft);color:var(--primary);padding:5px 14px;border-radius:50px;font-size:.76rem;font-weight:600;margin-bottom:10px}
.timeline-content p{color:var(--muted);line-height:1.7;font-size:.92rem}
.timeline-img{width:100%;max-height:220px;object-fit:cover;border-radius:12px;margin-top:14px;cursor:zoom-in}

/* ============ CV ============ */
.cv-cta{display:flex;justify-content:flex-start;gap:12px;flex-wrap:wrap}

/* ============ TESTIMONI ============ */
.testi-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px}
.testi-card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:26px;display:flex;flex-direction:column;justify-content:space-between;gap:18px}
.testi-card:hover{border-color:var(--primary)}
.testi-quote{font-size:3.4rem;line-height:.6;color:var(--primary);font-family:Georgia,serif}
.testi-text{color:var(--muted);line-height:1.8;font-size:.95rem}
.testi-author{display:flex;align-items:center;gap:14px}
.testi-avatar{width:50px;height:50px;border-radius:50%;object-fit:cover;flex-shrink:0;border:1px solid var(--border)}
.testi-initial{display:flex;align-items:center;justify-content:center;background:var(--primary-soft);color:var(--primary);font-weight:800;font-size:1.15rem}
.testi-author strong{display:block;font-size:.95rem}
.testi-author small{display:block;color:var(--muted);font-size:.8rem;margin-bottom:5px}
.testi-badge{display:inline-block;background:var(--primary-soft);color:var(--primary);padding:3px 12px;border-radius:50px;font-size:.72rem;font-weight:600}

/* ============ FORM ============ */
.form-styled{max-width:none;margin:0}
.form-group{margin-bottom:20px}
.form-group label{display:block;margin-bottom:8px;font-weight:600;font-size:.88rem}
input,select,textarea{width:100%;padding:14px 16px;border-radius:12px;border:1px solid var(--border);background:var(--surface);color:var(--text);outline:none;font-size:.95rem}
select option{background:var(--card);color:var(--text)}
input:focus,select:focus,textarea:focus{border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-soft)}
textarea{resize:none}
.form-group .rating{display:flex;flex-direction:row-reverse;justify-content:flex-end;gap:4px}
.form-group .rating input{display:none}
.form-group .rating label{font-size:2rem;line-height:1;margin:0;color:#64748b;cursor:pointer}
.form-group .rating input:checked ~ label,.form-group .rating label:hover,.form-group .rating label:hover ~ label{color:#fbbf24}
.form-alert{max-width:none;margin:0 0 20px;background:rgba(34,197,94,.12);border:1px solid rgba(34,197,94,.35);color:#22c55e;padding:12px 16px;border-radius:12px;font-size:.92rem}
.form-alert-error{background:rgba(239,68,68,.12);border-color:rgba(239,68,68,.35);color:#ef4444}

/* ============ KESAN & PESAN ============ */
.message-card{background:var(--card);border:1px solid var(--border);border-left:4px solid var(--primary);border-radius:var(--radius);padding:24px;margin:20px auto 0;max-width:750px;position:relative}
.message-card p{color:var(--muted);margin-top:10px;line-height:1.8}
.stars{color:#fbbf24;font-size:1.05rem;letter-spacing:2px;margin-top:6px}
.kesan{font-weight:600;margin-top:8px;font-style:italic}
.dropdown{position:absolute;top:15px;right:15px;z-index:1000}
.dropdown-btn{width:38px;height:38px;border:none;border-radius:50%;background:var(--surface);color:var(--text);font-size:20px;cursor:pointer;display:flex;align-items:center;justify-content:center}
.dropdown-btn:hover{background:var(--primary-soft)}
.dropdown-menu{position:absolute;top:45px;right:0;background:var(--card);border-radius:12px;overflow:hidden;display:none;min-width:130px;z-index:9999;border:1px solid var(--border);box-shadow:var(--shadow)}
.dropdown-menu button{width:100%;background:none;border:none;color:var(--text);padding:12px 15px;text-align:left;cursor:pointer;font-weight:600}
.dropdown-menu button:hover{background:var(--surface)}

footer{text-align:center;padding:40px 24px;color:var(--muted);font-size:.88rem;border-top:1px solid var(--border)}

/* ============ MODAL PROYEK ============ */
.modal{position:fixed;inset:0;background:rgba(0,0,0,.7);backdrop-filter:blur(4px);display:none;align-items:center;justify-content:center;padding:20px;z-index:4000}
.modal.show{display:flex}
.modal-box{position:relative;background:var(--card);border:1px solid var(--border);border-radius:24px;width:100%;max-width:640px;max-height:90vh;overflow-y:auto;box-shadow:var(--shadow)}
.modal-img{width:100%;height:260px;object-fit:cover;display:block}
.modal-body{padding:26px}
.modal-body h3{color:var(--text);margin-bottom:12px;font-size:1.25rem;letter-spacing:-.02em}
.modal-body p{color:var(--muted);line-height:1.8;margin-bottom:18px}
.modal-close{position:absolute;top:12px;right:12px;width:38px;height:38px;border:none;border-radius:50%;background:rgba(0,0,0,.6);color:#fff;font-size:1.4rem;cursor:pointer;z-index:2}

/* ============ KEMBALI KE ATAS ============ */
#back-to-top{position:fixed;right:20px;bottom:20px;width:46px;height:46px;border:1px solid var(--border);border-radius:50%;background:var(--btn);color:var(--on-btn);font-size:1.2rem;font-weight:800;cursor:pointer;box-shadow:var(--shadow);opacity:0;visibility:hidden;transform:translateY(10px);z-index:900}
#back-to-top.show{opacity:1;visibility:visible;transform:none}
#back-to-top:hover{transform:translateY(-5px);box-shadow:0 12px 30px var(--primary-soft)}
#back-to-top:active{transform:scale(.9)}
#back-to-top.launch{animation:launch .7s cubic-bezier(.22,1,.36,1)}
@keyframes launch{0%{transform:translateY(0) scale(1)}35%{transform:translateY(-22px) scale(1.15)}100%{transform:translateY(0) scale(1)}}

/* ============ ANIMASI ============ */
body{animation:pageIn .5s ease}
body.leaving{opacity:0;transition:opacity .25s ease}
@keyframes pageIn{from{opacity:0}to{opacity:1}}
.reveal{opacity:0;transform:translateY(30px);transition:opacity .6s ease,transform .6s ease}
.reveal.show{opacity:1;transform:none}
.sr{opacity:0}
.sr.show{opacity:1;animation:srUp .8s cubic-bezier(.22,1,.36,1) backwards;animation-delay:var(--d,0s)}
.sr.from-left.show{animation-name:srLeft}
.sr.from-right.show{animation-name:srRight}
@keyframes srUp{from{opacity:0;transform:translateY(40px) scale(.97)}}
@keyframes srLeft{from{opacity:0;transform:translateX(-50px)}}
@keyframes srRight{from{opacity:0;transform:translateX(50px)}}
.sr:not(.show){transition:none}
.sr.from-sm.show{animation-name:srUpSm;animation-duration:.6s}
@keyframes srUpSm{from{opacity:0;transform:translateY(20px)}}
.sr.from-pop.show{animation-name:srPop;animation-duration:.9s}
@keyframes srPop{from{opacity:0;transform:translateY(36px) scale(.96)}}

#scroll-progress{position:fixed;top:0;left:0;width:100%;height:3px;background:var(--btn);transform:scaleX(0);transform-origin:left;z-index:1100;pointer-events:none}
nav .container{transition:padding .3s ease}
nav.scrolled{box-shadow:0 8px 30px rgba(0,0,0,.18)}
nav.scrolled .container{padding-top:10px;padding-bottom:10px}
nav ul li a:active{transform:scale(.94)}
.hamburger span{transition:transform .3s ease,opacity .2s ease}
.hamburger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.hamburger.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.hamburger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
nav ul.active{animation:menuDown .3s ease}
@keyframes menuDown{from{opacity:0;transform:translateY(-12px)}}
.section-box.flash{animation:boxFlash 1.3s ease}
@keyframes boxFlash{0%{background:transparent}30%{background:var(--primary-soft)}100%{background:transparent}}

/* ============ INTRO ============ */
body.intro-lock{overflow:hidden}
#intro{position:fixed;inset:0;z-index:6000;background:var(--dark);display:flex;flex-direction:column;align-items:center;justify-content:center;gap:18px;transition:transform .9s cubic-bezier(.77,0,.18,1),opacity .5s ease .4s,visibility 0s linear 1s}
#intro.hide{transform:translateY(-100%);opacity:0;visibility:hidden}
.intro-logo{font-size:2.2rem;font-weight:800;letter-spacing:-.04em;animation:introPop .8s cubic-bezier(.22,1,.36,1) both}
.intro-logo span{color:var(--primary)}
.intro-bar{width:160px;height:3px;border-radius:4px;background:var(--border);overflow:hidden}
.intro-bar i{display:block;width:100%;height:100%;background:var(--primary);transform:scaleX(0);transform-origin:left;animation:introLoad 1.1s ease forwards}
@keyframes introPop{from{opacity:0;transform:scale(.8) translateY(20px)}}
@keyframes introLoad{to{transform:scaleX(1)}}
nav{transition:transform .9s cubic-bezier(.22,1,.36,1),box-shadow .3s ease}
body:not(.ready) nav{transform:translateY(-110%)}

/* ============ BLOG ============ */
.blog-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px}
.blog-card{display:flex;flex-direction:column;background:var(--card);border:1px solid var(--border);border-radius:20px;overflow:hidden;text-decoration:none;color:var(--text)}
.blog-card:hover{transform:translateY(-6px);border-color:var(--primary);box-shadow:var(--shadow)}
.blog-card img{width:100%;height:180px;object-fit:cover}
.blog-body{padding:22px;display:flex;flex-direction:column;gap:10px;flex:1}
.blog-meta{display:flex;justify-content:space-between;align-items:center;gap:10px}
.blog-meta small{color:var(--muted)}
.blog-cat{background:var(--primary-soft);color:var(--primary);padding:5px 13px;border-radius:50px;font-size:.74rem;font-weight:600}
.blog-body h3{color:var(--text);font-size:1.1rem;line-height:1.4;letter-spacing:-.01em}
.blog-body p{color:var(--muted);line-height:1.7;font-size:.92rem}
.blog-tags{display:flex;flex-wrap:wrap;gap:8px;margin-top:auto}
.blog-tags span{color:var(--muted);font-size:.78rem;font-weight:600}

/* ============ RESPONSIVE ============ */
@media(max-width:1100px){
  nav ul{position:absolute;top:100%;left:0;width:100%;background:var(--card);flex-direction:column;align-items:center;gap:6px;padding:24px 0;display:none;max-height:calc(100vh - 70px);overflow-y:auto;border-bottom:1px solid var(--border)}
  nav ul.active{display:flex}
  nav ul li a{font-size:.95rem}
  .hamburger{display:flex}
  .nav-right{gap:8px}
  .btn-admin,#theme-toggle{width:42px;height:42px;padding:0;border-radius:50%}
  .btn-admin{font-size:0}
  .btn-admin::before{content:'⚙';font-size:18px}
  #theme-toggle .theme-label{display:none}
  #theme-toggle .theme-icon{font-size:18px}
}
@media(max-width:900px){
  .hero{padding:150px 0 70px}
  .hero-wrapper,.about-grid,.contact-grid,.skills-wrapper{grid-template-columns:1fr}
  .hero-wrapper{display:flex;flex-direction:column-reverse;text-align:center;gap:48px}
  .hero-left p{margin-left:auto;margin-right:auto}
  .hero-btns,.hero-tags{justify-content:center}
  .hero-card::before{inset:14px -10px -14px 10px}
  .profile-img{max-width:320px}
  .section-box{padding:64px 0}
}
@media(max-width:600px){
  .hero-info{grid-template-columns:1fr}
  .section-box{padding:52px 0}
  .project-grid{grid-template-columns:1fr}
  .about-card,.skill-group,.contact-card{padding:22px}
  .about-list li span{width:72px}
}
@media(prefers-reduced-motion:reduce){*{animation-duration:.01ms!important;transition-duration:.01ms!important}}

/* ============ EFEK KETIK NAMA ============ */
.hero-left h1.typing::after{content:'';display:inline-block;width:.06em;height:.86em;margin-left:.08em;vertical-align:-.06em;background:var(--btn);animation:caretBlink .8s steps(1) infinite}
@keyframes caretBlink{50%{opacity:0}}
    </style>
</head>

<body data-theme="dark" class="intro-lock">
<script>
    (function () {
        try {
            var saved = localStorage.getItem('theme');
            var theme = (saved === 'light' || saved === 'dark')
                ? saved
                : (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');
            document.body.setAttribute('data-theme', theme);
        } catch (e) {}
    })();
</script>

<div id="theme-wave" aria-hidden="true"></div>

<noscript><style>#intro{display:none}.sr{opacity:1}</style></noscript>

<div id="intro" aria-hidden="true">
    <div class="intro-logo">Porto<span>folio</span></div>
    <div class="intro-bar"><i></i></div>
</div>

<div id="scroll-progress"></div>

<nav>
    <div class="container">

        <a href="#home" class="logo">
            Porto<span>folio</span>
        </a>

        <ul id="nav-menu">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about-me">Tentang</a></li>
            <li><a href="#skills">Keahlian</a></li>
            <li><a href="#project">Proyek</a></li>
            <li><a href="#pencapaian">Sertifikat</a></li>
            <li><a href="#pengalaman">Pengalaman</a></li>
            <li><a href="#testimoni">Testimoni</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="#contact">Kontak &amp; Pesan</a></li>
        </ul>

        <div class="nav-right">

            <button id="theme-toggle" type="button" aria-label="Ganti tema"><span class="theme-icon">☀️</span><span class="theme-label">Mode Terang</span></button>

            <button class="hamburger" id="hamburger" type="button" aria-label="Buka menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

    </div>
</nav>

<header class="hero" id="home">
    <div class="container">
        <div class="hero-wrapper">

            <div class="hero-left">

                @php
                    $namaLengkap = profile('nama', 'Yuma Achmad Fairuza');
                    $namaDepan = \Illuminate\Support\Str::before($namaLengkap, ' ');
                    $namaBelakang = \Illuminate\Support\Str::after($namaLengkap, ' ');
                    $tagHero = array_filter(array_map('trim', explode('|', profile('tag_hero', 'Front-End Development|Laravel|UI/UX Design'))));
                @endphp

                <h4>{{ profile('role', 'Front-End Developer') }}</h4>

                <h1>
                    {{ $namaDepan }}
                    <span style="color:var(--primary);">{{ $namaBelakang }}</span>
                </h1>

                <p>{{ profile('bio_singkat', 'Siswa SMKN 2 Banjarmasin jurusan PPLG yang fokus pada Front-End Development, UI/UX Design, dan Laravel Development.') }}</p>

                <div class="about-tags hero-tags">
                    @foreach($tagHero as $tag)
                        <span>{{ $tag }}</span>
                    @endforeach
                </div>

                <div class="hero-btns">
                    <a href="#project" class="btn-primary">Lihat Portofolio</a>
                    <a href="{{ route('cv') }}" class="btn-secondary">Lihat CV</a>
                    <a href="#contact" class="btn-secondary">Hubungi Saya</a>
                </div>

            </div>

            <div class="hero-card">
                <img
                    src="{{ asset('img/' . profile('foto', 'Yuma.jpeg')) }}"
                    class="profile-img"
                    alt="Foto {{ profile('nama', 'Yuma Achmad Fairuza') }}"
                >
            </div>

        </div>
    </div>
</header>

<section id="about-me">
    <div class="container">
        <div class="section-box">

            <h2 class="section-title">{{ profile('tentang_judul', 'Tentang Saya') }}</h2>
            <p class="section-subtitle">{{ profile('tentang_subtitle', 'Sedikit tentang diri saya') }}</p>

            <div class="about-grid">

                <div class="about-card">
                    <h3>👤 Biodata Singkat</h3>
                    <ul class="about-list">
                        <li><span>Nama</span> {{ profile('nama', 'Yuma Achmad Fairuza') }}</li>
                        <li><span>Kelas</span> {{ profile('kelas', 'XII PPLG A') }}</li>
                        <li><span>Sekolah</span> {{ profile('sekolah', 'SMKN 2 Banjarmasin') }}</li>
                        <li><span>Domisili</span> {{ profile('domisili', 'Banjarmasin') }}</li>
                        <li><span>Email</span> <a href="mailto:{{ profile('email', 'yumaachmad2@gmail.com') }}">{{ profile('email', 'yumaachmad2@gmail.com') }}</a></li>
                    </ul>
                </div>

                <div class="about-card">
                    <h3>🎓 Riwayat Pendidikan</h3>
                    <div class="mini-timeline">
                        @foreach(\App\Models\Profile::pendidikan() as $item)
                            <div class="mini-item">
                                <strong>{{ $item['nama'] ?? '' }}</strong>
                                <small>{{ $item['waktu'] ?? '' }}</small>
                                @if(! empty($item['keterangan'] ?? ''))
                                    <small>{{ $item['keterangan'] }}</small>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="about-card">
                    <h3>💡 Minat &amp; Teknologi</h3>
                    <p>Minat: {{ profile('minat', 'Web Development, UI/UX Design, Laravel.') }}</p>
                    <div class="about-tags">
                        @foreach(\App\Models\Profile::teknologi() as $item)
                            <span>{{ $item['nama'] ?? '' }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="about-card">
                    <h3>🤝 Organisasi &amp; Kepanitiaan</h3>
                    <div class="mini-timeline">
                        @php
                            $orgItems = $experiences->whereIn('kategori', ['organisasi', 'kepanitiaan']);
                        @endphp

                        @if($orgItems->isNotEmpty())
                            @foreach($orgItems->groupBy('instansi') as $instansi => $items)
                                <div class="mini-item">
                                    <strong>{{ $instansi !== '' ? $instansi : $items->first()->judul }}</strong>
                                    @foreach($items as $item)
                                        @php
                                            $detail = collect([
                                                $item->judul,
                                                $item->periode,
                                                $item->jabatan,
                                            ])->filter()->implode(' · ');
                                        @endphp
                                        @if($detail !== '')
                                            <small>{{ $detail }}</small>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        @else
                            @foreach(\App\Models\Profile::organisasi() as $item)
                                <div class="mini-item">
                                    <strong>{{ $item['nama'] ?? '' }}</strong>
                                    <small>{{ $item['waktu'] ?? '' }}</small>
                                    @if(! empty($item['keterangan'] ?? ''))
                                        <small>{{ $item['keterangan'] }}</small>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="about-card">
                    @php
                        $pkl = $experiences->firstWhere('kategori', 'pkl');
                    @endphp

                    <h3>🏢 Pengalaman PKL</h3>
                    <div class="mini-timeline">
                        <div class="mini-item">
                            <strong>{{ $pkl?->instansi ?: ($pkl?->judul ?? 'Nama Perusahaan PKL') }}</strong>
                            <small>{{ $pkl?->periode ?: 'Web Developer · 2026' }}</small>
                        </div>
                    </div>
                    <p style="margin-top:12px;">
                        {!! $pkl?->deskripsi ? e(Str::limit($pkl->deskripsi, 120)) : 'Membuat dan memelihara website menggunakan Laravel.' !!}
                        <a href="#pengalaman">Lihat selengkapnya →</a>
                    </p>
                </div>

                <div class="about-card">
                    <h3>🎯 Cita-cita &amp; Tujuan Karir</h3>
                    <p>{{ profile('cita_cita', 'Menjadi Front-End Developer profesional yang mampu membuat tampilan modern dan pengalaman pengguna terbaik, serta terus belajar mengikuti perkembangan teknologi.') }}</p>
                </div>

            </div>

        </div>
    </div>
</section>

<section id="skills">
    <div class="container">
        <div class="section-box">

            <h2 class="section-title">{{ profile('keahlian_judul', 'Keahlian') }}</h2>
            <p class="section-subtitle">{{ profile('keahlian_subtitle', 'Kemampuan teknis dan non teknis saya') }}</p>

            <div class="skills-wrapper">

                <div class="skill-group">
                    <h3>💻 Kemampuan Teknis</h3>

                    @foreach(\App\Models\Profile::skillTeknis() as $skill)
                        <div class="skill-bar">
                            <div class="skill-info"><span>{{ $skill['nama'] ?? '' }}</span><span>{{ $skill['persen'] ?? 0 }}%</span></div>
                            <div class="bar"><div class="bar-fill" data-percent="{{ $skill['persen'] ?? 0 }}"></div></div>
                        </div>
                    @endforeach
                </div>

                <div class="skill-group">
                    <h3>🤝 Kemampuan Non Teknis</h3>

                    @foreach(\App\Models\Profile::skillNonTeknis() as $skill)
                        <div class="skill-bar">
                            <div class="skill-info"><span>{{ $skill['nama'] ?? '' }}</span><span>{{ $skill['persen'] ?? 0 }}%</span></div>
                            <div class="bar"><div class="bar-fill" data-percent="{{ $skill['persen'] ?? 0 }}"></div></div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</section>

<section id="project">
    <div class="container">
        <div class="section-box">

            <h2 class="section-title">{{ profile('project_judul', 'Proyek') }}</h2>
            <p class="section-subtitle">{{ profile('project_subtitle', 'Proyek yang pernah saya buat') }}</p>

            @php
                $semuaTeknologi = $projects
                    ->flatMap(fn($p) => array_filter(array_map('trim', explode(',', $p->teknologi ?? ''))))
                    ->unique(fn($t) => strtolower($t))
                    ->sort()
                    ->values();
            @endphp

            <div class="project-filter">

                <input
                    type="search"
                    id="project-search"
                    placeholder="🔍 Cari proyek (judul, deskripsi, teknologi)..."
                    aria-label="Cari proyek"
                >

                <div class="filter-chips" id="filter-chips">
                    <button type="button" class="chip active" data-tech="all">Semua</button>

                    @foreach($semuaTeknologi as $tech)
                        <button type="button" class="chip" data-tech="{{ strtolower($tech) }}">{{ $tech }}</button>
                    @endforeach
                </div>

                <div class="filter-info" id="filter-info"></div>

            </div>

            <div class="project-grid {{ $projects->count() === 1 ? 'single-project' : '' }}">

                {{-- PROJECT DATABASE --}}
                @foreach($projects as $project)
                    @php
                        $gambarUrl = ($project->gambar && file_exists(public_path('img/' . $project->gambar)))
                            ? asset('img/' . $project->gambar)
                            : asset('img/desktop view 1.jpeg');

                        $techs = $project->teknologi
                            ? array_filter(array_map('trim', explode(',', $project->teknologi)))
                            : [];
                    @endphp

                    <div
                        class="project-card"
                        data-search="{{ strtolower($project->judul . ' ' . $project->deskripsi . ' ' . $project->teknologi) }}"
                        data-tech="{{ collect(explode(',', $project->teknologi ?? ''))->map(fn($t) => strtolower(trim($t)))->filter()->implode('|') }}"
                        data-judul="{{ $project->judul }}"
                        data-deskripsi="{{ $project->deskripsi }}"
                        data-teknologi="{{ $project->teknologi }}"
                        data-gambar="{{ $gambarUrl }}"
                        data-demo="{{ $project->link_demo }}"
                        data-github="{{ $project->link_github }}"
                        data-detail="{{ route('project.show', $project->id) }}"
                    >

                        <img
                            src="{{ $gambarUrl }}"
                            alt="{{ $project->judul }}"
                            loading="lazy"
                        >

                        <div class="project-content">

                            <h3>{{ $project->judul }}</h3>
                            <p>{{ Str::limit($project->deskripsi, 120) }}</p>

                            {{-- TECHNOLOGY TAGS --}}
                            <div class="project-tags">
                                @if(count($techs) > 0)
                                    @foreach($techs as $tech)
                                        <span>{{ $tech }}</span>
                                    @endforeach
                                @else
                                    <span>Belum ada teknologi</span>
                                @endif
                            </div>

                            <div class="project-links">
                                <button type="button" class="btn-secondary btn-sm preview-btn">Preview</button>
                                <a href="{{ route('project.show', $project->id) }}" class="btn-primary btn-sm">Lihat Detail</a>

                                @if($project->link_demo)
                                    <a href="{{ $project->link_demo }}" target="_blank" rel="noopener" class="btn-secondary btn-sm">Demo</a>
                                @endif

                                @if($project->link_github)
                                    <a href="{{ $project->link_github }}" target="_blank" rel="noopener" class="btn-secondary btn-sm">GitHub</a>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="project-empty" id="project-empty" style="display:none;">
                Tidak ada proyek yang cocok dengan pencarianmu.
            </div>

        </div>
    </div>
</section>

<section id="pencapaian">
    <div class="container">
        <div class="section-box">

            <h2 class="section-title">{{ profile('pencapaian_judul', 'Sertifikat') }}</h2>
            <p class="section-subtitle">{{ profile('pencapaian_subtitle', 'Sertifikat yang pernah saya peroleh') }}</p>

            <div class="ach-grid">

                @forelse($achievements->where('kategori', 'sertifikat') as $item)
                    <div class="ach-card">

                        @if($item->gambar && file_exists(public_path('img/' . $item->gambar)))
                            <img
                                src="{{ asset('img/' . $item->gambar) }}"
                                alt="{{ $item->judul }}"
                                loading="lazy"
                                class="zoomable"
                            >
                        @endif

                        <div class="ach-body">
                            <h3>{{ $item->judul }}</h3>

                            @if($item->penyelenggara || $item->tahun)
                                <div class="ach-meta">
                                    {{ $item->penyelenggara }}
                                    @if($item->penyelenggara && $item->tahun) · @endif
                                    {{ $item->tahun }}
                                </div>
                            @endif

                            @if($item->deskripsi)
                                <p>{{ $item->deskripsi }}</p>
                            @endif

                            @if($item->link)
                                <a href="{{ $item->link }}" target="_blank" rel="noopener" class="ach-link">
                                    Lihat Selengkapnya →
                                </a>
                            @endif
                        </div>

                    </div>
                @empty
                    <div class="ach-empty">Belum ada sertifikat.</div>
                @endforelse

            </div>

        </div>
    </div>
</section>

<section id="pengalaman">
    <div class="container">
        <div class="section-box">

            <h2 class="section-title">{{ profile('pengalaman_judul', 'Pengalaman') }}</h2>
            <p class="section-subtitle">{{ profile('pengalaman_subtitle', 'Perjalanan PKL, organisasi, kepanitiaan, dan lomba yang pernah saya ikuti') }}</p>

            @php
                $expTabs = [
                    'pkl'         => '🏢 PKL',
                    'organisasi'  => '🤝 Organisasi',
                    'kepanitiaan' => '📋 Kepanitiaan',
                    'lomba'       => '🏆 Lomba',
                ];
            @endphp

            <div class="tabs">
                @foreach($expTabs as $key => $label)
                    <button type="button" class="exp-tab-btn {{ $loop->first ? 'active' : '' }}" data-tab="{{ $key }}">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            @foreach($expTabs as $key => $label)
                <div class="exp-panel {{ $loop->first ? 'active' : '' }}" id="exp-{{ $key }}">

                    <div class="timeline">
                        @forelse($experiences->where('kategori', $key) as $item)
                            <div class="timeline-entry">
                                <div class="timeline-dot"></div>

                                <div class="timeline-content">
                                    @if($item->periode)
                                        <span class="timeline-date">{{ $item->periode }}</span>
                                    @endif

                                    <h3>{{ $item->judul ?: $item->instansi }}</h3>
                                    @if($item->judul)
                                        <div class="timeline-org">{{ $item->instansi }}</div>
                                    @endif

                                    @if($item->jabatan)
                                        <span class="timeline-badge">{{ $item->jabatan }}</span>
                                    @endif

                                    @if($item->deskripsi)
                                        <p>{{ $item->deskripsi }}</p>
                                    @endif

                                    @if($item->gambar && file_exists(public_path('img/' . $item->gambar)))
                                        <img
                                            src="{{ asset('img/' . $item->gambar) }}"
                                            alt="{{ $item->judul ?: $item->instansi }}"
                                            loading="lazy"
                                            class="zoomable timeline-img"
                                        >
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="ach-empty">Belum ada data {{ strtolower($label) }}.</div>
                        @endforelse
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</section>

<section id="testimoni">
    <div class="container">
        <div class="section-box">

            <h2 class="section-title">{{ profile('testimoni_judul', 'Testimoni') }}</h2>
            <p class="section-subtitle">{{ profile('testimoni_subtitle', 'Apa kata guru, teman, pengguna, dan tempat PKL tentang saya') }}</p>

            @php
                $testiLabel = [
                    'guru'     => 'Guru Pembimbing',
                    'teman'    => 'Teman',
                    'pengguna' => 'Pengguna',
                    'pkl'      => 'Tempat PKL',
                ];
            @endphp

            <div class="testi-filter">
                <button type="button" class="testi-chip active" data-kat="all">Semua</button>
                @foreach($testiLabel as $key => $label)
                    <button type="button" class="testi-chip" data-kat="{{ $key }}">{{ $label }}</button>
                @endforeach
            </div>

            <div class="testi-grid">
                @forelse($testimonials as $item)
                    <div class="testi-card" data-kat="{{ $item->kategori }}">

                        <div class="testi-quote">“</div>
                        <p class="testi-text">{{ $item->isi }}</p>

                        @if($item->rating)
                            <div class="stars" aria-label="{{ $item->rating }} dari 5 bintang">
                                {{ str_repeat('★', $item->rating) }}{{ str_repeat('☆', 5 - $item->rating) }}
                            </div>
                        @endif

                        <div class="testi-author">
                            @if($item->foto && file_exists(public_path('img/' . $item->foto)))
                                <img src="{{ asset('img/' . $item->foto) }}" alt="{{ $item->nama }}" loading="lazy" class="testi-avatar">
                            @else
                                <div class="testi-avatar testi-initial">
                                    {{ strtoupper(mb_substr($item->nama, 0, 1)) }}
                                </div>
                            @endif

                            <div>
                                <strong>{{ $item->nama }}</strong>
                                @if($item->jabatan)
                                    <small>{{ $item->jabatan }}</small>
                                @endif
                                <span class="testi-badge">{{ $testiLabel[$item->kategori] ?? $item->kategori }}</span>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="ach-empty">Belum ada testimoni.</div>
                @endforelse
            </div>

            <div class="ach-empty" id="testi-empty" style="display:none;">
                Belum ada testimoni di kategori ini.
            </div>

            <div class="about-card" style="margin-top:35px;">
                <h3>Tulis Testimoni</h3>

                @if(session('testimonial_success'))
                    <div class="form-alert">{{ session('testimonial_success') }}</div>
                @endif

                @if($errors->has('testi_nama') || $errors->has('testi_kategori') || $errors->has('testi_rating') || $errors->has('testi_isi') || $errors->has('testi_foto'))
                    <div class="form-alert form-alert-error">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form
                    action="{{ route('testimonial.submit') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="form-styled"
                >
                    @csrf

                    <div class="form-group">
                        <label for="testi-nama">Nama</label>
                        <input type="text" name="testi_nama" id="testi-nama" value="{{ old('testi_nama') }}" placeholder="Nama kamu" required maxlength="100">
                    </div>

                    <div class="form-group">
                        <label for="testi-sebagai">Sebagai</label>
                        <select name="testi_kategori" id="testi-sebagai" required>
                            <option value="" disabled {{ old('testi_kategori') ? '' : 'selected' }}>Pilih peran</option>
                            @foreach($testiLabel as $key => $label)
                                <option value="{{ $key }}" {{ old('testi_kategori') === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Penilaian</label>
                        <div class="rating">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" name="testi_rating" id="testi-star{{ $i }}" value="{{ $i }}" {{ old('testi_rating') == $i ? 'checked' : '' }} required>
                                <label for="testi-star{{ $i }}" title="{{ $i }} bintang">★</label>
                            @endfor
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="testi-isi">Testimoni</label>
                        <textarea name="testi_isi" id="testi-isi" rows="4" required maxlength="1000" placeholder="Tulis pengalaman atau kesan kamu tentang portofolio ini...">{{ old('testi_isi') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="testi-foto">Foto (opsional)</label>
                        <input type="file" name="testi_foto" id="testi-foto" accept="image/*">
                    </div>

                    <button type="submit" class="btn-submit">Kirim Testimoni</button>
                </form>
            </div>

        </div>
    </div>
</section>

<section id="blog">
    <div class="container">
        <div class="section-box">

            <h2 class="section-title">{{ profile('blog_judul', 'Blog Pengembang') }}</h2>
            <p class="section-subtitle">{{ profile('blog_subtitle', 'Catatan ngoding, tutorial singkat, dan dokumentasi penyelesaian masalah') }}</p>

            <div class="blog-grid">
                @forelse($articles as $a)
                    @include('blog._card', ['a' => $a])
                @empty
                    <div class="ach-empty">Belum ada artikel.</div>
                @endforelse
            </div>

            <div class="cv-cta" style="margin-top:35px;">
                <a href="{{ route('blog.index') }}" class="btn-primary">📝 Lihat Semua Artikel</a>
            </div>

        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="section-box">

            <h2 class="section-title">{{ profile('kontak_judul', 'Hubungi Saya') }}</h2>
            <p class="section-subtitle">{{ profile('kontak_subtitle', 'Hubungi saya melalui form atau sosial media') }}</p>

            @if(session('success_message'))
                <div class="form-alert">{{ session('success_message') }}</div>
            @endif

            @if($errors->any())
                <div class="form-alert form-alert-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="contact-grid">

                <div class="about-card">
                    <h3>Informasi Kontak</h3>

                    <div class="contact-icons">
                        <a class="contact-icon" href="mailto:{{ profile('email', 'yumaachmad2@gmail.com') }}" title="Email" aria-label="Email">
                            <img src="{{ asset('img/email.svg') }}" alt="Email">
                        </a>

                        <a class="contact-icon" href="https://wa.me/{{ profile('whatsapp_link', '6288242814157') }}" target="_blank" rel="noopener" title="WhatsApp" aria-label="WhatsApp">
                            <img src="{{ asset('img/whatsapp.svg') }}" alt="WhatsApp">
                        </a>

                        <a class="contact-icon" href="https://instagram.com/{{ ltrim(profile('instagram', '@yuma_rayhan'), '@') }}" target="_blank" rel="noopener" title="Instagram" aria-label="Instagram">
                            <img src="{{ asset('img/instagram.svg') }}" alt="Instagram">
                        </a>

                        <a class="contact-icon" href="{{ profile('github', 'https://github.com/Yuma7709') }}" target="_blank" rel="noopener" title="GitHub" aria-label="GitHub">
                            <img class="logo-github" src="{{ asset('img/github.svg') }}" alt="GitHub">
                        </a>
                    </div>

                    <p style="font-size:14px;margin-top:12px;">
                        {{ profile('kontak_ajakan', 'Silakan kirim pesan jika ingin kerja sama atau diskusi proyek.') }}
                    </p>
                </div>

                <div class="about-card">
                    <h3 id="form-title">{{ profile('pesan_judul', 'Kesan dan Pesan') }}</h3>

                    <form
                        action="{{ route('message.store') }}"
                        method="POST"
                        class="form-styled"
                        id="messageForm"
                    >
                        @csrf

                        <div class="form-group">
                            <label for="input-nama">Nama</label>
                            <input type="text" name="nama" id="input-nama" value="{{ old('nama') }}" required maxlength="100">
                        </div>

                        <div class="form-group">
                            <label for="input-kesan">Kesan</label>
                            <input type="text" name="kesan" id="input-kesan" value="{{ old('kesan') }}" required maxlength="255" placeholder="Kesan singkat setelah melihat portofolio ini">
                        </div>

                        <div class="form-group">
                            <label for="input-pesan">Pesan</label>
                            <textarea name="pesan" id="input-pesan" rows="5" required maxlength="1000" placeholder="Tulis pesan atau saran kamu...">{{ old('pesan') }}</textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            Kirim Kesan dan Pesan
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>

<footer>
    {{ profile('footer', '© 2026 Yuma Achmad Fairuza — All Rights Reserved') }}
</footer>

<button type="button" id="back-to-top" aria-label="Kembali ke atas">↑</button>

<div class="lightbox" id="lightbox">
    <img src="" alt="Pratinjau gambar" id="lightbox-img">
</div>

<div class="modal" id="project-modal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="pm-title">

        <button type="button" class="modal-close" id="pm-close" aria-label="Tutup">×</button>

        <img src="" alt="" id="pm-img" class="modal-img">

        <div class="modal-body">
            <h3 id="pm-title"></h3>
            <p id="pm-desc"></p>

            <div class="project-tags" id="pm-tags"></div>

            <div class="project-links">
                <a href="#" id="pm-detail" class="btn-primary btn-sm">Lihat Detail</a>
                <a href="#" id="pm-demo" class="btn-secondary btn-sm" target="_blank" rel="noopener">Demo</a>
                <a href="#" id="pm-github" class="btn-secondary btn-sm" target="_blank" rel="noopener">GitHub</a>
            </div>
        </div>

    </div>
</div>

<script>
    // ===== TEMA GELAP / TERANG =====
    const toggleBtn = document.getElementById('theme-toggle');
    const themeWave = document.getElementById('theme-wave');
    const body = document.body;
    const themeMedia = window.matchMedia ? window.matchMedia('(prefers-color-scheme: light)') : null;

    function getSavedTheme(){
        try {
            const saved = localStorage.getItem('theme');
            return (saved === 'light' || saved === 'dark') ? saved : null;
        } catch (e) { return null; }
    }

    function renderTheme(mode, animate){
        body.setAttribute('data-theme', mode);
        const icon = toggleBtn.querySelector('.theme-icon');
        const label = toggleBtn.querySelector('.theme-label');
        if (icon) icon.textContent = mode === 'dark' ? '☀️' : '🌙';
        if (label) label.textContent = mode === 'dark' ? 'Mode Terang' : 'Mode Gelap';
        if (animate) {
            toggleBtn.classList.remove('clicked');
            void toggleBtn.offsetWidth;
            toggleBtn.classList.add('clicked');
        }
    }

    function applyTheme(mode, persist, animate){
        renderTheme(mode, animate);
        if (persist) {
            try { localStorage.setItem('theme', mode); } catch (e) {}
        }
    }

    const initialTheme = getSavedTheme() || body.getAttribute('data-theme') || 'dark';
    applyTheme(initialTheme, false, false);
    requestAnimationFrame(() => document.documentElement.classList.add('theme-ready'));

    if (themeMedia) {
        const syncSystemTheme = (e) => {
            if (!getSavedTheme()) applyTheme(e.matches ? 'light' : 'dark', false, false);
        };
        if (themeMedia.addEventListener) themeMedia.addEventListener('change', syncSystemTheme);
        else if (themeMedia.addListener) themeMedia.addListener(syncSystemTheme);
    }

    toggleBtn.addEventListener('click', () => {
        const next = body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        const rect = toggleBtn.getBoundingClientRect();

        themeWave.style.setProperty('--theme-x', `${rect.left + rect.width / 2}px`);
        themeWave.style.setProperty('--theme-y', `${rect.top + rect.height / 2}px`);
        themeWave.style.background = next === 'light' ? '#faf9f9' : '#0d0d10';
        themeWave.classList.remove('run');
        void themeWave.offsetWidth;
        themeWave.classList.add('run');

        applyTheme(next, true, true);
    });

    // ===== MENU HAMBURGER =====
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');

    hamburger.addEventListener('click', () => {
        const buka = navMenu.classList.toggle('active');
        hamburger.classList.toggle('open', buka);
        hamburger.setAttribute('aria-expanded', buka ? 'true' : 'false');
    });

    navMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navMenu.classList.remove('active');
            hamburger.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
        });
    });

    // ===== ANIMASI BAR SKILL =====
    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                document.querySelectorAll('.bar-fill').forEach(bar => {
                    bar.style.width = bar.dataset.percent + '%';
                });
                skillObserver.disconnect();
            }
        });
    }, { threshold: 0.2 });

    skillObserver.observe(document.getElementById('skills'));

    // ===== PENCARIAN & FILTER PROYEK =====
    (function () {
        const searchInput = document.getElementById('project-search');
        const chips       = document.querySelectorAll('#filter-chips .chip');
        const cards       = document.querySelectorAll('.project-card');
        const emptyBox    = document.getElementById('project-empty');
        const info        = document.getElementById('filter-info');

        if (!searchInput || !cards.length) return;

        let activeTech = 'all';

        function terapkanFilter() {
            const kata = searchInput.value.trim().toLowerCase();
            let tampil = 0;

            cards.forEach(card => {
                const cocokKata  = !kata || card.dataset.search.includes(kata);
                const daftarTech = card.dataset.tech ? card.dataset.tech.split('|') : [];
                const cocokTech  = activeTech === 'all' || daftarTech.includes(activeTech);

                const tampilkan = cocokKata && cocokTech;
                card.style.display = tampilkan ? '' : 'none';

                if (tampilkan) tampil++;
            });

            emptyBox.style.display = tampil === 0 ? 'block' : 'none';
            info.textContent = (kata || activeTech !== 'all')
                ? `Menampilkan ${tampil} dari ${cards.length} proyek`
                : '';
        }

        searchInput.addEventListener('input', terapkanFilter);

        chips.forEach(chip => {
            chip.addEventListener('click', () => {
                chips.forEach(c => c.classList.remove('active'));
                chip.classList.add('active');
                activeTech = chip.dataset.tech;
                terapkanFilter();
            });
        });
    })();

    // ===== TAB PENGALAMAN =====
    document.querySelectorAll('.exp-tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.exp-tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.exp-panel').forEach(p => p.classList.remove('active'));

            btn.classList.add('active');
            document.getElementById('exp-' + btn.dataset.tab).classList.add('active');
        });
    });

    // ===== FILTER TESTIMONI =====
    (function () {
        const chips = document.querySelectorAll('.testi-chip');
        const cards = document.querySelectorAll('.testi-card');
        const empty = document.getElementById('testi-empty');

        if (!chips.length) return;

        chips.forEach(chip => {
            chip.addEventListener('click', () => {
                chips.forEach(c => c.classList.remove('active'));
                chip.classList.add('active');

                const kat = chip.dataset.kat;
                let tampil = 0;

                cards.forEach(card => {
                    const cocok = kat === 'all' || card.dataset.kat === kat;
                    card.style.display = cocok ? '' : 'none';
                    if (cocok) tampil++;
                });

                if (empty) empty.style.display = (cards.length && tampil === 0) ? 'block' : 'none';
            });
        });
    })();

    // ===== PERBESAR GAMBAR =====
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');

    document.querySelectorAll('.zoomable').forEach(img => {
        img.addEventListener('click', () => {
            lightboxImg.src = img.src;
            lightbox.classList.add('show');
        });
    });

    lightbox.addEventListener('click', () => lightbox.classList.remove('show'));

    // ===== MESIN SCROLL HALUS (dipakai wheel, nav, dan tombol atas) =====
    const rootEl = document.documentElement;
    const reduceMotion = false;
    const isTouch = window.matchMedia('(pointer:coarse)').matches;

    let scrollTarget = 0;
    let scrollRAF = null;
    let scrolling = false;
    let scrollDone = null;

    function clampY(y){
        return Math.max(0, Math.min(y, rootEl.scrollHeight - window.innerHeight));
    }

    function stopScroll(selesai){
        cancelAnimationFrame(scrollRAF);
        scrolling = false;
        rootEl.style.scrollBehavior = '';

        const cb = scrollDone;
        scrollDone = null;
        if (selesai && cb) cb();
    }

    function scrollLoop(){
        rootEl.style.scrollBehavior = 'auto';   // matikan smooth bawaan CSS supaya tidak bentrok

        const diff = scrollTarget - window.scrollY;

        if (Math.abs(diff) < 0.6){
            window.scrollTo(0, scrollTarget);
            stopScroll(true);
            return;
        }

        // gerak seperti scroll biasa: cepat di awal, melambat di akhir
        let step = diff * 0.08;
        step = Math.max(-120, Math.min(120, step));
        if (Math.abs(step) < 1) step = diff > 0 ? Math.min(1, diff) : Math.max(-1, diff);

        window.scrollTo(0, window.scrollY + step);
        scrollRAF = requestAnimationFrame(scrollLoop);
    }

    function smoothScrollTo(y, done){
        y = clampY(y);

        if (reduceMotion){
            window.scrollTo(0, y);
            if (done) done();
            return;
        }

        scrollTarget = y;
        scrollDone = done || null;

        if (!scrolling){
            scrolling = true;
            scrollRAF = requestAnimationFrame(scrollLoop);
        }
    }

    // roda mouse: ikut mesin yang sama, jadi nav/tombol atas terasa sama seperti scroll manual
    window.addEventListener('wheel', e => {
        if (reduceMotion || isTouch || e.ctrlKey) return;
        if (document.body.classList.contains('intro-lock')) { e.preventDefault(); return; }
        if (document.body.style.overflow === 'hidden') return;           // modal terbuka
        if (lightbox.classList.contains('show')) return;
        if (e.target.closest('.modal-box, #nav-menu')) return;            // area yang scroll sendiri

        e.preventDefault();

        if (!scrolling) scrollTarget = window.scrollY;
        scrollDone = null;                                                // pengguna mengambil alih

        const unit = e.deltaMode === 1 ? 32 : 1;
        scrollTarget = clampY(scrollTarget + e.deltaY * unit);

        if (!scrolling){
            scrolling = true;
            scrollRAF = requestAnimationFrame(scrollLoop);
        }
    }, { passive:false });

    // sentuh layar di tengah animasi = berhenti
    window.addEventListener('touchstart', () => { if (scrolling) stopScroll(false); }, { passive:true });

    // ===== KLIK NAV / LINK #ANCHOR =====
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const href = a.getAttribute('href');
            if (!href || href === '#') return;

            const target = document.querySelector(href);
            if (!target) return;

            e.preventDefault();

            const y = (href === '#home')
                ? 0
                : target.getBoundingClientRect().top + window.scrollY - 90;

            smoothScrollTo(y, () => {
                history.replaceState(null, '', href);

                const box = target.querySelector('.section-box');
                if (box){
                    box.classList.remove('flash');
                    void box.offsetWidth; // restart animasi
                    box.classList.add('flash');
                }
            });
        });
    });

    // ===== TOMBOL KEMBALI KE ATAS =====
    const backTop = document.getElementById('back-to-top');

    backTop.addEventListener('click', () => {
        backTop.classList.remove('launch');
        void backTop.offsetWidth;
        backTop.classList.add('launch');

        smoothScrollTo(0);
    });

    backTop.addEventListener('animationend', () => backTop.classList.remove('launch'));

    // ===== PROGRESS BAR + NAVBAR SAAT SCROLL =====
    const progressBar = document.getElementById('scroll-progress');
    const navEl = document.querySelector('nav');
    let ticking = false;

    function efekScroll(){
        const max = rootEl.scrollHeight - window.innerHeight;
        progressBar.style.transform = `scaleX(${max > 0 ? window.scrollY / max : 0})`;
        navEl.classList.toggle('scrolled', window.scrollY > 20);
        backTop.classList.toggle('show', window.scrollY > 400);
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking){
            ticking = true;
            requestAnimationFrame(efekScroll);
        }
    }, { passive:true });

    efekScroll();

    // ===== ANIMASI GANTI HALAMAN =====
    document.querySelectorAll('a[href]').forEach(a => {
        a.addEventListener('click', e => {
            const href = a.getAttribute('href');

            if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;
            if (a.target === '_blank' || a.hasAttribute('download')) return;
            if (e.ctrlKey || e.metaKey || e.shiftKey) return;

            const url = new URL(a.href, location.href);
            if (url.origin !== location.origin) return;
            if (url.pathname === location.pathname && url.search === location.search) return;

            e.preventDefault();
            document.body.classList.add('leaving');
            setTimeout(() => { location.href = a.href; }, 250);
        });
    });

    window.addEventListener('pageshow', e => {
        if (e.persisted) document.body.classList.remove('leaving');
    });

    // ===== ANIMASI MUNCUL SAAT SCROLL (BOX SECTION) =====
    const revealObserver = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.05 });

    document.querySelectorAll('.section-box').forEach(el => {
        el.classList.add('reveal');
        revealObserver.observe(el);
    });

    // ===== ANIMASI ON-SCROLL UNTUK SEMUA ELEMEN =====
    const revealEls = [];

    function prepareReveal() {
        const groups = [
            // hero
            { sel:'.hero-left > *',                         mode:'up'  },
            { sel:'.hero-card',                             mode:'pop' },
            // judul & kontrol tiap section
            { sel:'.section-title, .section-subtitle',      mode:'up'  },
            { sel:'.tabs, .testi-filter, .project-filter, .cv-cta > *, .form-styled', mode:'up' },
            // semua kartu
            { sel:'.info-item, .about-card, .skill-group, .project-card, .ach-card, .timeline-entry, .testi-card, .message-card, .blog-card', mode:'pop' },
            // isi di dalam kartu
            { sel:'.about-card > h3, .about-card > p, .about-list li, .mini-item, .about-tags span, .skill-group > h3, .skill-bar', mode:'sm' },
            { sel:'.project-content > *, .project-links > *, .project-tags span, .ach-body > *, .ach-card > img', mode:'sm' },
            { sel:'.timeline-content > *, .testi-card > *, .blog-body > *, .form-group, .btn-submit', mode:'sm' },
            { sel:'.chip, .testi-chip, .tab-btn, .exp-tab-btn', mode:'sm' },
            // penutup
            { sel:'footer',                                 mode:'up'  }
        ];

        groups.forEach(g => {
            document.querySelectorAll(g.sel).forEach(el => {
                if (el.classList.contains('sr')) return;

                const idx = Array.from(el.parentElement.children).indexOf(el);
                let d;

                el.classList.add('sr');

                if (g.mode === 'sm') {
                    el.classList.add('from-sm');
                    d = 0.15 + Math.min(idx * 0.06, 0.5);
                } else {
                    d = Math.min(idx * 0.1, 0.7);
                }

                if (g.mode === 'pop') el.classList.add('from-pop');

                el.style.setProperty('--d', d + 's');
                revealEls.push(el);
            });
        });
    }

    function startReveal() {
        const io = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        revealEls.forEach(el => io.observe(el));
    }

    prepareReveal();   // sembunyikan dulu semuanya (di balik layar pembuka)

    // ===== INTRO: LAYAR PEMBUKA, LALU KARTU MUNCUL SATU PER SATU =====
    (function () {
        const intro = document.getElementById('intro');
        const t0 = performance.now();
        const minTime = reduceMotion ? 0 : 1300;
        let sudah = false;

        function masuk() {
            if (sudah) return;
            sudah = true;

            intro.classList.add('hide');
            document.body.classList.remove('intro-lock');
            document.body.classList.add('ready');

            setTimeout(startReveal, 450);          // kartu mulai muncul saat layar pembuka naik
            setTimeout(() => intro.remove(), 1200);
        }

        function tunggu() {
            setTimeout(masuk, Math.max(0, minTime - (performance.now() - t0)));
        }

        if (document.readyState === 'complete') tunggu();
        else window.addEventListener('load', tunggu);

        setTimeout(masuk, 4000);                    // jaga-jaga kalau load lambat
    })();

    // ===== MENU AKTIF SAAT SCROLL =====
    const spyLinks = document.querySelectorAll('#nav-menu a[href^="#"]');
    const spyMap = {};

    spyLinks.forEach(l => { spyMap[l.getAttribute('href').slice(1)] = l; });

    const spyObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                spyLinks.forEach(l => l.classList.remove('active'));
                const link = spyMap[entry.target.id];
                if (link) link.classList.add('active');
            }
        });
    }, { rootMargin: '-45% 0px -50% 0px' });

    Object.keys(spyMap).forEach(id => {
        const el = document.getElementById(id);
        if (el) spyObserver.observe(el);
    });

    // ===== PREVIEW PROYEK =====
    (function () {
        const modal = document.getElementById('project-modal');
        if (!modal) return;

        const img    = document.getElementById('pm-img');
        const title  = document.getElementById('pm-title');
        const desc   = document.getElementById('pm-desc');
        const tags   = document.getElementById('pm-tags');
        const detail = document.getElementById('pm-detail');
        const demo   = document.getElementById('pm-demo');
        const github = document.getElementById('pm-github');

        function tutup() {
            modal.classList.remove('show');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.preview-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const d = btn.closest('.project-card').dataset;

                img.src = d.gambar;
                img.alt = d.judul;
                title.textContent = d.judul;
                desc.textContent = d.deskripsi;

                tags.innerHTML = '';
                (d.teknologi || '').split(',').map(t => t.trim()).filter(Boolean).forEach(t => {
                    const span = document.createElement('span');
                    span.textContent = t;
                    tags.appendChild(span);
                });

                detail.href = d.detail;

                demo.href = d.demo || '#';
                demo.style.display = d.demo ? '' : 'none';

                github.href = d.github || '#';
                github.style.display = d.github ? '' : 'none';

                modal.classList.add('show');
                modal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            });
        });

        document.getElementById('pm-close').addEventListener('click', tutup);

        modal.addEventListener('click', e => {
            if (e.target === modal) tutup();
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') tutup();
        });
    })();

    // ===== EFEK KETIK NAMA =====
    (function () {
        const h1 = document.querySelector('.hero-left h1');
        if (!h1) return;

        const span = h1.querySelector('span');
        const depan = h1.childNodes[0].textContent.trim();
        const belakang = span ? span.textContent.trim() : '';
        const penuh = (depan + ' ' + belakang).trim();

        h1.setAttribute('aria-label', penuh);
        h1.style.minHeight = h1.offsetHeight + 'px';   // cegah layout loncat

        const tNode = document.createTextNode('');
        const tSpan = document.createElement('span');
        tSpan.style.color = 'var(--primary)';
        h1.textContent = '';
        h1.append(tNode, tSpan);

        let started = false;

        function ketik() {
            if (started) return;
            started = true;
            h1.classList.add('typing');

            let i = 0;
            const total = depan.length + 1 + belakang.length;

            const timer = setInterval(() => {
                i++;
                if (i <= depan.length) {
                    tNode.textContent = depan.slice(0, i);
                } else if (i === depan.length + 1) {
                    tNode.textContent = depan + ' ';
                } else {
                    tSpan.textContent = belakang.slice(0, i - depan.length - 1);
                }

                if (i >= total) {
                    clearInterval(timer);
                    setTimeout(() => h1.classList.remove('typing'), 2500);
                }
            }, 90);
        }

        function mulai() { setTimeout(ketik, 1000); }

        if (document.body.classList.contains('ready')) {
            mulai();
        } else {
            const mo = new MutationObserver(() => {
                if (document.body.classList.contains('ready')) {
                    mo.disconnect();
                    mulai();
                }
            });
            mo.observe(document.body, { attributes: true, attributeFilter: ['class'] });
            setTimeout(() => { mo.disconnect(); mulai(); }, 5000);   // jaga-jaga
        }
    })();
</script>

</body>
</html>