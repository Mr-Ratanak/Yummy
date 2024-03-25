@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Features</h4>
@endsection
@section('content')


    <div class="container-fluid mb-3">
        <form action="{{route('feature.update',$fetch_feature->id)}}" method="POST" enctype="multipart/form-data">
            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            <a href="{{route('feature.index')}}" class="btn btn-warning">Cancel</a>
            </div>
            {{ csrf_field() }}
            @method('PATCH')
            @component('admin::components.alerts')
                
            @endcomponent
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Icon <span class="text-danger">*</span></label>
                    <input name="icon" type="text" class="form-control" required placeholder="Icon" required value="{{$fetch_feature->icon}}">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Title </label>
                    <input name="title" type="text" class="form-control" placeholder="enter title" required value="{{$fetch_feature->title}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Description </label>
                    <input name="description" type="text" class="form-control" placeholder="enter description" value="{{$fetch_feature->description}}" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Url </label>
                    <input name="url" type="url" class="form-control" placeholder="enter url" value="{{$fetch_feature->url}}" >
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
