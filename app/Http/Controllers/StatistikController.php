<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        // Total warga
        $totalWarga = Warga::count();

        // Laki-laki dan Perempuan
        $laki = Warga::where('jenis_kelamin', 'L')->count();
        $perempuan = Warga::where('jenis_kelamin', 'P')->count();

        // Agama (grup by)
        $agamaStatistik = Warga::select('agama')
            ->selectRaw('count(*) as total')
            ->groupBy('agama')
            ->get();

        // Pekerjaan (opsional)
        $pekerjaanStatistik = Warga::select('pekerjaan')
            ->selectRaw('count(*) as total')
            ->groupBy('pekerjaan')
            ->get();

        return view('admin.statistik.index', compact(
            'totalWarga',
            'laki',
            'perempuan',
            'agamaStatistik',
            'pekerjaanStatistik'
        ));
    }
}
