@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Gallery Dashboard</h4>
@endsection
@section('content')
    <div class="tool-box mb-3">
        <a href="{{route ('gallery.create')}}" class="btn btn-success btn-oval text-white font-weight-bold">
        <i class="ti-plus"></i> Create
    </a>
    </div>
    <table class="table table-border table-striped table-hover">
        @component('admin::components.alerts')
            
        @endcomponent
        <thead>
            <tr class="text-center">
                <th>#</th>              
                <th>Photo</th>
                <th>Sequence</th>
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
          
            @foreach ($gallery as $item)
                <tr class="text-center">
                    <td>{{$i++}}</td>
                    <td><img src="{{asset($item->photo)}}" width="150" alt=""></td>
                    <td>{{$item->sequence}}</td>
                    <td>{{$item->url}}</td>
                   
                    <td class="d-flex justify-content-center">
                        <a href="{{route('gallery.delete',$item->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Delete this !!!')">
                        <i class="ti-trash"></i> Delete
                        </a>   
                        <a href="{{route('gallery.edit',$item->id)}}" class="btn btn-warning mx-2" title="Edit" >
                            <i class="ti-pencil-alt"></i> Edit
                            </a>

                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

    <code class="m-2">
        {!!$gallery->withQueryString()->links('pagination::bootstrap-5')!!}
    </code>
    
@endsection

