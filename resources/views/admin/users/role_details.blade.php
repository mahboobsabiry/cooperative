<!-- Show -->
<div class="modal" id="role_details{{ $role->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header rounded-0 bg-gray-300">
                <h6 class="modal-title">@lang('pages.roles.permissionsOf') {{ $role->name }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="row border-1">
                    @foreach($role->permissions as $permission)
                        <div class="tag tag-success tag-pill m-1 pr-0">
                            <span class="tag tag-dark tag-pill ml-1 mr-0">{{ $loop->iteration }}</span>
                            {{ $permission->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--/==/ End of Show -->
