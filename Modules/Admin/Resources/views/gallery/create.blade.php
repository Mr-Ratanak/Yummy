@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Create Gallery</h4>
@endsection
@section('content')
    
<form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    <a href="{{route('gallery.index')}}" class="btn btn-warning text-white mb-2">
        <i class="ti-back-left px-1"></i> Go Back</a>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Info</h4>
        
            @component('admin::components.alerts')
                
            @endcomponent
            <div class="form-group">
              <label>Photo</label>
              <input type="file" class="form-control form-control-lg" accept="image/*" name="photo" aria-label="photo" onchange="preview(event)">
              <img src="" id="img" width="150" alt="">
            </div>
            <div class="form-group">
              <label>Sequences <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="sequence" placeholder="Secquence" value="{{old('secquence')}}" required>
            </div>
            <div class="form-group">
              <label>Url</label>
              <input type="url" class="form-control form-control-lg" name="url" placeholder="Url" value="{{old('url')}}" >
            </div>

           
          </div>
        </div>
      </div>

</form>

@endsection
@section('js')
  <script>
    function preview(evt){
      let img =  document.getElementById('img');
      img.src = URL.createObjectURL(evt.target.files[0]);
    }
  </script>
@endsection
