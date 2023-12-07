@extends('layouts.admin_layout')
@section('title','Product Images')

@section('content')
<section id="file-export">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Product Images List</h4>
                    <a href="{{ route('admin.productsImage.create') }}"><button class="btn btn-primary" >Add New</button></a>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table id="productTble" class="table style-3 table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@include('admin.products.js.index')
@endsection
