<div class="modal" id="new_record">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">New Permission <i class="fe fe-plus-circle"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.roles.store') }}" class="" data-parsley-validate="">
                @csrf
                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group">
                        <label class="form-label">Name: <span class="tx-danger">*</span></label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required>
                    </div>

                    <!-- Permissions -->
                    <div class="form-group">
                        <label class="form-label">Name: <span class="tx-danger">*</span></label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">Add</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
