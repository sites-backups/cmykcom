<!-- The Modal -->

<style>
    .select2-container--default .select2-selection--multiple {
    box-sizing: border-box;
    cursor: pointer;
    user-select: none;
    -webkit-user-select: none;
    display: block;
    width: 469px!important;
    height: calc(2.75rem + 2px);
    padding: 0.75rem 1rem!important;
    font-size: 1rem;
    line-height: 1.25;
    color: #4E5154;
    background-color: #FFF;
    background-clip: padding-box;
    border: 1px solid #BABFC7;
    border-radius: 0.25rem;
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;

}



</style>
<div class="modal" id="createCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data"
                    id="StoreCategoryForm">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-sm-12">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug">
                        </div>
                        <div class="col-sm-12">
                            <label for="">Upload Image</label>
                            <input type='file' name="image" class="form-control" id="readUrl">
                            <img id="uploadedImage" src="#" alt="Uploaded Image" style="display:none; width:100px">
                        </div>
                        <div class="col-sm-12">
                            <label for="">Meta Tags</label>
                            <select class="form-control multiOptionstags" name="meta_tags[]" multiple="multiple">
                                <option>--Select Tags --</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label for="">Meta Description</label>
                            <input type="text" class="form-control" name="meta_description">
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
