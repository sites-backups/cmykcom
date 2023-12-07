@extends('layouts.admin_layout')
@section('title', 'Blogs List')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Add New Blog</h4>
                        {{-- <button class="btn btn-primary" id="openCreateModalBtn">Add New</button> --}}
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <form action="" id="blogForm">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title">

                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Meta Description</label>
                                        <input type="text" class="form-control" name="meta_description">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="">Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="">Blog Detail</label>
                                        @include('editor.index')
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary btn-block btn-lg" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.blogs.js.create')
@endsection
