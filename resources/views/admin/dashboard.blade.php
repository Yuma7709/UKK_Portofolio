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
}

.container{
    max-width:1200px;
    margin:auto;
}

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
    flex-wrap:wrap;
    margin-bottom:20px;
}

.topbar-actions{
    display:flex;
    align-items:center;
    gap:8px;
    flex-wrap:wrap;
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

.filter-panel{
    position:sticky;
    top:10px;
    z-index:50;
    background:rgba(17,17,20,.94);
}

.filter-panel .form-row{
    margin-top:12px;
}

[hidden]{
    display:none !important;
}

.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:15px;
}

.grid-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
}

.card{
    background:rgba(13,13,16,.6);
    border:1px solid var(--border);
    border-radius:14px;
    padding:15px;
}

.card img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:10px;
    margin-bottom:10px;
}

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
    background:rgba(248,113,113,.15);
    color:var(--primary);
    border:1px solid rgba(248,113,113,.3);
}

.btn{
    padding:8px 10px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
    text-decoration:none;
    display:inline-block;
    background:var(--primary);
    color:#0d0d10;
}

.btn-secondary{
    background:#334155;
    color:#fff;
}

.btn-danger{
    background:var(--danger);
    color:#fff;
}

.btn-warning{
    background:#f59e0b;
    color:#000;
}

input,textarea,select{
    width:100%;
    padding:10px;
    margin-bottom:10px;
    border-radius:10px;
    border:1px solid var(--border);
    background:#16161a;
    color:#fff;
    outline:none;
}

textarea{
    min-height:90px;
    resize:vertical;
}

input[type="file"]{
    min-height:68px;
    padding:16px;
    border-style:dashed;
    background:rgba(248,113,113,.07);
    cursor:pointer;
}

input[type="file"]::file-selector-button{
    padding:8px 12px;
    margin-right:12px;
    border:none;
    border-radius:8px;
    background:var(--primary);
    color:#0d0d10;
    font-weight:700;
    cursor:pointer;
}

.upload-field{
    margin-bottom:12px;
}

.upload-field label{
    display:block;
    font-size:13px;
    font-weight:600;
    margin-bottom:6px;
    color:var(--text);
}

.check{
    display:flex;
    align-items:center;
    gap:8px;
    margin-bottom:10px;
    font-size:14px;
    color:var(--text);
}

.check input{
    width:auto;
    margin:0;
}

.btn-submit{
    width:100%;
    padding:10px;
    border:none;
    border-radius:10px;
    background:linear-gradient(to right,var(--primary),var(--primary2));
    color:#fff;
    font-weight:700;
    cursor:pointer;
}

.alert{
    padding:12px 15px;
    border-radius:10px;
    margin-bottom:15px;
    font-size:14px;
}

.alert-success{
    background:rgba(34,197,94,.12);
    border:1px solid rgba(34,197,94,.4);
    color:#86efac;
}

.alert-error{
    background:rgba(239,68,68,.12);
    border:1px solid rgba(239,68,68,.4);
    color:#fca5a5;
}

.card-modern{
    background:rgba(13,13,16,.6);
    border:1px solid var(--border);
    border-radius:14px;
    padding:15px;
}

.card-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:10px;
    margin-bottom:8px;
}

.badge{
    font-size:11px;
    padding:3px 8px;
    border-radius:999px;
    background:rgba(248,113,113,.15);
    color:var(--primary);
    border:1px solid rgba(248,113,113,.3);
}

.text-muted{
    color:var(--muted);
    font-size:13px;
    line-height:1.6;
}

.actions{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    margin-top:10px;
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

.edit-box{
    margin-top:12px;
    border-top:1px dashed var(--border);
    padding-top:10px;
}

.edit-box > summary{
    cursor:pointer;
    display:inline-block;
    padding:7px 12px;
    border-radius:8px;
    background:#334155;
    color:#fff;
    font-size:13px;
    font-weight:700;
    list-style:none;
    user-select:none;
}

.edit-box > summary::-webkit-details-marker{
    display:none;
}

.edit-box > summary::before{
    content:'✏️ ';
}

.edit-box[open] > summary{
    background:var(--primary);
    color:#0d0d10;
}

.edit-box form{
    margin-top:10px;
}

.badge-updated{
    background:rgba(34,197,94,.18);
    color:#86efac;
    border-color:rgba(34,197,94,.45);
    margin-left:6px;
}

.status-hint{
    font-size:12px;
    color:var(--muted);
    margin-top:8px;
}

.repeater-row{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr)) auto;
    gap:8px;
    align-items:end;
    margin-bottom:8px;
}

.repeater-row label{
    display:block;
    font-size:12px;
    font-weight:600;
    margin-bottom:5px;
    color:var(--muted);
}

.repeater-row input{
    margin-bottom:0;
}

