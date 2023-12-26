@extends('layout.app')

{{-- @section('breadcrumbs', 'HALAMAN PRODUK')

@section('active', 'Produk / Tambah Data') --}}

@section('content')
    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            <!-- mencetak error message -->
            {{ session()->get('error_message') }}
        </div>
    @endif

    <div class="col-lg-14">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('playlist') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            {{-- <div class="card-body">
                <div>
                    <h3 class="text-center"><b>TAMBAH DATA PRODUK</b></h3>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="col-lg-14">
        <div class="card">
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <form action="{{ url('playlist') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label for="cinema_id" class="control-label mb-1">Cinema</label>
                                <select class="form-control" name="cinema_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($cinemas as $cinema)
                                        <option value="{{ $cinema->id_cinema }}">{{ $cinema->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('cinema_id'))
                                    <span class="text-danger">{{ $errors->first('cinema_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="movie_id" class="control-label mb-1">Movie</label>
                                <select class="form-control" name="movie_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($movies as $movie)
                                        <option value="{{ $movie->id_movie }}">{{ $movie->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('movie_id'))
                                    <span class="text-danger">{{ $errors->first('movie_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Tambah Data</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div> <!-- .card -->

    </div>
    <!--/.col-->
@endsection
