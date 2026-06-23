@extends('layouts.app')

@section('content')
    <!-- ========================================= -->
    <!-- PROFILE PAGE - ENHANCED DESIGN -->
    <!-- ========================================= -->
    <div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-cyan-50 py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden">

        <!-- ========================================= -->
        <!-- ANIMATED BACKGROUND BLOBS -->
        <!-- ========================================= -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-emerald-200 rounded-full blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-20 animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-200 rounded-full blur-3xl opacity-10 animate-pulse delay-2000"></div>

        <div class="max-w-4xl mx-auto relative z-10">

            <!-- ========================================= -->
            <!-- PAGE HEADER -->
            <!-- ========================================= -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">
                    My Profile
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage your account settings and preferences</p>
            </div>

            <!-- ========================================= -->
            <!-- PROFILE CARD -->
            <!-- ========================================= -->
            <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl border border-gray-100/50 overflow-hidden">

                <!-- ========================================= -->
                <!-- PROFILE HEADER -->
                <!-- ========================================= -->
                <div class="bg-gradient-to-r from-emerald-600 to-cyan-600 px-6 sm:px-8 py-8">
                    <div class="flex flex-col sm:flex-row items-center gap-6">
                        <!-- Avatar -->
                        <div class="relative">
                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=16a34a&size=120&bold=true"
                                class="w-28 h-28 rounded-full border-4 border-white/50 shadow-xl"
                                alt="{{ Auth::user()->name }}"
                            >
                            <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                        </div>

                        <!-- User Info -->
                        <div class="text-center sm:text-left text-white">
                            <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
                            <p class="text-emerald-100 text-sm">{{ Auth::user()->email }}</p>
                            <div class="flex flex-wrap items-center gap-3 mt-2">
                                <span class="text-xs bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-white">
                                    🩺 Patient
                                </span>
                                @if(isset(Auth::user()->unique_code))
                                    <span class="text-xs bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-white">
                                        🔑 {{ Auth::user()->unique_code }}
                                    </span>
                                @endif
                                <span class="text-xs bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-white">
                                    📅 Joined {{ Auth::user()->created_at->format('M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================= -->
                <!-- PROFILE CONTENT -->
                <!-- ========================================= -->
                <div class="p-6 sm:p-8 space-y-8">

                    <!-- ========================================= -->
                    <!-- UPDATE PROFILE INFORMATION -->
                    <!-- ========================================= -->
                    <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100/50">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center text-white text-lg">
                                👤
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Profile Information</h3>
                                <p class="text-xs text-gray-500">Update your account details and preferences</p>
                            </div>
                        </div>
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <!-- ========================================= -->
                    <!-- UPDATE PASSWORD -->
                    <!-- ========================================= -->
                    <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100/50">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center text-white text-lg">
                                🔒
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Change Password</h3>
                                <p class="text-xs text-gray-500">Ensure your account security with a strong password</p>
                            </div>
                        </div>
                        @include('profile.partials.update-password-form')
                    </div>

                    <!-- ========================================= -->
                    <!-- DELETE ACCOUNT -->
                    <!-- ========================================= -->
                    <div class="bg-red-50/50 rounded-2xl p-6 border border-red-200/50">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center text-white text-lg">
                                ⚠️
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-red-700">Delete Account</h3>
                                <p class="text-xs text-red-600/70">Permanently remove your account and all associated data</p>
                            </div>
                        </div>
                        @include('profile.partials.delete-user-form')
                    </div>

                    <!-- ========================================= -->
                    <!-- ACCOUNT STATISTICS -->
                    <!-- ========================================= -->
                    <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100/50">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center text-white text-lg">
                                📊
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Account Statistics</h3>
                                <p class="text-xs text-gray-500">Your activity at a glance</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                                <p class="text-2xl font-bold text-emerald-600">12</p>
                                <p class="text-xs text-gray-500">Health Logs</p>
                            </div>
                            <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                                <p class="text-2xl font-bold text-blue-600">8</p>
                                <p class="text-xs text-gray-500">Appointments</p>
                            </div>
                            <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                                <p class="text-2xl font-bold text-purple-600">5</p>
                                <p class="text-xs text-gray-500">AI Assessments</p>
                            </div>
                            <div class="bg-white rounded-xl p-3 text-center shadow-sm">
                                <p class="text-2xl font-bold text-orange-600">3</p>
                                <p class="text-xs text-gray-500">Active Alerts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- QUICK NAVIGATION -->
            <!-- ========================================= -->
            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-3">
                <a href="{{ route('dashboard') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">🏠</div>
                    <p class="text-xs font-medium text-gray-700">Dashboard</p>
                </a>
                <a href="{{ route('health.logs') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">📋</div>
                    <p class="text-xs font-medium text-gray-700">Health Logs</p>
                </a>
                <a href="{{ route('appointments') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">📅</div>
                    <p class="text-xs font-medium text-gray-700">Appointments</p>
                </a>
                <a href="{{ route('chat') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">🤖</div>
                    <p class="text-xs font-medium text-gray-700">AI Chat</p>
                </a>
            </div>

            <!-- ========================================= -->
            <!-- FOOTER INFO -->
            <!-- ========================================= -->
            <div class="mt-8 text-center">
                <p class="text-xs text-gray-400">
                    🩺 MedAware - Your AI-Powered Health Companion
                </p>
            </div>
        </div>
    </div>
@endsection