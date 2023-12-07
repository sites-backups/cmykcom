@push('scripts')

<script>

    //  const image_uplod_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
    //     const xhr = new XMLHttpRequest();

    //     xhr.withCredentials = false;
    //     xhr.open('POST', '{{ url('admin/image_upload') }}');
    //     var token = '{{csrf_token()}}';
    //     xhr.setRequestHeader("X-CSRF-Token", token);

    //     xhr.upload.onprogress = (e) => {
    //         progress(e.loaded / e.total * 100)
    //     };

    //     xhr.onload = function() {
    //         if(xhr.status === 403)
    //         {
    //             reject({message: 'HTTP Error:' + xhr.status, remove:true});
    //             return;
    //         }
    //         if(xhr.status < 200 || xhr.status >= 300){
    //             reject({message: 'HTTP Error:' + xhr.status});
    //             return;
    //         }



    //         const json = JSON.parse(xhr.responseText);

    //         if(!json || typeof json.location != 'string'){
    //             reject('Invalid Json: ' + xhr.responseText);
    //             return;
    //         }


    //         success(json.location);

    //     };

    //     xhr.onerror = () => {
    //         reject('Image Upload Failed Due to a XHR transport error . Code : ' + xhr.status);
    //     };


    //     formData = new FormData();
    //     formData.append('file', blobInfo.blob(), blobInfo.filename());

    //     xhr.send(formData);

    // });



    tinymce.init({
        selector: 'textarea#editor',  // change this value according to your HTML
        plugins: 'image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
        toolbar: 'formatselect | bold italic strikethrough forecolor backcolor  |image code |alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat |undo redo  | link fontsizeselect  |',
        toolbar_mode: 'floating',
        relative_urls: false,
        /* enable title field in the Image dialog*/
      image_title: true,
      /* enable automatic uploads of images represented by blob or data URIs*/
      automatic_uploads: true,
      /*
        URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
        images_upload_url: 'postAcceptor.php',
        here we add custom filepicker only to Image dialog
      */
      file_picker_types: 'image',
      /* and here's our custom image picker*/
      file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        /*
          Note: In modern browsers input[type="file"] is functional without
          even adding it to the DOM, but that might not be the case in some older
          or quirky browsers like IE, so you might want to add it to the DOM
          just in case, and visually hide it. And do not forget do remove it
          once you do not need it anymore.
        */

        input.onchange = function () {
          var file = this.files[0];

          var reader = new FileReader();
          reader.onload = function () {
            /*
              Note: Now we need to register the blob in TinyMCEs image blob
              registry. In the next release this part hopefully won't be
              necessary, as we are looking to handle it internally.
            */
            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };

        input.click();
      },
    });
    </script>


@endpush
