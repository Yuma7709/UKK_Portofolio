<a href="{{ route('blog.show', $a->slug) }}" class="blog-card">
    @if($a->gambar_url)
        <img src="{{ $a->gambar_url }}" alt="{{ $a->judul }}" loading="lazy">
    @endif

    <div class="blog-body">
        <div class="blog-meta">
            <span class="blog-cat">{{ $a->kategori }}</span>
            <small>{{ $a->created_at?->format('d M Y') }}</small>
        </div>

        <h3>{{ $a->judul }}</h3>
        <p>{{ $a->ringkasan }}</p>

        @if($a->tag_list)
            <div class="blog-tags">
                @foreach($a->tag_list as $tag)
                    <span>#{{ $tag }}</span>
                @endforeach
            </div>
        @endif
    </div>
</a>
