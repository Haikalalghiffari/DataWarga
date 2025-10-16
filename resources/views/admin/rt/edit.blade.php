@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="mb-4 text-center text-white">Edit Data RT</h3>

  <form action="{{ route('rt.update', $rt->id) }}" method="POST" enctype="multipart/form-data"
        class="p-4 rounded shadow"
        style="background: linear-gradient(135deg, #4facfe, #ff6bcb);">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label text-white">Nama RT</label>
      <input type="text" name="nama_rt" value="{{ old('nama_rt', $rt->nama_rt) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Ketua RT</label>
      <input type="text" name="ketua_rt" value="{{ old('ketua_rt', $rt->ketua_rt) }}" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Pilih RW</label>
      <select name="rw_id" class="form-control" required>
        @foreach($rws as $rw)
          <option value="{{ $rw->id }}" {{ $rw->id == $rt->rw_id ? 'selected' : '' }}>
            {{ $rw->nama_rw }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">NIK</label>
      <input type="text" name="nik" value="{{ old('nik', $rt->nik) }}" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control">
        <option value="L" {{ $rt->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $rt->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Agama</label>
      <input type="text" name="agama" value="{{ old('agama', $rt->agama) }}" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Pekerjaan</label>
      <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $rt->pekerjaan) }}" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Alamat</label>
      <input type="text" name="alamat" value="{{ old('alamat', $rt->alamat) }}" class="form-control">
    </div>

    <div class="text-center mt-3">
      <label class="form-label text-white d-block">Foto Saat Ini</label>
      @if ($rt->foto && file_exists(public_path($rt->foto)))
        <img src="{{ asset($rt->foto) }}" class="rounded-circle border mb-3 shadow-sm" width="120" height="120" alt="Foto Lama">
      @else
        <p class="text-light">Tidak ada foto</p>
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Ganti Foto (opsional)</label>
      <input type="file" name="foto" class="form-control" accept="image/*">
      <div class="text-center mt-3" id="previewContainer" style="display:none;">
        <p class="fw-bold text-white">Preview Foto Baru:</p>
        <img id="preview" class="rounded-circle border shadow-sm" style="width:120px; height:120px; object-fit:cover;">
      </div>
    </div>

    <div class="text-center mt-4">
      <button class="btn btn-success px-4">Update</button>
      <a href="{{ route('rt.index') }}" class="btn btn-secondary px-4">Kembali</a>
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
