@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Select Company</h4>
@endsection
@section('content')

    <div class="tool-box mb-3">
        <a href="{{route ('company.edit',$com->id)}}" class="btn btn-success btn-oval text-white font-weight-bold">
        <i class="ti-pencil-alt"></i> Edit
    </a>
    </div>
    @component('admin::components.alerts')
                
    @endcomponent

    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Name </label>
                   :  {{$com->name}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Title </label>
                    : {{$com->title}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Address </label>
                    : {{$com->address}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Phone </label>
                    : {{$com->phone}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">Hours </label>
                    : {{$com->hours}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group row">
                    <label class="col-lg-3">E-mail </label>
                    : {{$com->email}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group row">
                    <strong class="fs-5">Description</strong>
                    <p class="p-2 fs-6">
                        {{$com->description}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <label class="col-lg-3">Logo</label>
            </div>
            <div class="p-2">
                <img src="{{asset($com->logo)}}" alt="" width="150" >
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="col-lg-3">Url</label>
                    <p class="p-2 fs-6">
                        {{$com->url}}
                    </p>
                </div>
            </div>
        </div>
    
       

    </div>
    
    
@endsection

