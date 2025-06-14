<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pembayaran Berhasil - FitMeal</title>
    <style>
      body {
        font-family: "Arial", sans-serif;
        text-align: center;
        background-color: #f9f9f9;
        color: #2c2c2c;
        margin: 0;
        padding: 0;
      }
      h1 {
        font-size: 32px;
        color: #214c29;
        margin-top: 40px;
      }
      p {
        font-size: 18px;
        color: #214c29;
        margin: 10px 0 30px;
      }
      .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
      }
      .btn {
        display: inline-block;
        padding: 10px 30px;
        margin-top: 20px;
        border: 2px solid #214c29;
        border-radius: 25px;
        text-decoration: none;
        color: #214c29;
        font-weight: bold;
      }
      .btn:hover {
        background-color: #214c29;
        color: #fff;
      }
      footer {
        margin-top: 50px;
        padding: 20px;
        color: #214c29;
      }
      footer a {
        margin: 0 10px;
        text-decoration: none;
        color: #214c29;
      }
      .social-icons {
        margin: 20px 0;
      }
      .social-icons img {
        width: 24px;
        margin: 0 8px;
        vertical-align: middle;
      }
      img.main-image {
        max-width: 100%;
        height: auto;
        margin: 20px 0;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Hallo #SobatFitMeal.<br />Pembayaranmu Berhasil</h1>
      <p>Kita Temani Makan Kamu Yaa</p>

      <img
        src="img/berhasil.png"
        alt="Pembayaran Berhasil"
        class="main-image"
      />
      <br />
      <a href="/" class="btn">Kembali</a>
    </div>

    <footer>
      <div class="footer-container">
        <!-- Kiri -->
        <div class="footer-left">
            <p>FitMeal. Get Fit, Stay Lit</p>
            <div class="social-icons">
              <a href="#"><img src="{{ asset('img/instagram.png') }}" alt="Instagram" /></a>
              <a href="#"><img src="{{ asset('img/tiktok.png') }}" alt="TikTok" /></a>
              <a href="#"><img src="{{ asset('img/linkedin.png') }}" alt="LinkedIn" /></a>
            </div>
          </div>
  
          <!-- Kanan -->
          <div class="footer-right">
            <a href="/">Beranda</a>
            <a href="{{ route('menu') }}">Menu</a>
            <a href="{{ route('program') }}">Program</a>
            <a href="{{ route('article') }}">Artikel</a>
        </div>
      </div>

      <!-- Copyright -->
      <div class="footer-bottom">
        Copyright © 2025 Doa Ibu.<br />All Right Reserved.
      </div>
    </footer>
  </body>
</html>
