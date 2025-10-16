@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3 fw-bold text-dark">Data Warga</h3>

    {{-- 🔍 Form Pencarian --}}
    <form action="{{ route('warga.index') }}" method="GET" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama warga..." value="{{ request('search') }}">
        <button class="btn btn-secondary">Cari</button>
    </form>

    {{-- ➕ Tambah Warga --}}
    <a href="{{ route('warga.create') }}" class="btn btn-primary mb-3">+ Tambah Warga</a>

    {{-- 📋 Tabel Data --}}
    <table class="table table-bordered table-striped align-middle text-center shadow">
        <thead class="table-dark">
            <tr>
                <th>Foto</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>RT</th>
                <th>RW</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataGabungan as $w)
                @php
                    $rtId = \App\Models\Rt::where('ketua_rt', $w['nama'])->value('id');
                    $rwId = \App\Models\Rw::where('ketua_rw', $w['nama'])->value('id');
                    $wargaId = \App\Models\Warga::where('nama', $w['nama'])->value('id');
                @endphp

                <tr>
                    {{-- 📸 Foto --}}
                    <td>
                        @if(!empty($w['foto']) && file_exists(public_path($w['foto'])))
                            <img src="{{ asset($w['foto']) }}" width="50" height="50" class="rounded-circle border shadow-sm">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>

                    {{-- 🧾 Data Warga --}}
                    <td>{{ $w['nik'] ?? '-' }}</td>
                    <td>{{ $w['nama'] ?? '-' }}</td>
                    <td>{{ $w['jenis_kelamin'] ?? '-' }}</td>
                    <td>{{ $w['agama'] ?? '-' }}</td>
                    <td>{{ $w['pekerjaan'] ?? '-' }}</td>
                    <td>{{ $w['alamat'] ?? '-' }}</td>
                    <td>{{ $w['rt'] ?? '-' }}</td>
                    <td>{{ $w['rw'] ?? '-' }}</td>

                    {{-- 🏷️ Status --}}
                    <td>
                        @if($w['status'] == 'Ketua RW')
                            <span class="badge bg-danger">{{ $w['status'] }}</span>
                        @elseif($w['status'] == 'Ketua RT')
                            <span class="badge bg-warning text-dark">{{ $w['status'] }}</span>
                        @else
                            <span class="badge bg-success">{{ $w['status'] ?? 'Warga' }}</span>
                        @endif
                    </td>

                    {{-- ⚙️ Aksi --}}
                    <td>
                        <div class="d-flex justify-content-center gap-2">

                            {{-- ✏️ Edit --}}
                            @if($w['status'] == 'Ketua RW')
                                @php $rwId = \App\Models\Rw::where('ketua_rw', $w['nama'])->value('id'); @endphp
                                @if($rwId)
                                    <a href="{{ route('rw.edit', ['rw' => $rwId]) }}" class="btn-action edit" title="Edit Ketua RW">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif

                            @elseif($w['status'] == 'Ketua RT')
                                @php $rtId = \App\Models\Rt::where('ketua_rt', $w['nama'])->value('id'); @endphp
                                @if($rtId)
                                    <a href="{{ route('rt.edit', ['rt' => $rtId]) }}" class="btn-action edit" title="Edit Ketua RT">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif

                            @else
                                @if($wargaId)
                                    <a href="{{ route('warga.edit', ['warga' => $wargaId]) }}" class="btn-action edit" title="Edit Warga">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif
                            @endif

                            {{-- 🗑️ Hapus --}}
                            @if($w['status'] == 'Ketua RW' && $rwId)
                                <form action="{{ route('rw.destroy', ['rw' => $rwId]) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus Ketua RW ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn-action delete" title="Hapus Ketua RW">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @elseif($w['status'] == 'Ketua RT' && $rtId)
                                <form action="{{ route('rt.destroy', ['rt' => $rtId]) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus Ketua RT ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn-action delete" title="Hapus Ketua RT">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @elseif($wargaId)
                                <form action="{{ route('warga.destroy', ['warga' => $wargaId]) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data warga ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn-action delete" title="Hapus Warga">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @endif

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center text-muted">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- 🎨 STYLE MODERN --}}
<style>
.table th, .table td {
    vertical-align: middle !important;
}
.btn-action {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    transition: 0.3s ease;
    font-size: 16px;
}
.btn-action.edit {
    background: linear-gradient(135deg, #4facfe, #00c6ff);
    color: #fff;
}
.btn-action.edit:hover {
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(79,172,254,0.7);
}
.btn-action.delete {
    background: linear-gradient(135deg, #ff6b6b, #ff4757);
    color: #fff;
}
.btn-action.delete:hover {
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(255,107,107,0.7);
}
</style>
@endsection
