<div class="modal" id="delete_record{{ $permission->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Delete Permission <i class="fe fe-delete"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.permissions.destroy', $permission->id) }}" class="" data-parsley-validate="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">Yes</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">No</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
