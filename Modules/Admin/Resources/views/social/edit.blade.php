@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Social</h4>
@endsection
@section('content')


    <div class="container-fluid mb-3">
        <form action="{{route('social.update',$soc->id)}}" method="POST" enctype="multipart/form-data">
            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            <a href="{{route('social.index')}}" class="btn btn-warning">Cancel</a>
            </div>
            {{ csrf_field() }}
            @method('PATCH')
            @component('admin::components.alerts')
                
            @endcomponent
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Name <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control" placeholder="enter name" required value="{{$soc->name}}">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Icon </label>
                    <input name="icon" type="text" class="form-control" placeholder="enter icon" required value="{{$soc->icon}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Url </label>
                    <input name="url" type="url" class="form-control" placeholder="enter url" required value="{{$soc->url}}">
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
