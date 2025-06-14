<x-index-layout>
    {{-- <div class="container-fluid bg-light bg-icon my-5 py-6">
      <div class="container">
        <div
          class="section-header text-center mx-auto mb-5 wow fadeInUp"
          data-wow-delay="0.1s"
          style="max-width: 500px"
        >
          <h1 class="display-5 mb-3">Top Menu</h1>
          <p>
            Kami memiliki berbagai macam menu yang dapat Anda pilih sesuai
            dengan kebutuhan diet Anda.
          </p>
        </div>
        <div class="row g-4">
            @foreach ($menus as $menu)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="bg-white text-center h-100 p-4 p-xl-5">
                <img class="img-fluid mb-4" src="{{ asset('storage/' . $menu->image) }}" alt="{{$menu->nama_menu}}" />
                <h4 class="mb-3">{{$menu->nama_menu}}</h4>
                <p class="mb-4">
                  {!! $menu->deskripsi !!}
                </p>
              </div>
            </div>
            @endforeach
        </div>
      </div>
    </div> --}}

    <style>
      footer {
        background: white;
        color: #0F3D2B;
        padding: 48px 0;
        margin-top: 64px;
        border-top-left-radius: 24px;
        border-top-right-radius: 24px;
    }

      /* Hero section */
      .hero {
            height: 300px;
            background-image: url('{{ asset('img/menu.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            position: relative;
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
            margin-bottom: 16px;
            color: #fff;
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
    </style>

    <!-- Hero Section -->
    <section class="hero">
      <div class="container">
          <div class="hero-content">
              <h1 class="hero-title">FitMeal Menu</h1>
          </div>
      </div>
  </section>

 @foreach($categories as $category)
<section class="food-category">
    <div class="container">
        <h2 class="category-title">{{ $category->nama_kategori }}</h2>
        <div class="food-grid">
            @foreach($category->menus as $menu)
            <div class="food-card">
                <div class="food-image">
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->nama_menu }}">
                </div>
                <div class="food-content">
                    <h3 class="food-title">{{ $menu->nama_menu }}</h3>
                    <p class="food-calories">({{ $menu->kalori ?? 'N/A' }} kcal)</p>
                    <p class="food-description">{{ $menu->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach

</x-index-layout>
