@push('scripts')
    <script>
        $(document).ready(function(){
            @include('common.jshelper')
            const BlogDataTable = $('#BlogTble').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                },
                ajax: "{{ route('admin.blogs.index') }}",
                columns: [{
                        "data": "Row_Index_ID"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "slug"
                    },
                    {
                        "mRender": function(data, type, row) {
                            let url = "{{ route('admin.blogs.edit', ':id') }}";
                            url = url.replace(':id', row.id);
                            return `
                    <input type="hidden" name="title" value="${row.title}">
                    <input type="hidden" name="slug" value="${row.slug}">
                    <input type="hidden" name="meta_title" value="${row.meta_title}">
                    <input type="hidden" name="meta_tags" value="${row.meta_tags}">
                    <input type="hidden" name="slug" value="${row.slug}">
                    <a href="${url}" class="btn btn-outline-info btn-sm edit-role-record" data-id="${row.id}"><i class="fa fa-trash mg-r-10" ></i> Edit</a>
                    <button class="btn btn-outline-danger btn-sm delete-role-record" data-id="${row.id}"><i class="fa fa-trash mg-r-10" ></i> Delete</button>
                    `;
                        }
                    }
                ]
            });
            /**  Coupan Delete function  **/
            $('body').delegate('.delete-role-record', 'click', function() {
                const id = $(this).attr('data-id');
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
                        let url = "{{ route('admin.blogs.destroy', ':id') }}";
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
                                    BlogDataTable.ajax.reload();
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
        });
    </script>
@endpush
