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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-y: auto;
            padding: 20px 10px;
        }

        /* Animated Background Shapes */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }

        .bg-shape:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -150px;
            left: -150px;
            animation-delay: 0s;
        }

        .bg-shape:nth-child(2) {
            width: 200px;
            height: 200px;
            bottom: -100px;
            right: -100px;
            animation-delay: 2s;
        }

        .bg-shape:nth-child(3) {
            width: 250px;
            height: 250px;
            top: 50%;
            right: -125px;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.3;
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.1;
            }
        }

        /* Login Container */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
            padding: 0;
            margin: auto;
        }

        /* Login Card */
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Section */
        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 25px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }

        .login-header .logo-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            position: relative;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
        }

        .login-header .logo-icon i {
            font-size: 2rem;
            color: white;
        }

        .login-header h2 {
            color: white;
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 1.75rem;
            letter-spacing: 2px;
            position: relative;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            font-size: 0.95rem;
            position: relative;
        }

        /* Form Section */
        .login-body {
            padding: 30px 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 25px;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: calc(50% + 14px);
            transform: translateY(-50%);
            color: #667eea;
            font-size: 1.1rem;
            z-index: 10;
        }

        .form-control {
            height: 50px;
            padding-left: 45px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 15px;
            top: calc(50% + 14px);
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
            font-size: 1.1rem;
            transition: color 0.3s ease;
            z-index: 10;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        /* Login Button */
        .btn-login {
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-login:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login i {
            margin-left: 8px;
        }

        /* Alert Styling */
        .alert-danger {
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-left: 4px solid #d63447;
            animation: shake 0.5s;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-10px);
            }

            75% {
                transform: translateX(10px);
            }
        }

        .alert-danger i {
            font-size: 1.2rem;
            margin-right: 8px;
        }

        /* Footer */
        .login-footer {
            text-align: center;
            padding: 15px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.85rem;
        }

        .login-footer a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 576px) {
            body {
                padding: 15px 10px;
            }

            .login-container {
                padding: 0;
            }

            .login-header {
                padding: 25px 20px;
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
                margin-bottom: 10px;
            }

            .login-header .logo-icon i {
                font-size: 1.75rem;
            }

            .login-footer {
                padding: 10px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Animated Background Shapes -->
    <div class="bg-shape"></div>
    <div class="bg-shape"></div>
    <div class="bg-shape"></div>

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
                    <div class="input-group-custom">
                        <label for="email" class="form-label">Email Address</label>
                        <i class="bi bi-envelope-fill input-icon"></i>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email"
                            required autofocus>
                    </div>

                    <!-- Password Input -->
                    <div class="input-group-custom">
                        <label for="password" class="form-label">Password</label>
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password" required>
                        <i class="bi bi-eye-fill password-toggle" id="togglePassword"></i>
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