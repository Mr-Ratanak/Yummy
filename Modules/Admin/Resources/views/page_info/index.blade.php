@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Page Dashboard</h4>
@endsection
@section('content')
   
    <table class="table table-border table-striped table-hover">
        @component('admin::components.alerts')
            
        @endcomponent
        <thead>
            <tr class="text-center">
                <th>#</th>              
                <th>Title</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
          
            @foreach ($read_page as $read)
                <tr class="text-center">
                    <td>{{$i++}}</td>
                    <td>{{$read->title}}</td>
                    <td>{{$read->description}}</td>
                    <td>{{$read->slug}}</td>
            
                    <td class="d-flex justify-content-center">  
                        <a href="{{route('page_info.edit',$read->id)}}" class="btn btn-warning mx-2" title="Edit" >
                            <i class="ti-pencil-alt"></i> Edit
                        </a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection

