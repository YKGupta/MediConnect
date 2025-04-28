<style>
    .content{
        width: 30%;
        height: 80%;
        margin-right: 80px;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 3px 3px 5px 1px rgb(255, 210, 210);
    }

    .content .logo{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .content form{
        display: grid;
        grid-template-rows: 3fr 1fr;
        height: calc(100% - 80px);
        margin-bottom: 0px;
    }

    .content .top{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .content input{
        color: #1F2937;
    }
</style>

<x-guest-layout>
    <div class="content">
        <!-- Session Status -->
        <div class="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="top">
                 <!-- Email Address -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
    
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
    
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
    
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
             </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
