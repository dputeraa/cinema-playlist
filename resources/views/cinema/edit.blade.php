@extends('layout.app')

{{-- @section('breadcrumbs', 'HALAMAN CINEMA')

@section('active', 'Cinema / Edit Data') --}}

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
                <a href="{{ url('cinema') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            {{-- <div class="card-body">
                <div>
                    <h3 class="text-center"><b>EDIT DATA CINEMA</b></h3>
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
                        <form action="{{ url("cinema/$cinema->id_cinema") }}" method="post" novalidate="novalidate">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Cinema</label>
                                <input id="name" name="name" type="text" class="form-control"
                                    value="{{ $cinema->name }}">
                                @if ($errors->has('name'))
                                    <span class=" text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="location" class="control-label mb-1">Location</label>
                                <input id="location" name="location" type="text" class="form-control"
                                    value="{{ $cinema->location }}">
                                @if ($errors->has('location'))
                                    <span class=" text-danger">{{ $errors->first('location') }}</span>
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
