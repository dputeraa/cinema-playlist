@extends('layout.app')

@section('breadcrumbs', 'HALAMAN DASHBOARD')

@section('active', 'Dashboard')

@section('content')

    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-server"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $genres->count() }}</span></div>
                                    <div class="stat-heading">Genre</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-5">
                                <i class="pe-7s-server"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $cinemas->count() }}</span>
                                    </div>
                                    <div class="stat-heading">Cinema</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-server"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $movies->count() }}</span>
                                    </div>
                                    <div class="stat-heading">Movie</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-server"></i>
                            </div>

                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $playlists->count() }}</span></div>
                                    <div class="stat-heading">Playlist</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <!-- /#add-category -->
    </div>
    <!-- .animated -->
    <div class="animated fadeIn">
        <div class="row">
            @foreach ($playlists as $playlist)
                @csrf
                <div class="col-md-3">
                    <div class="card">
                        <img src="/images/poster/{{ $playlist->movie->image }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h4 class="card-title mb-3">{{ $playlist->movie->title }}</h4>
                            {{-- <a href="{{ url("dashboard/$playlist->id_playlist") }}" class="btn btn-outline-primary">
                                <i class="fa fa-angle-double-right"></i>&nbsp; Detail
                            </a> --}}
                            {{-- <a href="{{ url("siswa/$siswa->id") }}"><i class="menu-icon fa fa-eye w3-flat-clouds"
                                    data-toggle="tooltip" data-placement="bottom" title="Detail"></i></a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
