<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EDORA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Login Container */
        .login-container {
            width: 100%;
            max-width: 440px;
        }

        /* Login Card - Clean White Design */
        .login-card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Header Section - Simple Purple */
        .login-header {
            background: #8b5cf6;
            padding: 40px 30px;
            text-align: center;
        }

        .login-header .logo-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .login-header .logo-icon i {
            font-size: 2rem;
            color: white;
        }

        .login-header h2 {
            color: white;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 1.75rem;
            letter-spacing: 1px;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.95);
            margin: 0;
            font-size: 0.95rem;
        }

        /* Form Section */
        .login-body {
            padding: 35px 30px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.1rem;
            z-index: 10;
        }

        .form-control {
            height: 48px;
            padding-left: 45px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: border-color 0.2s ease;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            cursor: pointer;
            font-size: 1.1rem;
            z-index: 10;
        }

        .password-toggle:hover {
            color: #8b5cf6;
        }

        /* Login Button - Simple Purple */
        .btn-login {
            height: 48px;
            background: #8b5cf6;
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: background 0.2s ease;
        }

        .btn-login:hover {
            background: #7c3aed;
        }

        .btn-login:active {
            background: #6d28d9;
        }

        .btn-login i {
            margin-left: 8px;
        }

        /* Alert Styling - Simple */
        .alert-danger {
            border-radius: 6px;
            border: 1px solid #fecaca;
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            margin-bottom: 20px;
        }

        .alert-danger i {
            font-size: 1.1rem;
            margin-right: 8px;
        }

        /* Footer */
        .login-footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 0.875rem;
        }

        .login-footer a {
            color: #8b5cf6;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 576px) {
            body {
                padding: 15px;
            }

            .login-header {
                padding: 30px 20px;
            }

            .login-body {
                padding: 25px 20px;
            }

            .login-header h2 {
                font-size: 1.5rem;
            }

            .login-header .logo-icon {
                width: 60px;
                height: 60px;
                margin-bottom: 15px;
            }

            .login-header .logo-icon i {
                font-size: 1.75rem;
            }
        }
    </style>

</head>

<body>
    <div class="login-container">
        <!-- Login Card -->
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="logo-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h2>EDORA</h2>
                <p>Admin Portal</p>
            </div>

            <!-- Body -->
            <div class="login-body">
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST" id="loginForm">
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group-custom">
                            <i class="bi bi-envelope-fill input-icon"></i>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your email" required autofocus>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group-custom">
                            <i class="bi bi-lock-fill input-icon"></i>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter your password" required>
                            <i class="bi bi-eye-fill password-toggle" id="togglePassword"></i>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login w-100">
                        <span>Sign In</span>
                        <i class="bi bi-arrow-right-circle"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="login-footer">
            <p>&copy; 2025 <a href="#">EDORA</a>. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password Toggle Functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            // Toggle password visibility
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icon
            this.classList.toggle('bi-eye-fill');
            this.classList.toggle('bi-eye-slash-fill');
        });

        // Form validation
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function (e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in all fields');
            }
        });
    </script>
</body>

</html>