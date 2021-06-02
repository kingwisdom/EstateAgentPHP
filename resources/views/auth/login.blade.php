<x-guest-layout>
   
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                    @csrf
					<span class="login100-form-title p-b-32">
						Account Login
					</span>
                    <x-jet-validation-errors class="mb-4" style="color: red;" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="email" name="email" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required autocomplete="current-password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
                            @if (Route::has('password.request'))
                                <a class="txt3" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                             @endif
							
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
                        
					</div>
                    <div style="margin-top: 20px;"></div>
                    <div class="form-horizontal mx-auto">
                        <a href="/">Goto Home</a>
                        <a class="ml-3 mr-3">|</a>
                        <a href="{{route('register')}}">Register</a>
                    </div>

				</form>
			</div>
		</div>
	</div>
	
</x-guest-layout>
