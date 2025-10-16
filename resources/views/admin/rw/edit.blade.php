@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h3 class="mb-4 text-center text-white">Edit Data RW</h3>

  <form action="{{ route('rw.update', $rw->id) }}" method="POST" enctype="multipart/form-data"
        class="p-4 rounded shadow"
        style="background: linear-gradient(135deg, #4facfe, #ff6bcb);">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label text-white">Nama RW</label>
      <input type="text" name="nama_rw" value="{{ old('nama_rw', $rw->nama_rw) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Ketua RW</label>
      <input type="text" name="ketua_rw" value="{{ old('ketua_rw', $rw->ketua_rw) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">NIK Ketua RW</label>
      <input type="text" name="nik" value="{{ old('nik', $rw->nik) }}" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control">
        <option value="L" {{ $rw->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $rw->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Agama</label>
      <input type="text" name="agama" value="{{ old('agama', $rw->agama) }}" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Pekerjaan</label>
      <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $rw->pekerjaan) }}" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Alamat</label>
      <input type="text" name="alamat" value="{{ old('alamat', $rw->alamat) }}" class="form-control">
    </div>

    {{-- 🔹 RT tempat Ketua RW tinggal --}}
    <div class="mb-3">
      <label class="form-label text-white">RT Tempat Ketua RW Tinggal</label>
      @php
        $rtTinggal = \App\Models\Warga::where('nama', $rw->ketua_rw)->value('rt_id');
      @endphp
      <select name="rt_tempat_tinggal" class="form-select">
        <option value="">-- Pilih RT --</option>
        @foreach($rts as $rt)
          <option value="{{ $rt->id }}" {{ $rt->id == $rtTinggal ? 'selected' : '' }}>
            {{ $rt->nama_rt }} — {{ $rt->ketua_rt }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- 🔹 RT yang termasuk ke RW ini --}}
    <div class="mb-3">
      <label class="form-label text-white">RT yang Termasuk ke RW ini</label>
      <select name="rts[]" class="form-select" multiple size="5">
        @foreach($rts as $rt)
          <option value="{{ $rt->id }}" {{ $rt->rw_id == $rw->id ? 'selected' : '' }}>
            {{ $rt->nama_rt }} — {{ $rt->ketua_rt }}
          </option>
        @endforeach
      </select>
      <small class="text-light">* Tekan CTRL (atau CMD di Mac) untuk memilih lebih dari satu RT</small>
    </div>

    {{-- 🔹 Foto --}}
    <div class="text-center mt-4">
      <label class="form-label text-white d-block">Foto Saat Ini</label>
      @if ($rw->foto && file_exists(public_path($rw->foto)))
        <img src="{{ asset($rw->foto) }}" width="120" height="120" class="rounded-circle border mb-3">
      @else
        <p class="text-light">Tidak ada foto</p>
      @endif
    </div>

    <div class="mb-3">
      <label class="form-label text-white">Ganti Foto (Opsional)</label>
      <input type="file" name="foto" class="form-control" accept="image/*">
      <div class="text-center mt-3" id="previewContainer" style="display:none;">
        <p class="fw-bold text-white">Preview Foto Baru:</p>
        <img id="preview" class="rounded-circle border shadow-sm" style="width:120px; height:120px; object-fit:cover;">
      </div>
    </div>

    <div class="text-center mt-4">
      <button class="btn btn-success px-4">Update</button>
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
