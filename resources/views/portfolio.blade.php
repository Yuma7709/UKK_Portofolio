php
@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yuma Portfolio | Front-End Developer</title>

    <style>

        :root{
            --primary:#00d4ff;
            --secondary:#2563eb;
            --dark:#08111f;
            --dark2:#111827;
            --card:#141f33;
            --text:#ffffff;
            --muted:#94a3b8;
            --border:rgba(255,255,255,.08);
            --shadow:0 10px 40px rgba(0,0,0,.35);
        }

        [data-theme="light"]{
            --dark:#eef4ff;
            --dark2:#ffffff;
            --card:#ffffff;
            --text:#111827;
            --muted:#64748b;
            --border:#dbe4f0;
            --shadow:0 10px 30px rgba(15,23,42,.08);
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
            transition:.3s;
        }

        html{
            scroll-behavior:smooth;
        }

        body{
            background:linear-gradient(to bottom,var(--dark),var(--dark2));
            color:var(--text);
            overflow-x:hidden;
        }

        .container{
            width:100%;
            max-width:1200px;
            margin:auto;
            padding:0 20px;
        }

        nav{
            position:fixed;
            width:100%;
            top:0;
            z-index:1000;
            backdrop-filter:blur(15px);
            background:rgba(10,15,25,.75);
            border-bottom:1px solid var(--border);
        }

        [data-theme="light"] nav{
            background:rgba(255,255,255,.9);
        }

        nav .container{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 20px;
        }

        .logo{
            color:var(--text);
            text-decoration:none;
            font-size:1.8rem;
            font-weight:800;
        }

        .logo span{
            color:var(--primary);
        }

        nav ul{
            display:flex;
            gap:25px;
            list-style:none;
        }

        nav ul li a{
            color:var(--text);
            text-decoration:none;
            font-size:.95rem;
            font-weight:600;
        }

        nav ul li a:hover{
            color:var(--primary);
        }

        .nav-right{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .hamburger{
            display:none;
            flex-direction:column;
            gap:5px;
            cursor:pointer;
        }

        .hamburger span{
            width:28px;
            height:3px;
            border-radius:10px;
            background:var(--text);
        }

        #theme-toggle,
        .btn-admin{
            border:none;
            padding:10px 18px;
            border-radius:50px;
            font-weight:700;
            cursor:pointer;
            text-decoration:none;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        #theme-toggle{
            background:var(--primary);
            color:#000;
        }

        .btn-admin{
            background:var(--secondary);
            color:#fff;
        }

        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
            padding-top:130px;
            position:relative;
        }

        .hero::before{
            content:'';
            position:absolute;
            width:300px;
            height:300px;
            background:var(--primary);
            filter:blur(140px);
            opacity:.18;
            top:50px;
            left:-100px;
        }

        .hero-wrapper{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:60px;
            align-items:center;
        }

        .hero-left h4{
            color:var(--primary);
            margin-bottom:15px;
            font-size:1.1rem;
        }

        .hero-left h1{
            font-size:4.3rem;
            line-height:1.1;
            margin-bottom:20px;
        }

        .hero-left p{
            color:var(--muted);
            line-height:1.9;
            margin-bottom:30px;
        }

        .hero-btns{
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn-primary,
        .btn-secondary{
            padding:15px 28px;
            border-radius:14px;
            font-weight:700;
            text-decoration:none;
            display:inline-block;
        }

        .btn-primary{
            background:var(--primary);
            color:#000;
        }

        .btn-secondary{
            border:1px solid var(--border);
            color:var(--text);
        }

        .hero-card{
            background:var(--card);
            padding:35px;
            border-radius:35px;
            border:1px solid var(--border);
            box-shadow:var(--shadow);
            text-align:center;
        }

        .profile-img{
            width:260px;
            height:260px;
            object-fit:cover;
            border-radius:50%;
            border:6px solid var(--primary);
        }

        section{
            padding:90px 0;
        }

        .section-box{
            background:var(--card);
            border:1px solid var(--border);
            border-radius:35px;
            padding:50px;
            box-shadow:var(--shadow);
        }

        .section-title{
            text-align:center;
            font-size:2.7rem;
            margin-bottom:15px;
        }

        .section-subtitle{
            text-align:center;
            color:var(--muted);
            margin-bottom:45px;
        }

        .about-grid,
        .contact-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:35px;
        }

        .about-card,
        .contact-card{
            background:rgba(255,255,255,.03);
            border:1px solid var(--border);
            padding:30px;
            border-radius:25px;
        }

        .about-card h3,
        .contact-card h3{
            color:var(--primary);
            margin-bottom:15px;
        }

        .about-card p,
        .contact-card p{
            color:var(--muted);
            line-height:1.8;
        }

        .skills-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(170px,1fr));
            gap:20px;
        }

        .skill-card{
            background:rgba(255,255,255,.03);
            border:1px solid var(--border);
            padding:30px;
            border-radius:25px;
            text-align:center;
        }

        .skill-card:hover{
            transform:translateY(-8px);
        }

        .skill-card img{
            width:55px;
            margin-bottom:15px;
        }

        .project-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
            gap:30px;
        }

        .project-grid.single-project{
            grid-template-columns:1fr;
            max-width:750px;
            margin:0 auto;
        }

        .single-project .project-card img{
            height:380px;
        }

        .project-card{
            background:rgba(255,255,255,.03);
            border:1px solid var(--border);
            border-radius:28px;
            overflow:hidden;
            box-shadow:var(--shadow);
        }

        .project-card:hover{
            transform:translateY(-10px);
        }

        .project-card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .project-content{
            padding:25px;
        }

        .project-content h3{
            margin-bottom:15px;
            color:var(--primary);
        }

        .project-content p{
            color:var(--muted);
            line-height:1.8;
            margin-bottom:20px;
        }

        .project-tags{
            display:flex;
            flex-wrap:wrap;
            gap:10px;
        }

        .project-tags span{
            background:rgba(0,212,255,.12);
            color:var(--primary);
            padding:8px 15px;
            border-radius:50px;
            font-size:.8rem;
            font-weight:700;
        }

        .action-buttons{
            display:flex;
            gap:12px;
            margin-top:20px;
            flex-wrap:wrap;
        }

        .btn-edit,
        .btn-delete,
        .btn-submit{
            border:none;
            padding:12px 20px;
            border-radius:12px;
            font-weight:700;
            cursor:pointer;
        }

        .btn-edit{
            background:#f59e0b;
            color:#000;
        }

        .btn-delete{
            background:#ef4444;
            color:#fff;
        }

        .btn-submit{
            background:var(--primary);
            color:#000;
            width:100%;
        }

        .message-card,
        .timeline-item{
            background:rgba(255,255,255,.03);
            border:1px solid var(--border);
            border-left:5px solid var(--primary);
            border-radius:22px;
            padding:25px;
            margin-top:20px;
        }

        .message-card p,
        .timeline-item p{
            color:var(--muted);
            margin-top:10px;
            line-height:1.8;
        }

        .form-styled{
            max-width:750px;
            margin:auto;
        }

        .form-group{
            margin-bottom:20px;
        }

        .form-group label{
            display:block;
            margin-bottom:10px;
            font-weight:600;
        }

        input,
        textarea{
            width:100%;
            padding:15px;
            border-radius:15px;
            border:1px solid var(--border);
            background:rgba(255,255,255,.04);
            color:var(--text);
            outline:none;
        }

        textarea{
            resize:none;
        }

      .message-card{
    background:rgba(255,255,255,.03);
    border:1px solid var(--border);
    border-left:5px solid var(--primary);
    border-radius:22px;
    padding:25px;
    margin-top:20px;
    position:relative;
}

