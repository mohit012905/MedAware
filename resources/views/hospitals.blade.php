@extends('layouts.app')

@section('content')
    <!-- ========================================= -->
    <!-- NEARBY HOSPITALS PAGE - ENHANCED DESIGN -->
    <!-- ========================================= -->
    <div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-cyan-50 py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden">

        <!-- ========================================= -->
        <!-- ANIMATED BACKGROUND BLOBS -->
        <!-- ========================================= -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-emerald-200 rounded-full blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-20 animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-200 rounded-full blur-3xl opacity-10 animate-pulse delay-2000"></div>

        <div class="max-w-7xl mx-auto relative z-10">

            <!-- ========================================= -->
            <!-- PAGE HEADER -->
            <!-- ========================================= -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">
                    Nearby Hospitals
                </h1>
                <p class="text-sm text-gray-500 mt-1">Find the best healthcare facilities near you</p>
            </div>

            <!-- ========================================= -->
            <!-- SEARCH & FILTER SECTION -->
            <!-- ========================================= -->
            <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-6 border border-gray-100/50 mb-8">
                <form method="GET" action="{{ route('hospitals') }}" class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search hospitals by name, location, or specialty..."
                            class="w-full pl-10 pr-4 py-3 text-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50"
                        >
                    </div>
                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-emerald-200/50 flex items-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Search
                        </button>
                        @if(request('search'))
                            <a
                                href="{{ route('hospitals') }}"
                                class="border-2 border-gray-300 text-gray-600 hover:border-gray-400 hover:bg-gray-50 px-6 py-3 rounded-xl font-medium transition-all duration-200 flex items-center gap-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
                @if(request('search'))
                    <div class="mt-3 text-sm text-gray-600">
                        Showing results for: <span class="font-semibold text-gray-800">"{{ request('search') }}"</span>
                        <span class="text-gray-400 ml-2">({{ $hospitals->total() }} hospitals found)</span>
                    </div>
                @endif
            </div>

            <!-- ========================================= -->
            <!-- HOSPITALS GRID -->
            <!-- ========================================= -->
            @if($hospitals->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($hospitals as $hospital)
                        <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-100/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                            <!-- Hospital Image/Icon -->
                            <div class="h-32 bg-gradient-to-br from-emerald-500 to-cyan-600 relative flex items-center justify-center">
                                <div class="text-6xl text-white/30">🏥</div>
                                <div class="absolute top-3 right-3">
                                    <span class="text-xs bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full">
                                        {{ $hospital->distance ?? '2.5' }} km
                                    </span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/30 to-transparent"></div>
                            </div>

                            <div class="p-6">
                                <!-- Hospital Name -->
                                <h2 class="text-xl font-bold text-gray-800 group-hover:text-emerald-600 transition-colors">
                                    {{ $hospital->name }}
                                </h2>

                                <!-- Rating -->
                                <div class="flex items-center gap-2 mt-1">
                                    <div class="flex text-yellow-400 text-sm">
                                        ★★★★★
                                    </div>
                                    <span class="text-xs text-gray-500">(4.5)</span>
                                </div>

                                <!-- Address -->
                                <div class="mt-3 flex items-start gap-2 text-sm text-gray-600">
                                    <span class="text-emerald-500 mt-0.5">📍</span>
                                    <span>{{ $hospital->address }}, {{ $hospital->city ?? 'City' }}</span>
                                </div>

                                <!-- Phone -->
                                <div class="mt-2 flex items-center gap-2 text-sm text-gray-600">
                                    <span class="text-emerald-500">📞</span>
                                    <span>{{ $hospital->phone }}</span>
                                </div>

                                <!-- Bed Availability -->
                                <div class="mt-4 grid grid-cols-2 gap-3">
                                    <div class="bg-emerald-50 rounded-xl p-3 text-center">
                                        <p class="text-xs text-gray-500">ICU Beds</p>
                                        <p class="text-lg font-bold text-emerald-600">{{ $hospital->icu_beds }}</p>
                                        <p class="text-xs text-gray-400">Available</p>
                                    </div>
                                    <div class="bg-blue-50 rounded-xl p-3 text-center">
                                        <p class="text-xs text-gray-500">General Beds</p>
                                        <p class="text-lg font-bold text-blue-600">{{ $hospital->general_beds }}</p>
                                        <p class="text-xs text-gray-400">Available</p>
                                    </div>
                                </div>

                                <!-- Specialties -->
                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">Cardiology</span>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">Neurology</span>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">Orthopedics</span>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">+3 more</span>
                                </div>

                                <!-- Actions -->
                                <div class="mt-5 flex flex-col sm:flex-row gap-2">
                                    <a
                                        href="{{ route('appointments', ['hospital_id' => $hospital->id]) }}"
                                        class="flex-1 bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white text-center px-4 py-2.5 rounded-xl font-medium transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-emerald-200/50 text-sm"
                                    >
                                        Book Appointment
                                    </a>
                                    <a
                                        href="{{ route('hospitals', $hospital->id) }}"
                                        class="flex-1 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white text-center px-4 py-2.5 rounded-xl font-medium transition-all duration-200 text-sm"
                                    >
                                        View Doctors
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- ========================================= -->
                <!-- PAGINATION -->
                <!-- ========================================= -->
                @if($hospitals->hasPages())
                    <div class="mt-8">
                       {{ $hospitals->appends(request()->query())->links() }}
                    </div>
                @endif
            @else
                <!-- ========================================= -->
                <!-- EMPTY STATE -->
                <!-- ========================================= -->
                <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-12 border border-gray-100/50 text-center">
                    <div class="text-6xl mb-4">🏥</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">No Hospitals Found</h3>
                    <p class="text-gray-500 mb-6">We couldn't find any hospitals matching your search criteria.</p>
                    <a
                        href="{{ route('hospitals.index') }}"
                        class="inline-block bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white px-8 py-3 rounded-xl font-medium transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-emerald-200/50"
                    >
                        Clear Search
                    </a>
                </div>
            @endif

            <!-- ========================================= -->
            <!-- QUICK LINKS -->
            <!-- ========================================= -->
            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-3">
                <a href="{{ route('hospitals') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">📍</div>
                    <p class="text-xs font-medium text-gray-700">Near Me</p>
                </a>
                <a href="{{ route('hospitals') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">🚨</div>
                    <p class="text-xs font-medium text-gray-700">Emergency</p>
                </a>
                <a href="{{ route('hospitals') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">⭐</div>
                    <p class="text-xs font-medium text-gray-700">Top Rated</p>
                </a>
                <a href="{{ route('hospitals') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">🗺️</div>
                    <p class="text-xs font-medium text-gray-700">Map View</p>
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