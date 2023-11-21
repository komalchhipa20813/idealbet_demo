@extends('layouts.master')
@section('title',"Home Section")
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
@endpush
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home Sections</a></li>
   
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <h6 class="card-title col">Home Sections</h6>
        </div>

        <form class="forms-sample section_form" method="POST" name="registration" id="sections_form">
          @csrf
          <input type="hidden" name="section_id" class="section_id" id="section_id" value="{{ (!empty($data['sections'])) ? encryptid($data['sections']->id) : encryptid('0')}}">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-12">
                  <label for="branch" class="  control-label">Section - 1 </label>
                  <textarea class="ckeditor form-control" name="section1" id="section1">{{ (!empty($data['sections'])) ? $data['sections']->section1 : ''}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-12">
                  <label for="branch" class="  control-label">Section - 2 </label>
                  <textarea class="ckeditor form-control" name="section2" id="section2">{{ (!empty($data['sections'])) ? $data['sections']->section2 : ''}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-12">
                  <label for="branch" class="  control-label">Section - 3 </label>
                  <textarea class="ckeditor form-control" name="section3" id="section3">{{ (!empty($data['sections'])) ? $data['sections']->section3 : ''}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-12">
                  <label for="branch" class="  control-label">Section - 4 </label>
                  <textarea class="ckeditor form-control" name="section4" id="section4">{{ (!empty($data['sections'])) ? $data['sections']->section4 : ''}}</textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-12">
                  <label for="branch" class="  control-label">Section - 5 </label>
                  <textarea class="ckeditor form-control" name="section5" id="section5">{{ (!empty($data['sections'])) ? $data['sections']->section5 : ''}}</textarea>
              </div>
            </div>
            <div class="" style="padding-top: 10px;">
              <button class="btn btn-primary submit_section" data-type="section1" type="button">Save</button>
            </div>
          </div>
        </form>


        {{-- old --}}
       
       
       
      
    </div>
  </div>
</div>
</div>
@endsection
@push('plugin-scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
@endpush

@push('custom-scripts')

  <script src="{{ asset('assets/js/custome/home/sections.js') }}"></script>
@endpush