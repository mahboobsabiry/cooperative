<!-- Show -->
<div class="modal" id="show_record{{ $role->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header rounded-0 bg-gray-300">
                <h6 class="modal-title">@lang('pages.roles.permissionsOf') {{ $role->name }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                @foreach($role->permissions as $permission)
                    <div class="tag tag-success tag-pill mt-1 mb-1 pr-0">
                        <span class="tag tag-dark tag-pill ml-1 mr-0">{{ $loop->iteration }}</span>
                        {{ $permission->name }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--/==/ End of Show -->

<!-- Delete -->
<div class="modal" id="delete_record{{ $role->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('pages.roles.deleteRole') <i class="fe fe-trash"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.roles.destroy', $role->id) }}" data-parsley-validate="">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>@lang('global.areYouSure')</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.yes')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.no')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
