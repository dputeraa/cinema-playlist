@extends('layout.app')

{{-- @section('breadcrumbs', 'HALAMAN SISWA')

@section('active', 'Siswa / Detail') --}}

@section('content')
    <div class="col-lg-14">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            {{-- <div class="card-body">
                <div>
                    <h3 class="text-center"><b>DETAIL DATA SISWA</b></h3>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" name="title" type="text" class="form-control"
                                    value="{{ $movie->title }}">
                                @if ($errors->has('title'))
                                    <span class=" text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description" class=" form-control-label mb-1">Description</label>
                                <textarea name="description" id="description" rows="3" class="form-control">{{ $movie->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="release_date" class="control-label mb-1">Release Date</label>
                                <input id="release_date" name="release_date" type="date" class="form-control"
                                    value="{{ $movie->release_date }}">
                                @if ($errors->has('release_date'))
                                    <span class="text-danger">{{ $errors->first('release_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="duration_minutes" class="control-label mb-1">Duration (Minutes)</label>
                                <input id="duration_minutes" name="duration_minutes" type="number" class="form-control"
                                    value="{{ $movie->duration_minutes }}">
                                @if ($errors->has('duration_minutes'))
                                    <span class="text-danger">{{ $errors->first('duration_minutes') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="genre_id" class="control-label mb-1">Genre</label>
                                <select class="form-control" name="genre_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($genre as $gnr)
                                        <option value="{{ $gnr->id_genre }}"
                                            {{ $gnr->id_genre == $movie->genre_id ? 'selected' : '' }}>
                                            {{ $gnr->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('genre_id'))
                                    <span class="text-danger">{{ $errors->first('genre_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Poster</label>
                                <input type="file" id="image" name="image" class="form-control">
                                <img src="/images/poster/{{ $movie->image }}" width="300px">
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div>
        <!--/.col-->

        {{-- <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email" class="control-label mb-1">Email</label>
                                <input id="email" name="email" type="email" class="form-control"
                                    value="{{ $siswa->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="control-label mb-1">Alamat</label>
                                <input id="alamat" name="alamat" type="text" class="form-control"
                                    value="{{ $siswa->alamat }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon" class="control-label mb-1">No Telepon</label>
                                <input id="no_telepon" name="no_telepon" type="text" class="form-control"
                                    value="{{ $siswa->no_telepon }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="control-label mb-1">Jenis Kelamin</label>
                                <div class="col col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="inlineRadio1" disabled value="Laki-laki"
                                            {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="inlineRadio2" disabled value="Perempuan"
                                            {{ $siswa->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="agama" class="control-label mb-1">Agama</label>
                                <input id="agama" name="agama" type="text" class="form-control"
                                    value="{{ $siswa->agama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tahun_masuk" class="control-label mb-1">Tahun Masuk</label>
                                <input id="tahun_masuk" name="tahun_masuk" type="text" class="form-control"
                                    value="{{ $siswa->tahun_masuk }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label mb-1">Password</label>
                                <input id="password" name="password" type="password" class="form-control"
                                    value="{{ $siswa->password }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .card -->
        </div> --}}
    </div>
@endsection
