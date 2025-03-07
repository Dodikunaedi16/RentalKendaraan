<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RENT CAR - Sign In</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(135deg, #2b5876, #4e4376);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-control {
            transition: all 0.3s ease;
            border-radius: 10px;
        }
        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }
        .btn-primary {
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .floating-label {
            position: relative;
        }
        .floating-label input {
            padding-top: 20px;
        }
        .floating-label label {
            position: absolute;
            top: 10px;
            left: 15px;
            font-size: 14px;
            color: gray;
            transition: all 0.3s ease;
        }
        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label {
            top: -5px;
            left: 10px;
            font-size: 12px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg p-4">
                    <div class="text-center mb-4">
                        <h3 class="text-primary fw-bold">
                            <i class="bi bi-car-front-fill me-2"></i> RENT CAR
                        </h3>
                        <h5 class="fw-normal text-muted">Selamat Datang kembali! Silakan Masuk</h5>
                    </div>

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf
                        <div class="mb-3 floating-label">
                            <input type="email" class="form-control" name="email" id="email" placeholder=" " required>
                            <label for="email">Email Address</label>
                            @error('email')
                                <div class="text-danger mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 floating-label">
                            <input type="password" class="form-control" name="password" id="password" placeholder=" " required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="text-danger mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <p class="mb-0">Belum punya akun?<a href="{{ route('register') }}" class="text-primary fw-bold">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
