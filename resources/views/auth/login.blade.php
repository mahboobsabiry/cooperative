@extends('layouts.login.master')
@section('title', config('app.name') . ' | ' . trans('global.login'))
@section('content')
    <div class="card custom-card">
        <div class="card-body">
            <h4 class="text-center">@lang('admin.login.loginToYourAcc')</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Username -->
                <div class="form-group text-right">
                    <label for="username">@lang('form.username')</label>

                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="@lang('form.username')" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--/==/ End of Username -->

                <!-- Password -->
                <div class="form-group text-right">
                    <label for="password">@lang('form.password')</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="@lang('admin.login.enterYourPassword')" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--/==/ End of Password -->

                <!-- Remember Me -->
                <div class="form-group text-left">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!--/==/ End of Remember Me -->

                <button class="btn ripple btn-main-primary btn-block" type="submit">@lang('global.login')</button>
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

