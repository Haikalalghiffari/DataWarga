@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h3 class="mb-4 text-center text-white">Tambah Data RW</h3>

  <form action="{{ route('rw.store') }}" method="POST" enctype="multipart/form-data" 
        class="p-4 rounded shadow" 
        style="background: linear-gradient(135deg, #4facfe, #ff6bcb);">
    @csrf

    <div class="mb-3">
      <label class="form-label text-white">Nama RW</label>
      <input type="text" name="nama_rw" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Ketua RW</label>
      <input type="text" name="ketua_rw" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">NIK Ketua RW</label>
      <input type="text" name="nik" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control">
        <option value="">-- Pilih --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Agama</label>
      <input type="text" name="agama" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Alamat</label>
      <input type="text" name="alamat" class="form-control" required>
    </div>

    {{-- 🔹 RT tempat tinggal Ketua RW --}}
    <div class="mb-3">
      <label class="form-label text-white">RT Tempat Ketua RW Tinggal</label>
      <select name="rt_tempat_tinggal" class="form-select">
        <option value="">-- Pilih RT --</option>
        @foreach($rts as $rt)
          <option value="{{ $rt->id }}">{{ $rt->nama_rt }} — {{ $rt->ketua_rt }}</option>
        @endforeach
      </select>
    </div>

    {{-- 🔹 Pilih RT yang termasuk ke RW ini --}}
    <div class="mb-3">
      <label class="form-label text-white">RT yang Termasuk ke RW ini</label>
      <select name="rts[]" class="form-select" multiple size="5">
        @foreach($rts as $rt)
          <option value="{{ $rt->id }}">{{ $rt->nama_rt }} — {{ $rt->ketua_rt }}</option>
        @endforeach
      </select>
      <small class="text-light">* Tekan CTRL (atau CMD di Mac) untuk memilih lebih dari satu RT</small>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Foto Ketua RW</label>
      <input type="file" name="foto" class="form-control" accept="image/*">
      <div class="text-center mt-3" id="previewContainer" style="display:none;">
        <p class="fw-bold text-white">Preview Foto:</p>
        <img id="preview" class="rounded-circle border shadow-sm" style="width:120px; height:120px; object-fit:cover;">
      </div>
    </div>

    <div class="text-center mt-4">
      <button class="btn btn-success px-4">Simpan</button>
      <a href="{{ route('rw.index') }}" class="btn btn-secondary px-4">Kembali</a>
    </div>
  </form>
</div>

<script>
document.querySelector('input[name="foto"]').addEventListener('change', function(e) {
  const [file] = e.target.files;
  const previewContainer = document.getElementById('previewContainer');
  const preview = document.getElementById('preview');
  if (file) {
    preview.src = URL.createObjectURL(file);
    previewContainer.style.display = 'block';
  } else {
    previewContainer.style.display = 'none';
  }
});
</script>
@endsection
