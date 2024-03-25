@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Company</h4>
@endsection
@section('content')


    <div class="container-fluid mb-3">
        <form action="{{route('company.save')}}" method="POST" enctype="multipart/form-data">
            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            </div>
            {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Name <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control" placeholder="enter name" required value="{{$com->name}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Title </label>
                    <input name="title" type="text" class="form-control" placeholder="enter title" required value="{{$com->title}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Address </label>
                    <input name="address" type="text" class="form-control" placeholder="enter address" required value="{{$com->address}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Phone </label>
                    <input name="phone" type="text" class="form-control" placeholder="enter phone" required value="{{$com->phone}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Hours </label>
                    <input name="hours" type="text" class="form-control" placeholder="enter hours" required value="{{$com->hours}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">E-mail </label>
                    <input name="email" type="email" class="form-control" placeholder="enter email" required value="{{$com->email}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group row">
                    <strong class="fs-5">Description</strong>
                    <p class="p-2 fs-6">
                        <textarea name="description" cols="30" rows="5" required>
                            {{$com->description}}
                        </textarea>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <label class="col-lg-3 p-2">Logo</label>
                <input class="form-control" type="file" name="logo" accept="image/*" onchange="preview(event)">
                <img id="img" src="{{asset($com->logo)}}" alt="" width="150">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group row">
                    <strong class="fs-5">Url</strong>
                    <p class="p-2 fs-6">
                        <textarea name="url" placeholder="enter url name" cols="30" rows="4">
                            {{$com->url}}
                        </textarea>
                    </p>
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
