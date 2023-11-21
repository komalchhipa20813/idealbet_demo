@extends('layouts.auth_master')
@section('title',"Login")

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">
 
  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-6 col-xl-4 mx-auto">
      <div class="card">
      
        <div class="row">
          {{-- <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url({{ url('assets/images/login.jpg') }})">

            </div>
          </div> --}}
          <div class="col-md-12 ps-md-0">
          <form method="POST" action="{{ route('login.store') }}">
          @csrf
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2 text-center">IdealBet</a>
             
              @if($errors->any())
                    <div class="alert alert-danger">
                        {{-- <strong>Whoops!</strong> --}}
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
            @else
            <h5 class="text-muted fw-normal mb-4 text-center">Welcome back! Log in to your account.</h5>
             @endif
              <form class="forms-sample">
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email</label>
                  <input type="email"  name="email" class="form-control" id="userEmail" placeholder="Email" required>
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password"  name="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password" required>
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" name="remember" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div>
                <div class="mt-3">
                            <input type="submit" class="btn btn-primary w-100 waves-effect waves-light" value="Log In">
                        </div>
                <a href="{{ route('password.request') }}" class="d-block mt-3 text-muted">Forgot your password?</a>
              </form>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection