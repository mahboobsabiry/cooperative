<div class="modal" id="edit_record{{ $permission->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Edit Permission <i class="fe fe-edit"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.permissions.update', $permission->id) }}" class="" data-parsley-validate="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group">
                        <label class="form-label">Name: <span class="tx-danger">*</span></label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $permission->name ?? old('name') }}" placeholder="Name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">Update</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