.btn-add{
    background:rgba(248,113,113,.15);
    color:var(--primary);
    border:1px solid rgba(248,113,113,.35);
    padding:7px 12px;
    border-radius:8px;
    font-weight:700;
    cursor:pointer;
}

.btn-remove{
    background:transparent;
    color:#fca5a5;
    border:1px solid rgba(239,68,68,.4);
    padding:10px 12px;
    border-radius:8px;
    cursor:pointer;
    font-weight:700;
}

.form-row{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:12px;
}

.form-row label,
.panel > label{
    display:block;
    font-size:13px;
    font-weight:600;
    margin-bottom:6px;
    color:var(--text);
}

.hint{
    font-size:12px;
    color:var(--muted);
    margin-top:-6px;
    margin-bottom:10px;
}

.profile-group{
    border:1px solid var(--border);
    border-radius:12px;
    padding:12px 14px;
    margin-bottom:12px;
    background:rgba(13,13,16,.45);
}

.profile-group summary{
    cursor:pointer;
    font-weight:700;
    color:var(--primary);
}

.profile-group[open] summary{
    margin-bottom:14px;
}

.panel[id]{
    scroll-margin-top:20px;
}

.empty{
    text-align:center;
    padding:20px;
    color:var(--muted);
    border:1px dashed var(--border);
    border-radius:10px;
}

@media(max-width:900px){
    .grid-2{
        grid-template-columns:1fr;
    }
}
</style>
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}">
</head>

<body>

<div class="container">

<div class="topbar">
    <h2 class="brand-logo">Porto<span>folio</span> <small>Admin</small></h2>


    <div class="topbar-actions">
        <a class="btn btn-secondary" href="{{ route('portfolio') }}">Lihat Portofolio</a>
        <!-- <a class="btn btn-secondary" href="{{ route('admin.dashboard').'#profil-konten' }}">Kelola Profil</a>
        <a class="btn btn-secondary" href="{{ route('blog.index') }}" target="_blank">Lihat Blog</a> -->

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-error">
        <strong>Periksa kembali inputan:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $updated = session('updated');
@endphp

<div class="panel filter-panel">
    <div class="panel-title">Filter Edit</div>

    <div class="form-row">
        <div>
            <label for="filter-search">Cari item</label>
            <input type="search" id="filter-search" placeholder="Cari nama, judul, kategori, atau teks...">
        </div>
        <div>
            <label for="filter-section">Bagian</label>
            <select id="filter-section">
                <option value="all">Semua bagian</option>
                <option value="profil-konten">Profil &amp; Konten</option>
                <option value="pendidikan-organisasi-konten">Pendidikan &amp; Organisasi</option>
                <option value="keahlian-teknologi-konten">Keahlian &amp; Teknologi</option>
                <option value="project-konten">Project</option>
                <option value="achievement-konten">Sertifikat</option>
                <option value="experience-konten">Pengalaman</option>
                <option value="testimonial-konten">Testimoni</option>
                <option value="blog-konten">Blog</option>
                <option value="message-konten">Kesan dan Pesan</option>
                <option value="contact-konten">Kontak</option>
            </select>
        </div>
        <div>
            <label for="filter-status">Status</label>
            <select id="filter-status">
                <option value="all">Semua status</option>
                <option value="updated">Sudah diperbarui</option>
            </select>
        </div>
    </div>

    <p class="status-hint" id="filter-info">Menampilkan semua item.</p>
</div>

<div class="panel" id="profil-konten">
    <div class="panel-title">
        Profil &amp; Konten Portofolio
        @if(($updated['type'] ?? '') === 'profile')
            <span class="badge badge-updated">Sudah diperbarui</span>
        @endif
    </div>

    <p class="status-hint">Diupdate: {{ $profileUpdatedAt?->format('d M Y H:i') ?? '-' }}</p>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @foreach($groups ?? [] as $group)
            <details class="profile-group" {{ $loop->first ? 'open' : '' }}>
                <summary>{{ $group['title'] }}</summary>

                <div class="form-row">
                    @foreach($group['fields'] as $field)
                        @php
                            $key = $field['key'];
                            $value = old('values.'.$key, $values->get($key) ?? ($defaults[$key] ?? ''));
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
            </details>
        @endforeach

        <div class="upload-field">
            <label for="foto_upload">Foto Profil Baru (opsional)</label>
            <input type="file" id="foto_upload" name="foto_upload" accept="image/*">
            <p class="hint">File ini menggantikan foto profil di portofolio dan CV. Maksimal 2 MB.</p>
        </div>

        <button class="btn-submit">Simpan Profil &amp; Konten</button>
    </form>
</div>

