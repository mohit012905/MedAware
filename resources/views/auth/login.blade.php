<x-guest-layout>
    <!-- ========================================= -->
    <!-- LOGIN PAGE - INCREASED FONT SIZE -->
    <!-- ========================================= -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-50 via-white to-cyan-50 px-4 relative overflow-hidden">

        <!-- ========================================= -->
        <!-- ANIMATED BACKGROUND BLOBS -->
        <!-- ========================================= -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-emerald-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30 animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-200 rounded-full blur-3xl opacity-20 animate-pulse delay-2000"></div>

        <!-- ========================================= -->
        <!-- MAIN CONTAINER -->
        <!-- ========================================= -->
        <div class="w-full max-w-md relative z-10">

            <!-- ========================================= -->
            <!-- BRANDING HEADER -->
            <!-- ========================================= -->
            <div class="text-center mb-5">
                
                    <div class="w-20 h-20 mx-auto bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-2xl flex items-center justify-center text-4xl shadow-lg shadow-emerald-200/50">
                        🩺
                    </div>
                </a>
                <h2 class="mt-3 text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">
                    MedAware
                </h2>
                <p class="text-sm text-gray-500 mt-1">AI-Powered Public Health Assistant</p>
            </div>

            <!-- ========================================= -->
            <!-- LOGIN CARD -->
            <!-- ========================================= -->
            <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-6 sm:p-8 border border-gray-100/50">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-sm text-emerald-600" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- ========================================= -->
                    <!-- EMAIL FIELD -->
                    <!-- ========================================= -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Enter your email address"
                                class="w-full pl-10 pr-4 py-3 text-base border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('email') border-red-500 @enderror"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-sm text-red-600" />
                    </div>

                    <!-- ========================================= -->
                    <!-- PASSWORD FIELD -->
                    <!-- ========================================= -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                class="w-full pl-10 pr-12 py-3 text-base border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('password') border-red-500 @enderror"
                            >
                            <button
                                type="button"
                                onclick="togglePassword('password', this)"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                            >
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-sm text-red-600" />
                    </div>

                    <!-- ========================================= -->
                    <!-- REMEMBER ME & FORGOT PASSWORD -->
                    <!-- ========================================= -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center cursor-pointer">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="w-4 h-4 border-2 border-gray-300 rounded focus:ring-emerald-500 text-emerald-600 transition-all duration-200"
                            >
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium hover:underline transition-all">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- ========================================= -->
                    <!-- LOGIN BUTTON -->
                    <!-- ========================================= -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-emerald-200/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl flex items-center justify-center gap-2 group text-base"
                    >
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Log In
                    </button>

                    <!-- ========================================= -->
                    <!-- DIVIDER -->
                    <!-- ========================================= -->
                    <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white/80 backdrop-blur-sm text-gray-400">or continue with</span>
                        </div>
                    </div>

                    <!-- ========================================= -->
                    <!-- SOCIAL LOGIN -->
                    <!-- ========================================= -->
                  
                    <!-- ========================================= -->
                    <!-- REGISTER LINK -->
                    <!-- ========================================= -->
                    <div class="text-center pt-1">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-emerald-600 hover:text-emerald-700 font-semibold hover:underline transition-all">
                                Create one
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- ========================================= -->
            <!-- FOOTER -->
            <!-- ========================================= -->
            <div class="mt-4 text-center">
                <p class="text-xs text-gray-400">
                    By continuing, you agree to our
                    <a href="#" class="text-emerald-500 hover:text-emerald-600 hover:underline transition-all">Terms</a>
                    and
                    <a href="#" class="text-emerald-500 hover:text-emerald-600 hover:underline transition-all">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>

    <!-- ========================================= -->
    <!-- SCRIPTS -->
    <!-- ========================================= -->
    <script>
        function togglePassword(id, button) {
            const input = document.getElementById(id);

            if (input.type === 'password') {
                input.type = 'text';
                button.innerHTML = `
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>
                `;
            } else {
                input.type = 'password';
                button.innerHTML = `
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                `;
            }
        }
    </script>
</x-guest-layout>