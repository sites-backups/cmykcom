@extends('layouts.admin_layout')
@section('title', 'Categories List')

@section('content')
    <section id="file-export">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Categories List</h4>
                        <button class="btn btn-primary" id="openCreateModalBtn">Add New</button>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table id="categoryTble" class="table style-3  table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Display Menu Bar</th>
                                        <th>Status</th>
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


    @include('admin.categories.modal')
    @include('admin.categories.js.index')



@endsection
