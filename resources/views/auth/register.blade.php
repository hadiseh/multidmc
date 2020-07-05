@include('layout.header')
<style>
    body{
        padding-top: 0;
    }
</style>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf

                <span class="login100-form-title p-b-55">
						Register
					</span>


                <div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
                    <input class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name') }}" >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<span class="lnr lnr-pencil"></span>
						</span>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
                    <input  id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}" >
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
                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="{{ __('Password') }}">
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



                <div class="wrap-input100 validate-input m-b-16" data-validate = "Confirm Password is required">
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>

                </div>

                <div class="contact100-form-checkbox m-l-4">

                    <input class="input-checkbox100"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="label-checkbox100" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="container-login100-form-btn p-t-25">
                    <button class="login100-form-btn" type="submit">
                        {{ __('Register') }}
                    </button>

                </div>





                <div class="text-center w-full p-t-115">
						<span class="txt1">
							Already Have account?
						</span>

                    <a class="txt1 bo1 hov1" href="{{route('login')}}">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




@include('layout.footer')
