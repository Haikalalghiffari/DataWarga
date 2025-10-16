@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="mb-4">Edit Data Warga</h3>

  <form action="{{ route('warga.update', $warga->id) }}" method="POST" enctype="multipart/form-data">
    @csrf 
    @method('PUT')

    <div class="mb-3 text-center">
        @if ($warga->foto && file_exists(public_path($warga->foto)))
            <img src="{{ asset($warga->foto) }}" width="120" height="120" 
                 class="rounded-circle border shadow-sm mb-2">
        @else
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
                 width="120" height="120" class="rounded-circle border shadow-sm mb-2">
        @endif
        <p class="text-muted small">Foto Saat Ini</p>
    </div>

    <div class="mb-3">
      <label>Ganti Foto (Opsional)</label>
      <input type="file" name="foto" class="form-control" accept="image/*">
      <img id="preview" class="rounded-circle border mt-3" 
           style="display:none; width:100px; height:100px; object-fit:cover;">
    </div>

    <div class="mb-3">
      <label>NIK</label>
      <input type="text" name="nik" value="{{ $warga->nik }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Nama Lengkap</label>
      <input type="text" name="nama" value="{{ $warga->nama }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" required>
        <option value="L" {{ $warga->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $warga->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Agama</label>
      <input type="text" name="agama" value="{{ $warga->agama }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Pekerjaan</label>
      <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Alamat</label>
      <input type="text" name="alamat" value="{{ $warga->alamat }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>RT</label>
      <select name="rt_id" class="form-control">
        <option value="">-- Pilih RT --</option>
        @foreach(\App\Models\Rt::all() as $rt)
          <option value="{{ $rt->id }}" {{ $warga->rt_id == $rt->id ? 'selected' : '' }}>
            {{ $rt->nama_rt }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>RW</label>
      <select name="rw_id" class="form-control">
        <option value="">-- Pilih RW --</option>
        @foreach(\App\Models\Rw::all() as $rw)
          <option value="{{ $rw->id }}" {{ $warga->rw_id == $rw->id ? 'selected' : '' }}>
            {{ $rw->nama_rw }}
          </option>
        @endforeach
      </select>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<script>
document.querySelector('input[name="foto"]').addEventListener('change', function(e) {
  const [file] = e.target.files;
  const preview = document.getElementById('preview');
  if (file) {
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
  }
});
</script>
@endsection
