@extends('layouts.admin.menu')
@section('content')
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute bg-blue-800 fixed-top">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <img src="{{ url('image/yayasan.png') }}" alt="" class="me-2" style="width: 40px; height: 40px;">
                <p class="fw-normal mb-0 ml-3">Yayasan Gita Cahaya Karsa Putri</p>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
      <div class="panel-header panel-header-lg"></div>
      @php
        $years = range(date('Y'), date('Y') - 10);
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 
            'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 
            'November', 'Desember'
        ];
    @endphp
      <div class="container">

        <h1 class="text-center">Pemenang Voting</h1>
        
        <!-- Filter Form -->
        <form action="{{ route('admin.kandidatWinner') }}" method="GET" class="mb-4">
          <div class="row">
            <div class="col-md-4">
              <label for="bulan">Pilih Bulan:</label>
              <select id="bulan" class="form-control" name="bulan" >
                <option value="">Semua</option>
                @foreach ($months as $index => $month)
                    <option value="{{ $month }}" {{ request('bulan') == $month ? 'selected' : '' }}>
                        {{ $month }}
                    </option>
                @endforeach
            </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>
          </div>
        </form>

        <!-- Menampilkan Tabel Pemenang -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($winners && $winners->count() > 0)
        <table class="table table-bordered table-striped mt-4">
          <thead>
            <tr>
              <th>Nama Kandidat</th>
              <th>Jumlah Suara</th>
              <th>Email</th>
              <th>Bulan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($winners as $winner)
            <tr>
              <td>{{ $winner->nama_kandidat }}</td>
              <td>{{ $winner->votes_count }}</td>
              <td>{{ $winner->email }}</td>
              <td>{{ $winner->bulan }}</td>
              <td>
                 @if($winner->is_winner == 1)
                 <button class="btn btn-success" disabled>Menang</button>
                 @else
                 <form action="{{ route('admin.setWinner', $winner->id) }}" method="POST" style="display:inline;">
                     @csrf
                     <button type="submit" class="btn btn-success" id="winnerButton{{ $winner->id }}" onclick="disableButton({{ $winner->id }})">Menang</button>
                    </form>
                    @endif
                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <div class="alert alert-info mt-4">Tidak ada data pemenang untuk bulan yang dipilih.</div>
        @endif
      </div>
  </div>
@endsection
