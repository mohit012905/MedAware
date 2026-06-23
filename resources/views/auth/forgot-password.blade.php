<x-guest-layout>
    <!-- ========================================= -->
    <!-- FORGOT PASSWORD PAGE - MATCHING DESIGN -->
    <!-- ========================================= -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-50 via-white to-cyan-50 px-4 relative overflow-hidden">

        <!-- ========================================= -->
        <!-- ANIMATED BACKGROUND BLOBS -->
        <!-- ========================================= -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-emerald-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30 animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-200 rounded-full blur-3xl opacity-20 animate-pulse delay-2000"></div>

        <!-- ========================================= -->
        <!-- MAIN CONTAINER - INCREASED WIDTH -->
        <!-- ========================================= -->
        <div class="w-full max-w-lg relative z-10">

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
                <p class="text-sm text-gray-500 mt-1">Reset Your Password</p>
            </div>

            <!-- ========================================= -->
            <!-- FORGOT PASSWORD CARD -->
            <!-- ========================================= -->
            <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-8 sm:p-10 border border-gray-100/50">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-sm text-emerald-600" :status="session('status')" />

                <!-- Info Text -->
                <div class="mb-5 text-sm text-gray-600 leading-relaxed">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
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
                                autocomplete="email"
                                placeholder="Enter your email address"
                                class="w-full pl-10 pr-4 py-3.5 text-base border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('email') border-red-500 @enderror"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-sm text-red-600" />
                    </div>

                    <!-- ========================================= -->
                    <!-- SUBMIT BUTTON -->
                    <!-- ========================================= -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-emerald-200/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl flex items-center justify-center gap-2 group text-base"
                    >
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Send Reset Link
                    </button>

                    <!-- ========================================= -->
                    <!-- BACK TO LOGIN LINK -->
                    <!-- ========================================= -->
                    <div class="text-center pt-2">
                        <p class="text-sm text-gray-600">
                            Remember your password?
                            <a href="{{ route('login') }}" class="text-emerald-600 hover:text-emerald-700 font-semibold hover:underline transition-all">
                                Back to Login
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
</x-guest-layout>