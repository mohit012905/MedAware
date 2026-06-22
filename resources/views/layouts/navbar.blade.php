<nav class="bg-white shadow-md sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-20">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3">

                <img src="{{ asset('images/logo.png') }}" class="w-10 h-10">

                <span class="text-4xl font-bold text-green-600">

                    MedAware

                </span>

            </a>

            <!-- Guest Menu -->
            @guest

            <div class="flex items-center gap-8">

                <a href="/" class="hover:text-green-600">Home</a>

                <a href="#features" class="hover:text-green-600">Features</a>

                <a href="#about" class="hover:text-green-600">About</a>

                <a href="#contact" class="hover:text-green-600">Contact</a>

                <a href="{{ route('login') }}"
                   class="text-green-600 font-semibold">

                    Login

                </a>

                <a href="{{ route('register') }}"
                   class="bg-green-600 text-white px-6 py-2 rounded-lg">

                    Register

                </a>

            </div>

            @endguest


            <!-- Logged-in Menu -->
            @auth

            <div class="flex items-center gap-8">

                <a href="{{ route('dashboard') }}">Dashboard</a>

                <a href="{{ route('chat') }}">Chatbot</a>

                <a href="{{ route('hospitals') }}">Hospitals</a>

                <a href="{{ route('appointments') }}">Appointments</a>

                <a href="{{ route('health.logs') }}">Health Logs</a>

                <a href="{{ route('alerts') }}">Alerts</a>

                <a href="{{ route('profile.edit') }}">Profile</a>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="bg-red-500 text-white px-5 py-2 rounded-lg">

                        Logout

                    </button>

                </form>

            </div>

            @endauth

        </div>

    </div>

</nav>