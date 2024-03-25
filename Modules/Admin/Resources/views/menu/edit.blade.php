@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Menu</h4>
@endsection
@section('content')

    <div class="container-fluid mb-3">
        <form action="{{route('menu.update',$fetch->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')

            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            <a href="{{route('menu.index')}}" class="btn btn-warning text-white">
                <i class="ti-back-left px-1"></i> Go Back</a>
            </div>
            @component('admin::components.alerts')
                
            @endcomponent
           
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Image <span class="text-danger">*</span></label>
                    <input name="image" type="file" class="form-control" accept="image/*" onchange="preview(event)">
                    <img src="{{asset($fetch->image)}}" id="img" width="150" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Title <span class="text-danger">*</span></label>
                    <input name="title" type="text" class="form-control" placeholder="enter title" required value="{{$fetch->title}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Description</label>
                    <input name="description" type="text" class="form-control" placeholder="enter description" required value="{{$fetch->description}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Price <span class="text-danger">*</span></label>
                    <input name="price" type="text" class="form-control" placeholder="enter price" required value="{{$fetch->price}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label for="category">Category <span class="text-danger">*</span></label>
                   <select name="category_id" class="form-control fw-bold text-primary" id="category">
                        <option value="" selected disabled>Select One</option>
                        @foreach ($cat as $cats)
                            <option value="{{$cats->id}}" {{$cats->id == $fetch->category_id?'selected':''}}>{{$cats->name}}</option>
                        @endforeach
                   </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Url</label>
                    <input name="url" type="url" class="form-control" placeholder="enter url" value="{{$fetch->url}}">
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
   </script>
@endsection
