@extends('layouts.auth')

@section('content')
    <header class="login-header shadow">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/images/logo-img.png" width="140" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false"
                    aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
               
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-center justify-content-center my-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Sign In</h3>
                                    <p>Don't have an account? <a href="{{ route('account.register')}}">Sign
                                            Up here</a>
                                    </p>
                                </div>


                                <div class="form-body">
                                    <form class="row g-3" action="{{ route('login.user') }}" method="POST">

                                        @include('layouts.alerts_block')

                                        @csrf

                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                id="inputEmailAddress" name="email" value="{{ old('email') }}"
                                                placeholder="example@user.com">
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password"
                                                    class="form-control border-end-0{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    id="inputChoosePassword" name="password" placeholder="Enter Password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>
                                            </div>
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                        </div>


                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class='bx bx-user'></i>Sign In</button>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('account.forgotPassword')}}">Forgot Password? Click here</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection()
