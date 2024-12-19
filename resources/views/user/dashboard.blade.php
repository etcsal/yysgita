@extends('layouts.user.menu')
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
                <i class="bi bi-person-circle mr-3 mb-1 mb-sm-0" style="font-size: 70px;" ></i>
                  <div class="text-container ">
                      <p class="fs-4 fw-bold mb-0">Profile</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="col-sm-8 d-flex flex-column flex-sm-row align-items-center">
        <i class="bi bi-person-circle mr-3 mb-3 mb-sm-0" style="font-size: 70px;" ></i>
          <div class="text-container ">
              <p class="fs-5 fw-bold mb-0">Alexis</p>
              <p class="fs-6 fw-bold mb-0 badge bg-secondary">google</p>
          </div>
      </div>
    </div>
    <div class="card-body">
      <h5 class="card-title">Alexis</h5>
      <a href="https://instagram/Alexiss_" class="card-link">https://instagram/Alexiss_</a>
    </div>
  </div>
</div>
  

  @endsection