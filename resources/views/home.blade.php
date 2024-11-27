@extends('layouts.layout')
@section('content')
    @if(Session::has('message'))
        <div class="divider">
        </div>
    @endif

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Dashboard
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <a style="text-decoration: none;" href="/jvs/create">
                <div class="card mb-3 widget-content bg-premium-dark">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Create JV</div>
                            <div class="widget-subheading">Create a new JV</div>
                        </div>
                        {{--<div class="widget-content-right">--}}
                            {{--<div class="widget-numbers text-warning"><span>{{$in_shipment_orders}}</span></div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-4">
            <a style="text-decoration: none;" href="/general-ledgers">
                <div class="card mb-3 widget-content bg-night-fade">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">General Ledgers</div>
                            <div class="widget-subheading">View General Ledgers</div>
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-4">
            <a style="text-decoration: none;" href="/orders/delivered">
                <div class="card mb-3 widget-content bg-happy-green">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Chart of Accounts</div>
                            <div class="widget-subheading">View All chart of Account</div>
                        </div>

                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

