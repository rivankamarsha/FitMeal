<style>
  /* Footer styles */
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
</style>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="footer-top">
        <img src="{{ asset('img/fitmeallogoijo.png') }}" alt="FitMeal Logo" class="footer-logo" width="150px">
        <div class="footer-tagline">Get Fit, Stay Lit</div>
    </div>
    
    <div class="footer-middle">
          <div class="social-links">
              <a href="#" aria-label="Instagram">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                  </svg>
              </a>
              <a href="#" aria-label="LinkedIn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                      <rect width="4" height="12" x="2" y="9"></rect>
                      <circle cx="4" cy="4" r="2"></circle>
                  </svg>
              </a>
              <a href="#" aria-label="TikTok">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M9 18V5l12-2v13"></path>
                      <circle cx="6" cy="18" r="3"></circle>
                      <circle cx="18" cy="16" r="3"></circle>
                  </svg>
              </a>
          </div>

          <div class="footer-nav">
              <a href="/beranda">Beranda</a>
              <a href="/menu">Menu</a>
              <a href="/program">Program</a>
              <a href="/artikel">Artikel</a>
          </div>
      </div>

      <div class="footer-bottom">
          <p>Copyright © 2025 Doa Ibu.</p>
          <p>All Right Reserved.</p>
      </div>
  </div>
</footer>