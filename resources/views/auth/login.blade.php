@include('layout.header')
<style>
    body{
        padding-top: 0;
    }
</style>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf

                <span class="login100-form-title p-b-55">
						Login
					</span>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email"  placeholder="{{ __('E-Mail Address') }}" >
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

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                    <input class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  type="password"  placeholder="{{ __('Password') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="contact100-form-checkbox m-l-4">

                    <input class="input-checkbox100"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="label-checkbox100" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="container-login100-form-btn p-t-25">
                    <button class="login100-form-btn">
                        Login
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>





                <div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>

                    <a class="txt1 bo1 hov1" href="{{route('register')}}">
                        Sign up now
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




@include('layout.footer')
