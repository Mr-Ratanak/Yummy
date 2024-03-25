@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Chefs</h4>
@endsection
@section('content')


    <div class="container-fluid mb-3">
        <form action="{{route('chef.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            <a href="{{route('chef.index')}}" class="btn btn-warning">Cancel</a>
            </div>
            {{ csrf_field() }}
            @method('PATCH')
            @component('admin::components.alerts')
                
            @endcomponent
       <div class="card-body">
       
        <div class="form-group col-sm-7">
            <input type="file" class="form-control form-control-lg" accept="image/*" name="photo" aria-label="photo" onchange="preview(event)">
            <img src="{{asset($edit->photo)}}" id="img" width="150" alt="">
          </div>

          <div class="form-group col-sm-7">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-lg" name="name" placeholder="Name" value="{{$edit->name}}" required>
          </div>
          <div class="form-group col-sm-7">
            <label>Position </label>
            <input type="text" class="form-control form-control-lg" name="position" placeholder="Position" value="{{$edit->position}}" required>
          </div>
          <div class="form-group col-sm-7">
            <label>Description </label>
            <textarea class="form-control form-control-lg" name="description" cols="30" rows="8" required placeholder="Description">{{$edit->description}}</textarea>
          </div>
          <div class="form-group col-sm-7">
            <label>URL Twitter </label>
            <input type="url" class="form-control form-control-lg" name="twitter" placeholder="URL Twitter" value="{{$edit->twitter}}" >
          </div>
          <div class="form-group col-sm-7">
            <label>URL Facebook </label>
            <input type="url" class="form-control form-control-lg" name="facebook" placeholder="URL Facebook" value="{{$edit->facebook}}" >
          </div>
          <div class="form-group col-sm-7">
            <label>URL Instagram </label>
            <input type="url" class="form-control form-control-lg" name="instagram" placeholder="URL Instagram" value="{{$edit->instagram}}" >
          </div>
          <div class="form-group col-sm-7">
            <label>URL Linkin </label>
            <input type="url" class="form-control form-control-lg" name="linkin" placeholder="URL Linkin" value="{{$edit->linkin}}" >
          </div>
       </div>
       
        
      
       
    </form>
    
       

    </div>
    
    
@endsection
@section('js')
    <script>
        function preview(evt){
            let img = document.getElementById('img');
            img.src = URL.createObjectURL(evt.target.files[0]);
        }
    </script>
@endsection