<div class="panel" id="pendidikan-organisasi-konten">
    <div class="panel-title">Pendidikan &amp; Organisasi</div>
    <p class="status-hint">Tambah, edit, atau hapus item lalu tekan Update Data.</p>

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="items[pendidikan][_marker]" value="1">
        <h3 style="font-size:15px;margin-bottom:10px;">Riwayat Pendidikan</h3>

        <div id="rows-pendidikan" data-filter-items="row">
            @foreach($pendidikan as $index => $row)
                <div class="repeater-row">
                    <div>
                        <label>Nama</label>
                        <input type="text" name="items[pendidikan][{{ $index }}][nama]" value="{{ $row['nama'] ?? '' }}">
                    </div>
                    <div>
                        <label>Waktu</label>
                        <input type="text" name="items[pendidikan][{{ $index }}][waktu]" value="{{ $row['waktu'] ?? '' }}">
                    </div>
                    <div>
                        <label>Keterangan</label>
                        <input type="text" name="items[pendidikan][{{ $index }}][keterangan]" value="{{ $row['keterangan'] ?? '' }}">
                    </div>
                    <button type="button" class="btn-remove" data-remove>Hapus</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn-add" data-add="pendidikan">+ Tambah Pendidikan</button>

        <hr style="border:none;border-top:1px solid var(--border);margin:18px 0;">

        <input type="hidden" name="items[organisasi][_marker]" value="1">
        <h3 style="font-size:15px;margin-bottom:10px;">Organisasi &amp; Kepanitiaan</h3>

        <div id="rows-organisasi" data-filter-items="row">
            @foreach($organisasi as $index => $row)
                <div class="repeater-row">
                    <div>
                        <label>Nama</label>
                        <input type="text" name="items[organisasi][{{ $index }}][nama]" value="{{ $row['nama'] ?? '' }}">
                    </div>
                    <div>
                        <label>Waktu</label>
                        <input type="text" name="items[organisasi][{{ $index }}][waktu]" value="{{ $row['waktu'] ?? '' }}">
                    </div>
                    <div>
                        <label>Keterangan</label>
                        <input type="text" name="items[organisasi][{{ $index }}][keterangan]" value="{{ $row['keterangan'] ?? '' }}">
                    </div>
                    <button type="button" class="btn-remove" data-remove>Hapus</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn-add" data-add="organisasi">+ Tambah Organisasi</button>

        <button class="btn-submit" style="margin-top:18px;">Update Data</button>
    </form>

    <template id="template-pendidikan">
        <div class="repeater-row">
            <div>
                <label>Nama</label>
                <input type="text" name="items[pendidikan][__INDEX__][nama]" value="">
            </div>
            <div>
                <label>Waktu</label>
                <input type="text" name="items[pendidikan][__INDEX__][waktu]" value="">
            </div>
            <div>
                <label>Keterangan</label>
                <input type="text" name="items[pendidikan][__INDEX__][keterangan]" value="">
            </div>
            <button type="button" class="btn-remove" data-remove>Hapus</button>
        </div>
    </template>

    <template id="template-organisasi">
        <div class="repeater-row">
            <div>
                <label>Nama</label>
                <input type="text" name="items[organisasi][__INDEX__][nama]" value="">
            </div>
            <div>
                <label>Waktu</label>
                <input type="text" name="items[organisasi][__INDEX__][waktu]" value="">
            </div>
            <div>
                <label>Keterangan</label>
                <input type="text" name="items[organisasi][__INDEX__][keterangan]" value="">
            </div>
            <button type="button" class="btn-remove" data-remove>Hapus</button>
        </div>
    </template>
</div>

