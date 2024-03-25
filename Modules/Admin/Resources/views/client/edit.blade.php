@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Clients</h4>
@endsection
@section('content')

    <div class="container-fluid mb-3">
        <form action="{{route('client.update',$client->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')

            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            </div>
            @component('admin::components.alerts')
                
            @endcomponent
           
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Name <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control" placeholder="enter name" required value="{{$client->name}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Description <span class="text-danger">*</span></label>
                    <input name="description" type="text" class="form-control" placeholder="enter description" value="{{$client->description}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Position <span class="text-danger">*</span></label>
                    <input name="position" type="text" class="form-control" placeholder="enter position" required value="{{$client->position}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Sequence <span class="text-danger">*</span></label>
                    <input name="sequence" type="text" class="form-control" placeholder="enter sequence" required value="{{$client->sequence}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Profile <span class="text-danger">*</span></label>
                    <input onchange="preview(event)" name="profile" type="file" class="form-control" placeholder="enter profile" accept="image*/">
                    <img src="{{asset($client->profile)}}" id="img" alt="">
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
