@extends('layouts.admin')

@section('title','All Business Card List')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-12">
                            @if (\Session::has('message'))
                                <div class="alert alert-success">
                                    {!! \Session::get('message') !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-6">
                            <h4 class="m-t-0 header-title mb-4"><b>All Business Card List</b></h4>
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
                                <th>Last Login IP</th>
                                <th>Last Login</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                @if ($item->user)
                                   <tr>
                                        <td><a data-toggle="tooltip" data-placement="top" title="Click To Download QR" href="{{ route('download.qrcode',$item->id) }}">{!! QrCode::size(60)->generate(route('card.username',$item->user_name)) !!}</a></td>
                                        <td>{{ $item->user_name }}</td>
                                        <td>{{ $item->first_name . ' ' . $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->user->last_login_ip ?? 'Not Found' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->last_login_at)->format('M j, Y, g:i a') }}</td>
                                        <td>
                                            <button id="copyLinkButton" onclick="setClipboard('{{ route('card.username',$item->user_name) }}')" type="btn" class="btn btn-success btn-sm">Copy Link</button>
                                            <a target="_blank" href="{{ route('card.username',$item->user_name) }}" class="btn btn-primary btn-sm">View</a>
                                            <a onclick="return confirm('are you sure?')" href="{{ route('card.delete',$item) }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endif

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