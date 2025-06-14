<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout - FitMeal</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fff;
        color: #1e1e1e;
      }

      header,
      footer {
        text-align: center;
        margin: 20px 0;
      }

      h1 {
        color: #114232;
      }

      .container {
        display: flex;
        justify-content: space-between;
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
      }

      .left,
      .right {
        width: 48%;
      }

      .card {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
      }

      .card h3 {
        margin-top: 0;
      }

      .input-box {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      .order-summary {
        border-top: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        width: 50%;
        max-width: 600px;
        box-sizing: border-box;
      }

      .total {
        font-weight: bold;
        font-size: 18px;
      }

      .btn {
        width: 100%;
        padding: 15px;
        background-color: #114232;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
      }

      .btn:hover {
        background-color: #0d3328;
      }

      .footer-links a {
        margin: 0 10px;
        color: black;
        text-decoration: none;
      }

      .social-icons img {
        width: 24px;
        height: 24px;
        margin: 0 5px;
      }
    </style>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
  </head>

  <body>
    <header>
      <h1>Hallo #SobatFitMeal.</h1>
      <p>Kita Temani Makan Kamu Yaa</p>
    </header>

        <div class="container">
            <!-- Left Section -->
            <div class="left">
                <div class="card">
                    <h3>ALAMAT PENGIRIMAN</h3>
                    <p><strong>Deliver to:</strong> <span id="user-name">{{ $user->name }}</span></p>
                    <p id="user-address">{{ $user->address ?? 'Alamat belum diisi' }}</p>
                    
                    <div id="address-alert" style="display: none; color: red; margin-top: 10px;">
                        <p>Alamat harus diisi terlebih dahulu. Silakan lengkapi alamat di halaman profil.</p>
                        <a href="/profil" class="btn btn-sm" style="background-color: #f44336; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; margin-top: 5px;">Edit Profil</a>
                    </div>
                </div>
                
                <div class="card">
                    <h3>DETAIL PESANAN</h3>
                    <img src="{{ asset('storage/' . $program->image) }}" 
                    alt="Profile Image" 
                    id="profile-img" 
                    class="profile-img" 
                    style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #ddd;" />                
                    <p>1x {{ $program->nama_program }}</p>
                </div>
    
                <div class="card">
                    <h3>CATATAN</h3>
                    <textarea 
                        name="catatan"
                        class="input-box"
                        placeholder="Masukan Deskripsi"
                    ></textarea>
                </div>
            </div>
    
            <div class="card order-summary">
                <h3>Order Summary</h3>
                <p>Delivery Fee: <strong>Rp {{ number_format($program->harga_normal, 0, ',', '.') }}</strong></p>
                <p class="total">Total: Rp {{ number_format($program->harga_normal, 0, ',', '.') }}</p>
                <br />
                <button type="submit" class="btn" id="pay-button">Place Order</button>
            </div>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if user has an address when page loads
        const userAddress = document.getElementById('user-address').textContent.trim();
        const addressAlert = document.getElementById('address-alert');
        const payButton = document.getElementById('pay-button');
        
        // Function to check if address is missing and show alert
        function checkAddress() {
            if (userAddress === 'Alamat belum diisi') {
                addressAlert.style.display = 'block';
                payButton.disabled = true;
                return false;
            } else {
                addressAlert.style.display = 'none';
                payButton.disabled = false;
                return true;
            }
        }
        
        // Run check on page load
        checkAddress();
        
        // Add click event listener to the pay button to check address first
        payButton.addEventListener('click', function(event) {
            if (!checkAddress()) {
                event.preventDefault();
                // Scroll to the alert message
                addressAlert.scrollIntoView({ behavior: 'smooth' });
                return false;
            }
            // If address is provided, continue with payment
            initiatePayment();
        });
    });

    function initiatePayment() {
        const payButton = document.getElementById('pay-button');

        // Ubah tampilan tombol menjadi loading
        payButton.disabled = true;
        payButton.innerHTML = 'Processing...';

        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                fetch("{{ route('place.order') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        program_id: '{{ $program->id }}',
                        jumlah: 1,
                        catatan: document.querySelector("textarea[name='catatan']").value,
                        payment_result: result
                    })
                })
                .then(response => response.json())
                .then(data => {
                    window.location.href = "{{ route('success') }}";
                });
            },
            onPending: function (result) {
                alert("Pembayaran pending.");
                resetPayButton();
            },
            onError: function (result) {
                alert("Pembayaran gagal.");
                resetPayButton();
            },
            onClose: function () {
                // Jika user menutup Snap tanpa menyelesaikan pembayaran
                resetPayButton();
            }
        });
    }

    // Fungsi untuk mengembalikan tombol ke keadaan semula
    function resetPayButton() {
        const payButton = document.getElementById('pay-button');
        payButton.disabled = false;
        payButton.innerHTML = 'Place Order';
    }
  </script>
</html>