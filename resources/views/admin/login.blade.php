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
            --primary:#00d4ff;
            --primary2:#2563eb;
            --dark:#020617;
            --dark2:#0f172a;
            --card:rgba(15,23,42,.88);
            --border:rgba(255,255,255,.08);
            --text:#f8fafc;
            --muted:#94a3b8;
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
                radial-gradient(circle at top left, rgba(0,212,255,.15), transparent 25%),
                radial-gradient(circle at bottom right, rgba(37,99,235,.12), transparent 25%),
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
            box-shadow:0 10px 30px rgba(0,212,255,.35);
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
            border:1px solid rgba(255,255,255,.08);
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
            box-shadow:0 0 0 4px rgba(0,212,255,.12);
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
            box-shadow:0 10px 25px rgba(0,212,255,.25);
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
</head>

<body>

<div class="login-card">

    <div class="logo">
        A
    </div>

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

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Masukkan username"
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
        © 2026 Yuma Portfolio
    </div>

</div>

</body>
</html>