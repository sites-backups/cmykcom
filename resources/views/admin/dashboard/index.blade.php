@extends('layouts.admin_layout')
@section('title','Dashboard')

@section('content')

<!-- Grouped multiple cards for statistics starts here -->
<div class="row grouped-multiple-statistics-card">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                        <div
                            class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
                            <span class="card-icon primary d-flex justify-content-center mr-3">
                                <i class="icon p-1 icon-bar-chart customize-icon font-large-2 p-1"></i>
                            </span>
                            <div class="stats-amount mr-3">
                                <h3 class="heading-text text-bold-600">$95k</h3>
                                <p class="sub-heading">Revenue</p>
                            </div>
                            <span class="inc-dec-percentage">
                                <small class="success"><i class="fa fa-long-arrow-up"></i> 5.2%</small>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                        <div
                            class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
                            <span class="card-icon danger d-flex justify-content-center mr-3">
                                <i class="icon p-1 icon-pie-chart customize-icon font-large-2 p-1"></i>
                            </span>
                            <div class="stats-amount mr-3">
                                <h3 class="heading-text text-bold-600">18.63%</h3>
                                <p class="sub-heading">Growth Rate</p>
                            </div>
                            <span class="inc-dec-percentage">
                                <small class="danger"><i class="fa fa-long-arrow-down"></i> 2.0%</small>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                        <div
                            class="d-flex align-items-start border-right-blue-grey border-right-lighten-5">
                            <span class="card-icon success d-flex justify-content-center mr-3">
                                <i class="icon p-1 icon-graph customize-icon font-large-2 p-1"></i>
                            </span>
                            <div class="stats-amount mr-3">
                                <h3 class="heading-text text-bold-600">$27k</h3>
                                <p class="sub-heading">Sales</p>
                            </div>
                            <span class="inc-dec-percentage">
                                <small class="success"><i class="fa fa-long-arrow-up"></i> 10.0%</small>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                        <div class="d-flex align-items-start">
                            <span class="card-icon warning d-flex justify-content-center mr-3">
                                <i
                                    class="icon p-1 icon-basket-loaded customize-icon font-large-2 p-1"></i>
                            </span>
                            <div class="stats-amount mr-3">
                                <h3 class="heading-text text-bold-600">13700</h3>
                                <p class="sub-heading">Orders</p>
                            </div>
                            <span class="inc-dec-percentage">
                                <small class="danger"><i class="fa fa-long-arrow-down"></i>
                                    13.6%</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Grouped multiple cards for statistics ends here -->


@endsection
