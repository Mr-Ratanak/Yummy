@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Create Munu</h4>
@endsection
@section('content')
    
<form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    <a href="{{route('menu.index')}}" class="btn btn-warning text-white mb-2">
        <i class="ti-back-left px-1"></i> Go Back</a>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Info</h4>
        
            @component('admin::components.alerts')
                
            @endcomponent
            <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control form-control-lg" name="image" placeholder="Image" accept="image/*" value="{{old('image')}}" autofocus onchange="preview(event)">
              <img class="p-2" src="" id="img" width="100" alt="">
            </div>
            <div class="form-group">
              <label>Title <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" value="{{old('title')}}" aria-label="Title" required>
            </div>
            <div class="form-group">
              <label>Description <span class="text-danger">*</span></label>
              <input type="text" class="form-control form-control-lg" name="description" placeholder="Description" value="{{old('description')}}" required>
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" class="form-control form-control-lg" name="price" placeholder="Price" value="{{old('price')}}" required>
            </div>
            <div class="form-group">
              <label>Category <span class="text-danger">*</span></label>
              <select class="form-control form-control-lg" name="category_id" id="" required>
                <option value="" selected disabled>Select One</option>
                @foreach ($fetch_category as $cat)
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Url</label>
              <input type="url" class="form-control form-control-lg" name="url" placeholder="Username" value="{{old('url')}}" >
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
