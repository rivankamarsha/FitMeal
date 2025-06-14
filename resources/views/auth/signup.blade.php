<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .form-section {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem 4rem;
        }

        .form-container {
            max-width: 450px;
            margin: 0 auto;
            width: 100%;
        }

        .image-section {
            width: 50%;
            background-image: url("{{ asset('img/photo.png') }}");
            background-size: cover;
            background-position: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }

        p {
            color: #666;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 50px;
            font-size: 1rem;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #666;
        }

        button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            background-color: #0F4229;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-top: 1rem;
            transition: background-color 0.2s;
        }

        button[type="submit"]:hover {
            background-color: #0a3420;
        }

        /* Eye icon styles */
        .eye-icon {
            width: 20px;
            height: 20px;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .form-section {
                width: 100%;
                padding: 2rem;
            }

            .image-section {
                display: none;
            }
        }

        .login-link {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.95rem;
            color: #333;
        }

        .login-link a {
            color: #0F4229;
            text-decoration: none;
            font-weight: 500;
            margin-left: 4px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="container">
        <!-- Left side - Form -->
        <div class="form-section">
            <div class="form-container">
                <h1>Daftar Dulu Yuk!</h1>
                <p>Daftarkan Dirimu Untuk Bergabung Bersama #SobatFitMeal</p>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form method="POST" action="{{ url('/signup') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input 
                            id="phone" 
                            type="tel" 
                            class="form-control @error('phone') is-invalid @enderror"
                            name="phone"
                            value="{{ old('phone') }}"
                            required
                        >
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input 
                            id="username" 
                            type="text" 
                            class="form-control @error('username') is-invalid @enderror"
                            name="username"
                            value="{{ old('username') }}"
                            required
                        >
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-container">
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword('password', 'passwordEye')">
                                <svg class="eye-icon" id="passwordEye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="repeatPassword">Repeat Password</label>
                        <div class="password-container">
                            <input 
                                id="repeatPassword" 
                                type="password" 
                                class="form-control"
                                name="password_confirmation"
                                required
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword('repeatPassword', 'repeatPasswordEye')">
                                <svg class="eye-icon" id="repeatPasswordEye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Selanjutnya</button>
                </form>
                <div class="login-link">
                  Sudah punya akun? <a href="{{ url('/login') }}">Login disini</a>
              </div>              
            </div>
        </div>

        <!-- Right side - Image -->
        <div class="image-section"></div>
    </div>

    <script>
        function togglePassword(inputId, eyeId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(eyeId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                `;
            }
        }
    </script>
</body>
</html>