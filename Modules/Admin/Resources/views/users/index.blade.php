@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">User Dashboard</h4>
@endsection
@section('content')
    <div class="tool-box mb-3">
        <a href="{{route ('user.create')}}" class="btn btn-success btn-oval text-white font-weight-bold">
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
                    <th>Photo</th>
                    <th>Name</th>
                    <th>E-mail</th>
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
              
                @foreach ($users as $item)
                    <tr class="text-center">
                        <td>{{$i++}}</td>
                        <td><img src="{{asset($item->images)}}" alt="" width="70" height="70" ></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td class="d-flex justify-content-between ">
                            <a href="{{route('user.delete',$item->id)}}" class="btn btn-danger" title="Delete" onclick="return confirm('Delete this !!!')">
                            <i class="ti-trash"></i> Delete
                            </a>
                            <a href="{{route('user.edit',$item->id)}}" class="btn btn-warning" title="Edit" >
                                <i class="ti-pencil-alt"></i> Edit
                                </a>

                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
       
       <code class="m-3 ">
        {{-- {{$users->links()}} --}}
        {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
        
       </code>
       

    </div>
    
    
@endsection

