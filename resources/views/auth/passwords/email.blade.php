@extends('layouts.login.master')
@section('title', config('app.name') . ' | ' . trans('admin.login.forgotPassword'))
@section('content')
    <div class="card custom-card">
        @include('admin.inc.alerts')

        <div class="card-body">
            <h4 class="text-center">@lang('admin.login.forgotPassword')</h4>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <div class="form-group text-right">
                    <label for="email">@lang('form.email')</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="@lang('admin.login.enterYourEmail')" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--/==/ End of Email Address -->

                <button class="btn ripple btn-main-primary btn-block" type="submit">@lang('admin.login.sendResetLink')</button>
            </form>

            <div class="mt-3 text-center">
                <p class="mb-0">@lang('admin.login.didYouRemembered')</p>
                <p class="mb-1">
                    <a href="{{ route('login') }}" class="ctd">@lang('admin.login.signIn')</a>
                </p>
            </div>
        </div>
    </div>
@endsection
