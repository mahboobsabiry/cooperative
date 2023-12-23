@if(session()->has('message'))
	<div class="alert alert-solid-{{ session()->get('alertType') }}" role="alert" id="alertMessages">
		<button aria-label="Close" class="close" data-dismiss="alert" type="button">
		<span aria-hidden="true">&times;</span></button>
		{{ session()->get('message') }}
	</div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger mg-b-2" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong@lang('global.oh')!</strong> {{ $error }}
        </div>
    @endforeach
@endif
