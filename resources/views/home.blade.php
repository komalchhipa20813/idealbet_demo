@extends('layouts.master')
@section('title',"Home")
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home Banner Image</a></li>
   
  </ol>
</nav>
<!-- Uploade Modal -->
<div class="modal fade  bd-example-modal-md" id="image_modal" tabindex="-1" aria-labelledby="title_image_modal" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_image_modal">Uploade Banner Images </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form class="forms-sample homeImage_form" method="POST" id="homeImage_form" >
          @csrf
            <div class="mb-3">
                <label for="image_name" class="form-label">Images</label>
                <input type="file" accept="image/*" value="" name="image" id="filename_home" class="file-styled-primary">
            </div>
            <button class="btn btn-primary submit_home" type="button">Uploade</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- image Modal -->
<div class="modal fade modal fade bd-example-modal-lg" id="previewimage_modal" tabindex="-1" aria-labelledby="title_image_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header previewimage-modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close" style="padding: 0.5rem;
        margin: -0.5rem -0.5rem -0.5rem auto;"></button>
      </div> 
      <div class="modal-body">
      <div class="mb-3 preview-image">
               
      </div>    
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <h6 class="card-title col">Home Banner Images</h6>
          <div class="col-2 ">
                <a  class="btn btn-primary add_images" data-id="{{encryptid('0')}}" style="float: right" id="add_images">Add Images</a>
          </div>
          </div>
            <div class="table-responsive mt-2 home-image">
              <table id="home-banner-image_tbl" class="table" style="width: 98% !important;">
                  <thead>
                      <tr>
                          <th>Sr. No.</th>
                          <th>Image</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('plugin-scripts')
<script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/custome/home/home.js') }}"></script>
@endpush