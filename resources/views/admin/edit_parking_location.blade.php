@extends('layouts.index')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Parking Locations</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $parkingLocation->location}}</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Parking Locations</h5>
                    <hr />
                    @include('layouts.alerts_block')
                    <div class="form-body mt-4">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">

                                    <form action="{{ route('admin.parkinglocations.update', $parkingLocation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="system_code" class="form-label">System Code</label>
                                            <input type="text" class="form-control @error('system_code') is-invalid @enderror" id="system_code" name="system_code" value="{{ $parkingLocation->system_code }}">
                                            @error('system_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ $parkingLocation->location }}">
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="capacity" class="form-label">Capacity</label>
                                            <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" value="{{ $parkingLocation->capacity }}">
                                            @error('capacity')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <button type="submit" class="btn btn-primary">Update Parking Location</button>
                                    </form>



                                </div>
                            </div>



                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!--end page wrapper -->
@endsection
