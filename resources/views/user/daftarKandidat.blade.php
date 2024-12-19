@extends('layouts.user.menu')
@section('content')
    <div class="main-panel">
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
        <div class="container my-5">
            <div class="d-flex align-items-center pt-3 pb-2 mb-3 border-bottom">
                <i class="bi bi-heart fs-3 me-2"></i>
                <h4 class="m-0 fw-bold">Daftar Kandidat</h4>
            </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

    
            <div class="row">
                <!-- Contestant 1 -->
                @foreach ($kandidat as $item)
                    @if ($item->approve == 'Terima')
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $item->foto_kandidat) }}" class="card-img-top" alt="Nama Peserta 1">
                            <div class="card-body text-center">
                                <h5 class="card-title ">{{$item->nama_kandidat}}</h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                    Vote
                                </button>
                            </div>
                        </div>
                    </div>
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
                                      <form action="{{ route('user.Prosesvote', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Vote</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    @endif
                    
                @endforeach
            </div>
        </div>
    </div>

    
    
@endsection