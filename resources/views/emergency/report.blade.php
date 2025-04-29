<style>
    .content{
        width: 30%;
        height: 80%;
        margin-left: 80px;
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

<x-emergency-layout>
    <div class="content">
        <div class="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <form action="/emergency/report" method="POST">
            @csrf
            <div class="top">
                <div>
                    <x-input-label for="type" :value="__('Type of Emergency')" />
                    <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus autocomplete="type" />
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="location" :value="__('Your Location')" />
                    <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus autocomplete="location" />
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Report Emergency') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-emergency-layout>