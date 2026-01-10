<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- 1. Statik Sayfalar --}}
    @foreach($staticPages as $page)
        <url>
            <loc>{{ $page['url'] }}</loc>
            <lastmod>{{ $now }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>{{ $page['priority'] }}</priority>
        </url>
    @endforeach

    {{-- 2. Kategori Filtreleri (SEO için çok faydalıdır) --}}
    @foreach($categories as $cat)
        <url>
            <loc>{{ route('blogs.index') }}?category={{ $cat }}</loc>
            <lastmod>{{ $now }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    {{-- 3. Dinamik Blog Yazıları --}}
    @foreach ($posts as $post)
        <url>
            <loc>{{ route('blogs.show', $post->slug) }}</loc>
            <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

</urlset>
