<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

:root{
    --primary:#38bdf8;
    --primary2:#0ea5e9;
    --dark:#020617;
    --dark2:#0f172a;
    --border:#1e293b;
    --text:#f8fafc;
    --muted:#94a3b8;
    --danger:#ef4444;
}

body{
    background:linear-gradient(to bottom,var(--dark),var(--dark2));
    color:var(--text);
    padding:25px;
}

.container{
    max-width:1200px;
    margin:auto;
}

/* TOPBAR */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

/* PANEL */
.panel{
    background:rgba(15,23,42,.8);
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

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:15px;
}

/* CARD */
.card{
    background:rgba(2,6,23,.6);
    border:1px solid var(--border);
    border-radius:14px;
    padding:15px;
}

/* IMAGE */
.card img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:10px;
    margin-bottom:10px;
}

/* TECH */
.tech-list{
    display:flex;
    flex-wrap:wrap;
    gap:6px;
    margin-top:8px;
}

.tech{
    font-size:12px;
    padding:4px 10px;
    border-radius:999px;
    background:rgba(56,189,248,.15);
    color:var(--primary);
    border:1px solid rgba(56,189,248,.3);
}

/* BUTTON */
.btn{
    padding:8px 10px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
}

.btn-danger{background:var(--danger);color:#fff;}
.btn-warning{background:#f59e0b;color:#000;}

/* FORM */
input,textarea{
    width:100%;
    padding:10px;
    margin-bottom:10px;
    border-radius:10px;
    border:1px solid var(--border);
    background:#0b1220;
    color:#fff;
    outline:none;
}

.btn-submit{
    width:100%;
    padding:10px;
    border:none;
    border-radius:10px;
    background:linear-gradient(to right,var(--primary),var(--primary2));
    color:#fff;
    font-weight:700;
}

/* MESSAGE & CONTACT */
.grid-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
}

@media(max-width:900px){
    .grid-2{
        grid-template-columns:1fr;
    }
}

.card-modern{
    background:rgba(2,6,23,.6);
    border:1px solid var(--border);
    border-radius:14px;
    padding:15px;
}

.card-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:8px;
}

.badge{
    font-size:11px;
    padding:3px 8px;
    border-radius:999px;
    background:rgba(56,189,248,.15);
    color:var(--primary);
    border:1px solid rgba(56,189,248,.3);
}

.text-muted{
    color:var(--muted);
    font-size:13px;
    line-height:1.6;
}

.delete-btn{
    margin-top:10px;
    background:var(--danger);
    color:#fff;
    border:none;
    padding:6px 10px;
    border-radius:8px;
    cursor:pointer;
    font-size:12px;
}

/* EMPTY */
.empty{
    text-align:center;
    padding:20px;
    color:var(--muted);
    border:1px dashed var(--border);
    border-radius:10px;
}

</style>
</head>

<body>

<div class="container">

<!-- TOPBAR -->
<div class="topbar">
    <h2>Admin Dashboard</h2>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</div>

<!-- PROJECT -->
<div class="panel">
    <div class="panel-title">Project</div>

    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="judul" placeholder="Judul">
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <input type="text" name="teknologi" placeholder="Laravel, PHP, JS">
        <input type="file" name="gambar">

        <button class="btn-submit">Simpan</button>
    </form>

    <div class="grid">

        @forelse($projects ?? [] as $project)

        <div class="card">

            <img src="{{ asset('uploads/'.$project->gambar) }}">

            <h3>{{ $project->judul }}</h3>

            <p style="color:var(--muted);font-size:13px;">
                {{ $project->deskripsi }}
            </p>

            <div class="tech-list">
                @foreach(explode(',', $project->teknologi) as $tech)
                    <span class="tech">{{ trim($tech) }}</span>
                @endforeach
            </div>

            <form action="{{ route('project.destroy',$project->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-danger" style="margin-top:10px;">Hapus</button>
            </form>

        </div>

        @empty
        <div class="empty">Belum ada project</div>
        @endforelse

    </div>
</div>

<!-- MESSAGE -->
<div class="panel">
    <div class="panel-title">Message</div>

    <div class="grid-2">

        @forelse($messages ?? [] as $message)

        <div class="card-modern">

            <div class="card-header">
                <h3>{{ $message->nama }}</h3>
                <span class="badge">Message</span>
            </div>

            <p class="text-muted">{{ $message->pesan }}</p>

            <form action="{{ route('message.destroy',$message->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="delete-btn">Hapus</button>
            </form>

        </div>

        @empty
        <div class="empty">Belum ada message</div>
        @endforelse

    </div>
</div>

<!-- CONTACT -->
<div class="panel">
    <div class="panel-title">Contact</div>

    <div class="grid-2">

        @forelse($contacts ?? [] as $contact)

        <div class="card-modern">

            <div class="card-header">
                <h3>{{ $contact->nama }}</h3>
                <span class="badge">Contact</span>
            </div>

            <p class="text-muted">📧 {{ $contact->email }}</p>
            <p class="text-muted">{{ $contact->pesan }}</p>

            <form action="{{ route('contact.destroy',$contact->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="delete-btn">Hapus</button>
            </form>

        </div>

        @empty
        <div class="empty">Belum ada contact</div>
        @endforelse

    </div>
</div>

</div>

</body>
</html>