<div class="panel" id="keahlian-teknologi-konten">
    <div class="panel-title">Keahlian &amp; Teknologi</div>
    <p class="status-hint">Tambah, edit, atau hapus skill dan teknologi lalu tekan Update Data.</p>

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="items[skill_teknis][_marker]" value="1">
        <h3 style="font-size:15px;margin-bottom:10px;">Kemampuan Teknis</h3>

        <div id="rows-skill_teknis" data-filter-items="row">
            @foreach($skillTeknis as $index => $row)
                <div class="repeater-row">
                    <div>
                        <label>Nama Skill</label>
                        <input type="text" name="items[skill_teknis][{{ $index }}][nama]" value="{{ $row['nama'] ?? '' }}">
                    </div>
                    <div>
                        <label>Persen</label>
                        <input type="number" name="items[skill_teknis][{{ $index }}][persen]" value="{{ $row['persen'] ?? 0 }}" min="0" max="100">
                    </div>
                    <button type="button" class="btn-remove" data-remove>Hapus</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn-add" data-add="skill_teknis">+ Tambah Skill Teknis</button>

        <hr style="border:none;border-top:1px solid var(--border);margin:18px 0;">

        <input type="hidden" name="items[skill_non_teknis][_marker]" value="1">
        <h3 style="font-size:15px;margin-bottom:10px;">Kemampuan Non Teknis</h3>

        <div id="rows-skill_non_teknis" data-filter-items="row">
            @foreach($skillNonTeknis as $index => $row)
                <div class="repeater-row">
                    <div>
                        <label>Nama Skill</label>
                        <input type="text" name="items[skill_non_teknis][{{ $index }}][nama]" value="{{ $row['nama'] ?? '' }}">
                    </div>
                    <div>
                        <label>Persen</label>
                        <input type="number" name="items[skill_non_teknis][{{ $index }}][persen]" value="{{ $row['persen'] ?? 0 }}" min="0" max="100">
                    </div>
                    <button type="button" class="btn-remove" data-remove>Hapus</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn-add" data-add="skill_non_teknis">+ Tambah Skill Non Teknis</button>

        <hr style="border:none;border-top:1px solid var(--border);margin:18px 0;">

        <input type="hidden" name="items[teknologi][_marker]" value="1">
        <h3 style="font-size:15px;margin-bottom:10px;">Teknologi</h3>

        <div id="rows-teknologi" data-filter-items="row">
            @foreach($teknologi as $index => $row)
                <div class="repeater-row">
                    <div>
                        <label>Nama Teknologi</label>
                        <input type="text" name="items[teknologi][{{ $index }}][nama]" value="{{ $row['nama'] ?? '' }}">
                    </div>
                    <button type="button" class="btn-remove" data-remove>Hapus</button>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn-add" data-add="teknologi">+ Tambah Teknologi</button>

        <button class="btn-submit" style="margin-top:18px;">Update Data</button>
    </form>

    <template id="template-skill_teknis">
        <div class="repeater-row">
            <div>
                <label>Nama Skill</label>
                <input type="text" name="items[skill_teknis][__INDEX__][nama]" value="">
            </div>
            <div>
                <label>Persen</label>
                <input type="number" name="items[skill_teknis][__INDEX__][persen]" value="0" min="0" max="100">
            </div>
            <button type="button" class="btn-remove" data-remove>Hapus</button>
        </div>
    </template>

    <template id="template-skill_non_teknis">
        <div class="repeater-row">
            <div>
                <label>Nama Skill</label>
                <input type="text" name="items[skill_non_teknis][__INDEX__][nama]" value="">
            </div>
            <div>
                <label>Persen</label>
                <input type="number" name="items[skill_non_teknis][__INDEX__][persen]" value="0" min="0" max="100">
            </div>
            <button type="button" class="btn-remove" data-remove>Hapus</button>
        </div>
    </template>

    <template id="template-teknologi">
        <div class="repeater-row">
            <div>
                <label>Nama Teknologi</label>
                <input type="text" name="items[teknologi][__INDEX__][nama]" value="">
            </div>
            <button type="button" class="btn-remove" data-remove>Hapus</button>
        </div>
    </template>
</div>

<div class="panel" id="project-konten">
    <div class="panel-title">Project</div>

    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="judul" placeholder="Judul proyek">
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <input type="text" name="teknologi" placeholder="Teknologi (dipisah koma)">
        <textarea name="masalah" placeholder="Masalah"></textarea>
        <textarea name="tujuan" placeholder="Tujuan"></textarea>
        <input type="text" name="peran" placeholder="Peran">
        <input type="url" name="link_demo" placeholder="Link demo (https://...)">
        <input type="url" name="link_github" placeholder="Link GitHub (https://...)">
        <textarea name="dokumentasi" placeholder="Dokumentasi"></textarea>
        <textarea name="detail" placeholder="Detail"></textarea>
        <textarea name="fitur" placeholder="Fitur (satu per baris)"></textarea>

        <div class="upload-field">
            <label>Gambar Utama Proyek</label>
            <input type="file" name="gambar" accept="image/*">
            <p class="hint">File ini dipakai sebagai thumbnail kartu proyek di portofolio.</p>
        </div>

        <div class="upload-field">
            <label>Galeri Screenshot Proyek</label>
            <input type="file" name="galeri[]" accept="image/*" multiple>
            <p class="hint">Bisa pilih beberapa gambar sekaligus untuk halaman detail proyek.</p>
        </div>

        <button class="btn-submit">Simpan Project</button>
    </form>

    <div class="grid" style="margin-top:20px;" data-filter-items="card">

        @forelse($projects ?? [] as $project)
            <div class="card">

                @if($project->gambar)
                    <img src="{{ asset('img/'.$project->gambar) }}" alt="{{ $project->judul }}">
                @endif

                <h3>
                    {{ $project->judul }}
                    @if(($updated['type'] ?? '') === 'project' && (int) ($updated['id'] ?? 0) === $project->id)
                        <span class="badge badge-updated">Sudah diperbarui</span>
                    @endif
                </h3>

                <p class="text-muted">{{ $project->deskripsi }}</p>
                <p class="status-hint">Diupdate: {{ $project->updated_at?->format('d M Y H:i') ?? '-' }}</p>

                <div class="tech-list">
                    @foreach(explode(',', $project->teknologi ?? '') as $tech)
                        @if(trim($tech) !== '')
                            <span class="tech">{{ trim($tech) }}</span>
                        @endif
                    @endforeach
                </div>

                <details class="edit-box">
                    <summary>Edit / Update Proyek</summary>

                    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="text" name="judul" value="{{ $project->judul }}" placeholder="Judul proyek">
                        <textarea name="deskripsi" placeholder="Deskripsi">{{ $project->deskripsi }}</textarea>
                        <input type="text" name="teknologi" value="{{ $project->teknologi }}" placeholder="Teknologi (dipisah koma)">
                        <textarea name="masalah" placeholder="Masalah">{{ $project->masalah }}</textarea>
                        <textarea name="tujuan" placeholder="Tujuan">{{ $project->tujuan }}</textarea>
                        <input type="text" name="peran" value="{{ $project->peran }}" placeholder="Peran">
                        <input type="url" name="link_demo" value="{{ $project->link_demo }}" placeholder="Link demo">
                        <input type="url" name="link_github" value="{{ $project->link_github }}" placeholder="Link GitHub">
                        <textarea name="dokumentasi" placeholder="Dokumentasi">{{ $project->dokumentasi }}</textarea>
                        <textarea name="detail" placeholder="Detail">{{ $project->detail }}</textarea>
                        <textarea name="fitur" placeholder="Fitur (satu per baris)">{{ $project->fitur }}</textarea>

                        <div class="upload-field">
                            <label>Ganti Gambar Utama Proyek</label>
                            <input type="file" name="gambar" accept="image/*">
                            <p class="hint">Kosongkan jika gambar proyek tidak ingin diganti.</p>
                        </div>

                        <button class="btn-submit">Update Data</button>
                    </form>
                </details>

                <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" style="margin-top:10px;">Hapus</button>
                </form>

            </div>
        @empty
            <div class="empty">Belum ada project</div>
        @endforelse

    </div>
