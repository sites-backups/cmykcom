@extends('layouts.admin_layout')
@section('title', 'Products')

@section('content')
    <style>
        .upload__box {
            padding: 40px;
        }

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload__btn {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 10px;
            line-height: 26px;
            font-size: 14px;
        }

        .upload__btn:hover {
            background-color: unset;
            color: #4045ba;
            transition: all 0.3s ease;
        }

        .upload__btn-box {
            margin-bottom: 10px;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: "✖";
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
    </style>
    <div class=" mx-auto w-75 mt-5">
        <div class="card shadow">
            <div class="card-header">
                <h3>Create a New product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.update', $data->id) }}" method="POST" enctype="multipart/form-data"
                    id="UpdateProductForm">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Product Title</label>
                            {{-- <textarea class="form-control" rows="3" name="short_description"></textarea> --}}
                            <input type="text" class="form-control" name="prod_title" value="{{ $data->prod_title }}" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Slug</label>
                            {{-- <textarea class="form-control" rows="3" name="disclaimer"></textarea> --}}
                            <input type="text" class="form-control" name="slug" value="{{ $data->slug }}" readonly>

                        </div>
                        <div class="col-sm-6">
                            <label for="">Shor Description</label>
                            <textarea class="form-control" rows="3" name="short_description">{{ $data->short_description }}</textarea>
                            {{-- <input type="text" class="form-control" name="slug" value=""> --}}

                        </div>
                        <div class="col-sm-6">
                            <label for="">Meta Title</label>
                            <textarea class="form-control" rows="3" name="meta_title">{{ $data->meta->meta_title }}</textarea>
                            {{-- <input type="text" class="form-control" name="slug" value=""> --}}

                        </div>
                        <div class="col-sm-6">
                            <label for="">Meta Description</label>
                            <textarea class="form-control" rows="3" name="meta_description">{{ $data->meta->meta_description }}</textarea>
                            {{-- <input type="text" class="form-control" name="slug" value=""> --}}

                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label class="upload__btn btn-block">
                                        <p class="pt-2" id="thumbnail">Upload images</p>
                                        <input type="file" multiple="" name="thumbnail[]" id="images" data-max_length="20"
                                            class="upload__inputfile">
                                    </label>
                                </div>
                                <div class="upload__img-wrap"></div>
                            </div>

                            @foreach ($data->images as $item)
                                <img src="{{ asset($item->thumbnail ) }}" style="width: 100px;">
                            @endforeach
                        </div>
                        <div class="col-sm-12">
                            <label for="">Long Description</label>
                            @include('editor.edit')
                        </div>
                        <div class="col-sm-12 mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @include('admin.products.js.edit')
@endsection
