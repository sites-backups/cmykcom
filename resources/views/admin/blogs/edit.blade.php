@extends('layouts.admin_layout')
@section('title', 'Edit Blog')


@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Edit Blog</h4>
                        {{-- <button class="btn btn-primary" id="openCreateModalBtn">Add New</button> --}}
                    </div>
                    <div class="card-body">
                        <div class="mb-4 mt-4">
                            <form action="{{ route('admin.blogs.update',$data->id) }}" id="blogForm" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="{{ $data->slug }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Meta Tags</label>
                                        <input type="text" class="form-control" value="{{ $data->meta_title }}" name="meta_title">
                                    
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="">Meta Description</label>
                                        <input type="text" class="form-control" name="meta_description" value="{{ $data->meta_description }}">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="">Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                        <img src="{{ asset($data->thumbnail) }}" alt="" style="width: 100px">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="">Blog Detail</label>
                                        @include('editor.edit')
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary btn-block btn-lg" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.blogs.js.edit')
@endsection
