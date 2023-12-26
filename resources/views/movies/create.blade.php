@extends('layout.app')

@section('breadcrumbs', 'HALAMAN MOVIE')

@section('active', 'Movie / Tambah Data')

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
                <a href="{{ url('movies') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            {{-- <div class="card-body">
                <div>
                    <h3 class="text-center"><b>TAMBAH DATA MOVIE</b></h3>
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
                        <form action="{{ url('movies') }}" method="post" novalidate="novalidate"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" name="title" type="text" class="form-control">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description" class=" form-control-label mb-1">Description</label>
                                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="release_date" class="control-label mb-1">Release Date</label>
                                <input id="release_date" name="release_date" type="date" class="form-control">
                                @if ($errors->has('release_date'))
                                    <span class="text-danger">{{ $errors->first('release_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="duration_minutes" class="control-label mb-1">Duration (Minutes)</label>
                                <input id="duration_minutes" name="duration_minutes" type="numer" class="form-control">
                                @if ($errors->has('duration_minutes'))
                                    <span class="text-danger">{{ $errors->first('duration_minutes') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="genre_id" class="control-label mb-1">Genre</label>
                                <select class="form-control" name="genre_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($genres as $gnr)
                                        <option value="{{ $gnr->id_genre }}">{{ $gnr->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Poster</label>
                                <input type="file" id="image" name="image" class="form-control">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
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
