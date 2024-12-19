@extends('layouts.admin.menu')
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
    <div class="panel-header panel-header-lg">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Konten</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Konten</li>
                </ol>
              </nav>
            <div class="row">
                <div class="col-sm-8 d-flex flex-column flex-sm-row align-items-center fs-2">
                    <i class="bi bi-plus-square"></i>
                    <div class="text-container ml-3">
                        <p class="fs-5 fw-bold mb-0">Edit Konten</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
          <div class="card mb-3 p-4" style="max-width: 75%;">
            <form action="{{route('admin.updateKonten',$konten->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="row d-flex align-items-center mb-3">
                    <div class="col-md-2">
                        <label for="judulKonten" class="form-label fw-bold text-dark">Judul</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('judulkonten') is-invalid @enderror" id="judulKonten" name="judulkonten" value="{{ old('judulkonten', $konten->judulkonten) }}" placeholder="Masukkan judul">
                        @error('judulkonten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="row d-flex align-items-center mb-3">
                    <div class="col-md-2">
                        <label for="fotoKonten" class="form-label fw-bold text-dark">Foto Cover</label>
                    </div>
                    <div class="col-md-10">
                        <input type="file" class="form-control @error('fotoKonten') is-invalid @enderror" id="fotoKonten" name="fotoKonten">
                        @error('fotoKonten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-md-2">
                        <label for="detailKonten" class="form-label fw-bold text-dark">Detail</label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control @error('detailKonten') is-invalid @enderror" id="detailKonten" name="detailKonten" placeholder="Masukkan detail">{{ old('detailKonten', $konten->detailKonten) }}</textarea>
                        @error('detailKonten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            
          </div>
      </div>
    </div>
</div>
@endsection