@extends('layouts.admin')

@section('title','Login Info')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="m-t-0 header-title mb-4">Login Info</h4>

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            @if (\Session::has('message'))
                                <div class="alert alert-success">
                                    {!! \Session::get('message') !!}
                                </div>
                            @endif
                            @if (\Session::has('error'))
                                <div class="alert alert-danger">
                                    {!! \Session::get('error') !!}
                                </div>
                            @endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Email</label>
                                    <div class="col-10">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Old Password</label>
                                    <div class="col-10">
                                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="********">
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Password</label>
                                    <div class="col-10">
                                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Confirm Password</label>
                                    <div class="col-10">
                                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="********">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label"></label>
                                    <div class="col-10">
                                        <button class="btn btn-primary" type="submit">Update</button>
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