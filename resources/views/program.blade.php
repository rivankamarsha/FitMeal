<x-index-layout>

    <style>
footer {
        background: white;
        color: #0F3D2B;
        padding: 48px 0;
        margin-top: 64px;
        border-top-left-radius: 24px;
        border-top-right-radius: 24px;
    }

      /* Main content styles */
      .main-title {
            font-family: 'Playfair Display', serif;
            font-size: 56px;
            text-align: center;
            margin: 60px 0;
            color: white
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
    </style>
    <main>
      <div class="container">
          <h1 class="main-title">Program</h1>

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
  </main>
</x-index-layout>
