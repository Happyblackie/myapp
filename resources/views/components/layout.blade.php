<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg" >
        <nav>
            <a href="{{ route('posts.index') }}" class="nav-link">Home</a>

            @auth
                <div class="relative grid place-items-center" x-data="{ open:false }" @click.outside="open=false">
                    {{-- Dropdown menu button --}}
                    <button type="button" class="round-btn" @click="open = !open">
                        <img src="https://picsum.photos/200" alt="profile image">
                    </button>

                    {{-- Dropdown menu --}}
                    <div class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light" x-show="open">
                        <p class="username">{{ auth()->user()->username }}</p>
                        <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Dashboard</a>

                        <form action="{{ route('logout') }}" method="post">
                            {{ csrf_field() }}
                            <button class="block w-full text-left hover:bg-slate-100 pl-4 pr-b py-2">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </div>
            @endguest
       
        </nav>
    </header>

    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{ $slot }}
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>