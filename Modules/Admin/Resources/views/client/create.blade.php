@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Create Clients</h4>
@endsection
@section('content')
    
<form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    <a href="{{route('client.index')}}" class="btn btn-warning text-white mb-2">
        <i class="ti-back-left px-1"></i> Go Back</a>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Info</h4>
        
            @component('admin::components.alerts')
                
            @endcomponent
            <div class="form-group">
              <label>Profile</label>
              <input type="file" class="form-control form-control-lg" name="profile" placeholder="profile" required onchange="preview(event)" accept="image/*">
              <img src="" id="img" alt="">
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control form-control-lg" name="name" placeholder="Username" aria-label="Username" autofocus required value="{{old('name')}}">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" class="form-control form-control-lg" name="description" placeholder="Description" aria-label="Description" value="{{old('description')}}">
            </div>
            <div class="form-group">
              <label>Position</label>
              <input type="text" class="form-control form-control-lg" name="position" placeholder="Position" aria-label="Position" value="{{old('position')}}" required>
            </div>
            <div class="form-group">
              <label>Sequence</label>
              <input type="text" class="form-control form-control-lg" name="sequence" placeholder="Sequence" aria-label="Sequence" value="{{old('sequence')}}" required>
            </div>
           
          </div>
        </div>
      </div>

      

</form>

@endsection
@section('js')
<script>
  function preview(evt){
      let img = document.getElementById('img');
      img.src = URL.createObjectURL(evt.target.files[0]);
  }
</script>
@endsection
