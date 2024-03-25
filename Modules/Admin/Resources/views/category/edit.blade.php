@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Company</h4>
@endsection
@section('content')

    <div class="container-fluid mb-3">
        <form action="{{route('category.update',$cat->id)}}" method="POST" enctype="multipart/form-data">
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
                    <input name="name" type="text" class="form-control" placeholder="enter name" required value="{{$cat->name}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Slug</label>
                    <input name="slug" type="text" class="form-control" placeholder="enter slug" value="{{$cat->slug}}">
                </div>
            </div>
        </div>
        
    </form>
    
    </div>
    
@endsection
@section('js')
   
@endsection