.dropdown{
    position:absolute;
    top:15px;
    right:15px;
    z-index:1000;
}

.dropdown-btn{
    width:38px;
    height:38px;
    border:none;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    color:white;
    font-size:20px;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
}

.dropdown-btn:hover{
    background:rgba(255,255,255,.15);
}

.dropdown-menu{
    position:absolute;
    top:45px;
    right:0;
    background:#1e293b;
    border-radius:12px;
    overflow:hidden;
    display:none;
    min-width:130px;
    z-index:9999;
    border:1px solid rgba(255,255,255,.08);
}

.dropdown-menu button{
    width:100%;
    background:none;
    border:none;
    color:var(--text);
    padding:12px 15px;
    text-align:left;
    cursor:pointer;
    font-weight:600;
}

.dropdown-menu button:hover{
    background:rgba(255,255,255,.05);
}

        footer{
            text-align:center;
            padding:40px 20px;
            color:var(--muted);
        }

        @media(max-width:900px){

            .hero{
                padding-top:160px;
            }

            .hero-wrapper,
            .about-grid,
            .contact-grid{
                grid-template-columns:1fr;
            }

            .hero-wrapper{
                display:flex;
                flex-direction:column-reverse;
                text-align:center;
            }

            .hero-left h1{
                font-size:2.8rem;
            }

            .hero-card{
                margin-bottom:20px;
            }

            nav ul{
                position:absolute;
                top:80px;
                left:0;
                width:100%;
                background:var(--card);
                flex-direction:column;
                align-items:center;
                gap:20px;
                padding:30px 0;
                display:none;
            }

            nav ul.active{
                display:flex;
            }

            .hamburger{
                display:flex;
            }

            .nav-right{
                gap:8px;
            }

            .btn-admin{
                width:42px;
                height:42px;
                padding:0;
                font-size:0;
                border-radius:50%;
                position:relative;
            }

            .btn-admin::before{
                content:'👨‍💻';
                font-size:18px;
            }

            #theme-toggle{
                width:42px;
                height:42px;
                padding:0;
                font-size:0;
                border-radius:50%;
            }

            #theme-toggle::before{
                content:'🌙';
                font-size:18px;
            }

            body.light-mode #theme-toggle::before{
                content:'☀️';
            }

        }

        @media(max-width:600px){

            .hero-left h1{
                font-size:2.2rem;
            }

            .section-box{
                padding:30px 20px;
            }

            .section-title{
                font-size:2rem;
            }

            .profile-img{
                width:200px;
                height:200px;
            }

        }

    </style>
