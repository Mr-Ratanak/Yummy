@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit About Us</h4>
@endsection
@section('content')


    <div class="container-fluid mb-3">
        <form action="{{route('about_us.update',$about->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <button class="btn btn-primary text-white mb-2">
                <i class="ti-save text-white px-2"></i>Save
            </button>
            <a href="{{route('about_us.index')}}" class="btn btn-warning text-white mb-2">
                <i class="ti-back-left px-1"></i> Go Back</a>
        
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Info</h4>
                
                    @component('admin::components.alerts')
                        
                    @endcomponent
                    <div class="form-group">
                      <label>Photo</label>
                        <input type="file" class="form-control form-control-lg" onchange="preview(event)" accept="image/*" name="photo" required>
                        <img id="img" src="{{asset($about->photo)}}" width="150" alt="">
                    </div>
                    <div class="form-group">
                      <label>Title <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" value="{{$about->title}}" required>
                    </div>
                    <div class="form-group">
                      <label>Phone <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" name="phone" placeholder="Phone" value="{{$about->phone}}" required>
                    </div>
                    <div class="form-group">
                      <label>Description 1 <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" name="description_1" placeholder="Description 1" value="{{$about->description_1}}" required>
                    </div>
                    <div class="form-group">
                      <label>Description 2 <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" name="description_2" placeholder="Description 2" value="{{$about->description_2}}" required>
                    </div>
                    <div class="form-group">
                      <label>Check text 1 <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" name="check_text_1" placeholder="Check text 1" value="{{$about->check_text_1}}" required>
                    </div>
                    <div class="form-group">
                      <label>Check text 2 <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" name="check_text_2" placeholder="Check text 2" value="{{$about->check_text_2}}" required>
                    </div>
                    <div class="form-group">
                      <label>Check text 3 <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" name="check_text_3" placeholder="Check text 3" value="{{$about->check_text_3}}" required>
                    </div>
                    <div class="form-group">
                      <label>Background</label>
                      <input type="file" class="form-control form-control-lg" onchange="last_preview(event)" accept="image/*" name="background">
                      <img id="background" src="{{$about->background}}" width="150" alt="">
                    </div>
                    <div class="form-group">
                      <label>Url</label>
                      <input type="url" class="form-control form-control-lg" name="url" placeholder="Url" value="{{$about->url}}" required>
                    </div>
                          
                  </div>
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
        function last_preview(evt){
          let background = document.getElementById('background');
          background.src = URL.createObjectURL(evt.target.files[0]);
        }

    </script>
@endsection
