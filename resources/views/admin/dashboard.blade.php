@extends('layouts.index')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">


            <div class="row row-cols-1 row-cols-xl-2">
                <div class="col-md-6">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Occupancy Rates</h6><hr>
                                </div>

                            </div>
                            <img src="{{ asset('assets/images/figures/occupancy_boxplot.png') }}" height="450px;" alt="user avatar">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Occupancy Rates By Hour of The Day</h6><hr>
                                </div>

                            </div>
                            <img src="{{ asset('assets/images/figures/occupancy_by_hour.png') }}" height="450px;" alt="user avatar">
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Occupancy Time Series</h6><hr>
                                </div>

                            </div>
                            <img src="{{ asset('assets/images/figures/occupancy_time_series.png') }}" height="450px;" alt="user avatar">
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->






        </div>
    </div>
    <!--end page wrapper -->
@endsection
