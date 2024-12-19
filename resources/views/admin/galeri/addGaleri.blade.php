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
                    <li class="breadcrumb-item"><a href="{{route('admin.galeri')}}">Galeri</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Galeri</li>
                </ol>
              </nav>
            <div class="row">
                <div class="col-sm-8 d-flex flex-column flex-sm-row align-items-center fs-2">
                    <i class="bi bi-plus-square"></i>
                    <div class="text-container ml-3">
                        <p class="fs-5 fw-bold mb-0">Tambah Galeri</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
          <div class="card mb-3 p-4" style="max-width: 75%;">
            <form action="{{ route('admin.galeriStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row d-flex align-items-center mb-3">
                    <div class="col-md-2">
                        <label for="judulGaleri" class="form-label fw-bold text-dark">Judul Galeri</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('judulGaleri') is-invalid @enderror" id="judulGaleri" name="judulGaleri" value="{{ old('judulGaleri') }}" placeholder="Masukkan judul">
                        @error('judulGaleri')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="row d-flex align-items-center mb-3">
                    <div class="col-md-2">
                        <label class="form-label fw-bold text-dark">Pilih Opsi</label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-check">
                            <input class="form-check-input @error('kategoriGaleri') is-invalid @enderror" type="radio" name="kategoriGaleri" id="flexRadioDefault1" value="Foto" {{ old('kategoriGaleri') == 'Foto' ? 'checked' : '' }} onclick="toggleInput()">
                            <label class="form-check-label" for="flexRadioDefault1">Foto</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('kategoriGaleri') is-invalid @enderror" type="radio" name="kategoriGaleri" id="flexRadioDefault2" value="Video" {{ old('kategoriGaleri') == 'Video' ? 'checked' : '' }} onclick="toggleInput()">
                            <label class="form-check-label" for="flexRadioDefault2">Video</label>
                        </div>
                        @error('kategoriGaleri')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
            
                        <div id="fotoInput" class="mt-3" style="display: none;">
                            <label for="fotoVidio" class="form-label">Upload Foto</label>
                           <input type="file" class="form-control @error('fotoVidio') is-invalid @enderror" id="fotoVidio" name="fotoVidio">
                          @error('fotoVidio')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      
                        </div>
            
                        <div id="videoInput" class="mt-3" style="display: none;">
                            <label for="videoKonten" class="form-label">Masukkan URL Video</label>
                            <input type="text" class="form-control @error('videoKonten') is-invalid @enderror" id="videoKonten" name="videoKonten" value="{{ old('videoKonten') }}" placeholder="Masukkan URL Vidio">
                            @error('videoKonten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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

<script>
    function toggleInput() {
        const fotoInput = document.getElementById('fotoInput');
        const videoInput = document.getElementById('videoInput');
        
        if (document.getElementById('flexRadioDefault1').checked) {
            fotoInput.style.display = 'block';
            videoInput.style.display = 'none';
        } else {
            fotoInput.style.display = 'none';
            videoInput.style.display = 'block';
        }
    }
</script>
@endsection