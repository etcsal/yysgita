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
    <div class="d-flex justify-content-between align-items-center">
      <p class="fs-5 fw-bold mb-0 ml-4">Konten</p>
      <a href="{{route('admin.addKonten')}}" class="btn btn-primary rounded-lg mr-4">
          <i class="bi bi-plus-circle mr-2"></i>Tambah
      </a>
  </div>
  
    <div class="container">
      <table class="table table-striped table-bordered">
        <thead class=" table-secondary">
          <tr>
            <th class="text-center">Foto</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Detail</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($konten as $item)
            <tr>
              <td>
                <div class="d-flex justify-content-center align-items-center">
                  <img src="{{ asset('storage/' . $item->fotoKonten) }}" alt="{{ $item->judulkonten }}" alt="Program 1" width="100">
                </div>
              </td>
              <td>{{ $item->judulkonten }}</td>
              <td>
                <div class="d-flex justify-content-center align-items-center">
                  <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                      Detail
                  </button>
              </div>
              </td>
              <td >
                <div class="d-flex justify-content-center align-items-center">
                  <a href="{{route('admin.editKonten',$item->id)}}" class="btn btn-primary mr-2">Edit</a>
                  <a href="/admin/deleteKonten/{{$item->id}}" class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                </div>
              </td>
            </tr>

            <!-- Modal -->
              <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">{{$item->judulkonten}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Deskripsi:</strong> {{$item->detailKonten}}</p>
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
              <li class="page-item {{ $konten->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $konten->previousPageUrl() }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>
              {{-- Pagination Elements --}}
              @foreach ($konten->getUrlRange(1, $konten->lastPage()) as $page => $url)
                  <li class="page-item {{ $page == $konten->currentPage() ? 'active' : '' }}">
                      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
              @endforeach
              {{-- Next Page Link --}}
              <li class="page-item {{ $konten->hasMorePages() ? '' : 'disabled' }}">
                  <a class="page-link" href="{{ $konten->nextPageUrl() }}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
          </ul>
        </nav>

    </div>
</div>
    


@endsection