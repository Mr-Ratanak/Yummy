@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Gallery</h4>
@endsection
@section('content')


    <div class="container-fluid mb-3">
        <form action="{{route('gallery.update',$gallery->id)}}" method="POST" enctype="multipart/form-data">
            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            <a href="{{route('gallery.index')}}" class="btn btn-warning">Cancel</a>
            </div>
            {{ csrf_field() }}
            @method('PATCH')
            @component('admin::components.alerts')
                
            @endcomponent
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Photo <span class="text-danger">*</span></label>
                    <input name="photo" type="file" class="form-control" onchange="preview(event)">
                    <div class="m-2">
                        <img src="{{asset($gallery->photo)}}" width="150" alt="" id="img">
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Sequence </label>
                    <input name="sequence" type="text" class="form-control" placeholder="enter sequence" required value="{{$gallery->sequence}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Url </label>
                    <input name="url" type="url" class="form-control" placeholder="enter url" value="{{$gallery->url}}" >
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
