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
    @php
        $years = range(date('Y'), date('Y') - 10);
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 
            'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 
            'November', 'Desember'
        ];
    @endphp
      <div class="panel-header panel-header-lg">
        <div class="container">
          <div class="row mb-3">
            <div class="col-md-4">
                <label for="bulan">Bulan:</label>
                <select id="bulan" class="form-select" onchange="applyFilter()">
                    <option value="">Semua</option>
                    @foreach ($months as $index => $month)
                        <option value="{{ $month }}" {{ request('bulan') == $month ? 'selected' : '' }}>
                            {{ $month }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="tahun">Tahun:</label>
                <select id="tahun" class="form-select" onchange="applyFilter()">
                    <option value="">Semua</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
      </div>
        <div class="container">
            <p class="fs-5 fw-bold mb-3">Data Peserta</p>
            <table class="table table-striped table-bordered">
              <thead class=" table-secondary">
                <tr>
                  <th class="text-center">Nama Kandidat</th>
                  <th class="text-center">Score</th>
                  <th class="text-center">Detail</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kandidat as $item)
                  <tr>
                      <td>{{ $item->nama_kandidat }}</td>
                      <td class="text-center"><b>{{$item->votes_count}}</b> Suara</td>
                    <td>
                      <div class="d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                            Detail
                        </button>
                    </div>
                    </td>
                    <td >
                       <div class="d-flex justify-content-center align-items-center">
                      </div>
                    </td>
                  </tr>
        
                  <!-- Modal -->
                  <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="userDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="userDetailModalLabel">Detail Peserta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <!-- Profile Image -->
                                <img src="{{ asset('storage/' . $item->foto_kandidat) }}" alt="Profile Image" class="rounded">
                                <!-- User Details Table -->
                                <h5 class="mt-3 text-center">{{$item->nama_kandidat}}</h5>
                                <div class="container">
                                    <div class="row">
                                      <div class="col mb-2">
                                        <p class="fs-6 fw-bold mb-0">Bulan</p>
                                      </div>
                                      <div class="col">
                                        {{$item->Bulan}}
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-2">
                                        <p class="fs-6 fw-bold mb-0">Tahun</p>
                                      </div>
                                      <div class="col">
                                        {{$item->tahun}}
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-2">
                                        <p class="fs-6 fw-bold mb-0">Pendidikan</p>
                                      </div>
                                      <div class="col">
                                        {{$item->pendidikan}}
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-2">
                                        <p class="fs-6 fw-bold mb-0">Pekerjaan</p>
                                      </div>
                                      <div class="col">
                                        {{$item->pekerjaan}}
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-2">
                                        <p class="fs-6 fw-bold mb-0">Tinggi Badan</p>
                                      </div>
                                      <div class="col">
                                        {{$item->tinggi_badan}}
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-2">
                                        <p class="fs-6 fw-bold mb-0">Berat Badan</p>
                                      </div>
                                      <div class="col">
                                        {{$item->berat_badan}}
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col mb-2">
                                        <p class="fs-6 fw-bold mb-0">Email</p>
                                      </div>
                                      <div class="col">
                                        {{$item->email}}
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col text-center">
                                        <p class="fs-6 fw-bold mb-0">Penguasaan</p>
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col">
                                        <p class="fs-6 fw-bold mb-0">Bahasa Sunda</p>
                                        <p class="fs-6  mb-0">{{$item->bahasa}}</p>
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col">
                                        <p class="fs-6 fw-bold mb-0">Kebudayaan Sunda</p>
                                        <p class="fs-6  mb-0">{{$item->kebudayaan}}</p>
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col">
                                        <p class="fs-6 fw-bold mb-0">Musik Sunda</p>
                                        <p class="fs-6  mb-0">{{$item->musik}}</p>
                                      </div>
                                    </div>
                                    <div class="row mb-2">
                                      <div class="col">
                                        <p class="fs-6 fw-bold mb-0">Pengetahuan Sejarah Sunda</p>
                                        <p class="fs-6  mb-0">{{$item->pengetahuan}}</p>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              </tbody>
            </table>
              <nav aria-label="Page navigation example" class=" d-flex justify-content-center align-items-center">
                <ul class="pagination ">
                    {{-- Previous Page Link --}}
                    <li class="page-item {{ $kandidat->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $kandidat->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    {{-- Pagination Elements --}}
                    @foreach ($kandidat->getUrlRange(1, $kandidat->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $kandidat->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                    {{-- Next Page Link --}}
                    <li class="page-item {{ $kandidat->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $kandidat->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
              </nav>
        
          </div>
    </div>
</div>
<script>
  function applyFilter() {
      const bulan = document.getElementById('bulan').value;
      const tahun = document.getElementById('tahun').value;

      // Construct URL with query parameters
      const url = new URL(window.location.href);
      url.searchParams.set('bulan', bulan);
      url.searchParams.set('tahun', tahun);
      window.location.href = url;
  }
</script>


@endsection