<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Data Warga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #4facfe, #ff6bcb);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
      margin: 0;
    }

    .login-card {
      background: white;
      width: 100%;
      max-width: 400px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      overflow: hidden;
    }

    .login-header {
      background: linear-gradient(90deg, #4facfe, #ff6bcb);
      color: white;
      text-align: center;
      padding: 18px;
      font-size: 1.3rem;
      font-weight: 600;
    }

    .login-body {
      padding: 25px;
    }

    .btn-login {
      background: linear-gradient(90deg, #4facfe, #ff6bcb);
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 6px;
      padding: 10px;
      transition: 0.3s;
    }

    .btn-login:hover {
      background: linear-gradient(90deg, #ff6bcb, #4facfe);
      transform: scale(1.03);
    }

    input:focus {
      border-color: #4facfe;
      box-shadow: 0 0 0 0.2rem rgba(79,172,254,0.25);
    }

    .text-muted a {
      text-decoration: none;
      color: #4facfe;
      font-weight: 500;
    }

    .text-muted a:hover {
      color: #ff6bcb;
    }

    @media (max-width: 480px) {
      .login-card {
        margin: 10px;
      }
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="login-header">Login Akun</div>
    <div class="login-body">

      {{-- Notifikasi sukses --}}
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      {{-- Error login --}}
      @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
      @endif

      <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
        </div>

        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn-login w-100">Login</button>
      </form>

      <p class="text-center text-muted mt-3 mb-0">
        Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
      </p>
    </div>
  </div>

</body>
</html>
