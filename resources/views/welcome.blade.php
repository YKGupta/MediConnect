<style>
    .guest-welcome-container{
        width: 100%;
        height: calc(100vh - 60px);
        background-image: url('bg.png');
        background-color: #FEA194;
        background-size: contain;
        background-position: left;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
        color: white;
    }

    .guest-welcome-container .content{
        width: 50%;
        padding: 0px 10%;
    }

    .guest-welcome-container .content h1{
        font-size: 72px;
        font-weight: bold;
    }

    .guest-welcome-container .content h1, .guest-welcome-container .content p{
        text-align: center;
    }

    .guest-welcome-container .content div{
        margin: 20px 0px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .guest-welcome-container a{
        background: transparent;
        border: 1px solid white;
        padding: 7px 10px;
        border-radius: 7px;
        color: white;
        font-weight: 500;
        transition: all 0.25s;
    }

    .guest-welcome-container a:hover{
        background-color:rgba(253, 145, 131, 0.49);
    }

    .guest-welcome-container > footer{
        width: 100%;
        text-align: center;
        font-size: 14px;
        color:rgba(255, 255, 255, 0.7);
        position: absolute;
        bottom: 0;
        padding: 10px 0px;
    }
</style>

<x-guest-layout>
    <div class="guest-welcome-container">
        
        <!-- Hero Section -->
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

        <!-- Footer -->
        <footer>
            &copy; {{ date('Y') }} MediConnect. All rights reserved.
        </footer>
    </div>
</x-guest-layout>
