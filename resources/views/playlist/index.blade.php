@extends('layout.app')

{{-- @section('breadcrumbs', 'HALAMAN GENRE')

@section('active', 'Genre') --}}

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('playlist/create') }}" class="btn btn-outline-success">
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
                                        <th>Cinema</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($playlists as $playlist)
                                        @csrf
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $playlist->movie->title }}</td>
                                            <td>{{ $playlist->cinema->name }}</td>
                                            <td>{{ $playlist->cinema->location }}</td>
                                            <td>
                                                <a href="{{ url("playlist/$playlist->id_playlist/edit") }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fa fa-edit"></i>&nbsp; Edit
                                                </a>

                                                <a href="{{ url("playlist/$playlist->id_playlist/delete") }}"
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
