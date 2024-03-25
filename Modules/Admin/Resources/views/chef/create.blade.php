@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Create Chefs</h4>
@endsection
@section('content')
    
<form action="{{route('chef.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    <a href="{{route('chef.index')}}" class="btn btn-warning text-white mb-2">
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
              <label>Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="name" placeholder="Name" value="{{old('name')}}" required>
            </div>
            <div class="form-group">
              <label>Position </label>
              <input type="text" class="form-control form-control-lg" name="position" placeholder="Position" value="{{old('position')}}" required>
            </div>
            <div class="form-group">
              <label>Description </label>
              <textarea class="form-control form-control-lg" name="description" cols="30" rows="8" required placeholder="Description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
              <label>URL Twitter </label>
              <input type="url" class="form-control form-control-lg" name="twitter" placeholder="URL Twitter" value="{{old('twitter')}}" >
            </div>
            <div class="form-group">
              <label>URL Facebook </label>
              <input type="url" class="form-control form-control-lg" name="facebook" placeholder="URL Facebook" value="{{old('facebook')}}" >
            </div>
            <div class="form-group">
              <label>URL Instagram </label>
              <input type="url" class="form-control form-control-lg" name="instagram" placeholder="URL Instagram" value="{{old('instagram')}}" >
            </div>
            <div class="form-group">
              <label>URL Linkin </label>
              <input type="url" class="form-control form-control-lg" name="linkin" placeholder="URL Linkin" value="{{old('linkin')}}" >
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
