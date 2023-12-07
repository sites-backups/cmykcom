<div class="modal" id="StoreSpecsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New FAQ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('admin.specification.store') }}" method="POST" enctype="multipart/form-data"
                    id="StoreSpecsForm">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Select Product</label>
                            <select name="product_id" class="form-control" id="">
                                <option value="">--select product--</option>
                                @foreach ($products as $item )
                                    <option value="{{ $item->id }}">{{ $item->prod_title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12">
                            <label for="">Add Specs</label>
                            @include('editor.index')
                        </div>

                        <div class="col-12 text-center mt-3 mb-5">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




<div class="modal" id="UpdateFAQModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Product FAQ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data"
                    id="UpdateFAQForm">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id">
                        <div class="col-sm-12">
                            <label for="">Select Product</label>
                            <select name="product_id" class="form-control" id="">
                                <option value="">--select product--</option>
                                @foreach ($products as $item )
                                    <option value="{{ $item->id }}">{{ $item->prod_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label for="">Add Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="col-sm-12">
                            <label for="">Add Description</label>
                            <textarea type="text" class="form-control" name="description"></textarea>
                        </div>

                        <div class="col-12 text-center mt-3 mb-5">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
