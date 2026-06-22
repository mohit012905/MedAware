<x-guest-layout>
    <!-- ========================================= -->
    <!-- REGISTER PAGE - INCREASED FONT SIZE -->
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
                <h2 class="mt-3 text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">
                    MedAware
                </h2>
                <p class="text-sm text-gray-500 mt-1">AI-Powered Public Health Assistant</p>
            </div>

            <!-- ========================================= -->
            <!-- REGISTER CARD -->
            <!-- ========================================= -->
            <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-6 sm:p-8 border border-gray-100/50">

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- ========================================= -->
                    <!-- FULL NAME FIELD -->
                    <!-- ========================================= -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter your full name"
                                class="w-full pl-10 pr-4 py-3 text-base border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('name') border-red-500 @enderror"
                            >
                        </div>
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

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
                                autocomplete="username"
                                placeholder="Enter your email address"
                                class="w-full pl-10 pr-4 py-3 text-base border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('email') border-red-500 @enderror"
                            >
                        </div>
                        @error('email')
                            <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
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
                                autocomplete="new-password"
                                placeholder="Create a strong password"
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
                        @error('password')
                            <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="mt-1.5 text-xs text-gray-500 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Password must be at least 8 characters
                        </p>
                    </div>

                    <!-- ========================================= -->
                    <!-- CONFIRM PASSWORD FIELD -->
                    <!-- ========================================= -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password"
                                class="w-full pl-10 pr-12 py-3 text-base border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('password_confirmation') border-red-500 @enderror"
                            >
                            <button
                                type="button"
                                onclick="togglePassword('password_confirmation', this)"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                            >
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- ========================================= -->
                    <!-- TERMS & CONDITIONS -->
                    <!-- ========================================= -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input
                                id="terms"
                                type="checkbox"
                                required
                                class="w-4 h-4 border-2 border-gray-300 rounded focus:ring-emerald-500 text-emerald-600 transition-all duration-200"
                            >
                        </div>
                        <label for="terms" class="ml-3 text-sm text-gray-600 leading-relaxed">
                            I agree to the
                            <a href="#" class="text-emerald-600 hover:text-emerald-700 font-medium hover:underline transition-all">Terms of Service</a>
                            and
                            <a href="#" class="text-emerald-600 hover:text-emerald-700 font-medium hover:underline transition-all">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- ========================================= -->
                    <!-- SUBMIT BUTTON -->
                    <!-- ========================================= -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-emerald-200/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl flex items-center justify-center gap-2 group text-base"
                    >
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Create Account
                    </button>

                    <!-- ========================================= -->
                    <!-- DIVIDER -->
                    <!-- ========================================= -->
                    <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white/80 backdrop-blur-sm text-gray-400">or</span>
                        </div>
                    </div>

                    <!-- ========================================= -->
                    <!-- SOCIAL LOGIN -->
                    <!-- ========================================= -->
                   

                    <!-- ========================================= -->
                    <!-- LOGIN LINK -->
                    <!-- ========================================= -->
                    <div class="text-center pt-1">
                        <p class="text-sm text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-emerald-600 hover:text-emerald-700 font-semibold hover:underline transition-all">
                                Sign in
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
                    By registering, you agree to our
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