@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Chefs Dashboard</h4>
@endsection
@section('content')
    <div class="tool-box mb-3">
        <a href="{{route ('chef.create')}}" class="btn btn-success btn-oval text-white font-weight-bold">
        <i class="ti-plus"></i> Create
    </a>
    </div>
    {{-- <table class="table table-border table-striped table-hover ">
        @component('admin::components.alerts')
            
        @endcomponent
        <thead>
            <tr class="text-center">
                <th>#</th>              
                <th>Photo</th>
                <th>Name</th>
                <th>Position</th>
                <th>Description</th>
                <th>Url-Twitter</th>
                <th>Url-Facebook</th>
                <th>Url-Instagram</th>
                <th>Url-Linkin</th>
                <th>Action</th>
            </tr>
        
            
          
        </thead>
        <tbody>
            @php
                // $i=1;
            $pagex= @$_GET['page'];
            if(!$pagex) $pagex= 1;
            $i = config('app.row') * ($pagex-1) + 1;
           
            @endphp
          
            @foreach ($chef as $chefs)
                <tr class="text-center">
                    <td>{{$i++}}</td>
                    <td><img src="{{asset($chefs->photo)}}" width="150" alt=""></td>
                    <td>{{$chefs->name}}</td>
                    <td>{{$chefs->position}}</td>
                    
                    <td class="text-danger fw-bold">Description is hidden</td>
                    <td>{{$chefs->twitter}}</td>
                    <td>{{$chefs->facebook}}</td>
                    <td>{{$chefs->instagram}}</td>
                    <td>{{$chefs->linkin}}</td>
                   
                    <td class="d-flex justify-content-center">
                        <a href="{{route('chef.delete',$chefs->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Delete this !!!')">
                        <i class="ti-trash"></i> Delete
                        </a>   
                        <a href="{{route('chef.edit',$chefs->id)}}" class="btn btn-warning mx-2" title="Edit" >
                            <i class="ti-pencil-alt"></i> Edit
                            </a>

                    </td>
                    
                </tr>
               
   
            @endforeach
        </tbody>
    </table> --}}
    @php
    // $i=1;
$pagex= @$_GET['page'];
if(!$pagex) $pagex= 1;
$i = config('app.row') * ($pagex-1) + 1;

@endphp
    @foreach ($chef as $chefs)

    <div class="box">
        <div class="form-group row">
                <label class="fw-bold fs-6" >#</label>
                <div class="col-6-md">
                <p>{{$i++}}</p>
            </div>
        </div>
        <div class="form-group row">
                <label class="fw-bold fs-6">Photo</label>
                <div class="col-6-md">
                    <img id="image_tb" src="{{asset($chefs->photo)}}" width="100" alt="">
                </div>
        </div>
        <div class="form-group row">
                <label class="fw-bold fs-6" >Name</label>
                <div class="col-6-md">
                    <p>{{$chefs->name}}</p>
                </div>
        </div>
        <div class="form-group row">
                <label class="fw-bold fs-6" >Position</label>
                <div class="col-6-md">
                    <p>{{$chefs->position}}</p>
                </div>
        </div>
        <div class="form-group row">
                <label class="fw-bold fs-6" >Description</label>
                <div class="col-6-md">
                    <p>{{$chefs->description}}</p>
                </div>
        </div>
        <div class="form-group row">
                <label class="fw-bold fs-6" >URL Twitter</label>
                <div class="col-6-md">
                    <p>{{$chefs->twitter}}</p>
                </div>
        </div>
        <div class="form-group row">
            <label class="fw-bold fs-6" >URL Facebook</label>
            <div class="col-6-md">
                <p>{{$chefs->facebook}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="fw-bold fs-6" >URL Instagram</label>
            <div class="col-6-md">
                <p>{{$chefs->instagram}}</p>
            </div>
        </div>
        <div class="form-group row">
            <label class="fw-bold fs-6" >URL Linkin</label>
            <div class="col-6-md">
                <p>{{$chefs->linkin}}</p>
            </div>
        </div>
        <div class="d-flex justify-content-center m-2">
            <a href="{{route('chef.delete',$chefs->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Delete this !!!')">
            <i class="ti-trash"></i> Delete
            </a>   
            <a href="{{route('chef.edit',$chefs->id)}}" class="btn btn-warning mx-2" title="Edit" >
                <i class="ti-pencil-alt"></i> Edit
                </a>

        </div>
        
        <hr>
    </div>
    @endforeach

    <code class="m-2">
        {!!$chef->withQueryString()->links('pagination::bootstrap-5')!!}
    </code>
    
@endsection

