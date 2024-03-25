@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Menu Dashboard</h4>
@endsection
@section('content')
    <div class="tool-box mb-3">
        <a href="{{route ('menu.create')}}" class="btn btn-success btn-oval text-white font-weight-bold">
        <i class="ti-plus"></i> Create
    </a>
    </div>

    <div class="card card-gray">
        <table class="table table-border table-striped table-hover">
            @component('admin::components.alerts')
                
            @endcomponent
            <thead>
                <tr class="text-center">
                    <th>#</th>              
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>URL</th>
                    <th>Category</th>
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
              
                @foreach ($fetch_menu as $menu)
                    <tr class="text-center">
                        <td>{{$i++}}</td>
                        <td><img src="{{asset($menu->image)}}" width="100" alt=""></td>
                        <td>{{$menu->title}}</td>
                        <td>{{$menu->description}}</td>
                        <td>{{$menu->price}}</td>
                        {{-- <td>{{$menu->url}}</td> --}}
                        <td><a href="{{$menu->url}}">Link</a></td>
                        <td>{{$menu->cname}}</td>
                       
                        <td class="d-flex justify-content-center">
                            <a href="{{route('menu.delete',$menu->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Delete this !!!')">
                            <i class="ti-trash"></i> Delete
                            </a>   
                            <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-warning mx-2" title="Edit" >
                                <i class="ti-pencil-alt"></i> Edit
                                </a>

                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
       
       <code class="m-3 ">
        {!! $fetch_menu->withQueryString()->links('pagination::bootstrap-5') !!}
        
       </code>
       

    </div>
    
    
@endsection

