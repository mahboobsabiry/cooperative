@extends('layouts.login.master')

@section('title', config('app.name') . ' | ' . trans('admin.login.resetPassword'))

@section('content')
    <div class="card custom-card">
        <div class="card-body">
            <h4 class="text-center">@lang('admin.login.resetPassword')</h4>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email Address -->
                <div class="form-group text-right">
                    <label for="email">@lang('form.email')</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $email ?? old('email') }}"
                           placeholder="@lang('admin.login.enterYourEmail')"
                           required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--/==/ End of Email Address -->

                <!-- Password -->
                <div class="form-group text-right">
                    <label for="password">@lang('form.password')</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="@lang('admin.login.enterYourPassword')" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--/==/ End of Password -->

                <!-- Confirm Password -->
                <div class="form-group text-right">
                    <label for="confirm-password">@lang('admin.login.confirmPassword')</label>

                    <input id="confirm-password" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>
                <!--/==/ End of Confirm Password -->

                <button class="btn ripple btn-main-primary btn-block" type="submit">@lang('admin.login.resetPassword')</button>
            </form>
        </div>
    </div>
@endsection