</div>

<div class="panel" id="achievement-konten">
    <div class="panel-title">Sertifikat</div>

    <form action="{{ route('achievement.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="kategori" value="sertifikat">
        <input type="text" name="judul" placeholder="Judul">
        <input type="text" name="penyelenggara" placeholder="Penyelenggara">
        <input type="text" name="tahun" placeholder="Tahun">
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <input type="url" name="link" placeholder="Link (https://...)">

        <div class="upload-field">
            <label>Gambar Sertifikat</label>
            <input type="file" name="gambar" accept="image/*">
            <p class="hint">File ini ditampilkan sebagai gambar pada kartu sertifikat.</p>
        </div>

        <button class="btn-submit">Simpan</button>
    </form>

    <div class="grid" style="margin-top:20px;" data-filter-items="card">

        @forelse($achievements ?? [] as $item)
            <div class="card">
                @if($item->gambar)
                    <img src="{{ asset('img/'.$item->gambar) }}" alt="{{ $item->judul }}">
                @endif

                <div class="card-header">
                    <h3>
                        {{ $item->judul }}
                        @if(($updated['type'] ?? '') === 'achievement' && (int) ($updated['id'] ?? 0) === $item->id)
                            <span class="badge badge-updated">Sudah diperbarui</span>
                        @endif
                    </h3>
                </div>

                <p class="text-muted">{{ $item->penyelenggara }} {{ $item->tahun }}</p>
                <p class="text-muted">{{ $item->deskripsi }}</p>
                <p class="status-hint">Diupdate: {{ $item->updated_at?->format('d M Y H:i') ?? '-' }}</p>

                <details class="edit-box">
                    <summary>Edit / Update Sertifikat</summary>

                    <form action="{{ route('achievement.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="kategori" value="sertifikat">
                        <input type="text" name="judul" value="{{ $item->judul }}" placeholder="Judul">
                        <input type="text" name="penyelenggara" value="{{ $item->penyelenggara }}" placeholder="Penyelenggara">
                        <input type="text" name="tahun" value="{{ $item->tahun }}" placeholder="Tahun">
                        <textarea name="deskripsi" placeholder="Deskripsi">{{ $item->deskripsi }}</textarea>
                        <input type="url" name="link" value="{{ $item->link }}" placeholder="Link (https://...)">

                        <div class="upload-field">
                            <label>Ganti Gambar Sertifikat</label>
                            <input type="file" name="gambar" accept="image/*">
                            <p class="hint">Kosongkan jika gambar tidak ingin diganti.</p>
                        </div>

                        <button class="btn-submit">Update Data</button>
                    </form>
                </details>

                <form action="{{ route('achievement.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @empty
            <div class="empty">Belum ada sertifikat</div>
        @endforelse

    </div>
</div>

