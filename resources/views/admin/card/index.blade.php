@extends('layouts.admin')

@section('title','Contact List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="m-t-0 header-title mb-4"><b>Contact List</b></h4>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('card.create') }}" class="btn btn-primary" style="margin-top: -9px;float: right;"> Add New</a>
                        </div>
                    </div>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th>QrCode</th>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Mobile Number</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{!! QrCode::size(60)->generate(route('card.username',$item->user_name)) !!}</td>
                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->first_name . ' ' . $item->last_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->created_at->format('M/d/y') }}</td>
                                    <td>
                                        <a target="_blank" href="{{ route('card.username',$item->user_name) }}" class="btn btn-primary btn-sm">View</a>
                                        <a onclick="return confirm('are you sure?')" href="{{ route('card.delete',$item) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
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