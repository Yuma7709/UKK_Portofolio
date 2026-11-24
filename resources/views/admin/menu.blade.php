<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>

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
            --secondary:#dc2626;
            --dark:#0d0d10;
            --dark2:#111114;
            --card:rgba(17,17,20,.85);
            --border:rgba(255,255,255,.1);
            --text:#ececf0;
            --muted:#a1a1aa;
            --shadow:0 15px 40px rgba(0,0,0,.35);
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;
            overflow-x:hidden;
            background:
                radial-gradient(circle at top left, rgba(248,113,113,.15), transparent 25%),
                radial-gradient(circle at bottom right, rgba(220,38,38,.15), transparent 25%),
                linear-gradient(to bottom,var(--dark),var(--dark2));
        }

        .container{
            width:100%;
            max-width:1000px;
        }

        .title{
            text-align:center;
            margin-bottom:50px;
        }

        .title h1{
            color:var(--text);
            font-size:3rem;
            font-weight:800;
            margin-bottom:15px;
        }

        .title p{
            color:var(--muted);
            font-size:1rem;
        }

        .card-wrapper{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
            gap:30px;
        }

        .card{
            background:var(--card);
            border:1px solid var(--border);
            border-radius:32px;
            padding:40px 30px;
            backdrop-filter:blur(15px);
            box-shadow:var(--shadow);
            transition:.35s;
            position:relative;
            overflow:hidden;
        }

        .card::before{
            content:'';
            position:absolute;
            width:220px;
            height:220px;
            background:rgba(248,113,113,.08);
            border-radius:50%;
            top:-80px;
            right:-80px;
        }

        .card:hover{
            transform:translateY(-10px);
            border-color:rgba(248,113,113,.25);
        }

        .icon{
            width:80px;
            height:80px;
            border-radius:24px;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:2rem;
            margin-bottom:25px;
            background:linear-gradient(
                135deg,
                var(--primary),
                var(--secondary)
            );
            box-shadow:0 10px 25px rgba(248,113,113,.25);
        }

        .card h2{
            color:var(--text);
            font-size:2rem;
            margin-bottom:15px;
        }

        .card p{
            color:var(--muted);
            line-height:1.8;
            margin-bottom:30px;
        }

        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            padding:15px 24px;
            border-radius:16px;
            text-decoration:none;
            color:white;
            font-weight:700;
            background:linear-gradient(
                to right,
                var(--primary),
                var(--secondary)
            );
            transition:.3s;
        }

        .btn:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 25px rgba(248,113,113,.25);
        }

        @media(max-width:700px){

            .title h1{
                font-size:2.2rem;
            }

            .card{
                padding:30px 25px;
            }

        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>

<body>

<div class="container">

    <div class="title">

        <h1 class="brand-logo">
            Porto<span>folio</span>
        </h1>

        <p>
            Halaman menu khusus admin
        </p>

    </div>

    <div class="card-wrapper">

        {{-- CARD PORTFOLIO --}}
        <div class="card">

            <div class="icon">
                🌐
            </div>

            <h2>
                Portofolio
            </h2>

            <p>
                Lihat seluruh project, skill, kontak &amp; pesan,
                dan informasi portfolio developer.
            </p>

            <a
                href="{{ route('portfolio') }}"
                class="btn"
            >
                Buka Portofolio
            </a>

        </div>

        <!-- {{-- CARD BLOG --}}
        <div class="card">

            <div class="icon">
                📝
            </div>

            <h2>
                Blog
            </h2>

            <p>
                Baca catatan ngoding, tutorial singkat,
                dan pengalaman pengembangan web.
            </p>

            <a
                href="{{ route('blog.index') }}"
                class="btn"
            >
                Buka Blog
            </a>

        </div> -->

        {{-- CARD DASHBOARD --}}
        <div class="card">

            <div class="icon">
                ⚙️
            </div>

            <h2>
                Admin
            </h2>

            <p>
                Kelola project, kontak &amp; pesan,
                edit portfolio, dan akses admin panel.
            </p>

            <a
                href="{{ route('admin.dashboard') }}"
                class="btn"
            >
                Buka Admin
            </a>

        </div>

    </div>

</div>

</body>
</html>