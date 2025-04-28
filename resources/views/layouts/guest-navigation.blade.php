<style>
    .guest-navbar{
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
        background-color: white;
        border-bottom: 1px solid #80808045;
    }

    .guest-navbar .left, .guest-navbar .right{
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .guest-navbar .left > span{
        font-size: 22px;
    }

    .guest-navbar .right > a{
        background-color: #FF6B6B;
        padding: 7px 10px;
        border-radius: 7px;
        color: white;
        font-weight: 500;
        transition: all 0.25s;
    }

    .guest-navbar .right > a:hover{
        background-color:rgb(253, 94, 94);
    }
</style>

<nav class="guest-navbar">
    <!-- Left Side: Logo + App Name -->
    <div class="left">
        <a href="{{ route('home') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-red-600" />
        </a>
        <span>MediConnect</span>
    </div>

    <!-- Right Side: Login & Sign Up Buttons -->
    <div class="right">
        @auth
            <a href="@if (auth()->user()->role === 'admin') 
                        {{ route('admin.dashboard') }}
                    @else
                        {{ route('dashboard') }}
                    @endif
                    ">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}">
                Login
            </a>
            <a href="{{ route('register') }}">
                Sign Up
            </a>
        @endauth
    </div>
</nav>
