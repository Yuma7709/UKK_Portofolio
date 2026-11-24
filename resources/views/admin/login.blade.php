<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

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
            --card:rgba(17,17,20,.88);
            --border:rgba(255,255,255,.1);
            --text:#ececf0;
            --muted:#a1a1aa;
            --danger:#ef4444;
            --shadow:0 15px 40px rgba(0,0,0,.45);
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;
            background:
                radial-gradient(circle at top left, rgba(248,113,113,.15), transparent 25%),
                radial-gradient(circle at bottom right, rgba(220,38,38,.12), transparent 25%),
                linear-gradient(to bottom,var(--dark),var(--dark2));
            overflow:hidden;
            position:relative;
        }

        body::before{
            content:'';
            position:absolute;
            width:350px;
            height:350px;
            background:var(--primary);
            filter:blur(140px);
            opacity:.12;
            top:-100px;
            left:-100px;
        }

        body::after{
            content:'';
            position:absolute;
            width:350px;
            height:350px;
            background:var(--primary2);
            filter:blur(140px);
            opacity:.10;
            bottom:-120px;
            right:-120px;
        }

        .login-card{
            width:100%;
            max-width:420px;
            background:var(--card);
            border:1px solid var(--border);
            backdrop-filter:blur(20px);
            border-radius:30px;
            padding:45px 35px;
            box-shadow:var(--shadow);
            position:relative;
            z-index:10;
            animation:fade .5s ease;
        }

        @keyframes fade{
            from{
                opacity:0;
                transform:translateY(20px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .logo{
            width:75px;
            height:75px;
            margin:auto;
            margin-bottom:25px;
            border-radius:24px;
            background:linear-gradient(
                135deg,
                var(--primary),
                var(--primary2)
            );
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:2rem;
            font-weight:800;
            color:white;
            box-shadow:0 10px 30px rgba(248,113,113,.35);
        }

        h2{
            text-align:center;
            color:var(--text);
            font-size:2rem;
            margin-bottom:10px;
            font-weight:800;
        }

        .subtitle{
            text-align:center;
            color:var(--muted);
            font-size:.95rem;
            margin-bottom:35px;
            line-height:1.7;
        }

        .error{
            background:rgba(239,68,68,.12);
            border:1px solid rgba(239,68,68,.25);
            color:#fecaca;
            padding:14px;
            border-radius:14px;
            margin-bottom:22px;
            font-size:.92rem;
            font-weight:600;
        }

        .input-group{
            margin-bottom:22px;
        }

        label{
            display:block;
            margin-bottom:10px;
            color:var(--text);
            font-size:.92rem;
            font-weight:600;
        }

        input{
            width:100%;
            padding:15px 16px;
            border-radius:16px;
            border:1px solid rgba(255,255,255,.1);
            background:rgba(255,255,255,.04);
            color:var(--text);
            outline:none;
            font-size:.95rem;
            transition:.25s;
        }

        input::placeholder{
            color:#64748b;
        }

        input:focus{
            border-color:var(--primary);
            box-shadow:0 0 0 4px rgba(248,113,113,.12);
            background:rgba(255,255,255,.05);
        }

        .login-btn{
            width:100%;
            padding:15px;
            border:none;
            border-radius:16px;
            background:linear-gradient(
                to right,
                var(--primary),
                var(--primary2)
            );
            color:white;
            font-size:1rem;
            font-weight:700;
            cursor:pointer;
            transition:.3s;
            margin-top:8px;
        }

        .login-btn:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 25px rgba(248,113,113,.25);
        }

        .footer-text{
            text-align:center;
            color:var(--muted);
            font-size:.85rem;
            margin-top:28px;
        }

        @media(max-width:500px){

            .login-card{
                padding:35px 25px;
                border-radius:24px;
            }

            h2{
                font-size:1.7rem;
            }

        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>

<body>

<div class="login-card">

    <a href="{{ route('portfolio') }}" class="logo" aria-label="Portofolio">
        P
    </a>


    <h2>
        Login Admin
    </h2>

    <p class="subtitle">
        Silakan login untuk mengakses dashboard admin portfolio
    </p>

    @if(session('error'))

    <div class="error">
        {{ session('error') }}
    </div>

    @endif

    <form
        action="{{ route('admin.login.post') }}"
        method="POST"
    >

        @csrf

        <div class="input-group">

            <label>Email / Username Admin</label>

            <input
                type="text"
                name="username"
                placeholder="Masukkan email admin"
                required
            >

        </div>

        <div class="input-group">

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                required
            >

        </div>

        <button
            type="submit"
            class="login-btn"
        >
            Login Sekarang
        </button>

    </form>

    <div class="footer-text">
        © {{ date('Y') }} {{ profile('nama', 'Yuma Achmad Fairuza') }}

    </div>

</div>

</body>
</html>