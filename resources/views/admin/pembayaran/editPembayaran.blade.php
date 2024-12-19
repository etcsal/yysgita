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
                    <li class="breadcrumb-item"><a href="{{route('admin.pembayaran')}}">Pembayaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Pembayaran</li>
                </ol>
              </nav>
            <div class="row">
                <div class="col-sm-8 d-flex flex-column flex-sm-row align-items-center fs-2">
                    <i class="bi bi-plus-square"></i>
                    <div class="text-container ml-3">
                        <p class="fs-5 fw-bold mb-0">Edit Pembayaran</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
          <div class="card mb-3 p-4" style="max-width: 75%;">
            <form action="{{route('admin.updatePembayaran',$pembayaran->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="row d-flex align-items-center mb-3">
                    <div class="col-md-2">
                        <label for="banaBank" class="form-label fw-bold text-dark">Nama Bank</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('banaBank') is-invalid @enderror" id="banaBank" name="banaBank" value="{{ old('banaBank', $pembayaran->namaBank) }}" placeholder="Masukkan Nama Bank">
                        @error('banaBank')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>                  
    
                <div class="row d-flex align-items-center mb-3">
                    <div class="col-md-2">
                        <label for="logoBank" class="form-label fw-bold text-dark">Logo</label>
                    </div>
                    <div class="col-md-10">
                        <input type="file" class="form-control @error('logoBank') is-invalid @enderror" id="logoBank" name="logoBank">
                        @error('logoBank')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row d-flex align-items-center mb-3">
                    <div class="col-md-2">
                        <label for="noRek" class="form-label fw-bold text-dark">No. Rek</label>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control @error('noRek') is-invalid @enderror" id="noRek" name="noRek" value="{{ old('noRek', $pembayaran->noRek) }}" placeholder="Masukkan Jenis pembayaran">
                      @error('noRek')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                </div>                  
    
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-md-2">
                        <label for="petunjuk" class="form-label fw-bold text-dark">Petunjuk Pembayaran</label>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control @error('petunjuk') is-invalid @enderror" name="petunjuk" id="petunjuk" rows="5"  placeholder="Masukkan petunjuk">{{ old('petunjuk',$pembayaran->petunjuk) }}</textarea>
                        @error('petunjuk')
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#petunjuk')).then(editor => {
        console.log("Editor is ready to use!", editor);
    })
    .catch(error => {
        console.error(error);
    });
    </script>
@endsection