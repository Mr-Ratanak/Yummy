@extends('admin::layouts.master')

@section('header')
<h4 class="font-weight-bold mb-0 p-4">Reset Password</h4>
@endsection
@section('content')
    
<form action="{{route('user.save')}}" method="POST">
    @csrf
   
    <button class="btn btn-info text-white mb-2">
        <i class="ti-save text-white px-2"></i>Save
    </button>
    {{-- <a href="" class="btn btn-warning text-white mb-2">
        <i class="ti-back-left px-1"></i> Go Back</a> --}}

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Info</h4>
        
            @component('admin::components.alerts')
                
            @endcomponent
           
            <div class="form-group">
              <label>New Password</label>
              <input type="password" class="form-control form-control-lg" name="password" placeholder="password" required>
                <p><small class="text-primary">type new password</small></p>
            </div>
            <div class="form-group">
              <label>Confirm Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control form-control-lg" name="cpassword" placeholder="confirm password" required>
                <p><small class="text-primary">Keep it blank to use default password</small></p>
            </div>
           
          </div>
        </div>
      </div>

      

</form>

@endsection
@section('js')
    <script>
     function preview(evt){
      let img = document.getElementById('img');
      img.src = URL.createObjectURL(evt.target.files[0]);
     }
  

    </script>
@endsection
