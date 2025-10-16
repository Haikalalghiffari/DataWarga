@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="mb-4">Tambah Data RT</h3>

  <form action="{{ route('rt.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label>Nama RT</label>
      <input type="text" name="nama_rt" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Ketua RT</label>
      <input type="text" name="ketua_rt" class="form-control">
    </div>

    <div class="mb-3">
      <label>Pilih RW</label>
      <select name="rw_id" class="form-control" required>
        <option value="">-- Pilih RW --</option>
        @foreach($rws as $rw)
          <option value="{{ $rw->id }}">{{ $rw->nama_rw }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>NIK</label>
      <input type="text" name="nik" class="form-control">
    </div>

    <div class="mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control">
        <option value="">-- Pilih --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Agama</label>
      <input type="text" name="agama" class="form-control">
    </div>

    <div class="mb-3">
      <label>Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control">
    </div>

    <div class="mb-3">
      <label>Alamat</label>
      <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap..." required>
    </div>

    <div class="mb-3">
      <label>Foto RT</label>
      <input type="file" name="foto" class="form-control" accept="image/*">
      <img id="preview" class="rounded-circle border mt-3" style="display:none; width:100px; height:100px; object-fit:cover;">
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('rt.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<script>
document.querySelector('input[name="foto"]').addEventListener('change', function(e) {
  const [file] = e.target.files;
  const preview = document.getElementById('preview');
  if (file) {
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
  } else {
    preview.style.display = 'none';
  }
});
</script>
@endsection
