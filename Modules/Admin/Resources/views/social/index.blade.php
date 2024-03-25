@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Socials Dashboard</h4>
@endsection
@section('content')
    <div class="tool-box mb-3">
        <a href="{{route ('social.create')}}" class="btn btn-success btn-oval text-white font-weight-bold">
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
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Url</th>
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
              
                @foreach ($social as $soc)
                    <tr class="text-center">
                        <td>{{$i++}}</td>
                        <td>{{$soc->name}}</td>
                        <td>{{$soc->icon}}</td>
                        <td>{{$soc->url}}</td>
                       
                        <td class="d-flex justify-content-center">
                            <a href="{{route('social.delete',$soc->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Delete this !!!')">
                            <i class="ti-trash"></i> Delete
                            </a>   
                            <a href="{{route('social.edit',$soc->id)}}" class="btn btn-warning mx-2" title="Edit" >
                                <i class="ti-pencil-alt"></i> Edit
                                </a>

                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
       
       <code class="m-3 ">
        {!! $social->withQueryString()->links('pagination::bootstrap-5') !!}
        
       </code>
       

    </div>
    
    
@endsection

