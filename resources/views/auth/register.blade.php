<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Data Warga</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #4facfe, #ff6bcb);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      padding: 20px;
    }

    .card {
      width: 100%;
      max-width: 420px;
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      overflow: hidden;
    }

    .card-header {
      background: linear-gradient(90deg, #4facfe, #ff6bcb);
      color: white;
      text-align: center;
      font-size: 1.3rem;
      font-weight: 600;
    }

    .btn-success {
      background: linear-gradient(90deg, #4facfe, #ff6bcb);
      border: none;
    }

    .btn-success:hover {
      background: linear-gradient(90deg, #ff6bcb, #4facfe);
    }
  </style>
</head>
<body>

<div class="card">
  <div class="card-header">Daftar Akun</div>
  <div class="card-body p-4">

    {{-- Pesan Sukses --}}
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pesan Error --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('register.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
      </div>
      <button class="btn btn-success w-100">Daftar</button>
    </form>

    <p class="text-center mt-3 mb-0">
      Sudah punya akun? <a href="{{ route('login') }}">Login</a>
    </p>
  </div>
</div>

</body>
</html>
