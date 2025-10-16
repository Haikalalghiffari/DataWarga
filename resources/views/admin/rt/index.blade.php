@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Data RT</h3>
  <a href="{{ route('rt.create') }}" class="btn btn-primary">+ Tambah RT</a>
</div>

<table class="table table-bordered table-hover align-middle shadow-sm bg-white">
  <thead class="table-dark text-center">
    <tr>
      <th>Foto</th>
      <th>Nama RT</th>
      <th>Ketua RT</th>
      <th>NIK</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Pekerjaan</th>
      <th>Alamat</th>
      <th>RW</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $rt)
    <tr class="text-center">
      <td>
        @if ($rt->foto && file_exists(public_path($rt->foto)))
            <img src="{{ asset($rt->foto) }}" width="60" height="60" class="rounded-circle border mx-auto d-block">
        @else
            <span class="text-muted">Tidak ada foto</span>
        @endif
      </td>
      <td>{{ $rt->nama_rt }}</td>
      <td>{{ $rt->ketua_rt ?? '-' }}</td>
      <td>{{ $rt->nik ?? '-' }}</td>
      <td>{{ $rt->jenis_kelamin ?? '-' }}</td>
      <td>{{ $rt->agama ?? '-' }}</td>
      <td>{{ $rt->pekerjaan ?? '-' }}</td>
      <td>{{ $rt->alamat ?? '-' }}</td>
      <td>{{ $rt->rw->nama_rw ?? '-' }}</td>
      <td>
        <a href="{{ route('rt.edit', $rt->id) }}" class="btn-action btn-edit me-2" title="Edit RT">
    <i class="fa-solid fa-pen-to-square"></i>
</a>

<form action="{{ route('rt.destroy', $rt->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-action btn-delete" title="Hapus RT">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>

         
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
