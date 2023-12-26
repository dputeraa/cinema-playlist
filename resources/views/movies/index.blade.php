@extends('layout.app')

{{-- @section('breadcrumbs', 'HALAMAN MOVIE')

@section('active', 'Movie') --}}

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('movies/create') }}" class="btn btn-outline-success">
                            <i class="menu-icon fa fa-plus"></i> <strong class="card-title">Add Data</strong>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (Session::has('warning'))
                                <div class="alert alert-warning">
                                    {{ Session::get('warning') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('success_add'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success_add') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('success_update'))
                                <div class="alert alert-success">
                                    {{ session('success_update') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('success_destroy'))
                                <div class="alert alert-danger">
                                    {{ session('success_destroy') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table id="bootstrap-data-table" class="table table-bordered table-hover text-left">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Release Date</th>
                                        <th>Duration (Minutes)</th>
                                        <th>Genre</th>
                                        <th>Poster</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movies as $movie)
                                        @csrf
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $movie->title }}</td>
                                            <td>{{ $movie->description }}</td>
                                            <td>{{ $movie->release_date }}</td>
                                            <td>{{ $movie->duration_minutes }}</td>
                                            <td>{{ $movie->genre->name }}</td>
                                            <td><img src="/images/poster/{{ $movie->image }}" width="100px"></td>
                                            {{-- <td>
                                                <form action="{{ route('movies.destroy', $movie->id_movie) }}"
                                                    method="POST">
                                                    <a class="btn btn-primary"
                                                        href="{{ route('movies.edit', $movie->id_movie) }}">Edit</a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td> --}}
                                            <td>
                                                <a href="{{ url("movies/$movie->id_movie/edit") }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fa fa-edit"></i>&nbsp; Edit
                                                </a>

                                                <a href="{{ url("movies/$movie->id_movie/delete") }}"
                                                    class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                    <i class="fa fa-trash"></i>&nbsp; Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
