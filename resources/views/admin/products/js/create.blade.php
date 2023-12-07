@push('scripts')
    <script>
        $(document).ready(function() {



            @include('common.jshelper')

            // meta Tags
            $(".multiOptionstags").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })

            // Multiple image upload function calling

            ImgUpload();

            // multiple image upload creating function
            function ImgUpload() {
                var imgWrap = "";
                var imgArray = [];

                $('.upload__inputfile').each(function() {
                    $(this).on('change', function(e) {
                        imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                        var maxLength = $(this).attr('data-max_length');

                        var files = e.target.files;
                        var filesArr = Array.prototype.slice.call(files);
                        var iterator = 0;
                        filesArr.forEach(function(f, index) {

                            if (!f.type.match('image.*')) {
                                return;
                            }

                            if (imgArray.length > maxLength) {
                                return false
                            } else {
                                var len = 0;
                                for (var i = 0; i < imgArray.length; i++) {
                                    if (imgArray[i] !== undefined) {
                                        len++;
                                    }
                                }
                                if (len > maxLength) {
                                    return false;
                                } else {
                                    imgArray.push(f);

                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        var html =
                                            "<div class='upload__img-box'><div style='background-image: url(" +
                                            e.target.result + ")' data-number='" + $(
                                                ".upload__img-close").length +
                                            "' data-file='" + f.name +
                                            "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                        imgWrap.append(html);
                                        iterator++;
                                    }
                                    reader.readAsDataURL(f);
                                }
                            }
                        });
                    });
                });

                $('body').on('click', ".upload__img-close", function(e) {
                    var file = $(this).parent().data("file");
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i].name === file) {
                            imgArray.splice(i, 1);
                            break;
                        }
                    }
                    $(this).parent().parent().remove();
                });
            }



            /**Generate Slug*/
            $('input[name="prod_title"]').keyup(function() {
                const title = $(this).val();
                const slug = title.toLowerCase().replace(/ /g, '-').replace(/[-]+/g, '-').replace(
                    /[^\w-]+/g, '');
                $('input[name="slug"]').val(slug);
            });


            /**  Storing the form into database with validation  **/

            $('#StoreProductForm').validate({
                errorClass: "is-invalid",
                validClass: "is-valid",
                rules: {
                    "category_id[]": {
                        required: true,
                    },
                    prod_title: {
                        required: true,
                    },
                    slug: {
                        required: true,
                    },

                    short_description: {
                        required: true
                    },
                    meta_title: {
                        required: true
                    },
                    meta_description: {
                        required: true
                    },
                    body: {
                        required: true
                    },
                    "thumbnail[]": {
                        required: true
                    },
                },
                messages: {
                    "category_id[]": {
                        required: 'Please select categories'
                    },
                    prod_title: {
                        required: 'The Product title is required.'
                    },
                    slug: {
                        required: 'The slug field is required.'
                    },

                    short_description: {
                        required: 'The Short Description Field field is required.'
                    },
                    meta_title: {
                        required: 'The field is required.'
                    },
                    meta_description: {
                        required: 'The field is required.'
                    },
                    "thumbnail": {
                        required: 'The field is required.'
                    },
                    body:{
                        required:"THe Field is required"
                    }

                },
                submitHandler: function(form) {

                    // const thumbnail = document.getElementById('thumbnail').files[0];
                    // const thumbnail = $('#StoreProductForm input[name="thumbnail[]"]').map(function() {
                    //     return $(this).val();
                    // }).get();

                    // const totalImages = $("#images")[0].files.length;
                    // let images = $("#images")[0];
                    const category_id = $('#StoreProductForm select[name="category_id[]"]').val();
                    const prod_title = $('#StoreProductForm input[name="prod_title"]').val();
                    const slug = $('#StoreProductForm input[name="slug"]').val();
                    const short_description = $('#StoreProductForm textarea[name="short_description"]').val();
                    const body = $('#StoreProductForm textarea[name="body"]').val();
                    const meta_title = $('#StoreProductForm #meta_title').val();
                    const meta_description = $('#StoreProductForm #meta_description').val();
                    // return console.log(prod_qty);
                    //    return console.log({thumbnail,category_id,category_id,prod_title,slug,prod_sku,prod_qty,prod_fabric,prod_color
                    //     ,prod_sizes,local_shipping,international_shipping,disclaimer,short_description,body,pkr_price
                    //     ,uae_price,qatari_price,saudi_price,us_price,uk_price,cad_price,euro_price,discount,net_price,meta_title
                    //     ,meta_tags,meta_description});
                    const formData = new FormData();
                    let TotalImages = $('#images')[0].files.length; //Total Images
                    let images = $('#images')[0];
                    for (let i = 0; i < TotalImages; i++) {
                    formData.append('images' + i, images.files[i]);
                    }
                    formData.append('TotalImages', TotalImages);
                    formData.append('category_id', category_id);
                    formData.append('prod_title', prod_title);
                    formData.append('slug', slug);
                    formData.append('short_description', short_description);
                    formData.append('body', body);
                    formData.append('meta_title',meta_title);
                    formData.append('meta_description', meta_description);
                    formData.append('_token', _token);
                    formData.append('method', "POST");

                    // return formData;
                    $.ajax({
                        url: "{{ route('admin.products.store') }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            btnDisableHandler('#StoreProductForm .btn-primary', true,
                                'Processing...');
                        },
                        complete: function() {
                            btnDisableHandler('#StoreProductForm .btn-primary', false,
                                'Save');
                        },
                        success: function(res) {
                            // return console.log(res);
                            if (res.success == true) {
                                $('#StoreProductForm')[0].reset();
                                sweetAlertMessage('success', res.message);
                                setTimeout(() => {
                                    window.location =
                                        "{{ route('admin.products.index') }}";
                                }, 1000);
                            } else if (res.success == false) {
                                if (res.response.name) {
                                    sweetAlertMessage('error', res.response.name[0]);
                                }
                                else if (res.response.slug) {
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


        });
    </script>
@endpush
