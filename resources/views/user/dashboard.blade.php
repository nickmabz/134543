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
                            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Smart Parking Prediction</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Parking Prediction</h5>
                    <hr />
                    @include('layouts.alerts_block')
                    <div class="form-body mt-4">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">

                                    <form action="{{ route('predict.parking') }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <!-- Parking Location -->
                                            <div class="col-md-12">
                                                <label for="inputLocation" class="form-label">Parking Location</label>
                                                <select class="form-select @error('location') is-invalid @enderror"
                                                    id="inputLocation" name="location">
                                                    <option value="">-- Select Parking Location --</option>
                                                    <option value="BHMBCCMKT01">Holy Family Basilica</option>
                                                    <!-- Add other parking locations here -->
                                                </select>
                                                @error('location')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Date -->
                                            <div class="col-md-12">
                                                <label for="inputDate" class="form-label">Date</label>
                                                <input type="date"
                                                    class="form-control @error('date') is-invalid @enderror" id="inputDate"
                                                    name="date">
                                                @error('date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Time -->
                                            <div class="col-md-12">
                                                <label for="inputTime" class="form-label">Time</label>
                                                <input type="time"
                                                    class="form-control @error('time') is-invalid @enderror" id="inputTime"
                                                    name="time">
                                                @error('time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Get Prediction</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>



                                </div>
                            </div>

                            <div class="col-lg-8">

                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Location</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Predicted Occupancy</th>
                                                        <th>Percentage Occupancy</th>
                                                        <th>Remaining Spaces</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($userPredictions as $prediction)
                                                    <tr>
                                                        <td>{{ $prediction->location }}</td>
                                                        <td>{{ $prediction->date->format('Y-m-d') }}</td>
                                                        <td>{{ $prediction->time->format('H:i') }}</td>
                                                        <td>{{ $prediction->predicted_occupancy }}</td>
                                                        <td>{{ $prediction->percentage_occupancy }}%</td>
                                                        <td>{{ $prediction->remaining_spaces }}</td>
                                                        <td>
                                                            
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
