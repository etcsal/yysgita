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
    <div class="panel-header panel-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 d-flex flex-column flex-sm-row align-items-center">
                    <img src="{{ url('image/yayasan.png') }}" alt="" class="mr-5 mb-3 mb-sm-0" style="width: 100%; max-width: 120px; height: auto;">
                    <div class="text-container ">
                        <p class="fs-5 fw-bold mb-0">Yayasan</p>
                        <p class="fs-5 fw-bold mb-0">Gita Cahaya Karsa Putri</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  <div class="container">
    <table class="table table-striped table-bordered">
      <thead class=" table-secondary">
        <tr>
          <th class="text-center">Foto Kandidat</th>
          <th class="text-center">Nama Kandidat</th>
          <th class="text-center">Detail</th>
          <th class="text-center">Status</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kandidat as $item)
          <tr>
            <td>
              <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('storage/' . $item->foto_kandidat) }}" alt="{{ $item->nama_kandidat }}" alt="Program 1" width="100">
              </div>
            </td>
            <td class="text-center">{{ $item->nama_kandidat }}</td>
            <td>
              <div class="d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                    Detail
                </button>
            </div>
            </td>
            @if ($item->is_winner == 1)
                <td class="text-center">Pemenang {{$item->bulan}}</td>
                <td>
                  <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary mr-2" disabled>Terima</button>
                    <button type="submit" class="btn btn-danger" data-confirm-delete="true" disabled>Tolak</button>
                  </div>
                </td>
            @else
                <td class="text-center">{{$item->approve}}</td>
                <td>
                  <div class="d-flex justify-content-center align-items-center">
                    <form action="{{ route('admin.kandidat.accept', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary mr-2">Terima</button>
                    </form>
                    
                    <form action="{{ route('admin.kandidat.reject', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" data-confirm-delete="true">Tolak</button>
                    </form>
                  </div>
                </td>
            @endif

            {{-- <td >
              <div class="d-flex justify-content-center align-items-center">
                <form action="{{ route('admin.kandidat.accept', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary mr-2">Terima</button>
                </form>
                
                <form action="{{ route('admin.kandidat.reject', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger" data-confirm-delete="true">Tolak</button>
                </form>
              </div>
            </td> --}}
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
    


@endsection