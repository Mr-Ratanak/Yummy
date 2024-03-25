@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span>Data has been save.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <div class="">{{Session('success')}}</div>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span>Data failse to save.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <div class="">{{Session('error')}}</div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span>Data failse to save.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @foreach ($errors->all() as $errors)
            <ul>
                <li>{{$errors}}</li>
            </ul>
        @endforeach
    </div>
@endif
