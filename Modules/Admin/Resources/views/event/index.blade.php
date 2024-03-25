@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Events Dashboard</h4>
@endsection
@section('content')
    <div class="tool-box mb-3">
        <a href="{{route ('event.create')}}" class="btn btn-success btn-oval text-white font-weight-bold">
        <i class="ti-plus"></i> Create
    </a>
    </div>
    <table class="table table-border table-striped table-hover ">
        @component('admin::components.alerts')
            
        @endcomponent
        <thead>
            <tr class="text-center">
                <th>#</th>              
                <th>Photo</th>
                <th>Title</th>
                <th>Price</th>
                <th>Details</th>
                <th>Sequence</th>
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
          
            @foreach ($event as $events)
                <tr class="text-center">
                    <td>{{$i++}}</td>
                    <td><img src="{{asset($events->photo)}}" width="150" alt=""></td>
                    <td>{{$events->title}}</td>
                    <td>{{$events->price}}</td>
                    <td>Detail hidden</td>
                    <td>{{$events->sequence}}</td>
                   
                    <td class="d-flex justify-content-center">
                        <a href="{{route('event.delete',$events->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Delete this !!!')">
                        <i class="ti-trash"></i> Delete
                        </a>   
                        <a href="{{route('event.edit',$events->id)}}" class="btn btn-warning mx-2" title="Edit" >
                            <i class="ti-pencil-alt"></i> Edit
                            </a>

                    </td>
                    
                </tr>
               
   
            @endforeach
        </tbody>
    </table>

    <code class="m-2">
        {!!$event->withQueryString()->links('pagination::bootstrap-5')!!}
    </code>
    
@endsection

