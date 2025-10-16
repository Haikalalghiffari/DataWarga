<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Rt;
use App\Models\Warga;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function __construct()
    {
        if (!session()->has('user_id')) {
            redirect()->route('login')->send();
        }
    }

    /**
     * 🔹 Tampilkan semua data RW
     */
    public function index()
    {
        $data = Rw::with(['rtTempatTinggal', 'rts'])->get();
        return view('admin.rw.index', compact('data'));
    }

    /**
     * 🔹 Form tambah RW
     */
    public function create()
    {
        $rts = Rt::all();
        return view('admin.rw.create', compact('rts'));
    }

    /**
     * 🔹 Simpan data RW baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rw' => 'required|string|max:50',
            'ketua_rw' => 'required|string|max:100',
            'nik' => 'nullable|string|max:30',
            'jenis_kelamin' => 'nullable|string|max:2',
            'agama' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:100',
            'alamat' => 'required|string|max:255',
            'rt_tempat_tinggal' => 'nullable|exists:rts,id',
            'rts' => 'nullable|array',
            'rts.*' => 'exists:rts,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ]);

        // Upload foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('rw', 'public');
            $fotoPath = 'storage/' . $path;
        }

        // Simpan RW
        $rw = Rw::create([
            'nama_rw' => $request->nama_rw,
            'ketua_rw' => $request->ketua_rw,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
            'rt_tempat_tinggal_id' => $request->rt_tempat_tinggal,
        ]);

        // ✅ Update RT yang dipilih untuk jadi bagian RW ini
        if ($request->filled('rts')) {
            Rt::whereIn('id', $request->rts)->update(['rw_id' => $rw->id]);
        }

        // ✅ Tambahkan Ketua RW ke tabel warga
        Warga::firstOrCreate(
            ['nama' => $rw->ketua_rw],
            [
                'nik' => $rw->nik,
                'nama' => $rw->ketua_rw,
                'jenis_kelamin' => $rw->jenis_kelamin,
                'agama' => $rw->agama,
                'tanggal_lahir' => now()->subYears(45),
                'pekerjaan' => $rw->pekerjaan,
                'alamat' => $rw->alamat,
                'rw_id' => $rw->id,
                'rt_id' => $rw->rt_tempat_tinggal_id,
                'foto' => $rw->foto,
                'status' => 'Ketua RW',
            ]
        );

        return redirect()->route('rw.index')->with('success', '✅ RW berhasil ditambahkan dan dikirim ke Data Warga.');
    }

    /**
     * 🔹 Form edit RW
     */
    public function edit(Rw $rw)
    {
        $rts = Rt::all();
        $selectedRts = $rw->rts->pluck('id')->toArray(); // untuk preselect multiple
        return view('admin.rw.edit', compact('rw', 'rts', 'selectedRts'));
    }

    /**
     * 🔹 Update data RW
     */
    public function update(Request $request, Rw $rw)
    {
        $request->validate([
            'nama_rw' => 'required|string|max:50',
            'ketua_rw' => 'required|string|max:100',
            'nik' => 'nullable|string|max:30',
            'jenis_kelamin' => 'nullable|string|max:2',
            'agama' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:100',
            'alamat' => 'required|string|max:255',
            'rt_tempat_tinggal' => 'nullable|exists:rts,id',
            'rts' => 'nullable|array',
            'rts.*' => 'exists:rts,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ]);

        // Update foto jika diganti
        $fotoPath = $rw->foto;
        if ($request->hasFile('foto')) {
            if ($rw->foto && file_exists(public_path($rw->foto))) {
                unlink(public_path($rw->foto));
            }
            $path = $request->file('foto')->store('rw', 'public');
            $fotoPath = 'storage/' . $path;
        }

        // Update data RW
        $rw->update([
            'nama_rw' => $request->nama_rw,
            'ketua_rw' => $request->ketua_rw,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
            'rt_tempat_tinggal_id' => $request->rt_tempat_tinggal,
        ]);

        // ✅ Reset semua RT yang sebelumnya terhubung dengan RW ini
        Rt::where('rw_id', $rw->id)->update(['rw_id' => null]);

        // ✅ Hubungkan RT baru yang dipilih
        if ($request->filled('rts')) {
            Rt::whereIn('id', $request->rts)->update(['rw_id' => $rw->id]);
        }

        // ✅ Update Ketua RW di tabel warga
        $warga = Warga::where('status', 'Ketua RW')->where('rw_id', $rw->id)->first();
        if ($warga) {
            $warga->update([
                'nik' => $rw->nik,
                'nama' => $rw->ketua_rw,
                'jenis_kelamin' => $rw->jenis_kelamin,
                'agama' => $rw->agama,
                'pekerjaan' => $rw->pekerjaan,
                'alamat' => $rw->alamat,
                'rw_id' => $rw->id,
                'rt_id' => $rw->rt_tempat_tinggal_id,
                'foto' => $rw->foto,
            ]);
        }

        return redirect()->route('rw.index')->with('success', '✅ Data RW berhasil diperbarui.');
    }

    /**
     * 🔹 Hapus RW dan data terkait
     */
    public function destroy(Rw $rw)
    {
        if ($rw->foto && file_exists(public_path($rw->foto))) {
            unlink(public_path($rw->foto));
        }

        Warga::where('status', 'Ketua RW')->where('rw_id', $rw->id)->delete();
        Rt::where('rw_id', $rw->id)->update(['rw_id' => null]);

        $rw->delete();

        return redirect()->route('rw.index')->with('success', '🗑️ RW dan data terkait berhasil dihapus.');
    }
}
