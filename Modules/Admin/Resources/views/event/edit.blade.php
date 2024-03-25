@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Events</h4>
@endsection
@section('content')


    <div class="container-fluid mb-3">
        <form action="{{route('event.update',$event->id)}}" method="POST" enctype="multipart/form-data">
            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            <a href="{{route('event.index')}}" class="btn btn-warning">Cancel</a>
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
                        <img src="{{asset($event->photo)}}" width="150" alt="" id="img">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Title <span class="text-danger">*</span></label>
                   <input type="text" name="title" class="form-control" placeholder="Title" value="{{$event->title}}" required>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Price </label>
                    <input name="price" type="text" class="form-control" placeholder="Price" value="{{$event->price}}">
                   
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Sequence </label>
                    <input name="sequence" type="text" class="form-control" placeholder="enter sequence" required value="{{$event->sequence}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Details </label>
                    <textarea class="form-control form-control-lg" name="detail" placeholder="Details" cols="30" rows="5" >{{$event->detail}}</textarea>    
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
