

<p align="center">
  <a href="#">
    <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rt-rw.jpg" width="400" alt="DataWarga Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/Haikalalghiffari/DataWarga/actions"><img src="https://img.shields.io/badge/Laravel-Framework-red" alt="Laravel"></a>
  <a href="https://www.php.net/"><img src="https://img.shields.io/badge/PHP-8.0-blue" alt="PHP Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-green" alt="License"></a>
</p>

---

# Latar Belakang Pembuatan Aplikasi Manajemen RT-RW

Dalam kehidupan bermasyarakat, lingkungan Rukun Tetangga (RT) dan Rukun Warga (RW) memiliki peran penting dalam menjaga ketertiban, keamanan, dan administrasi warga di suatu wilayah. Namun, dalam praktiknya, proses pendataan warga, pengelolaan informasi rumah tangga, serta pembuatan laporan kegiatan masih banyak dilakukan secara manual menggunakan buku catatan atau lembar kerja (seperti Excel). Cara ini seringkali menimbulkan berbagai kendala, seperti:
1.	Data sulit diperbarui dan tidak terpusat, sehingga petugas RT/RW harus mencari data secara manual ketika dibutuhkan.
2.	Resiko kehilangan data karena pencatatan dilakukan di media fisik (buku atau arsip kertas).
3.	Proses administrasi lambat, terutama saat warga membutuhkan surat keterangan atau rekap data penduduk.
4.	Kurangnya transparansi dan efisiensi dalam manajemen informasi warga dan rumah tangga.
Melihat permasalahan tersebut, dibutuhkan suatu sistem berbasis digital yang dapat membantu pengurus RT/RW dalam mengelola data warga secara terstruktur, cepat, dan mudah diakses.
Oleh karena itu, dibuatlah Aplikasi Manajemen RT-RW berbasis web menggunakan Laravel Framework yang berfungsi untuk mendigitalisasi proses administrasi warga.
Aplikasi ini dirancang untuk:
•	Menyimpan dan menampilkan data warga dan rumah secara terpusat.
•	Memudahkan pengurus RT/RW dalam menambahkan, mengubah, dan menghapus data tanpa harus melakukan pencatatan manual.
•	Menyediakan fitur pencarian dan laporan agar proses pengambilan data lebih cepat dan efisien.
•	Memberikan akses login untuk keamanan data agar hanya pengguna terdaftar yang dapat mengelola sistem.
Dengan adanya aplikasi ini, diharapkan kegiatan administrasi di tingkat RT dan RW menjadi lebih modern, efisien, dan transparan, sekaligus membantu pengurus dalam memberikan pelayanan yang lebih baik kepada warga. 

---

## Fitur Utama

- Login & Registrasi Pengguna  
- CRUD Data Warga  
- Manajemen Data RT & RW  
- Dashboard Data Warga Terintegrasi  
- Upload Foto Warga, RT, dan RW  
- Tampilan Responsif dan Modern  

---

## Tampilan Aplikasi

### Halaman Login

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/login.png" width="400" alt="Halaman Login">
</p>
Halaman ini berfungsi sebagai gerbang utama bagi pengguna untuk mengakses sistem Aplikasi Manajemen RT-RW. Setiap pengguna (misalnya admin RT atau RW) wajib memasukkan email dan kata sandi (password) yang telah terdaftar agar dapat masuk ke dalam sistem.

---

### Halaman Daftar Akun

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/register.png" width="400" alt="Halaman Daftar Akun">
</p>
Halaman ini adalah antarmuka utama yang digunakan oleh pengguna baru untuk membuat akun di aplikasi manajemen RT-RW Anda. Tujuannya adalah untuk mengumpulkan informasi dasar yang diperlukan agar pengguna dapat mengakses fitur-fitur aplikasi.

---

### Dashboard Data Warga

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/dashboard-warga.png" width="800" alt="Dashboard Data Warga">
</p>
Halaman ini adalah dashboard utama untuk administrator atau pengurus RT/RW. Fungsinya adalah untuk mengelola data warga di lingkungan tersebut secara efisien. Halaman ini memberikan ringkasan data dan alat untuk melakukan tindakan (CRUD: Create, Read, Update, Delete) pada data tersebut.

---

### Tambah Data Warga

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/warga-create.png" width="800" alt="Tambah Data Warga">
</p>
Halaman ini adalah formulir digital yang dirancang untuk memasukkan data warga baru ke dalam sistem. Tujuannya adalah untuk mengumpulkan semua informasi penting tentang warga, yang kemudian akan disimpan di database.

---

### Edit Data Warga

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/warga-edit.png" width="800" alt="Edit Data Warga">
</p>
Halaman ini adalah formulir khusus yang memungkinkan administrator atau pengurus untuk mengubah informasi warga yang sudah ada di database. Halaman ini mirip dengan halaman "Tambah Warga" tetapi sudah terisi dengan data yang lama sehingga admin hanya perlu mengoreksi atau memperbarui informasi yang salah.

---

### Dashboard Data RW

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/dashboard-rw.png" width="800" alt="Dashboard Data RW">
</p>
Halaman ini berfungsi sebagai pusat administrasi untuk mengelola data dan kepengurusan di tingkat Rukun Warga (RW). Ini memungkinkan administrator untuk melihat, menambahkan, dan memelihara informasi spesifik tentang setiap RW yang ada di lingkungan tersebut.

---

### Tambah Data RW

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rw-create.png" width="800" alt="Tambah Data RW">
</p>
Halaman ini adalah formulir yang digunakan oleh administrator untuk membuat entri data Rukun Warga (RW) yang baru di dalam sistem, termasuk menunjuk ketua RW yang baru.

---

### Edit Data RW

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rw-edit.png" width="800" alt="Edit Data RW">
</p>
Halaman ini berfungsi untuk memperbarui atau mengubah informasi mengenai sebuah Rukun Warga (RW) yang sudah terdaftar di sistem. Ini adalah fungsi penting untuk mengakomodasi perubahan administrasi, seperti pergantian Ketua RW atau penyesuaian wilayah RT yang dinaungi.

---

### Dashboard Data RT

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/dashboard-rt.png" width="800" alt="Dashboard Data RT">
</p>
Halaman ini adalah pusat administrasi untuk mengelola data dan kepengurusan di tingkat Rukun Tetangga (RT). Fungsinya mirip dengan halaman Data RW, tetapi berfokus pada unit wilayah yang lebih kecil dan dasar, yaitu RT.

---

### Tambah Data RT

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rt-create.png" width="800" alt="Tambah Data RT">
</p>
Halaman ini adalah formulir yang digunakan oleh administrator untuk membuat entri data Rukun Tetangga (RT) yang baru di dalam sistem, termasuk menunjuk ketua RT dan mengaitkannya dengan RW yang menaungi.

---

### Edit Data RT

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/rt-edit.png" width="800" alt="Edit Data RT">
</p>
Halaman ini berfungsi untuk memperbarui atau mengubah informasi mengenai sebuah Rukun Tetangga (RT) yang sudah terdaftar di sistem. Ini adalah fungsi penting untuk mengakomodasi perubahan administrasi di tingkat RT, seperti pergantian Ketua RT atau perbaikan data.

---

### Halaman Login Setelah Logout

<p align="center">
  <img src="https://raw.githubusercontent.com/Haikalalghiffari/DataWarga/main/public/uploads/warga/login-logout.png" width="400" alt="Halaman Login Setelah Logout">
</p>
Halaman login yang ditampilkan setelah pengguna melakukan logout.

---

<p align="center">
  <sub>Made by Haikal & Octavian
</p>

