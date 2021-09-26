@extends('layouts.admin')

@section('title','Dashbord')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="widget-panel widget-style-2 bg-pink">
                <i class="ion-md-eye"></i>
                <h2 class="m-0 text-white" data-plugin="counterup">{{ count(\App\Models\Card::get()) }}</h2>
                <div>Total Contact</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget-panel widget-style-2 bg-purple">
                <i class="ion-md-paper-plane"></i>
                <h2 class="m-0 text-white" data-plugin="counterup">12056</h2>
                <div>Sales</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget-panel widget-style-2 bg-info">
                <i class="ion-ios-pricetag"></i>
                <h2 class="m-0 text-white" data-plugin="counterup">1268</h2>
                <div>New Orders</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget-panel widget-style-2 bg-primary">
                <i class="ion-md-contacts"></i>
                <h2 class="m-0 text-white" data-plugin="counterup">145</h2>
                <div>New Users</div>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
