@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="text-white">Data RW</h3>
  <a href="{{ route('rw.create') }}" class="btn btn-primary">+ Tambah RW</a>
</div>

<table class="table table-bordered table-hover align-middle shadow-sm bg-white">
  <thead class="table-dark text-center">
    <tr>
      <th>Foto</th>
      <th>Nama RW</th>
      <th>Ketua RW</th>
      <th>NIK</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Pekerjaan</th>
      <th>Alamat</th>
      <th>RT Tempat Tinggal</th> {{-- ✅ tampilkan langsung dari relasi --}}
      <th>RT Terkait</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <tbody>
    @forelse($data as $rw)
    <tr>
      {{-- Foto --}}
      <td class="text-center">
        @if ($rw->foto && file_exists(public_path($rw->foto)))
          <img src="{{ asset($rw->foto) }}" width="60" height="60" class="rounded-circle border shadow-sm">
        @else
          <span class="text-muted">Tidak ada foto</span>
        @endif
      </td>

      {{-- Data RW --}}
      <td class="fw-bold text-center">{{ $rw->nama_rw }}</td>
      <td class="text-center">{{ $rw->ketua_rw ?? '-' }}</td>
      <td class="text-center">{{ $rw->nik ?? '-' }}</td>
      <td class="text-center">{{ $rw->jenis_kelamin ?? '-' }}</td>
      <td class="text-center">{{ $rw->agama ?? '-' }}</td>
      <td class="text-center">{{ $rw->pekerjaan ?? '-' }}</td>
      <td class="text-center">{{ $rw->alamat ?? '-' }}</td>

      {{-- ✅ RT tempat tinggal Ketua RW (langsung dari relasi rtTempatTinggal) --}}
      <td class="text-center">
        {{ $rw->rtTempatTinggal->nama_rt ?? '-' }}
      </td>

      {{-- ✅ RT bawahan yang termasuk ke RW ini --}}
      <td class="text-center">
        @if($rw->rts->count() > 0)
          @foreach($rw->rts as $rt)
            <span class="badge bg-info text-dark mb-1">{{ $rt->nama_rt }}</span>
          @endforeach
        @else
          <span class="text-muted">Belum ada RT</span>
        @endif
      </td>

      {{-- Tombol Aksi --}}
<td class="text-center">
  {{-- ✏️ Tombol Edit --}}
  <a href="{{ route('rw.edit', $rw->id) }}" class="btn-action btn-edit me-2" title="Edit RW">
    <i class="fa-solid fa-pen-to-square"></i>
  </a>

  {{-- 🗑️ Tombol Hapus --}}
  <form action="{{ route('rw.destroy', $rw->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-action btn-delete" title="Hapus RW">
      <i class="fa-solid fa-trash"></i>
    </button>
  </form>
</td>

    </tr>
    @empty
    <tr>
      <td colspan="11" class="text-center text-muted">Belum ada data RW</td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection
