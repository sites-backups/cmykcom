@extends('layouts.admin_layout')
@section('title','Blogs List')


@section('content')

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Blogs List</h4>
                            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary" id="openCreateModalBtn">Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <table id="BlogTble" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Slug</th>
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
        </div>
@include('admin.blogs.js.index')
@endsection
