<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Smart Controller</title>

    <!-- Google Font & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('assets/img/Gambar WhatsApp 2025-06-12 pukul 12.25.51_ebf7c159.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.50);
            padding: 2rem;
            border-radius: 16px;
            max-width: 380px;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);
            position: relative;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .header-row a {
            text-decoration: none;
            font-size: 0.9rem;
            color: #6c63ff;
        }

        .header-row .title {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            font-weight: bold;
            font-size: 0.95rem;
            color: #444;
            pointer-events: none;
            z-index: 0;
        }


        h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 2rem;
            font-size: 1.4rem;
            color: #222;
        }

        .form-floating {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-floating input {
            width: 100%;
            padding: 1rem 0.75rem 0.25rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1.25rem;
            background-color: #fff;
        }

        .form-floating label {
            position: absolute;
            top: 0.25rem;
            left: 0.75rem;
            font-size: 0.9rem;
            color: #666;
            transition: all 0.2s ease;
            border-radius: 16px;
            pointer-events: none;
            background: rgba(255, 255, 255, 0.85);
            padding: 0 0.25rem;
        }

        .form-floating input:focus+label,
        .form-floating input:not(:placeholder-shown)+label {
            top: -0.6rem;
            left: 0.65rem;
            font-size: 0.75rem;
            color: #009688;
        }

        .btn-tosca {
            background-color: #009688;
            color: white;
            font-size: 0.9rem;
            padding: 0.4rem 1.5rem;
            border: none;
            border-radius: 6px;
            width: 100%;
        }

        .btn-tosca:hover {
            background-color: #00796b;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="header-row">
            <a href="{{ route('Overview.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
            <div class="title">SIGN IN</div>
        </div>

        <h2>Smart Controller</h2>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="form-floating">
                <input type="email" name="email" id="email" placeholder=" " required
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                <label for="email">Username</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" name="password" id="password" placeholder=" " required
                    class="form-control @error('password') is-invalid @enderror">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <button type="submit" class="btn btn-tosca">Login</button>
        </form>
    </div>

    <!-- Font Awesome & Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
