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

                                    <form action="{{ route('admin.parkinglocations.store')}}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <!-- System Code Number -->
                                            <div class="col-md-12">
                                                <label for="inputSystemCode" class="form-label">System Code Number</label>
                                                <input type="text"
                                                    class="form-control @error('system_code') is-invalid @enderror"
                                                    id="inputSystemCode" name="system_code"
                                                    placeholder="Enter System Code Number">
                                                @error('system_code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Parking Location -->
                                            <div class="col-md-12">
                                                <label for="inputLocation" class="form-label">Parking Location</label>
                                                <input type="text"
                                                    class="form-control @error('location') is-invalid @enderror"
                                                    id="inputLocation" name="location" placeholder="Enter Location Name">
                                                @error('location')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Capacity -->
                                            <div class="col-md-12">
                                                <label for="inputCapacity" class="form-label">Capacity</label>
                                                <input type="number"
                                                    class="form-control @error('capacity') is-invalid @enderror"
                                                    id="inputCapacity" name="capacity" placeholder="Enter Capacity">
                                                @error('capacity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <!-- Submit Button -->
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Register Parking
                                                        Location</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>



                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>System Code</th>
                                                        <th>Location</th>
                                                        <th>Capacity</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($parkingLocations as $location)
                                                        <tr>
                                                            <td>{{ $location->system_code }}</td>
                                                            <td>{{ $location->location }}</td>
                                                            <td>{{ $location->capacity }}</td>
                                                            <td>
                                                                <!-- Add action buttons as needed -->
                                                                <a href="{{ route('admin.parkinglocations.edit', $location->id) }}"
                                                                    class="btn btn-primary">Edit</a>
                                                                    <form action="{{ route('admin.parkinglocations.destroy', $location->id) }}" class="delete-form" method="POST" style="display: inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-md btn-outline-danger" title="Delete"><i
                                                                            class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                        
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
                        <!--end row-->
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!--end page wrapper -->
@endsection
