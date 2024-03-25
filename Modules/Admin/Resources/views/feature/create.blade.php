@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Create Features</h4>
@endsection
@section('content')
    
<form action="{{route('feature.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    <a href="{{route('feature.index')}}" class="btn btn-warning text-white mb-2">
        <i class="ti-back-left px-1"></i> Go Back</a>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Info</h4>
        
            @component('admin::components.alerts')
                
            @endcomponent
            <div class="form-group">
              <label>Icon</label>
              <input type="text" class="form-control form-control-lg" name="icon" aria-label="icon">
            </div>
            <div class="form-group">
              <label>Title <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" value="{{old('title')}}" required>
            </div>
            <div class="form-group">
              <label>Description </label>
              <textarea title="description" class="form-control form-control-lg" name="description" placeholder="Description" required cols="30" rows="5">{{old('description')}}</textarea>
              
            </div>
            <div class="form-group">
              <label>Url</label>
              <input type="url" class="form-control form-control-lg" name="url" placeholder="Url" value="{{old('url')}}">
            </div>

           
          </div>
        </div>
      </div>

</form>

@endsection
@section('js')

@endsection
