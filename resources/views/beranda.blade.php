<x-index-layout>
<style>
  footer {
        background: white;
        color: #0F3D2B;
    }

    /* Hero section */
    .hero {
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hero-text {
            max-width: 50%;
        }

        .hero-image {
            position: relative;
        }

        .hero-badge {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: #FFD700;
            color: #333;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            text-align: center;
            z-index: 2;
        }

        .hero-circle {
            position: absolute;
            width: 300px;
            height: 300px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .tag {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            margin-right: 8px;
            margin-bottom: 16px;
        }

        .tag-primary {
            background-color: #333;
            color: white;
        }

        .tag-secondary {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 64px;
            line-height: 1.1;
            margin-bottom: 16px;
            color: white;
        }

        .hero-subtitle {
            font-size: 16px;
            margin-bottom: 32px;
            opacity: 0.8;
        }

        .speech-bubble {
            background-color: white;
            color: #333;
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 24px;
            font-weight: 500;
        }

        /* About section */
        .about {
            padding: 80px 0;
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .about-image {
            flex: 1;
        }

        .about-text {
            flex: 1;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-bottom: 24px;
            color: white;
        }

        .section-description {
            margin-bottom: 24px;
            opacity: 0.9;
        }
    
  /* Food category section */
  .food-category {
            padding: 60px 0;
        }

        .category-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            text-align: center;
            margin-bottom: 40px;
            color: white;
        }

        .food-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        @media (max-width: 992px) {
            .food-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .food-grid {
                grid-template-columns: 1fr;
            }
        }

        .food-card {
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            color: #333;
            transition: transform 0.3s;
        }

        .food-card:hover {
            transform: translateY(-5px);
        }

        .food-image {
            height: 220px;
            overflow: hidden;
        }

        .food-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .food-card:hover .food-image img {
            transform: scale(1.05);
        }

        .food-content {
            padding: 20px;
            text-align: center;
        }

        .food-title {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 4px;
        }

        .food-calories {
            color: #777;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .food-description {
            font-size: 14px;
            color: #555;
        }

        .program-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-bottom: 60px;
        }

        @media (max-width: 768px) {
            .program-cards {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            color: #333;
        }

        .card-image {
            height: 400px;
            overflow: hidden;
            position: relative;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-content {
            padding: 32px;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            text-align: center;
            margin-bottom: 16px;
        }

        .card-subtitle {
            font-weight: 500;
            margin-bottom: 4px;
        }

        .card-description {
            font-size: 14px;
            margin-bottom: 24px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price-old {
            font-size: 12px;
            text-decoration: line-through;
            color: #777;
        }

        .price-current {
            font-size: 24px;
            font-weight: bold;
        }

        .btn {
            background-color: #0F3D2B;
            color: white;
            padding: 8px 24px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #1A5E35;
        }

        .program-title {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            margin-bottom: 16px;
            color: white;
        }

        .program-subtitle {
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        .program {
            padding: 80px 0;
        }

        .program-header {
            text-align: center;
            margin-bottom: 40px;
        }

        /* Menu section */
        .menu {
            padding: 80px 0;
        }

        .menu-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .menu-title {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            margin-bottom: 16px;
            color: white;
        }

        .menu-subtitle {
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 40px;
        }

        @media (max-width: 992px) {
            .menu-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .menu-grid {
                grid-template-columns: 1fr;
            }
        }

        .menu-card {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
        }

        .menu-image {
            height: 200px;
            overflow: hidden;
        }

        .menu-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .menu-content {
            padding: 20px;
            text-align: center;
        }

        .menu-category {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            margin-bottom: 8px;
            color: white;
        }

        .menu-calories {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 12px;
        }

        .menu-description {
            font-size: 14px;
            margin-bottom: 16px;
            opacity: 0.9;
        }

        /* FAQ section */
        .faq {
            padding: 80px 0;
            background-color: white;
            color: #333;
        }

        .faq-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .faq-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-bottom: 16px;
            color: #333;
        }

        .faq-subtitle {
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.7;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        @media (max-width: 768px) {
            .faq-grid {
                grid-template-columns: 1fr;
            }
        }

        .faq-item {
            border-bottom: 1px solid #eee;
            padding-bottom: 16px;
            margin-bottom: 16px;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .faq-answer {
            font-size: 14px;
            opacity: 0.8;
            display: none;
        }

        .faq-item.active .faq-answer {
            display: block;
        }
</style>

      <!-- Hero Section -->
    <section class="hero">
      <div class="container">
          <div class="hero-content">
              <div class="hero-text">
                  <span class="tag tag-primary">PROMO</span>
                  <span class="tag tag-secondary">HEMAT</span>
                  <h1 class="hero-title">Get FIT,<br>Stay LIT</h1>
                  <p class="hero-subtitle">Bringing Joy In Your Healthy Lifestyle</p>
              </div>
              <div class="hero-image">
                  {{-- <div class="speech-bubble">Healthier, Cheaper, Feel Better</div>
                  <div class="hero-badge">
                      <span>Special</span>
                      <span>Package</span>
                  </div> --}}
                  <img src="{{ asset('img/hero.png') }}" alt="FitMeal food container with healthy food" width="600">
                  <div class="hero-circle"></div>
              </div>
          </div>
      </div>
  </section>

  <!-- About Section -->
  <section class="about">
    <div class="container">
        <div class="about-content">
            <div class="about-image">
                <img src="{{ asset('img/about.png') }}" alt="FitMeal healthy food" width="500">
            </div>
            <div class="about-text">
                <h2 class="section-title">Let Know FitMeal.</h2>
                <p class="section-description">
                    Setiap terbaik untuk gaya hidup sehat dan seimbang! Kami adalah layanan Diet & Healthy Catering yang berkomitmen untuk membantu Anda mencapai tujuan kesehatan dengan mudah. Sejak berdiri, FitMeal berkomitmen untuk menyediakan makanan berkualitas tinggi yang disesuaikan dengan kebutuhan diet dan gaya hidup pelanggan.
                </p>
            </div>
        </div>
    </div>
</section>

     <!-- Menu Section -->
     <section class="menu">
      <div class="container">
          <div class="menu-header">
              <h2 class="menu-title">Top Menu</h2>
              <p class="menu-subtitle">3 Top Menu yang kami hadirkan, semua menu kami disajikan untuk menjaga keseimbangan rasa, gizi, dan kalori, serta memenuhi kebutuhan gaya hidup sehatmu.</p>
          </div>
          <div class="menu-grid">
            @foreach ($categoryMenus as $menu)
                <div class="menu-card">
                    <div class="menu-image">
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->nama_kategori }}">
                    </div>
                    <div class="menu-content">
                        <h3 class="menu-category">{{ $menu->nama_kategori }}</h3>
                        <p class="menu-calories">{{ $menu->nama_menu }} ({{ $menu->kalori }} kcal)</p>
                        <p class="menu-description">{{ $menu->deskripsi }}</p>
                        <a href="#" class="btn btn-outline">Order Now</a>
                    </div>
                </div>
            @endforeach
        </div>        
      </div>
  </section>

    <!-- Program Section -->
    <section class="program">
      <div class="container">
          <div class="program-header">
              <h2 class="program-title">Choose Your Program</h2>
              <p class="program-subtitle">Pilih program diet yang sesuai dengan kebutuhanmu! FitMeal siap bantu kamu mencapai goal kesehatan dengan menu sehat dan nikmat.</p>
          </div>
          <div class="program-cards">
            
            @foreach ($programs as $program)
            <!-- Weekly Program Card -->
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('storage/' . $program->image) }}"
                    alt="{{ $program->nama_program }}">
                </div>
                <div class="card-content">
                    <h2 class="card-title">{{ $program->nama_program }}</h2>
                    {{-- <p class="card-subtitle">5 kali makan per minggu (hanya makan siang) selama 7 hari</p> --}}
                    <p class="card-description">
                        {{ $program->deskripsi }}
                    </p>
                    <div class="card-footer">
                        <div class="price">
                          @if($program->harga_diskon)
                            <p class="price-old">Rp {{ number_format($program->harga_diskon, 0, ',', '.') }}</p>
                          @endif
                            <p class="price-current">Rp {{ number_format($program->harga_normal, 0, ',', '.') }}</p>
                        </div>
                        <a href="{{ route('checkout', $program->slug) }}" class="btn">Get plan</a>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
      </div>
  </section>

  <section class="faq">
    <div class="container">
        <div class="faq-header">
            <h2 class="faq-title">Frequently Asked Questions</h2>
            <p class="faq-subtitle">Kami telah mengumpulkan beberapa pertanyaan yang sering ditanyakan. Jika Anda memiliki pertanyaan lain, jangan ragu untuk menghubungi kami.</p>
        </div>
        <div class="faq-grid">
          @foreach ($questions as $question)
              <div class="faq-item">
                  <div class="faq-question">
                      <span>{{ $question->question }}</span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                           viewBox="0 0 24 24" fill="none" stroke="currentColor"
                           stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="6 9 12 15 18 9"></polyline>
                      </svg>
                  </div>
                  <div class="faq-answer">
                      {!! nl2br(e($question->answer)) !!}
                  </div>
              </div>
          @endforeach
      </div>
    </div>
</section>

<script>
  // Simple script to toggle FAQ answers
  document.querySelectorAll('.faq-question').forEach(question => {
      question.addEventListener('click', () => {
          const item = question.parentNode;
          item.classList.toggle('active');
      });
  });
</script>
  </x-index-layout>