<div class="panel" id="experience-konten">
    <div class="panel-title">Pengalaman</div>

    <form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <select name="kategori" class="exp-kategori">
            <option value="pkl">PKL</option>
            <option value="organisasi">Organisasi</option>
            <option value="kepanitiaan">Kepanitiaan</option>
            <option value="lomba">Lomba</option>
        </select>
        <div class="nama-acara-field" style="display:none;">
            <input type="text" name="judul" placeholder="Nama Acara">
        </div>
        <input type="text" name="instansi" placeholder="Nama Instansi">
        <input type="text" name="periode" placeholder="Periode">
        <input type="text" name="jabatan" placeholder="Jabatan">
        <textarea name="deskripsi" placeholder="Deskripsi (opsional)"></textarea>

        <div class="upload-field">
            <label>Gambar Pengalaman</label>
            <input type="file" name="gambar" accept="image/*">
            <p class="hint">File ini dipakai sebagai gambar pendukung pada kartu pengalaman.</p>
        </div>

        <button class="btn-submit">Simpan</button>
    </form>

    <div class="grid" style="margin-top:20px;" data-filter-items="card">

        @forelse($experiences ?? [] as $item)
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $item->judul ?: ($item->jabatan ?: $item->instansi) }}
                        @if(($updated['type'] ?? '') === 'experience' && (int) ($updated['id'] ?? 0) === $item->id)
                            <span class="badge badge-updated">Sudah diperbarui</span>
                        @endif
                    </h3>
                    <span class="badge">{{ $item->kategori }}</span>
                </div>
                <p class="text-muted">{{ $item->instansi }} · {{ $item->periode }}</p>
                @if($item->judul && $item->jabatan)
                    <p class="text-muted">{{ $item->jabatan }}</p>
                @endif
                <p class="status-hint">Diupdate: {{ $item->updated_at?->format('d M Y H:i') ?? '-' }}</p>

                <details class="edit-box">
                    <summary>Edit / Update Pengalaman</summary>

                    <form action="{{ route('experience.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <select name="kategori" class="exp-kategori">
                            @foreach(['pkl', 'organisasi', 'kepanitiaan', 'lomba'] as $kategori)
                                <option value="{{ $kategori }}" {{ $item->kategori === $kategori ? 'selected' : '' }}>{{ ucfirst($kategori) }}</option>
                            @endforeach
                        </select>
                        <div class="nama-acara-field" style="display:none;">
                            <input type="text" name="judul" value="{{ $item->judul }}" placeholder="Nama Acara">
                        </div>
                        <input type="text" name="instansi" value="{{ $item->instansi }}" placeholder="Nama Instansi">
                        <input type="text" name="periode" value="{{ $item->periode }}" placeholder="Periode">
                        <input type="text" name="jabatan" value="{{ $item->jabatan }}" placeholder="Jabatan">
                        <textarea name="deskripsi" placeholder="Deskripsi (opsional)">{{ $item->deskripsi }}</textarea>

                        <div class="upload-field">
                            <label>Ganti Gambar Pengalaman</label>
                            <input type="file" name="gambar" accept="image/*">
                            <p class="hint">Kosongkan jika gambar tidak ingin diganti.</p>
                        </div>

                        <button class="btn-submit">Update Data</button>
                    </form>
                </details>

                <form action="{{ route('experience.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @empty
            <div class="empty">Belum ada pengalaman</div>
        @endforelse

    </div>
</div>

