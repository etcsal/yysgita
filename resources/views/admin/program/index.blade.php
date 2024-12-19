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
                    <img src="{{ url('image/icons/macsetting.png') }}" alt="" class="mr-2" >
                    <div class="text-container ">
                        <p class="fs-5 fw-bold mb-0">Manajemen Program</p>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="d-flex justify-content-end align-items-end mr-5">
            <a href="{{route('admin.addProgram')}}" class="btn btn-primary rounded-lg"><i class="bi bi-plus-circle mr-2"></i>Tambah</a>
        </div>
        <div class="container">
        <table class="table table-striped table-bordered">
            <thead class=" table-secondary">
            <tr>
                <th class="text-center">Foto Cover</th>
                <th class="text-center">Nama Program</th>
                <th class="text-center">Detail</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($program as $item)
                    <tr>
                        <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/' . $item->fotoProgram) }}" alt="{{ $item->namaProgram }}" width="100">
                        </div>
                        </td>
                        <td>{{ $item->namaProgram }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                    Detail
                                </button>
                            </div>
                        </td>
                        <td >
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{route('admin.editProgram',$item->id)}}" class="btn btn-primary mr-2">Edit</a>
                            <a href="/admin/deleteProgram/{{$item->id}}" class="btn btn-danger" data-confirm-delete="true">Hapus</a>

                        </div>
                        </td>
                    </tr>
                    <!-- Modal -->
                        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">{{$item->namaProgram}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Deskripsi:</strong> {{$item->detailProgram}}</p>
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
                <li class="page-item {{ $program->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $program->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                {{-- Pagination Elements --}}
                @foreach ($program->getUrlRange(1, $program->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $program->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
                {{-- Next Page Link --}}
                <li class="page-item {{ $program->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $program->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
          </nav>
        </div>
    </div>
    
@endsection