@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Features Dashboard</h4>
@endsection
@section('content')
    <div class="tool-box mb-3">
        <a href="{{route ('feature.create')}}" class="btn btn-success btn-oval text-white font-weight-bold">
        <i class="ti-plus"></i> Create
    </a>
    </div>
    <table class="table table-border table-striped table-hover">
        @component('admin::components.alerts')
            
        @endcomponent
        <thead>
            <tr class="text-center">
                <th>#</th>              
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
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
          
            @foreach ($feature as $features)
                <tr class="text-center">
                    <td>{{$i++}}</td>
                    <td>{{$features->icon}}</td>
                    <td>{{$features->title}}</td>
                    {{-- <td>{{$features->description}}</td> --}}
                    <td><span class="text-danger">Sorry</span> data was hidden</td>
                    {{-- <td>{{$features->url}}</td> --}}
                    <td><span class="text-danger">Sorry</span> url was hidden</td>
                   
                    <td class="d-flex justify-content-center">
                        <a href="{{route('feature.delete',$features->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Delete this !!!')">
                        <i class="ti-trash"></i> Delete
                        </a>   
                        <a href="{{route('feature.edit',$features->id)}}" class="btn btn-warning mx-2" title="Edit" >
                            <i class="ti-pencil-alt"></i> Edit
                            </a>

                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <code class="m-2">
        {!!$feature->withQueryString()->links('pagination::bootstrap-5')!!}
    </code>
    
@endsection

