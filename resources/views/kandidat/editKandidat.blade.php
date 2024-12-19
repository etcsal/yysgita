@extends('layouts.kandidat.menu')
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
            <div class="row">
                <div class="col-sm-8 d-flex flex-column flex-sm-row align-items-center fs-2">
                    <i class="bi bi-plus-square"></i>
                    <div class="text-container ml-3">
                        <p class="fs-5 fw-bold mb-0">Daftarkan Diri Anda</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
          <div class="card mb-3 p-4" style="max-width: 75%;">
            <form action="{{route('kandidat.updatekandidat',$kandidat->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <!-- Basic Information Fields -->
                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input type="text" class="form-control" id="bulan" name="bulan" value="{{ old('bulan',$kandidat->bulan) }}" required>
                    @error('bulan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="{{ old('tahun',$kandidat->tahun) }}" required>
                    <input type="text" class="form-control" id="tahun" name="user_id" value="{{ auth()->user()->id }}" required hidden>
                    @error('tahun')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="sameAsLogin" name="same_as_login">
                    <label class="form-check-label fw-semibold" for="sameAsLogin">Use my login data</label>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email',$kandidat->email) }}" required disabled>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_kandidat" id="nama_kandidat" value="{{ old('nama_kandidat',$kandidat->nama_kandidat) }}" required>
                    @error('nama_kandidat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="pendidikan" class="form-label">Pendidikan</label>
                    <input type="text" class="form-control" name="pendidikan" id="pendidikan" value="{{ old('pendidikan',$kandidat->pendidikan) }}" required>
                    @error('pendidikan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan',$kandidat->pekerjaan) }}" required>
                    @error('pekerjaan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="tinggiBadan" class="form-label">Tinggi Badan (cm)</label>
                    <input type="text" class="form-control" name="tinggi_badan" id="tinggiBadan" value="{{ old('tinggi_badan',$kandidat->tinggi_badan) }}" required>
                    @error('tinggi_badan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="beratBadan" class="form-label">Berat Badan (kg)</label>
                    <input type="text" class="form-control" name="berat_badan" id="beratBadan" value="{{ old('berat_badan',$kandidat->berat_badan) }}" required>
                    @error('berat_badan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_kandidat" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto_kandidat" id="beratBadan" value="{{ old('foto_kandidat',$kandidat->foto_kanddidat) }}" >
                    @error('foto_kandidat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Knowledge Levels (Bahasa, Kebudayaan, Musik, Sejarah) -->
                <div class="mb-3">
                    <label class="form-label">Penguasaan Bahasa Sunda</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bahasa" id="bahasaKurangPaham" value="Kurang Paham" 
                               {{ old('bahasa', $kandidat->bahasa ?? '') == 'Kurang Paham' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="bahasaKurangPaham">Kurang Paham</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bahasa" id="bahasaPaham" value="Paham" 
                               {{ old('bahasa', $kandidat->bahasa ?? '') == 'Paham' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bahasaPaham">Paham</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bahasa" id="bahasaFasih" value="Fasih" 
                               {{ old('bahasa', $kandidat->bahasa ?? '') == 'Fasih' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bahasaFasih">Fasih</label>
                    </div>
                    @error('bahasa')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
    
                <div class="mb-3">
                    <label class="form-label">Kebudayaan Sunda</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kebudayaan" id="kebudayaanKurangPaham" value="Kurang Paham" {{ old('kebudayaan', $kandidat->kebudayaan ?? '') == 'Kurang Paham' ? 'checked' : '' }} >
                        <label class="form-check-label" for="kebudayaanKurangPaham">Kurang Paham</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kebudayaan" id="kebudayaanPaham" value="Paham" {{ old('kebudayaan', $kandidat->kebudayaan ?? '') == 'Paham' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kebudayaanPaham">Paham</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kebudayaan" id="kebudayaanSangatPaham" value="Sangat Paham" {{ old('kebudayaan', $kandidat->kebudayaan ?? '') == 'Sangat Paham' ? 'checked' : '' }}>
                        <label class="form-check-label" for="kebudayaanSangatPaham">Sangat Paham</label>
                    </div>
                    @error('kebudayaan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Musik Sunda</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="musik" id="musikKurangPaham" value="Kurang Paham" {{ old('musik', $kandidat->musik ?? '') == 'Kurang Paham' ? 'checked' : '' }} >
                        <label class="form-check-label" for="musikKurangPaham">Kurang Paham</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="musik" id="musikPaham" value="Paham" {{ old('musik', $kandidat->musik ?? '') == 'Paham' ? 'checked' : '' }}>
                        <label class="form-check-label" for="musikPaham">Paham</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="musik" id="musikSangatPaham" value="Sangat Paham" {{ old('musik', $kandidat->musik ?? '') == 'Sangat Paham' ? 'checked' : '' }}>
                        <label class="form-check-label" for="musikSangatPaham">Sangat Paham</label>
                    </div>
                    @error('musik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Pengetahuan Sejarah Sunda</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pengetahuan" id="sejarahKurangPaham" value="Kurang Paham" {{ old('pengetahuan', $kandidat->pengetahuan ?? '') == 'Kurang Paham' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sejarahKurangPaham">Kurang Paham</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pengetahuan" id="sejarahPaham" value="Paham" {{ old('pengetahuan', $kandidat->pengetahuan ?? '') == 'Paham' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sejarahPaham">Paham</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pengetahuan" id="sejarahSangatPaham" value="Sangat Paham" {{ old('pengetahuan', $kandidat->pengetahuan ?? '') == 'Sangat Paham' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sejarahSangatPaham">Sangat Paham</label>
                    </div>
                    @error('pengetahuan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
            </form>
          </div>
      </div>
    </div>
</div>

<script>
    // Ensure the checkbox behavior works when toggled
    document.getElementById('sameAsLogin').addEventListener('change', function() {
        const emailField = document.getElementById('email');
        const nameField = document.getElementById('nama_kandidat');
        
        if (this.checked) {
            // Autofill the fields with logged-in user's data
            emailField.value = '{{ auth()->user()->email }}';
            nameField.value = '{{ auth()->user()->name }}';
            
            // Make the fields readonly
            emailField.setAttribute('readonly', true);
            nameField.setAttribute('readonly', true);
        } else {
            // Clear the fields if the checkbox is unchecked
            emailField.value = '';
            nameField.value = '';
            
            // Remove readonly attribute
            emailField.removeAttribute('readonly');
            nameField.removeAttribute('readonly');
        }
    });
</script>
@endsection