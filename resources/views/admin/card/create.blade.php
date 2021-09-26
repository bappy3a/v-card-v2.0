@extends('layouts.admin')

@section('title','Contact List')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="m-t-0 header-title mb-4">V-Card Info</h4>

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('card.store') }}" enctype="multipart/form-data">
<div class="form-group row">
    <label class="col-2 col-form-label">First name</label>
    <div class="col-10">
        <input value="{{ old('first_name') }}" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required autocomplete="off">
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Last name</label>
    <div class="col-10">
        <input value="{{ old('last_name') }}"  type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="off">
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Designation</label>
    <div class="col-10">
        <input value="{{ old('designation') }}" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" required autocomplete="off">
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Phone Number</label>
    <div class="col-10">
        <input value="{{ old('phone') }}"  type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="off">
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Your photo</label>
    <div class="col-10">
        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" >
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Cover Photo</label>
    <div class="col-10">
        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" >
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Cover Photo</label>
    <div class="col-10">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
        </div>
    </div>
</div>



                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> 
        </div><!-- end card -->
    </div><!-- end col -->
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable();
        } );
    </script>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">
@endsection