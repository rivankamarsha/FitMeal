<x-index-layout>
  <style>
        /* Hero section */
        .hero {
            height: 300px;
            background-image: url('{{ asset('img/artikel.jpg') }}');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            margin-bottom: 60px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            color: white;
        }

        /* Articles section */
        .articles-section {
            padding-bottom: 80px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            text-align: center;
            margin-bottom: 24px;
            color: white;
        }

        .section-description {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 40px;
            opacity: 0.9;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        @media (max-width: 992px) {
            .articles-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .articles-grid {
                grid-template-columns: 1fr;
            }
        }

        .article-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            color: #333;
            transition: transform 0.3s;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        .article-image {
            height: 200px;
            overflow: hidden;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .article-card:hover .article-image img {
            transform: scale(1.05);
        }

        .article-content {
            padding: 20px;
        }

        .article-title {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 16px;
            line-height: 1.4;
        }

        .article-meta {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #666;
        }

        .article-author {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .article-author-icon {
            width: 16px;
            height: 16px;
        }

        .article-date {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .article-date-icon {
            width: 16px;
            height: 16px;
        }

        /* Footer styles */
        footer {
            background: white;
            color: #0F3D2B;
            padding: 48px 0;
            margin-top: 64px;
            border-top-left-radius: 24px;
            border-top-right-radius: 24px;
        }

        .footer-top {
            margin-bottom: 32px;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 28px;
            margin-bottom: 4px;
        }

        .footer-tagline {
            font-size: 14px;
        }

        .footer-middle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 32px;
            border-top: 1px solid #eee;
        }

        .social-links {
            display: flex;
            gap: 16px;
        }

        .social-links a {
            color: #0F3D2B;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #1A5E35;
        }

        .footer-nav {
            display: flex;
            gap: 32px;
        }

        .footer-nav a {
            color: #0F3D2B;
            transition: color 0.3s;
        }

        .footer-nav a:hover {
            color: #1A5E35;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 48px;
            font-size: 14px;
            color: #666;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
            }
            .section-title {
                font-size: 28px;
            }
            .footer-middle {
                flex-direction: column;
                gap: 24px;
            }
            .nav-links {
                gap: 16px;
            }
        }
  </style>
  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Artikel Terkini</h1>
        </div>
    </div>
</section>

<!-- Articles Section -->
<section class="articles-section">
    <div class="container">
        <h2 class="section-title">Artikel Terkini</h2>
        <p class="section-description">
            Temukan berbagai artikel terbaru seputar gaya hidup sehat, tips diet, serta informasi menarik lainnya yang dapat membantumu menjalani pola hidup lebih baik.
        </p>
        
        <div class="articles-grid">
          @foreach ($articles as $article)
          <article class="article-card">
              <div class="article-image">
                  <img src="{{ asset('storage/' . $article->image) }}" alt="{{$article->judul}}">
              </div>
              <div class="article-content">
                <a href="{{ route('detailArtikel', $article->slug) }}">
                  <h3 class="article-title">{{$article->judul}}</h3>
                </a>
                  <div class="article-meta">
                      <div class="article-author">
                          <svg class="article-author-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                              <circle cx="12" cy="7" r="4"></circle>
                          </svg>
                          <span>{{$article->sumber}}</span>
                      </div>
                      <div class="article-date">
                          <svg class="article-date-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                              <line x1="16" y1="2" x2="16" y2="6"></line>
                              <line x1="8" y1="2" x2="8" y2="6"></line>
                              <line x1="3" y1="10" x2="21" y2="10"></line>
                          </svg>
                          <span>{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('l, d F Y') }}</span>
                      </div>
                  </div>
              </div>
          </article>
          @endforeach
        </div>
    </div>
</section>
  </x-index-layout>
