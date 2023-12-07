@push('scripts')
    <script>
        $(document).ready(function(){
            @include('common.jshelper')
            /**Generate Slug*/
            $('input[name="title"]').keyup(function() {
                const title = $(this).val();
                const slug = title.toLowerCase().replace(/ /g, '-').replace(/[-]+/g, '-').replace(
                    /[^\w-]+/g, '');
                $('input[name="slug"]').val(slug);
            });
            // meta Tags
            $("#multiOptionstags").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })
            /*Store Category*/
            $('#blogForm').validate({
                errorClass: "is-invalid",
                validClass: "is-valid",
                rules: {
                    title: {
                        required: true,
                    },
                    slug: {
                        required: true,
                    },
                    "meta_title[]": {
                        required: true,
                    },
                    meta_description: {
                        required: true,
                    },
                    thumbnail: {
                        required: true,
                    },
                    body: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: 'The field is required.'
                    },
                    slug: {
                        required: 'The field is required.'
                    },
                    "meta_title[]": {
                        required: 'The field is required.'
                    },
                    meta_description: {
                        required: 'The field is required.'
                    },
                    thumbnail: {
                        required: 'The field is required.'
                    },
                    body: {
                        required: 'The field is required.'
                    },
                },
                submitHandler: function(form) {
                    const thumbnail = document.getElementById('thumbnail').files[0];
                    const title = $('#blogForm input[name="title"]').val();
                    const slug = $('#blogForm input[name="slug"]').val();
                    const meta_title = $('#blogForm input[name="meta_title"]').val();
                    const meta_description = $('#blogForm input[name="meta_description"]').val();
                    const body = $('#blogForm textarea[name="body"]').val();
                    const formData = new FormData();
                    formData.append('thumbnail', thumbnail);
                    formData.append('title', title);
                    formData.append('slug', slug);
                    formData.append('meta_title', meta_title);
                    formData.append('meta_description', meta_description);
                    formData.append('body', body);
                    formData.append('_token', _token);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.blogs.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            btnDisableHandler('#blogForm .btn-primary', true,
                                'Processing...');
                        },
                        complete: function() {
                            btnDisableHandler('#blogForm .btn-primary', false,
                                'Add New');
                        },
                        success: function(res) {
                            // return console.log(res);
                            if (res.success == true) {
                                sweetAlertMessage('success', res.message);
                                setTimeout(() => {
                                    window.location =
                                        "{{ route('admin.blogs.index') }}";
                                }, 1000);
                            } else if (res.success == false) {
                                if (res.response.title) {
                                    sweetAlertMessage('error', res.response.title[0]);
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
