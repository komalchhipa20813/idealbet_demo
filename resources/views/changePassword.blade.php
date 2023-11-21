@extends('layouts.master')
@section('title',"Home")

@section('content')
{{-- <nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Change Password</a></li>
   
  </ol>
</nav> --}}
<div class="row">
    <div class="col-md-3 ">
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h6 class="card-title col">Cahnge Password</h6>
                </div>
            
                <form class="forms-sample changePassword_form" method="POST" id="changePassword_form" >
                @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">Old password</label>
                            <input type="password" class="form-control" name='oldpassword' id="oldpassword" placeholder="Old Password">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name='password' id="password"  placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name='confirmpassword' id="confirmpassword" placeholder="Confirm Password">
                        </div>
                        <div class="">
                            <button class="btn btn-primary submit_cahngePassword" type="button">Save</button>
                        </div>
                    <div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 ">
    </div>
</div>

@endsection
@push('plugin-scripts')
<script src="{{ asset('assets/js/jquery.validate.min.js')}}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/custome/changePassword/change-password.js') }}"></script>
@endpush