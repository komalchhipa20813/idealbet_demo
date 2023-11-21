@extends('layouts.auth_master')
@section('title',"Reset Password")

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
          <form method="POST" action="{{ route('password.store') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2 text-center">IdealBet</a>
              <h5 class="text-muted fw-normal mb-4 text-center">Reset Password</h5>
              @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
             @endif
              <form class="forms-sample">
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email</label>
                  <input type="email"  name="email" value="{{$request->email}}" class="form-control" id="userEmail"  required autofocus autocomplete="username">
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password"  name="password" class="form-control" autocomplete="current-password" required autocomplete="new-password" >
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Confirm Password</label>
                    <input type="password"  name="password_confirmation" class="form-control" autocomplete="current-password" required autocomplete="new-password" >
                  </div>
               
                <div class="mt-3">
                            <input type="submit" class="btn btn-primary w-100 waves-effect waves-light" value="Reset Password">
                        </div>
                <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Back to Login</a>
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