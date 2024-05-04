<!-- Delete -->
<div class="modal" id="new_file{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">ثبت سند/مدرک جدید</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.office.employees.new_file', $employee->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="mb-2">
                        <span class="caption bg-gray-300">نوت: فایل آپلود شده باید از نوع عکس بوده باشد، فرمن های (.jpg .png .jpeg) مجاز می باشد.</span>
                    </p>

                    <div class="bd p-2">
                        <input type="file" id="file" class="form-control-file" name="file" accept="image/*" data-height="200" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.cancel')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
