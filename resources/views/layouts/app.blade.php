<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Warga Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #4facfe, #ff6bcb);
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background: linear-gradient(180deg, #2c2f40, #3b3d52);
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 3px 0 10px rgba(0,0,0,0.3);
      transition: transform 0.3s ease;
      z-index: 1000;
    }

    .sidebar a {
      color: #ddd;
      padding: 12px 20px;
      display: block;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background: linear-gradient(90deg, #4facfe, #ff6bcb);
      color: #fff;
      transform: translateX(5px);
    }

    .brand {
      font-size: 1.4rem;
      font-weight: 600;
      text-align: center;
      padding: 20px;
      background: linear-gradient(90deg, #4facfe, #ff6bcb);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Content Area */
    .content {
      margin-left: 250px;
      padding: 25px;
      transition: margin-left 0.3s ease;
    }

    .topbar {
      background: rgba(255, 255, 255, 0.85);
      padding: 12px 18px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
      backdrop-filter: blur(5px);
    }

    .btn-logout {
      background: linear-gradient(90deg, #ff6bcb, #4facfe);
      border: none;
      color: white;
      border-radius: 6px;
      padding: 8px 14px;
      transition: 0.3s;
      width: 100%;
    }

    .btn-logout:hover {
      background: linear-gradient(90deg, #4facfe, #ff6bcb);
      transform: scale(1.05);
    }

    /* Tombol toggle sidebar (mobile) */
    .toggle-btn {
      display: none;
      background: linear-gradient(90deg, #4facfe, #ff6bcb);
      border: none;
      color: white;
      font-size: 20px;
      border-radius: 6px;
      padding: 6px 12px;
      margin-right: 10px;
    }

    /* Responsif */
    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
        position: fixed;
      }

      .sidebar.active {
        transform: translateX(0);
      }

      .content {
        margin-left: 0;
        padding: 15px;
      }

      .toggle-btn {
        display: inline-block;
      }

      .topbar h5 {
        font-size: 1rem;
      }

      /* Scroll tabel di HP */
      .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }
    }

    /* Scroll halus */
    html {
      scroll-behavior: smooth;
    }

    /* Transisi halus */
    .fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(5px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>

<style>
.btn-outline-primary i {
    color: #4facfe;
}
.btn-outline-danger i {
    color: #ff6b6b;
}
.btn-outline-primary:hover {
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    color: white !important;
}
.btn-outline-danger:hover {
    background: linear-gradient(90deg, #ff6b6b, #ff9a9e);
    color: white !important;
}


</style>

<style>
/* 🌈 Tombol aksi bulat dengan ikon */
.btn-action {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 20px;
  transition: all 0.25s ease;
  cursor: pointer;
}

/* ✏️ Tombol Edit (biru gradasi) */
.btn-edit {
  background: linear-gradient(135deg, #00c6ff, #00c6ff);
}

/* 🗑️ Tombol Hapus (merah gradasi) */
.btn-delete {
  background: linear-gradient(135deg, #ff416c, #ff416c);
}

/* 🔁 Efek Hover */
.btn-action:hover {
  transform: scale(1.1);
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
}

<style>
.footer-copyright {
  position: fixed; /* ✅ selalu di bawah */
  bottom: 0;
  left: 0;
  width: 100%;
  background: linear-gradient(90deg, #4facfe, #ff6bcb);
  color: white;
  text-align: center;
  padding: 10px 0;
  font-size: 14px;
  font-weight: 500;
  box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.2);
  z-index: 1000;
}

.footer-copyright p {
  margin: 0;
}

.footer-copyright strong {
  color: #fff;
}

.footer-copyright small {
  display: block;
  font-size: 12px;
  color: #f3f3f3;
  margin-top: 2px;
}

/* 🌟 Efek hover */
.footer-copyright:hover {
  background: linear-gradient(90deg, #ff6bcb, #4facfe);
  transform: scale(1.01);
  transition: 0.3s;
}

/* 📱 Responsif untuk HP */
@media (max-width: 576px) {
  .footer-copyright {
    font-size: 12px;
    padding: 8px 0;
  }
}

</style>


</head>


<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div>
      <div class="brand">Data Warga</div>
      <a href="{{ route('warga.index') }}">Dashboard</a>
      <a href="{{ route('rw.index') }}">RW</a>
      <a href="{{ route('rt.index') }}">RT</a>
     
    

      
    </div>

    <div class="p-3">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
      </form>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content fade-in">
    <div class="topbar mb-4">
      <div class="d-flex align-items-center gap-2">
        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        <h5 class="mb-0">Selamat Datang, Administrator!</h5>
      </div>
      <small>{{ session('user_name') ?? 'Guest' }}</small>
    </div>

  

    <div class="table-responsive">
      @yield('content')
    </div>
  </div>

  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('active');
    }
  </script>

</body>
</html>
