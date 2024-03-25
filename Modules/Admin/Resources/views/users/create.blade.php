@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Create User</h4>
@endsection
@section('content')
    
<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    <a href="{{route('user.index')}}" class="btn btn-warning text-white mb-2">
        <i class="ti-back-left px-1"></i> Go Back</a>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Info</h4>
        
            @component('admin::components.alerts')
                
            @endcomponent
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control form-control-lg" name="name" placeholder="Username" aria-label="Username" autofocus required value="{{old('name')}}">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="email" aria-label="email" required value="{{old('email')}}">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control form-control-lg" name="password" placeholder="password" aria-label="password" required>
            </div>
            <div class="form-group profile_fea">
              <label>profile</label>
              <div class="d-flex justify-content-between">
              <input type="file" class="form-control form-control-lg" id="" name="images" placeholder="profile" accept="image/*" onchange="preview(event)" required>
                <img src="" id="img" alt="" >
            </div>
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