<div class="panel" id="testimonial-konten">
    <div class="panel-title">Testimoni</div>

    @php
        $testiKategori = [
            'guru' => 'Guru Pembimbing',
            'teman' => 'Teman',
            'pengguna' => 'Pengguna',
            'pkl' => 'Tempat PKL',
        ];
    @endphp

    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Sebagai</label>
        <select name="kategori">
            @foreach($testiKategori as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        </select>
        <input type="text" name="nama" placeholder="Nama">

        <label>Penilaian</label>
        <select name="rating">
            @for($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }} bintang</option>
            @endfor
        </select>

        <textarea name="isi" placeholder="Isi testimoni"></textarea>

        <div class="upload-field">
            <label>Foto Testimoni</label>
            <input type="file" name="foto" accept="image/*">
            <p class="hint">File ini dipakai sebagai foto pemberi testimoni di portofolio.</p>
        </div>

        <button class="btn-submit">Simpan</button>
    </form>

    <div class="grid" style="margin-top:20px;" data-filter-items="card">

        @forelse($testimonials ?? [] as $item)
            <div class="card">
                <div class="card-header">
                    <h3>
                        {{ $item->nama }}
                        @if(($updated['type'] ?? '') === 'testimonial' && (int) ($updated['id'] ?? 0) === $item->id)
                            <span class="badge badge-updated">Sudah diperbarui</span>
                        @endif
                    </h3>
                    <span class="badge">{{ $testiKategori[$item->kategori] ?? $item->kategori }}</span>
                </div>
                <p class="text-muted">{{ $item->isi }}</p>
                @if($item->rating)
                    <p class="status-hint">Penilaian: {{ $item->rating }}/5</p>
                @endif
                <p class="status-hint">Diupdate: {{ $item->updated_at?->format('d M Y H:i') ?? '-' }}</p>

                <details class="edit-box">
                    <summary>Edit / Update Testimoni</summary>

                    <form action="{{ route('testimonial.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label>Sebagai</label>
                        <select name="kategori">
                            @foreach($testiKategori as $key => $label)
                                <option value="{{ $key }}" {{ $item->kategori === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="nama" value="{{ $item->nama }}" placeholder="Nama">

                        <label>Penilaian</label>
                        <select name="rating">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating', $item->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} bintang</option>
                            @endfor
                        </select>

                        <textarea name="isi" placeholder="Isi testimoni">{{ $item->isi }}</textarea>

                        <div class="upload-field">
                            <label>Ganti Foto Testimoni</label>
                            <input type="file" name="foto" accept="image/*">
                            <p class="hint">Kosongkan jika foto tidak ingin diganti.</p>
                        </div>

                        <button class="btn-submit">Update Data</button>
                    </form>
                </details>

                <form action="{{ route('testimonial.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @empty
            <div class="empty">Belum ada testimoni</div>
        @endforelse

    </div>
</div>

<div class="panel" id="blog-konten">
    <div class="panel-title">Blog</div>

    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="judul" placeholder="Judul artikel">

        <select name="kategori">
            @foreach(($kategoriList ?? \App\Models\Article::KATEGORI) as $kategori)
                <option value="{{ $kategori }}">{{ $kategori }}</option>
            @endforeach
        </select>

        <textarea name="ringkasan" placeholder="Ringkasan"></textarea>
        <textarea name="isi" placeholder="Isi artikel (bisa pakai ## Judul, **tebal**, `kode`, ```blok kode```)"></textarea>
        <input type="text" name="tags" placeholder="Tags (dipisah koma)">

        <div class="upload-field">
            <label>Gambar Artikel</label>
            <input type="file" name="gambar" accept="image/*">
            <p class="hint">File ini dipakai sebagai sampul artikel di halaman blog.</p>
        </div>

        <label class="check">
            <input type="checkbox" name="published" value="1" checked>
            Publikasikan
        </label>

        <button class="btn-submit">Simpan Artikel</button>
    </form>

    <div class="grid" style="margin-top:20px;" data-filter-items="card">

        @forelse($articles ?? [] as $article)
            <div class="card">
                @if($article->gambar_url)
                    <img src="{{ $article->gambar_url }}" alt="{{ $article->judul }}">
                @endif

                <div class="card-header">
                    <h3>
                        {{ $article->judul }}
                        @if(($updated['type'] ?? '') === 'blog' && (int) ($updated['id'] ?? 0) === $article->id)
                            <span class="badge badge-updated">Sudah diperbarui</span>
                        @endif
                    </h3>
                    <span class="badge">{{ $article->published ? 'Publik' : 'Draft' }}</span>
                </div>

                <span class="badge">{{ $article->kategori }}</span>
                <p class="text-muted">{{ $article->ringkasan }}</p>
                <p class="status-hint">Diupdate: {{ $article->updated_at?->format('d M Y H:i') ?? '-' }}</p>

                <details class="edit-box">
                    <summary>Edit / Update Artikel</summary>

                    <form action="{{ route('admin.blog.update', $article) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="text" name="judul" value="{{ $article->judul }}" placeholder="Judul artikel">

                        <select name="kategori">
                            @foreach(($kategoriList ?? \App\Models\Article::KATEGORI) as $kategori)
                                <option value="{{ $kategori }}" {{ $article->kategori === $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                            @endforeach
                        </select>

                        <textarea name="ringkasan" placeholder="Ringkasan">{{ $article->ringkasan }}</textarea>
                        <textarea name="isi" placeholder="Isi artikel">{{ $article->isi }}</textarea>
                        <input type="text" name="tags" value="{{ $article->tags }}" placeholder="Tags (dipisah koma)">

                        <div class="upload-field">
                            <label>Ganti Gambar Artikel</label>
                            <input type="file" name="gambar" accept="image/*">
                            <p class="hint">Kosongkan jika sampul artikel tidak ingin diganti.</p>
                        </div>

                        <label class="check">
                            <input type="checkbox" name="published" value="1" {{ $article->published ? 'checked' : '' }}>
                            Publikasikan
                        </label>

                        <button class="btn-submit">Update Data</button>
                    </form>
                </details>

                <div class="actions">
                    <a class="btn btn-secondary" href="{{ route('blog.show', $article->slug) }}" target="_blank">Lihat</a>

                    <form action="{{ route('admin.blog.destroy', $article) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </div>

            </div>
        @empty
            <div class="empty">Belum ada artikel</div>
        @endforelse

    </div>
</div>

<div class="panel" id="message-konten">
    <div class="panel-title">Kesan dan Pesan</div>

    <div class="grid-2" data-filter-items="card">

        @forelse($messages ?? [] as $message)
            <div class="card-modern">
                <div class="card-header">
                    <h3>{{ $message->nama }}</h3>
                    <span class="badge">Kesan &amp; Pesan</span>
                </div>

                <p class="text-muted">{{ $message->kesan }}</p>
                <p class="text-muted">{{ $message->pesan }}</p>
                <p class="status-hint">Dikirim: {{ $message->created_at?->format('d M Y H:i') ?? '-' }}</p>

                <form action="{{ route('message.destroy', $message->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @empty
            <div class="empty">Belum ada kesan dan pesan</div>
        @endforelse

    </div>
</div>

<div class="panel" id="contact-konten">
    <div class="panel-title">Kontak</div>

    <div class="grid-2" data-filter-items="card">

        @forelse($contacts ?? [] as $contact)
            <div class="card-modern">
                <div class="card-header">
                    <h3>{{ $contact->nama }}</h3>
                    <span class="badge">Kontak</span>
                </div>

                <p class="text-muted">📧 {{ $contact->email }}</p>
                <p class="text-muted">{{ $contact->pesan }}</p>
                <p class="status-hint">Dikirim: {{ $contact->created_at?->format('d M Y H:i') ?? '-' }}</p>

                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">Hapus</button>
                </form>
            </div>
        @empty
            <div class="empty">Belum ada pesan kontak</div>
        @endforelse

    </div>
</div>

</div>

<script>
(function () {
    var templates = {
        pendidikan: document.getElementById('template-pendidikan'),
        organisasi: document.getElementById('template-organisasi'),
        skill_teknis: document.getElementById('template-skill_teknis'),
        skill_non_teknis: document.getElementById('template-skill_non_teknis'),
        teknologi: document.getElementById('template-teknologi')
    };
    var counter = Date.now();

    document.querySelectorAll('[data-add]').forEach(function (button) {
        button.addEventListener('click', function () {
            var group = button.getAttribute('data-add');
            var template = templates[group];
            var target = document.getElementById('rows-'+group);

            if (!template || !target) {
                return;
            }

            counter += 1;
            target.insertAdjacentHTML('beforeend', template.innerHTML.replace(/__INDEX__/g, counter));
            applyFilter();
        });
    });

    document.addEventListener('click', function (event) {
        var button = event.target.closest('[data-remove]');

        if (button) {
            var row = button.closest('.repeater-row');

            if (row) {
                row.remove();
                applyFilter();
            }
        }
    });

    var searchInput = document.getElementById('filter-search');
    var sectionSelect = document.getElementById('filter-section');
    var statusSelect = document.getElementById('filter-status');
    var filterInfo = document.getElementById('filter-info');
    var filterablePanels = Array.prototype.slice.call(document.querySelectorAll('.panel[id]'));
    var filterableContainers = Array.prototype.slice.call(document.querySelectorAll('[data-filter-items]'));

    function itemElements(container) {
        var type = container.getAttribute('data-filter-items');

        return Array.prototype.slice.call(container.children).filter(function (element) {
            return type === 'row'
                ? element.classList.contains('repeater-row')
                : element.classList.contains('card') || element.classList.contains('card-modern');
        });
    }

    function applyFilter() {
        var query = (searchInput ? searchInput.value : '').trim().toLowerCase();
        var section = sectionSelect ? sectionSelect.value : 'all';
        var status = statusSelect ? statusSelect.value : 'all';
        var visible = 0;

        filterablePanels.forEach(function (panel) {
            panel.hidden = section !== 'all' && panel.id !== section;
        });

        filterableContainers.forEach(function (container) {
            itemElements(container).forEach(function (item) {
                var matchesText = query === '' || item.textContent.toLowerCase().indexOf(query) !== -1;
                var matchesStatus = status !== 'updated' || Boolean(item.querySelector('.badge-updated'));
                var show = matchesText && matchesStatus;

                item.hidden = !show;

                var panel = container.closest('.panel');

                if (show && panel && !panel.hidden) {
                    visible += 1;
                }
            });
        });

        if (filterInfo) {
            filterInfo.textContent = 'Menampilkan ' + visible + ' item' + (query ? ' untuk "' + searchInput.value.trim() + '"' : '') + '.';
        }
    }

    [searchInput, sectionSelect, statusSelect].forEach(function (element) {
        if (element) {
            element.addEventListener('input', applyFilter);
            element.addEventListener('change', applyFilter);
        }
    });

    function toggleNamaAcara(select) {
        var form = select.closest('form');
        var field = form ? form.querySelector('.nama-acara-field') : null;

        if (!field) {
            return;
        }

        var isPanitia = select.value === 'kepanitiaan';
        field.style.display = isPanitia ? '' : 'none';

        if (!isPanitia) {
            var input = field.querySelector('input[name="judul"]');
            if (input) {
                input.value = '';
            }
        }
    }

    document.querySelectorAll('.exp-kategori').forEach(function (select) {
        toggleNamaAcara(select);
        select.addEventListener('change', function () {
            toggleNamaAcara(select);
        });
    });

    applyFilter();
})();
</script>

</body>
</html>