</head>

<body data-theme="dark">

<nav>

    <div class="container">

        <a href="#" class="logo">
            Porto<span>folio</span>
        </a>

        <ul id="nav-menu">
            <li><a href="#about">Home</a></li>
            <li><a href="#about-me">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#project">Project</a></li>
            <li><a href="#history">History</a></li>
            <li><a href="#board-message">Comment</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="nav-right">

            <!-- <a
                href="{{ route('admin.login') }}"
                class="btn-admin"
            >
                Admin
            </a> -->

            <button id="theme-toggle">
                Light Mode
            </button>

            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>

    </div>

</nav>

<header class="hero" id="about">

    <div class="container">

        <div class="hero-wrapper">

            <div class="hero-left">

                <h4>Front-End Developer</h4>

                <h1>
                    Yuma
                    <span style="color:var(--primary);">
                        Achmad Fairuza
                    </span>
                </h1>

                <p>
                    Saya adalah siswa SMKN 2 Banjarmasin jurusan PPLG
                    yang fokus pada Front-End Development,
                    UI/UX Design, dan Laravel Development.
                </p>

                <div class="hero-btns">

                    <a href="#project" class="btn-primary">
                        Lihat Project
                    </a>

                    <a href="#contact" class="btn-secondary">
                        Contact Me
                    </a>

                </div>

            </div>

            <div class="hero-card">

                <img
                    src="{{ asset('img/Yuma.jpeg') }}"
                    class="profile-img"
                >

            </div>

        </div>

    </div>

</header>

<section id="about-me">

    <div class="container">

        <div class="section-box">

            <h2 class="section-title">
                About Me
            </h2>

            <p class="section-subtitle">
                Sedikit tentang diri saya
            </p>

            <div class="about-grid">

                <div class="about-card">

                    <h3>Siapa Saya?</h3>

                    <p>
                        Saya adalah seorang pelajar yang memiliki minat
                        besar di bidang teknologi dan web development.
                    </p>

                </div>

                <div class="about-card">

                    <h3>Tujuan Saya</h3>

                    <p>
                        Menjadi Front-End Developer profesional
                        dengan UI modern dan pengalaman pengguna terbaik.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<section id="skills">

    <div class="container">

        <div class="section-box">

            <h2 class="section-title">
                My Skills
            </h2>

            <p class="section-subtitle">
                Teknologi yang saya gunakan
            </p>

            <div class="skills-grid">

                <div class="skill-card">
                    <img src="https://cdn-icons-png.flaticon.com/512/732/732212.png">
                    <h3>HTML</h3>
                </div>

                <div class="skill-card">
                    <img src="https://cdn-icons-png.flaticon.com/512/732/732190.png">
                    <h3>CSS</h3>
                </div>

                <div class="skill-card">
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968292.png">
                    <h3>JavaScript</h3>
                </div>

                <div class="skill-card">
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968332.png">
                    <h3>PHP</h3>
                </div>

                <div class="skill-card">
                    <img src="https://cdn-icons-png.flaticon.com/512/5968/5968313.png">
                    <h3>MySQL</h3>
                </div>

            </div>

        </div>

    </div>

