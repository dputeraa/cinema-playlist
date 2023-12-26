@extends('layout.app')

{{-- @section('breadcrumbs', 'HALAMAN PRODUK')

@section('active', 'Produk / Edit Data') --}}

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
                <a href="{{ url('produk') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            {{-- <div class="card-body">
                <div>
                    <h3 class="text-center"><b>EDIT DATA PRODUK</b></h3>
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
                        <form action="{{ url("playlist/$playlist->id_playlist") }}" method="post" novalidate="novalidate">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="cinema_id" class="control-label mb-1">Cinema</label>
                                <select class="form-control" name="cinema_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($cinema as $cnm)
                                        {{-- <option value="{{ $cnm->id_cinema }}">{{ $cnm->name }}</option> --}}
                                        <option value="{{ $cnm->id_cinema }}"
                                            {{ $cnm->id_cinema == $playlist->cinema_id ? 'selected' : '' }}>
                                            {{ $cnm->name }}
                                        </option>
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
                                    @foreach ($movie as $mov)
                                        {{-- <option value="{{ $mov->id_movie }}">{{ $mov->title }}</option> --}}
                                        <option value="{{ $mov->id_movie }}"
                                            {{ $mov->id_movie == $playlist->movie_id ? 'selected' : '' }}>
                                            {{ $mov->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('movie_id'))
                                    <span class="text-danger">{{ $errors->first('movie_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Save</span>
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
