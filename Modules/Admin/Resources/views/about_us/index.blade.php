@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">About Us Dashboard</h4>
@endsection
@section('content')
    <div class="tool-box mb-3">
        <a href="{{route ('about_us.create')}}" class="btn btn-success btn-oval text-white font-weight-bold">
        <i class="ti-plus"></i> Create
    </a>
    </div>

    <div class="card card-gray">
            @component('admin::components.alerts')
                
            @endcomponent
            @php
            // $i=1;
        $pagex= @$_GET['page'];
        if(!$pagex) $pagex= 1;
        $i = config('app.row') * ($pagex-1) + 1;
       
        @endphp
@foreach ($about_us as $item)
    
     <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">#</b> </label>
                   :  {{$i++}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Photo</b> </label>
                    : <img src="{{asset($item->photo)}}" width="150" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Title</b> </label>
                    : {{$item->title}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Phone</b> </label>
                    : {{$item->phone}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Description 1</b> </label>
                     <div class="px-2">{{$item->description_1}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Description 2</b> </label>
                     <div class="px-2">{{$item->description_2}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Check text 1</b></label>
                    : {{$item->check_text_1}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Check text 2</b></label>
                    : {{$item->check_text_2}}
                </div>
            </div>
        </div>    <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Check text 3</b></label>
                     <div class="px-2">{{$item->check_text_3}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <label class="col-lg-3"><b class="text-decoration-underline">Background</b></label>
            </div>
            <div class="p-2">
                <img src="{{asset($item->background)}}" alt="" width="150" >
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <label class="col-lg-3"><b class="text-decoration-underline">Url</b></label>
                    : {{$item->url}}
                </div>
            </div>
        </div>
       
    </div>  
    <div class="d-flex justify-content-center">
        <a href="{{route('about_us.delete',$item->id)}}" class="btn btn-danger mx-2" onclick="return confirm('Delete this list!')">
            <i class="ti-pencil-alt"></i>Delete</a>
        <a href="{{route('about_us.edit',$item->id)}}" class="btn btn-warning mx-2" >
            <i class="ti-trash"></i> Edit</a>
        
    </div>
    <hr>
    @endforeach
                   
        
       <code class="m-3 ">
        {!! $about_us->withQueryString()->links('pagination::bootstrap-5') !!}
        
       </code>
       

    </div>
    
    
@endsection

