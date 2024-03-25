@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Create About Us</h4>
@endsection
@section('content')
    
<form action="{{route('about_us.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    <a href="{{route('about_us.index')}}" class="btn btn-warning text-white mb-2">
        <i class="ti-back-left px-1"></i> Go Back</a>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Info</h4>
        
            @component('admin::components.alerts')
                
            @endcomponent
            <div class="form-group">
              <label>Photo</label>
              <input type="file" class="form-control form-control-lg" accept="image/*" name="photo" aria-label="photo" required>
            </div>
            <div class="form-group">
              <label>Title <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" value="{{old('title')}}" required>
            </div>
            <div class="form-group">
              <label>Phone <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="phone" placeholder="Phone" value="{{old('phone')}}" required>
            </div>
            <div class="form-group">
              <label>Description 1 <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="description_1" placeholder="Description 1" value="{{old('description_1')}}" required>
            </div>
            <div class="form-group">
              <label>Description 2 <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="description_2" placeholder="Description 2" value="{{old('description_2')}}" required>
            </div>
            <div class="form-group">
              <label>Check text 1 <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="check_text_1" placeholder="Check text 1" value="{{old('check_text_1')}}" required>
            </div>
            <div class="form-group">
              <label>Check text 2 <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="check_text_2" placeholder="Check text 2" value="{{old('check_text_2')}}" required>
            </div>
            <div class="form-group">
              <label>Check text 3 <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="check_text_3" placeholder="Check text 3" value="{{old('check_text_3')}}" required>
            </div>
            <div class="form-group">
              <label>Background</label>
              <input type="file" class="form-control form-control-lg" accept="image/*" name="background" aria-label="background" required>
            </div>
            <div class="form-group">
              <label>Url</label>
              <input type="url" class="form-control form-control-lg" name="url" placeholder="Url" value="{{old('url')}}" required>
            </div>

           
          </div>
        </div>
      </div>

</form>

@endsection
@section('js')

@endsection
