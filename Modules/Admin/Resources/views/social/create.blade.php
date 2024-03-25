@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Create Social</h4>
@endsection
@section('content')
    
<form action="{{route('social.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    <a href="{{route('social.index')}}" class="btn btn-warning text-white mb-2">
        <i class="ti-back-left px-1"></i> Go Back</a>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Info</h4>
        
            @component('admin::components.alerts')
                
            @endcomponent
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control form-control-lg" name="name" placeholder="Username" value="{{old('name')}}" aria-label="Username" autofocus required>
            </div>
            <div class="form-group">
              <label>Icon <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="icon" placeholder="Icon" value="{{old('icon')}}" required>
            </div>
            <div class="form-group">
              <label>Url</label>
              <input type="url" class="form-control form-control-lg" name="url" placeholder="Username" value="{{old('url')}}" required>
            </div>

           
          </div>
        </div>
      </div>

</form>

@endsection
@section('js')

@endsection