</section>

<section id="project">

    <div class="container">

        <div class="section-box">

            <h2 class="section-title">
                My Project
            </h2>

            <p class="section-subtitle">
                Project yang pernah saya buat
            </p>

            <div class="project-grid {{ $projects->count() === 1 ? 'single-project' : '' }}">

                {{-- PROJECT DATABASE --}}
            @foreach($projects as $project)
            <div class="project-card">
                @if($project->gambar && file_exists(public_path('img/' . $project->gambar)))
                    <img
                        src="{{ asset('img/' . $project->gambar) }}"
                        alt="{{ $project->judul }}"
                    >
                @else
                    <img
                        src="{{ asset('img/desktop view 1.jpeg') }}"
                        alt="{{ $project->judul }}"
                    >
                @endif
<div class="project-content">
                    <h3>{{ $project->judul }}</h3>
                    <p>{{ Str::limit($project->deskripsi, 120) }}</p>
                        {{-- TECHNOLOGY TAGS --}}
                        <div class="project-tags">

                            @php
                                $techs = $project->teknologi
                                    ? array_filter(array_map('trim', explode(',', $project->teknologi)))
                                    : [];
                            @endphp

                            @if(count($techs) > 0)
                                @foreach($techs as $tech)
                                    <span>{{ $tech }}</span>
                                @endforeach
                            @else
                                <span>Belum ada teknologi</span>
                            @endif

                        </div>

                        {{-- ACTION BUTTON (ADMIN) --}}
                        @if(session('admin_logged_in'))

                        <div class="action-buttons">

                            <button class="btn-edit">Edit</button>

                            <form
                                action="{{ route('project.destroy', $project->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                >
                                    Hapus
                                </button>
                            </form>

                        </div>

                        @endif

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</section>

<section id="history">

    <div class="container">

        <div class="section-box">

            <h2 class="section-title">
                Riwayat Pendidikan
            </h2>

            <div class="timeline-item">
                <h3>2015 - 2021</h3>
                <p>SDN Belitung Selatan 5</p>
            </div>

            <div class="timeline-item">
                <h3>2021 - 2024</h3>
                <p>MTS Al-Huda</p>
            </div>

            <div class="timeline-item">
                <h3>2024 - Sekarang</h3>
                <p>SMKN 2 Banjarmasin</p>
            </div>

        </div>

    </div>

</section>

<section id="board-message">

    <div class="container">

        <div class="section-box">

            <h2 class="section-title" id="form-title">
                Comment
            </h2>

            <p class="section-subtitle">
                Tinggalkan komen untuk saya
            </p>

            <form
                action="{{ route('message.store') }}"
                method="POST"
                class="form-styled"
                id="messageForm"
            >

                @csrf

                <div id="method-field"></div>

                <div class="form-group">

                    <label>Nama</label>

                    <input
                        type="text"
                        name="nama"
                        id="input-nama"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Pesan</label>

                    <textarea
                        name="pesan"
                        id="input-pesan"
                        rows="5"
                        required
                    ></textarea>

                </div>

                <button
                    type="submit"
                    class="btn-submit"
                    id="btn-submit"
                >
                    Kirim Message
                </button>

            </form>

@foreach($messages as $message)

<div class="message-card" style="position:relative;">

    <div class="dropdown">

    <button
    class="dropdown-btn"
    onclick="event.stopPropagation(); toggleDropdown({{ $message->id }})"
    type="button"
>
    ⋮
