<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function __construct()
    {
        if (!session()->has('user_id')) {
            redirect()->route('login')->send();
        }
    }

    /**
     * 🔹 Tampilkan semua data warga, ketua RT, dan ketua RW
     */
    public function index(Request $request)
    {
        /**
         * Ambil semua data warga (yang punya RT saja)
         * Supaya data ketua RW tidak muncul dua kali (versi tanpa RT disembunyikan)
         */
        $search = $request->input('search');
        $wargas = Warga::with(['rt', 'rw'])
            ->whereNotNull('rt_id') // ❗ hanya warga yang terhubung RT
            ->get()
            ->map(function ($w) {
                return [
                    'id' => $w->id,
                    'nik' => $w->nik,
                    'nama' => $w->nama,
                    'jenis_kelamin' => $w->jenis_kelamin,
                    'agama' => $w->agama,
                    'pekerjaan' => $w->pekerjaan,
                    'alamat' => $w->alamat,
                    'rt' => $w->rt->nama_rt ?? '-',
                    'rw' => $w->rw->nama_rw ?? '-',
                    'foto' => $w->foto,
                    'status' => $w->status ?? 'Warga',
                ];
            });

        // 🔹 Data Ketua RT
        $rts = Rt::with('rw')->get()->map(function ($rt) {
            return [
                'id' => $rt->id,
                'nik' => $rt->nik,
                'nama' => $rt->ketua_rt,
                'jenis_kelamin' => $rt->jenis_kelamin,
                'agama' => $rt->agama,
                'pekerjaan' => $rt->pekerjaan,
                'alamat' => $rt->alamat,
                'rt' => $rt->nama_rt ?? '-',
                'rw' => $rt->rw->nama_rw ?? '-',
                'foto' => $rt->foto,
                'status' => 'Ketua RT',
            ];
        });

        // 🔹 Data Ketua RW — tampilkan hanya jika ada RT yang terkait (biar tidak duplikat)
        $rws = Rw::whereHas('rts') // hanya RW yang punya RT
            ->get()
            ->map(function ($rw) {
                return [
                    'id' => $rw->id,
                    'nik' => $rw->nik,
                    'nama' => $rw->ketua_rw,
                    'jenis_kelamin' => $rw->jenis_kelamin,
                    'agama' => $rw->agama,
                    'pekerjaan' => $rw->pekerjaan,
                    'alamat' => $rw->alamat,
                    'rt' => '-', // RW tidak punya RT langsung
                    'rw' => $rw->nama_rw ?? '-',
                    'foto' => $rw->foto,
                    'status' => 'Ketua RW',
                ];
            });

        // 🔹 Gabungkan semua data
        $dataGabungan = $wargas->merge($rts)->merge($rws);

       if ($search) {
    $dataGabungan = $dataGabungan->filter(function ($item) use ($search) {
        // Gabungkan semua kolom yang ada ke dalam satu string
        $values = implode(' ', [
            $item['nik'] ?? '',
            $item['nama'] ?? '',
            $item['jenis_kelamin'] ?? '',
            $item['agama'] ?? '',
            $item['pekerjaan'] ?? '',
            $item['alamat'] ?? '',
            $item['rt'] ?? '',
            $item['rw'] ?? '',
            $item['status'] ?? '',
        ]);

        // Cek apakah kata yang dicari muncul di salah satu kolom
        return stripos($values, $search) !== false;
    });
}

    return view('admin.warga.index', compact('dataGabungan'));
    }

    /**
     * 🔹 Form tambah data
     */
    public function create()
    {
        $rts = Rt::all();
        $rws = Rw::all();
        return view('admin.warga.create', compact('rts', 'rws'));
    }

    /**
     * 🔹 Simpan data baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:wargas,nik',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required',
            'alamat' => 'required|string|max:255',
            'rt_id' => 'nullable|exists:rts,id',
            'rw_id' => 'nullable|exists:rws,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('warga', 'public');
            $fotoPath = 'storage/' . $path;
        }

        Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'foto' => $fotoPath,
            'status' => 'Warga',
        ]);

        return redirect()->route('warga.index')->with('success', '✅ Data warga berhasil ditambahkan.');
    }

    /**
     * 🔹 Form edit data
     */
    public function edit(Warga $warga)
    {
        $rts = Rt::all();
        $rws = Rw::all();
        return view('admin.warga.edit', compact('warga', 'rts', 'rws'));
    }

    /**
     * 🔹 Update data warga
     */
    public function update(Request $request, Warga $warga)
    {
        $request->validate([
            'nik' => 'required|string|max:30',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'agama' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'rt_id' => 'nullable|exists:rts,id',
            'rw_id' => 'nullable|exists:rws,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
        ]);

        $fotoPath = $warga->foto;

        if ($request->hasFile('foto')) {
            if ($warga->foto && file_exists(public_path($warga->foto))) {
                unlink(public_path($warga->foto));
            }
            $path = $request->file('foto')->store('warga', 'public');
            $fotoPath = 'storage/' . $path;
        }

        $warga->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'rt_id' => $request->rt_id,
            'rw_id' => $request->rw_id,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('warga.index')->with('success', '✅ Data Warga berhasil diperbarui.');
    }

    /**
     * 🔹 Hapus data
     */
    public function destroy(Warga $warga)
    {
        if ($warga->foto && file_exists(public_path($warga->foto))) {
            unlink(public_path($warga->foto));
        }

        $warga->delete();
        return redirect()->route('warga.index')->with('success', '🗑️ Data Warga berhasil dihapus.');
    }
}
