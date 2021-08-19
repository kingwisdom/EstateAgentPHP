<x-guest-layout>
    <div class="limiter">
        <div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
               <p class="text-danger"> {{ session('status') }} </p>
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('requestemail') }}">
            @csrf
            <span class="login100-form-title p-b-32">
                Forgot Password
            </span>
            <div class="block">
                <label for="email" value="{{ __('Email') }}" />
                <input id="email" placeholder="Enter your email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="login100-form-btn" type="submit">
                    {{ __('Email Password Reset Link') }}
                </button>
                
            </div>
            
        </form>
        <div style="margin-top: 30px;"></div>
            <a class="text-center mt-5" href="/">Back to Home</a>
            </div>
            
        </div>
    </div>
</x-guest-layout>
