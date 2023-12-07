@push('scripts')
    <script>
        $(document).ready(function() {
            @include('common.jshelper')
            /*Loading Data Tables Here*/
            const CategoryDataTable = $('#faqTble').DataTable({
                responsive: false,

                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                },
                ajax: "{{ route('admin.specification.index') }}",
                columns: [{
                        "data": "Row_Index_ID"
                    },
                    {
                        "data": "product_name"
                    },
                    {
                        "data": "body"
                    },


                    {
                        "mRender": function(data, type, row) {
                            return `
                        <input type="hidden" name="product_name" value="${row.product_name}">
                        <input type="hidden" name="prod_id" value="${row.prod_id}">
                        <input type="hidden" name="body" value="${row.body}">
                        <button class="btn btn-info btn-sm btn-sm edit-faq-record" data-id="${row.id}"><i class="fa fa-edit mg-r-10" ></i> Edit</button>
                        <button class="btn btn-outline-danger btn-sm delete-faq-record" data-id="${row.id}"><i class="fa fa-trash mg-r-10" ></i> Delete</button>
                        `;
                        }
                    }
                ]
            });
            /**Generate Slug*/

            /*OpenModal*/
            $('#openCreateModalBtn').click(function() {
                $('#StoreSpecsModal').modal('show');
            });

            // Select 2 Tags

            /*Store Category*/
            $('#StoreSpecsForm').validate({
                errorClass: "is-invalid",
                validClass: "is-valid",
                rules: {
                    product_id: {
                        required: true,
                    },
                  

                },
                messages: {
                    product_id: {
                        required: 'The name field is required.'
                    },



                },
                submitHandler: function(form) {

                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.specification.store') }}",
                        data: $(form).serialize(),
                        beforeSend: function() {
                            btnDisableHandler('.btn-primary', true, 'Processing...');
                        },
                        complete: function() {
                            btnDisableHandler('.btn-primary', false, 'Add New');
                        },
                        success: function(res) {
                            // return console.log(res);
                            if (res.success == true) {
                                $('#StoreSpecsForm')[0].reset();
                                $('#StoreSpecsModal').modal('hide');
                                sweetAlertMessage('success', res.message);
                                CategoryDataTable.ajax.reload();
                            } else if (res.success == false) {
                                if (res.response.name) {
                                    sweetAlertMessage('error', res.response.name[0]);
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
            $('body').delegate('.delete-faq-record', 'click', function() {
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
                        let url = "{{ route('admin.faqs.destroy', ':id') }}";
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


            $('body').delegate('.edit-faq-record', 'click', function() {
                const id = $(this).attr('data-id');
                const prod_id = $(this).parent().find('input[name="prod_id"]').val();
                const title = $(this).parent().find('input[name="title"]').val();
                const description = $(this).parent().find('input[name="description"]').val();
                $('#UpdateFAQModal').modal('show');
                $('#UpdateFAQForm input[name="id"]').val(id);
                $('#UpdateFAQForm select[name="product_id"]').val(prod_id);
                $('#UpdateFAQForm input[name="title"]').val(title);
                $('#UpdateFAQForm textarea[name="description"]').val(description);
            });
            /*Admin Login*/
            $('#UpdateFAQForm').validate({
                errorClass: "is-invalid",
                validClass: "is-valid",
                rules: {
                    product_id: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    product_id: {
                        required: 'The name field is required.'
                    },
                    title: {
                        required: 'The name field is required.'
                    },
                    description: {
                        required: 'The name field is required.'
                    },
                },
                submitHandler: function(form) {
                    const route = "{{ route('admin.faqs.update', ':id') }}";
                    const url = route.replace(':id', $('#UpdateFAQForm input[name="id"]').val());
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $(form).serialize(),
                        beforeSend: function() {
                            btnDisableHandler('#UpdateFAQForm .btn-primary', true, 'Processing...');
                        },
                        complete: function() {
                            btnDisableHandler('#UpdateFAQForm .btn-primary', false, 'Update');
                        },
                        success: function(res) {
                            // return console.log(res)
                            if (res.success == true) {
                                $('#UpdateFAQModal').modal('hide');
                                sweetAlertMessage('success', res.message);
                                CategoryDataTable.ajax.reload();
                            } else if (res.success == false) {
                                if (res.response.name) {
                                    sweetAlertMessage('error', res.response.name[0]);
                                }
                                if (res.response.code) {
                                    sweetAlertMessage('error', res.response.code[0]);
                                }
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });


        });
    </script>
@endpush
