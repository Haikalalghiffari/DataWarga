

<p align="center">
  <a href="#">
    <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/login.png" width="400" alt="DataWarga Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/Haikalalghiffari/DataWarga/actions"><img src="https://img.shields.io/badge/Laravel-Framework-red" alt="Laravel"></a>
  <a href="https://www.php.net/"><img src="https://img.shields.io/badge/PHP-8.0-blue" alt="PHP Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-green" alt="License"></a>
</p>

---

# 🏡 DataWarga

**DataWarga** adalah aplikasi berbasis **Laravel** yang digunakan untuk membantu pengelolaan data warga di lingkungan **RT/RW**.  
Aplikasi ini dibuat menggunakan **Visual Studio Code** dengan tampilan modern bergradasi biru-ungu yang elegan.  

---

## ✨ Fitur Utama

- 🔐 Login & Registrasi Pengguna  
- 🧍‍♂️ CRUD Data Warga  
- 🏘️ Manajemen Data RT & RW  
- 📊 Dashboard Data Warga Terintegrasi  
- 🖼️ Upload Foto Warga, RT, dan RW  
- 📱 Tampilan Responsif dan Modern  

---

## ⚙️ Instalasi

1. Clone repositori:
   ```bash
   git clone https://github.com/Haikalalghiffari/DataWarga.git
   cd DataWarga
````

2. Install dependensi Laravel:

   ```bash
   composer install
   ```

3. Duplikat file `.env.example` menjadi `.env`:

   ```bash
   cp .env.example .env
   ```

4. Generate key aplikasi:

   ```bash
   php artisan key:generate
   ```

5. Konfigurasi database di file `.env`:

   ```
   DB_DATABASE=datawarga
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Jalankan migrasi:

   ```bash
   php artisan migrate
   ```

7. Jalankan server:

   ```bash
   php artisan serve
   ```

8. Buka di browser:

   ```
   http://127.0.0.1:8000
   ```

---

## 📸 Tampilan Aplikasi

### 🟣 Halaman Login

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/login.png" width="400" alt="Halaman Login">
</p>
Halaman login untuk pengguna masuk menggunakan email dan password.

---

### 🟢 Halaman Daftar Akun

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/register.png" width="400" alt="Halaman Daftar Akun">
</p>
Form registrasi untuk pengguna baru sebelum mengakses sistem.

---

### 🟦 Dashboard Data Warga

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/dashboard-warga.png" width="800" alt="Dashboard Data Warga">
</p>
Menampilkan seluruh data warga lengkap dengan informasi NIK, nama, agama, pekerjaan, RT, RW, dan status.

---

### 🟪 Tambah Data Warga

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/warga-create.png" width="800" alt="Tambah Data Warga">
</p>
Form input untuk menambahkan data warga baru.

---

### 🟧 Edit Data Warga

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/warga-edit.png" width="800" alt="Edit Data Warga">
</p>
Form untuk memperbarui informasi warga yang sudah terdaftar.

---

### 🟩 Dashboard Data RW

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/dashboard-rw.png" width="800" alt="Dashboard Data RW">
</p>
Menampilkan seluruh RW beserta informasi ketua RW, alamat, dan RT yang termasuk di bawahnya.

---

### 🟨 Tambah Data RW

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rw-create.png" width="800" alt="Tambah Data RW">
</p>
Form untuk menambahkan RW baru dan menentukan RT-RT yang termasuk di dalamnya.

---

### 🟫 Edit Data RW

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rw-edit.png" width="800" alt="Edit Data RW">
</p>
Form untuk mengedit informasi RW, termasuk ketua dan daftar RT yang dikelola.

---

### 🔵 Dashboard Data RT

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/dashboard-rt.png" width="800" alt="Dashboard Data RT">
</p>
Menampilkan seluruh RT dengan data lengkap mengenai ketua RT, RW terkait, dan alamat.

---

### 🔴 Tambah Data RT

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rt-create.png" width="800" alt="Tambah Data RT">
</p>
Form untuk menambahkan RT baru ke sistem.

---

### ⚫ Edit Data RT

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rt-edit.png" width="800" alt="Edit Data RT">
</p>
Digunakan untuk memperbarui informasi RT dan ketua RT.

---

### 🟤 Halaman Login Setelah Logout

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/login-logout.png" width="400" alt="Halaman Login Setelah Logout">
</p>
Halaman login yang ditampilkan setelah pengguna melakukan logout.

---

## 🤝 Kontribusi

Kontribusi sangat terbuka!
Jika kamu ingin membantu mengembangkan proyek ini:

1. Fork repositori ini
2. Buat branch baru:

   ```bash
   git checkout -b fitur-baru
   ```
3. Commit perubahanmu:

   ```bash
   git commit -m "Menambahkan fitur baru"
   ```
4. Push ke branch kamu:

   ```bash
   git push origin fitur-baru
   ```
5. Buat Pull Request 🎉

---

## 📜 Lisensi

Proyek ini dirilis di bawah **MIT License**.
Silakan lihat file [LICENSE](./LICENSE) untuk detail lebih lanjut.

---

## 💬 Kontak

👤 **Dibuat oleh:** [Haikal Alghiffari](mailto:haikal@example.com)
🔗 **Repository:** [DataWarga on GitHub](https://github.com/Haikalalghiffari/DataWarga)

---

<p align="center">
  <sub>Made with ❤️ using Laravel & Visual Studio Code</sub>
</p>

