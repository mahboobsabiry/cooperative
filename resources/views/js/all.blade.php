<script>
    $(document).ready(function(){
        // Admin Logout
        $("#logout-account").click(function(){
            // e.preventDefault();
            swal({
                title: '{{ trans('global.areYouSure') }}',
                text: '{{ trans('messages.logoutMsg') }}',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: '{{ trans('global.cancel') }}',
                confirmButtonText: '{{ trans('global.yes') }}',
                confirmButtonClass: 'btn btn-success btn mr-1 ml-1',
                cancelButtonClass: 'btn btn-dark btn'
            }, function() {
                window.location.href = '/admin/logout';
            });
        });
        // |/==/ End of Admin Logout

        // Confirm Deletion of Record
        $(".confirmDelete").click(function(){
            var record = $(this).attr("record");
            var recordid = $(this).attr("recordid");
            swal({
                title: "{{ trans('global.areYouSure') }}",
                text: "{{ trans('messages.dontAbleToSeeDelMsg') }}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '{{ trans('global.cancel') }}',
                confirmButtonText: '{{ trans('messages.yesDelete') }}',
                confirmButtonClass: 'btn btn-success btn mr-1 ml-1',
                cancelButtonClass: 'btn btn-warning btn',
                buttonsStyling: false
            },function() {
                window.location.href = '/admin/delete-'+record+'/'+recordid;
            });
            return false;
        });

        // Slide up dismiss alert messages
        $('#alertMessages').slideUp(10000);

        // Dropzone
        var drEvent = $('.dropify').dropify({
            messages: {
                'default': '{{ trans('form.dropzone.dragDropFileMsg') }}',
                'replace': '{{ trans('form.dropzone.replaceImgMsg') }}',
                'remove': '{{ trans('global.remove') }}',
                'error': '{{ trans('form.dropzone.oppsErrMsg') }}'
            }
        });

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("آیا مطمئین هستید که فایل " + element.filename + " را حذف می‌کنید؟");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            //
        });

        // CKEditor5
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                language: {
                    // The UI will be English.
                    ui: '{{ app()->getLocale() == 'en' ? 'en' : 'dr' }}',

                    // But the content will be edited in Farsi.
                    content: '{{ app()->getLocale() == 'en' ? 'en' : 'dr' }}'
                },
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    });
</script>
