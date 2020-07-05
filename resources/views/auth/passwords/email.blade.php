@include('layout.header')
<style>
    body{
        padding-top: 0;
    }
</style>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                @csrf

                <span class="login100-form-title p-b-55">
					{{ __('Reset Password') }}
					</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">

                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}" >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="container-login100-form-btn p-t-25">

                    <button type="submit" class="login100-form-btn">
                        {{ __('Send Password Reset Link') }}
                    </button>

                </div>


            </form>
        </div>
    </div>
</div>



@include('layout.footer')

