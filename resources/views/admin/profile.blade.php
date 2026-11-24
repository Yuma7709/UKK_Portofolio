<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Profil & Konten | Admin</title>

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
            max-width:900px;
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

        .actions{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
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

        .btn-primary{
            background:var(--primary);
            color:#000;
        }

        .panel{
            background:rgba(17,17,20,.8);
            border:1px solid var(--border);
            border-radius:16px;
            padding:20px;
            margin-bottom:20px;
        }

        .panel-title{
            font-size:18px;
            font-weight:700;
            margin-bottom:15px;
        }

        label{
            display:block;
            font-size:13px;
            font-weight:600;
            color:var(--muted);
            margin-bottom:6px;
        }

        input,
        textarea{
            width:100%;
            padding:10px;
            margin-bottom:12px;
            border-radius:10px;
            border:1px solid var(--border);
            background:#16161a;
            color:#fff;
            outline:none;
        }

        input:focus,
        textarea:focus{
            border-color:var(--primary);
        }

        textarea{
            resize:vertical;
            min-height:85px;
            line-height:1.6;
        }

        input[type="file"]{
            padding:8px;
        }

        .hint{
            color:var(--muted);
            font-size:.75rem;
            margin:-6px 0 14px;
        }

        .form-row{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:14px;
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
            font-size:15px;
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

        .alert-error{
            background:rgba(239,68,68,.12);
            border:1px solid rgba(239,68,68,.3);
            color:#fecaca;
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
        <h1 class="brand-logo">Porto<span>folio</span> <small>Profil &amp; Konten</small></h1>


        <div class="actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Dashboard</a>
            <a href="{{ route('portfolio') }}" target="_blank" class="btn btn-secondary">Lihat Portofolio</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @foreach($groups as $group)
            <div class="panel">
                <div class="panel-title">{{ $group['title'] }}</div>

                <div class="form-row">
                    @foreach($group['fields'] as $field)
                        @php
                            $key = $field['key'];
                            $value = old('values.' . $key, $values->get($key) ?? ($defaults[$key] ?? ''));
                        @endphp

                        <div>
                            <label for="field-{{ $key }}">{{ $field['label'] }}</label>

                            @if(($field['type'] ?? 'text') === 'textarea')
                                <textarea id="field-{{ $key }}" name="values[{{ $key }}]">{{ $value }}</textarea>
                            @else
                                <input type="text" id="field-{{ $key }}" name="values[{{ $key }}]" value="{{ $value }}">
                            @endif

                            @if(isset($field['hint']))
                                <p class="hint">{{ $field['hint'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="panel">
            <div class="panel-title">Unggah Foto Profil</div>

            <label for="foto_upload">File Gambar (opsional)</label>
            <input type="file" id="foto_upload" name="foto_upload" accept="image/*">
            <p class="hint">Maksimal 2 MB. Nama file akan otomatis dipakai sebagai foto profil.</p>

            <button type="submit" class="btn-submit">Simpan Semua Perubahan</button>
        </div>

    </form>

</div>

</body>
</html>
