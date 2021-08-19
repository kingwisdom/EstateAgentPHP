<x-guest-layout>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <form method="POST" action="{{ route('postresetpassword') }}">
                    @csrf
        
                    <span class="login100-form-title p-b-32">
                        Reset Password
                    </span>
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                        <p class="text-danger"> {{ session('status') }} </p>
                        </div>
                    @endif
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
        
        
                    <div class="flex items-center justify-end mt-4">
                        
        
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit">
                                Reset Password
                            </button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-guest-layout>

