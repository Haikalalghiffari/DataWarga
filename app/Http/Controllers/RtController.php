<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * 🔹 Tampilkan semua data RT
     */
    public function index()
    {
        $data = Rt::with('rw')->get();
        return view('admin.rt.index', compact('data'));
    }

    /**
     * 🔹 Form tambah RT
     */
    public function create()
    {
        $rws = Rw::all();
        return view('admin.rt.create', compact('rws'));
    }

    /**
     * 🔹 Simpan data RT baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rt' => 'required|string|max:100',
            'ketua_rt' => 'nullable|string|max:100',
            'rw_id' => 'required|exists:rws,id',
            'nik' => 'nullable|string|max:30',
            'jenis_kelamin' => 'nullable|string|max:10',
            'agama' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
        ]);

        $fotoPath = null;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('rt', 'public');
            $fotoPath = 'storage/' . $path;
        }

        // Simpan data RT
        Rt::create([
            'nama_rt' => $request->nama_rt,
            'ketua_rt' => $request->ketua_rt,
            'rw_id' => $request->rw_id,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('rt.index')->with('success', '✅ Data RT berhasil ditambahkan.');
    }

    /**
     * 🔹 Form edit RT
     */
    public function edit(Rt $rt)
    {
        $rws = Rw::all();
        return view('admin.rt.edit', compact('rt', 'rws'));
    }

    /**
     * 🔹 Update data RT
     */
    public function update(Request $request, Rt $rt)
    {
        $request->validate([
            'nama_rt' => 'required|string|max:100',
            'ketua_rt' => 'nullable|string|max:100',
            'rw_id' => 'required|exists:rws,id',
            'nik' => 'nullable|string|max:30',
            'jenis_kelamin' => 'nullable|string|max:10',
            'agama' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
        ]);

        $fotoPath = $rt->foto;

        // Jika upload foto baru, hapus yang lama
        if ($request->hasFile('foto')) {
            if ($rt->foto && file_exists(public_path($rt->foto))) {
                unlink(public_path($rt->foto));
            }

            $path = $request->file('foto')->store('rt', 'public');
            $fotoPath = 'storage/' . $path;
        }

        // Update data
        $rt->update([
            'nama_rt' => $request->nama_rt,
            'ketua_rt' => $request->ketua_rt,
            'rw_id' => $request->rw_id,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('rt.index')->with('success', '✅ Data RT berhasil diperbarui.');
    }

    /**
     * 🔹 Hapus data RT
     */
    public function destroy(Rt $rt)
    {
        if ($rt->foto && file_exists(public_path($rt->foto))) {
            unlink(public_path($rt->foto));
        }

        $rt->delete();

        return redirect()->route('rt.index')->with('success', '🗑️ Data RT berhasil dihapus.');
    }
}
