
<style>
  .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Header styles */
        header {
            padding: 24px 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 28px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            align-items: center;
        }

        .nav-links a {
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #A7F3D0;
        }

        .icon-button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            transition: color 0.3s;
        }

        .icon-button:hover {
            color: #A7F3D0;
        }
</style>

<header>
  <div class="container">
      <nav>
        <a href="/" class="logo">
            <img src="{{ asset('img/logofitmeal.png') }}" alt="FitMeal Logo" class="" width="100px">
        </a>
          <div class="nav-links">
            <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
            <x-nav-link href="/menu" :active="request()->is('menu')">Menu</x-nav-link>
            <x-nav-link href="/program" :active="request()->is('program')">Program</x-nav-link>
            <x-nav-link href="/artikel" :active="request()->is('artikel')">Artikel</x-nav-link> 
              <button class="icon-button" aria-label="Search">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="11" cy="11" r="8"></circle>
                      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  </svg>
              </button>
              @auth
                  <a href="{{ url('profil') }}">
                      @if(Auth::user()->avatar)
                          <img 
                              src="{{ asset('storage/' . Auth::user()->avatar) }}" 
                              alt="User Avatar"
                              style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;"
                          >
                      @else
                          {{-- Default avatar (jika user belum upload) --}}
                          <img 
                              src="{{ asset('images/default-avatar.png') }}" 
                              alt="Default Avatar"
                              style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;"
                          >
                      @endif
                  </a>
              @else
                  <a href="{{ url('signup') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                          <circle cx="12" cy="7" r="4"></circle>
                      </svg>
                  </a>
              @endauth
          </div>
      </nav>
  </div>
</header>