@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="mb-4 fw-bold text-white text-center">Statistik Warga</h3>

  <div class="row g-4 mb-4">
    <!-- Total -->
    <div class="col-md-3 col-6">
      <div class="card shadow text-center text-white" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">
        <div class="card-body">
          <h3>{{ $totalWarga }}</h3>
          <p class="mb-0">Total Warga</p>
        </div>
      </div>
    </div>

    <!-- Laki-laki -->
    <div class="col-md-3 col-6">
      <div class="card shadow text-center text-white" style="background: linear-gradient(135deg, #43e97b, #38f9d7);">
        <div class="card-body">
          <h3>{{ $laki }}</h3>
          <p class="mb-0">Laki-laki</p>
        </div>
      </div>
    </div>

    <!-- Perempuan -->
    <div class="col-md-3 col-6">
      <div class="card shadow text-center text-white" style="background: linear-gradient(135deg, #fa709a, #fee140);">
        <div class="card-body">
          <h3>{{ $perempuan }}</h3>
          <p class="mb-0">Perempuan</p>
        </div>
      </div>
    </div>

    <!-- Agama -->
    <div class="col-md-3 col-6">
      <div class="card shadow text-center text-white" style="background: linear-gradient(135deg, #667eea, #764ba2);">
        <div class="card-body">
          <h3>{{ $agamaStatistik->count() }}</h3>
          <p class="mb-0">Agama Tercatat</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart Section -->
  <div class="row">
    <!-- Chart Agama -->
    <div class="col-md-6 mb-4">
      <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Statistik Berdasarkan Agama</h5>
        </div>
        <div class="card-body">
          <canvas id="chartAgama" height="200"></canvas>
        </div>
      </div>
    </div>

    <!-- Chart Pekerjaan -->
    <div class="col-md-6 mb-4">
      <div class="card shadow-lg border-0">
        <div class="card-header bg-info text-white">
          <h5 class="mb-0">Statistik Berdasarkan Pekerjaan</h5>
        </div>
        <div class="card-body">
          <canvas id="chartPekerjaan" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Script Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const agamaLabels = @json($agamaStatistik->pluck('agama'));
  const agamaData = @json($agamaStatistik->pluck('total'));
  const pekerjaanLabels = @json($pekerjaanStatistik->pluck('pekerjaan'));
  const pekerjaanData = @json($pekerjaanStatistik->pluck('total'));
  const warna = ['#4facfe','#43e97b','#fa709a','#fee140','#667eea','#764ba2','#38f9d7'];

  // Pie Chart Agama
  new Chart(document.getElementById('chartAgama'), {
    type: 'pie',
    data: {
      labels: agamaLabels,
      datasets: [{
        data: agamaData,
        backgroundColor: warna,
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'bottom' }
      }
    }
  });

  // Bar Chart Pekerjaan
  new Chart(document.getElementById('chartPekerjaan'), {
    type: 'bar',
    data: {
      labels: pekerjaanLabels,
      datasets: [{
        label: 'Jumlah Warga',
        data: pekerjaanData,
        backgroundColor: warna,
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
</script>
@endsection
