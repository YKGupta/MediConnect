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
        <div class="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="top">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
