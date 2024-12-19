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
                <div class="row">
                    <div class="col-sm-8 d-flex flex-column flex-sm-row align-items-center">
                        <i class="bi bi-list-task mr-2" style="font-size: 40px;"></i>
                        <div class="text-container ">
                            <p class="fs-5 fw-bold mb-0">Manajemen Galeri</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-center mt-3">
                <div class="d-flex align-items-center">
                    <ul class="nav nav-pills border p-3 rounded me-2">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#semua" onclick="showContent('semua')">Semua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#gambar" onclick="showContent('gambar')">Gambar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#video" onclick="showContent('video')">Video</a>
                        </li>
                    </ul>
                    <a href="{{route('admin.addGaleri')}}" class="btn btn-primary rounded-lg">
                        <i class="bi bi-plus-circle me-2"></i>Tambah
                    </a>
                </div>
            </div>

            <div class="tab-content text-center mt-2">
                <div class="tab-pane active" id="semua">
                    <div class="content">
                        @foreach($galeri as $item)
                            <div class="card p-2 galeri-item {{ $item->kategoriGaleri === 'Foto' ? 'gambar' : 'video' }}" style="width: 18rem;">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <p class="card-tittle fs-6">{{$item->judulGaleri}}</p>
                                    <div class="dropdown">
                                        <button class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('admin.editGaleri', $item->id) }}"><i class="bi bi-pencil-square mr-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="/admin/deleteGaleri/{{$item->id}}"  data-confirm-delete="true"><i class="bi bi-trash3 mr-2"></i>Hapus</a></li>
                                        </ul>
                                    </div>
                                </div>
                                @if($item->kategoriGaleri === 'Foto')
                                    <img src="{{ asset('storage/' . $item->fotoVidio) }}" class="card-img-top" alt="Gambar {{ $loop->index + 1 }}">
                                @else
                                    @php
                                        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $item->videoKonten, $matches);
                                        $videoId = $matches[1] ?? null;
                                    @endphp
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal{{ $item->id }}">
                                        @if($videoId)
                                            <img src="https://img.youtube.com/vi/{{ $videoId }}/0.jpg" class="card-img-top" alt="Video {{ $loop->index + 1 }}" style="cursor: pointer;">
                                        @else
                                            <img src="{{ url('image/img11.jpeg') }}" class="card-img-top" alt="Video {{ $loop->index + 1 }}" style="cursor: pointer;">
                                        @endif
                                    </a>
                                @endif
                            </div>
                            <!-- Video Modal -->
                            <div class="modal fade" id="videoModal{{ $item->id }}" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="videoModalLabel">Video</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if(!empty($item->videoKonten))
                                                @if($videoId)
                                                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$videoId}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                @else
                                                    <p>Video tidak tersedia.</p>
                                                @endif
                                            @else
                                                <p>Video tidak tersedia.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane" id="gambar">
                    <div class="content">
                        @foreach($galeri as $item)
                            @if($item->kategoriGaleri === 'Foto')
                                <div class="card p-2" style="width: 18rem;">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <p class="card-tittle fs-6">{{$item->judulGaleri}}</p>
                                        <div class="dropdown">
                                            <button class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('admin.editGaleri', $item->id) }}"><i class="bi bi-pencil-square mr-2"></i>Edit</a></li>
                                                <li><a class="dropdown-item" href="/admin/deleteGaleri/{{$item->id}}"  data-confirm-delete="true"><i class="bi bi-trash3 mr-2"></i>Hapus</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <img src="{{ asset('storage/' . $item->fotoVidio) }}" class="card-img-top" alt="Gambar {{ $loop->index + 1 }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane" id="video">
                    <div class="content">
                        @foreach($galeri as $item)
                            @if($item->kategoriGaleri === 'Video')
                                <div class="card p-2" style="width: 18rem;">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <p class="card-tittle fs-6">{{$item->judulGaleri}}</p>
                                        <div class="dropdown">
                                            <button class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('admin.editGaleri', $item->id) }}"><i class="bi bi-pencil-square mr-2"></i>Edit</a></li>
                                                <li><a class="dropdown-item" href="/admin/deleteGaleri/{{$item->id}}"  data-confirm-delete="true"><i class="bi bi-trash3 mr-2"></i>Hapus</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    @php
                                        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $item->videoKonten, $matches);
                                        $videoId = $matches[1] ?? null;
                                    @endphp
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal2{{ $item->id }}">
                                        @if($videoId)
                                            <img src="https://img.youtube.com/vi/{{ $videoId }}/0.jpg" class="card-img-top" alt="Video {{ $loop->index + 1 }}" style="cursor: pointer;">
                                        @else
                                            <img src="{{ url('image/img11.jpeg') }}" class="card-img-top" alt="Video {{ $loop->index + 1 }}" style="cursor: pointer;">
                                        @endif
                                    </a>
                                </div>
                                <!-- Video Modal -->
                                <div class="modal fade" id="videoModal2{{ $item->id }}" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="videoModalLabel">Video</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if(!empty($item->videoKonten))
                                                    @if($videoId)
                                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$videoId}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                    @else
                                                        <p>Video tidak tersedia.</p>
                                                    @endif
                                                @else
                                                    <p>Video tidak tersedia.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <script>
                function showContent(tab) {
                    // Hide all tab contents
                    document.querySelectorAll('.tab-pane').forEach((pane) => {
                        pane.classList.remove('active');
                    });

                    // Show selected tab content
                    document.querySelector('#' + tab).classList.add('active');
                }
            </script>
        </div>
    </div>
@endsection