</button>

    <div
        class="dropdown-menu"
        id="dropdown-{{ $message->id }}"
    >

        <button
            type="button"
            onclick="isiFormEditMessage(
                '{{ $message->id }}',
                '{{ htmlspecialchars($message->nama, ENT_QUOTES, 'UTF-8') }}',
                '{{ htmlspecialchars(str_replace(["\r","\n"], ' ', $message->pesan), ENT_QUOTES, 'UTF-8') }}'
            )"
        >
            Edit
        </button>

        <form
            action="{{ route('message.destroy', $message->id) }}"
            method="POST"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                style="color:red;"
                onclick="return confirm('Yakin ingin hapus message ini?')"
            >
                Hapus
            </button>

        </form>

    </div>

</div>

    <h4>
        {{ $message->nama }}
    </h4>

    <p>
        {{ $message->pesan }}
    </p>

</div>

@endforeach

            </div>

        </div>

    </div>

</section>

<section id="contact">

<div class="container">
    <div class="section-box">

        <h2 class="section-title">Contact Me</h2>
        <p class="section-subtitle">Hubungi saya melalui form atau sosial media</p>

        <div class="contact-grid">

            <!-- INFO CARD -->
            <div class="about-card">
                <h3>Informasi Kontak</h3>

                <p>📷 Instagram: @yuma_rayhan</p>
                <p>📱 WhatsApp: 08875448738</p>
                <p>📧 Email: yumaachmad2@gmail.com</p>

                <br>

                <p style="color:var(--muted); font-size:14px;">
                    Silakan kirim pesan jika ingin kerja sama atau diskusi project.
                </p>
            </div>

            <!-- FORM -->
            <div class="about-card">

                <h3>Kirim Pesan</h3>

                <form action="{{ route('contact.store') }}" method="POST" class="form-contact">
                    @csrf

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" placeholder="Masukkan nama kamu" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Masukkan email kamu" required>
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea name="pesan" rows="5" placeholder="Tulis pesan kamu..." required></textarea>
                    </div>

                    <button type="submit" class="btn-submit">
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>

    </div>
</div>

</section>

<footer>
    © 2026 Yuma Achmad Fairuza — All Rights Reserved
</footer>

<script>

    const toggleBtn = document.getElementById('theme-toggle');
const body = document.body;

toggleBtn.addEventListener('click', function () {

    const isDark = body.getAttribute('data-theme') === 'dark';

    if (isDark) {
        body.setAttribute('data-theme', 'light');
        toggleBtn.innerText = 'Dark Mode';
    } else {
        body.setAttribute('data-theme', 'dark');
        toggleBtn.innerText = 'Light Mode';
    }

});        

    const hamburger =
        document.getElementById('hamburger');

    const navMenu =
        document.getElementById('nav-menu');

    hamburger.onclick = () => {
        navMenu.classList.toggle('active');
    }

  function isiFormEditMessage(id, nama, pesan){

    document.getElementById('board-message')
        .scrollIntoView({
            behavior:'smooth'
        });

    document.getElementById('form-title')
        .innerText =
        "Edit Commment";

    document.getElementById('btn-submit')
        .innerText =
        "Simpan Perubahan";

    document.getElementById('input-nama')
        .value = nama;

    document.getElementById('input-pesan')
        .value = pesan;

    const form =
        document.getElementById('messageForm');

    form.action =
        `/message/update/${id}`;

    document.getElementById('method-field')
        .innerHTML =
        `<input type="hidden" name="_method" value="PUT">`;

}

    function toggleDropdown(id){

    const menu =
        document.getElementById(`dropdown-${id}`);

    const allMenus =
        document.querySelectorAll('.dropdown-menu');

    allMenus.forEach(item => {

        if(item !== menu){
            item.style.display = 'none';
        }

    });

    if(menu.style.display === 'block'){
        menu.style.display = 'none';
    }else{
        menu.style.display = 'block';
    }

}

window.onclick = function(e){

    if(!e.target.matches('.dropdown-btn')){

        const menus =
            document.querySelectorAll('.dropdown-menu');

        menus.forEach(menu => {
            menu.style.display = 'none';
        });

    }

}



function toggleDropdown(id){

    event.stopPropagation();

    const menu =
        document.getElementById(`dropdown-${id}`);

    const allMenus =
        document.querySelectorAll('.dropdown-menu');

    allMenus.forEach(item => {

        if(item !== menu){
            item.style.display = 'none';
        }

    });

    if(menu.style.display === 'block'){
        menu.style.display = 'none';
    }else{
        menu.style.display = 'block';
    }

}

</script>

</body>
</html>

