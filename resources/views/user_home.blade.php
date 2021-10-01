@extends('layouts.admin')

@section('title','Dashbord')

@section('content')
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <a href="{{ route('card.show',auth()->user()->id) }}">
                <div class="widget-panel widget-style-2 bg-pink">
                    <i class="ion-md-card" style="margin-top: -60px!important;"></i>
                    <h2 class="m-0 text-white" data-plugin="counterup"></h2>
                    <div>Update Your Smart Card</div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a target="_blank" href="{{ route('card.username',auth()->user()->card->user_name) }}">
                <div class="widget-panel widget-style-2 bg-purple">
                    <i class="ion-md-eye" style="margin-top: -60px!important;"></i>
                    <h2 class="m-0 text-white" data-plugin="counterup"></h2>
                    <div>View Your Card</div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="{{ route('profile') }}">
                <div class="widget-panel widget-style-2 bg-info">
                    <i class="ion-ios-pricetag" style="margin-top: -60px!important;"></i>
                    <h2 class="m-0 text-white" data-plugin="counterup"></h2>
                    <div>Update your profile</div>
                </div>
            </a>
        </div>
    </div> <!-- end row -->
@endsection
