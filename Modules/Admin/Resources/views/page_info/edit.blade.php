@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Edit Page Info</h4>
@endsection
@section('content')

    <div class="container-fluid mb-3">
        <form action="{{route('page_info.update',$page->id)}}" method="POST" enctype="multipart/form-data">
            <div class="tool-box mb-3">
                <button type="submit" class="btn btn-success">
                <i class="ti-save-alt"></i> Save
            </button>
            </div>
            {{ csrf_field() }}
            @method('PATCH')
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Title <span class="text-danger">*</span></label>
                    <input name="title" type="text" class="form-control" placeholder="enter title" required value="{{$page->title}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Description</label>
                        <textarea name="description" cols="30" rows="5" class="form-control"> {{$page->description}} </textarea>
                        {{-- <input type="text" name="description" value="{{$page->description}}"> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Slug </label>
                    <input name="slug" type="text" class="form-control" placeholder="enter slug" required value="{{$page->slug}}">
                </div>
            </div>
        </div>
       
    </form>
    
       

    </div>
    
    
@endsection
@section('js')
   
@endsection
