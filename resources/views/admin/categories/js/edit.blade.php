@push('scripts')
    <script>
        @include('common.jshelper')
        $(document).ready(function(){


             // Select 2 Tags

             $(".multiOptionstags").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })

            /*Upadate Category*/
            $('#UpdateCategoryForm').validate({
                errorClass: "is-invalid",
                validClass: "is-valid",
                rules: {
                    name: {
                        required: true,
                    },
                    slug: {
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

                    meta_description: {
                        required: 'The meta description field is required.'
                    },
                },
                submitHandler: function(form) {

                    const thumbnail = document.getElementById('readUrl').files[0];
                    const name = $('#UpdateCategoryForm input[name="name"]').val();
                    const slug = $('#UpdateCategoryForm input[name="slug"]').val();
                    const meta_tags = $('#UpdateCategoryForm select[name="meta_tags[]"]').val();
                    const meta_description = $('#UpdateCategoryForm input[name="meta_description"]').val();
                    // console.log({thumbnail,name,slug,meta_tags,meta_description,parent_id})
                    const formData = new FormData();
                    formData.append('thumbnail', thumbnail);
                    formData.append('name', name);
                    formData.append('slug', slug);
                    formData.append('meta_tags', meta_tags);
                    formData.append('meta_description', meta_description);
                    formData.append('_token', _token);
                    formData.append('method', 'POST');


                    const route = "{{ route('admin.categories.update', ':id') }}";
                    const url = route.replace(':id', $('#UpdateCategoryForm input[name="id"]').val());
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        beforeSend: function() {
                            btnDisableHandler('.btn-primary', true, 'Processing...');
                        },
                        complete: function() {
                            btnDisableHandler('.btn-primary', false, 'Update');
                        },
                        success: function(res) {
                            if (res.success == true) {
                                sweetAlertMessage('success', res.message);
                                setTimeout(() => {
                                    window.location =
                                        "{{ route('admin.categories.index') }}";
                                }, 1000);

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
        })
    </script>
@endpush
