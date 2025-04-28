<style>
    .content{
        width: 50%;
        padding: 0px 10%;
    }

    .content h1{
        font-size: 72px;
        font-weight: bold;
    }

    .content p{
        text-align: center;
    }

    .content div{
        margin: 20px 0px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    a{
        background: transparent;
        border: 1px solid white;
        padding: 7px 10px;
        border-radius: 7px;
        color: white;
        font-weight: 500;
        transition: all 0.25s;
    }

    a:hover{
        background-color:rgba(253, 145, 131, 0.49);
    }
</style>

<x-guest-layout>
    <div class="content">
        <h1>
            MediConnect
        </h1>
        <p>
            Fast and reliable emergency support. Connect with nearby medical facilities instantly.
        </p>

        <div>
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">
                        Go to Admin Dashboard
                    </a>
                @else
                    <a href="{{ route('emergency.create') }}">
                        File a Medical Emergency
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}">
                    Login to Report Emergency
                </a>
            @endauth
        </div>
    </div>
</x-guest-layout>
