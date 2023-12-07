@push('scripts')
    <script>
        $(document).ready(function() {
            @include('common.jshelper')
            /*Loading Data Tables Here*/
            const CategoryDataTable = $('#categoryTble').DataTable({
                responsive: false,

                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                },
                ajax: "{{ route('admin.categories.index') }}",
                columns: [{
                        "data": "Row_Index_ID"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "slug"
                    },
                    {
                        "data": "is_nav"
                    },
                    {
                        "data": "status_html"
                    },
                    {
                        "mRender": function(data, type, row) {
                            let url = "{{ route('admin.categories.edit', ':id') }}";
                            url = url.replace(':id', row.id);
                            return `
                        <input type="hidden" name="name" value="${row.name}">
                        <input type="hidden" name="slug" value="${row.slug}">
                        <input type="hidden" name="meta_tags" value="${row.meta_tags}">
                        <input type="hidden" name="meta_description" value="${row.meta_description}">
                        <a href="${url}" class="btn btn-info btn-sm btn-sm edit-category-record" data-id="${row.id}"><i class="fa fa-edit mg-r-10" ></i> Edit</a>
                        <button class="btn btn-outline-danger btn-sm delete-category-record" data-id="${row.id}"><i class="fa fa-trash mg-r-10" ></i> Delete</button>
                        `;
                        }
                    }
                ]
            });
            /**Generate Slug*/
            $('input[name="name"]').keyup(function() {
                const title = $(this).val();
                const slug = title.toLowerCase().replace(/ /g, '-').replace(/[-]+/g, '-').replace(
                    /[^\w-]+/g, '');
                $('input[name="slug"]').val(slug);
            });
            /*OpenModal*/
            $('#openCreateModalBtn').click(function() {
                $('#createCategoryModal').modal('show');
            });

            // Select 2 Tags

            $(".multiOptionstags").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })
            /*Store Category*/
            $('#StoreCategoryForm').validate({
                errorClass: "is-invalid",
                validClass: "is-valid",
                rules: {
                    name: {
                        required: true,
                    },
                    slug: {
                        required: true,
                    },
                    "meta_tags[]": {
                        required: true,
                    },
                    meta_description: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'The name field is required.'
                    },
                    slug: {
                        required: 'The slug field is required.'
                    },

                    "meta_tags[]": {
                        required: 'The meta tags field is required.'
                    },
                    meta_description: {
                        required: 'The meta description field is required.'
                    },
                },
                submitHandler: function(form) {

                    const thumbnail = document.getElementById('readUrl').files[0];
                    const name = $('#StoreCategoryForm input[name="name"]').val();
                    const slug = $('#StoreCategoryForm input[name="slug"]').val();
                    const meta_tags = $('#StoreCategoryForm select[name="meta_tags[]"]').val();
                    const meta_description = $('#StoreCategoryForm input[name="meta_description"]').val();
                    // console.log({thumbnail,name,slug,meta_tags,meta_description,parent_id})
                    const formData = new FormData();
                    formData.append('thumbnail', thumbnail);
                    formData.append('name', name);
                    formData.append('slug', slug);
                    formData.append('meta_tags', meta_tags);
                    formData.append('meta_description', meta_description);
                    formData.append('_token', _token);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.categories.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            btnDisableHandler('.btn-primary', true, 'Processing...');
                        },
                        complete: function() {
                            btnDisableHandler('.btn-primary', false, 'Add New');
                        },
                        success: function(res) {
                            // return console.log(res);
                            if (res.success == true) {
                                $('#StoreCategoryForm')[0].reset();
                                $('#createCategoryModal').modal('hide');
                                sweetAlertMessage('success', res.message);
                                CategoryDataTable.ajax.reload();
                            } else if (res.success == false) {
                                if (res.response.name) {
                                    sweetAlertMessage('error', res.response.name[0]);
                                }
                                if (res.response.slug) {
                                    sweetAlertMessage('error', res.response.slug[0]);
                                }
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });


            /*Delete Subcription Product*/
            $('body').delegate('.delete-category-record', 'click', function() {
                const id = $(this).attr('data-id');
                //  alert(id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('admin.categories.destroy', ':id') }}";
                        url = url.replace(':id', id);
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                id,
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE"
                            },
                            success: function(res) {
                                if (res.success == true) {
                                    CategoryDataTable.ajax.reload();
                                    fetchParentCategories();
                                    sweetAlertMessage('success', res.message);
                                }
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                })
            });


              // changing the status of category
            $('body').delegate('.category-status', 'click', function() {
                const id = $(this).attr('data-id');
                // console.log(id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to Change the Status!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('admin.categories.categories-status', ':id') }}";
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                id,
                                _token: "{{ csrf_token() }}",
                                _method: "POST"
                            },
                            success: function(res) {
                                console.log(res);
                                if (res.success == true) {
                                    sweetAlertMessage('success', res.message);
                                    CategoryDataTable.ajax.reload();
                                }
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                })
            });



               // changing the status For
               $('body').delegate('.category-nav-status', 'click', function() {
                const id = $(this).attr('data-id');
                // console.log(id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to Change the Status!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('admin.categories.display_nav', ':id') }}";
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                id,
                                _token: "{{ csrf_token() }}",
                                _method: "POST"
                            },
                            success: function(res) {
                                console.log(res);
                                if (res.success == true) {
                                    sweetAlertMessage('success', res.message);
                                    CategoryDataTable.ajax.reload();
                                }
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                })
            });


        });
    </script>
@endpush
