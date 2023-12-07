@extends('layouts.admin_layout')
@section('title','Product Images')

@section('content')
<div class=" mx-auto w-75 mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h3>Create a New Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.productsImage.store') }}" method="POST" enctype="multipart/form-data"
                >
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Select Product</label>
                            <select name="product_id" id="" class="form-control">
                                <option value="">select product</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->prod_title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Add New Image</label>
                            <input type="file" class="form-control" name="thumbnail">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>




@endsection
