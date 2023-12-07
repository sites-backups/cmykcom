@extends('layouts.admin_layout')
@section('title', 'Edit Category')

@section('content')
    <section id="file-export">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Edit Category</h4>
                        {{-- <button class="btn btn-primary" id="openCreateModalBtn">Add New</button> --}}
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <form action="{{ route('admin.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data"
                                id="UpdateCategoryForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $category->name }}">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug"
                                            value="{{ $category->slug }}">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">Upload Image</label>
                                        <input type='file' name="image" id="readUrl" class="form-control mb-2">
                                        <img id="uploadedImage" class="mb-2" src="{{ asset($category->image) }}" alt="Uploaded Image"
                                            accept="image/png, image/jpeg" style="width: 300px;">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">Meta Tags</label>
                                        <select class="form-select form-control multiOptionstags mb-4" name="meta_tags[]"
                                            multiple="multiple">
                                            <option>--Select Tags --</option>
                                        </select>

                                        <input type="readonly" readonly value="{{ $category->meta_tags }}" class="form-control">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="">Meta Description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                            value="{{ $category->meta_description }}">
                                    </div>

                                    <div class="col-12 text-center mt-3 mb-5">
                                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('admin.categories.js.edit')



@endsection
