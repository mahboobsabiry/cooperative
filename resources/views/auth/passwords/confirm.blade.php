@extends('layouts.login.master')

@section('title', config('app.name') . ' | ' . trans('admin.login.confirmPassword'))

@section('content')
    <div class="card custom-card">
        <div class="card-body">
            <p>@lang('admin.login.pleaseConfirmPsd')</p>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="form-group text-right">
                    <label for="password">@lang('form.password')</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--/==/ End of Password -->

                <button class="btn ripple btn-main-primary btn-block" type="submit">@lang('admin.login.resetPassword')</button>
            </form>

            <div class="mt-3 text-center">
                @if (Route::has('password.request'))
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}" class="ctd">@lang('admin.login.forgotPassword')</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
