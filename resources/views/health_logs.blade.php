@extends('layouts.app')

@section('content')
    <!-- ========================================= -->
    <!-- HEALTH LOGS PAGE - ENHANCED DESIGN -->
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
                    Health Logs
                </h1>
                <p class="text-sm text-gray-500 mt-1">Track your health history and risk assessments</p>
            </div>

            <!-- ========================================= -->
            <!-- STATISTICS CARDS -->
            <!-- ========================================= -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-gray-100/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Total Logs</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">{{ $logs->total() }}</p>
                        </div>
                        <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center text-xl">
                            📋
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-gray-100/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Critical</p>
                            <p class="text-2xl font-bold text-red-600 mt-1">
                                {{ $logs->where('risk_level', 'Critical')->count() }}
                            </p>
                        </div>
                        <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center text-xl">
                            🔴
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-gray-100/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 font-medium">High Risk</p>
                            <p class="text-2xl font-bold text-orange-600 mt-1">
                                {{ $logs->where('risk_level', 'High')->count() }}
                            </p>
                        </div>
                        <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center text-xl">
                            🟠
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-gray-100/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Low Risk</p>
                            <p class="text-2xl font-bold text-green-600 mt-1">
                                {{ $logs->where('risk_level', 'Low')->count() }}
                            </p>
                        </div>
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-xl">
                            🟢
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- FILTER & SEARCH -->
            <!-- ========================================= -->
            <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-6 border border-gray-100/50 mb-8">
                <form method="GET" action="{{ route('health.logs') }}" class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-[200px] relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search by disease..."
                            class="w-full pl-10 pr-4 py-2.5 text-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50"
                        >
                    </div>
                    <div class="relative min-w-[150px]">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                        </div>
                        <select
                            name="risk_level"
                            class="w-full pl-10 pr-8 py-2.5 text-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 appearance-none"
                        >
                            <option value="">All Risks</option>
                            <option value="Critical" {{ request('risk_level') == 'Critical' ? 'selected' : '' }}>Critical</option>
                            <option value="High" {{ request('risk_level') == 'High' ? 'selected' : '' }}>High</option>
                            <option value="Medium" {{ request('risk_level') == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="Low" {{ request('risk_level') == 'Low' ? 'selected' : '' }}>Low</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white px-6 py-2.5 rounded-xl font-medium transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-emerald-200/50 flex items-center gap-2 text-sm"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Filter
                        </button>
                        @if(request('search') || request('risk_level'))
                            <a
                                href="{{ route('health-logs.index') }}"
                                class="border-2 border-gray-300 text-gray-600 hover:border-gray-400 hover:bg-gray-50 px-6 py-2.5 rounded-xl font-medium transition-all duration-200 flex items-center gap-2 text-sm"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- ========================================= -->
            <!-- HEALTH LOGS TABLE -->
            <!-- ========================================= -->
            @if($logs->count() > 0)
                <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl border border-gray-100/50 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-emerald-600 to-cyan-600 text-white">
                                <tr>
                                    <th class="px-4 py-3.5 text-left text-sm font-semibold">Date</th>
                                    <th class="px-4 py-3.5 text-left text-sm font-semibold">Disease / Condition</th>
                                    <th class="px-4 py-3.5 text-left text-sm font-semibold">Risk Level</th>
                                    <th class="px-4 py-3.5 text-left text-sm font-semibold">Recommendation</th>
                                    <th class="px-4 py-3.5 text-left text-sm font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                                        <td class="px-4 py-3.5">
                                            <div class="flex flex-col">
                                                <span class="text-sm font-medium text-gray-800">
                                                    {{ $log->log_date->format('d M Y') }}
                                                </span>
                                                <span class="text-xs text-gray-400">
                                                    {{ $log->log_date->format('h:i A') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3.5">
                                            <div class="flex flex-col">
                                                <span class="text-sm font-medium text-gray-800">{{ $log->disease }}</span>
                                                @if($log->symptoms)
                                                    <span class="text-xs text-gray-500">Symptoms: {{ $log->symptoms }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-3.5">
                                            @php
                                                $riskColors = [
                                                    'Critical' => 'bg-red-500 text-white',
                                                    'High' => 'bg-orange-500 text-white',
                                                    'Medium' => 'bg-yellow-500 text-white',
                                                    'Low' => 'bg-green-600 text-white',
                                                ];
                                                $riskIcons = [
                                                    'Critical' => '🔴',
                                                    'High' => '🟠',
                                                    'Medium' => '🟡',
                                                    'Low' => '🟢',
                                                ];
                                                $color = $riskColors[$log->risk_level] ?? 'bg-gray-500 text-white';
                                                $icon = $riskIcons[$log->risk_level] ?? '⚪';
                                            @endphp
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium {{ $color }}">
                                                {{ $icon }} {{ $log->risk_level }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3.5">
                                            <p class="text-sm text-gray-600 max-w-xs line-clamp-2">
                                                {{ $log->recommendation }}
                                            </p>
                                        </td>
                                        <td class="px-4 py-3.5">
                                            <div class="flex items-center gap-2">
                                                <a
                                                    href="{{ route('health-logs.show', $log->id) }}"
                                                    class="text-emerald-600 hover:text-emerald-700 text-sm font-medium hover:underline transition-all"
                                                >
                                                    View
                                                </a>
                                                <span class="text-gray-300">|</span>
                                                <a
                                                    href="{{ route('health-logs.download', $log->id) }}"
                                                    class="text-blue-600 hover:text-blue-700 text-sm font-medium hover:underline transition-all"
                                                >
                                                    Download
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- ========================================= -->
                    <!-- PAGINATION -->
                    <!-- ========================================= -->
                    @if($logs->hasPages())
                        <div class="px-4 py-4 border-t border-gray-100">
                            {{ $logs->links() }}
                        </div>
                    @endif
                </div>
            @else
                <!-- ========================================= -->
                <!-- EMPTY STATE -->
                <!-- ========================================= -->
                <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-12 border border-gray-100/50 text-center">
                    <div class="text-6xl mb-4">📋</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">No Health Records Found</h3>
                    <p class="text-gray-500 mb-6">
                        @if(request('search') || request('risk_level'))
                            No records match your search criteria. Try adjusting your filters.
                        @else
                            You haven't recorded any health logs yet. Start tracking your health today.
                        @endif
                    </p>
                    @if(request('search') || request('risk_level'))
                        <a
                            href="{{ route('health-logs.index') }}"
                            class="inline-block bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white px-8 py-3 rounded-xl font-medium transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-emerald-200/50"
                        >
                            Clear Filters
                        </a>
                    @else
                        <a
                            href="{{ route('chat') }}"
                            class="inline-block bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white px-8 py-3 rounded-xl font-medium transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-emerald-200/50"
                        >
                            Start Health Assessment
                        </a>
                    @endif
                </div>
            @endif

            <!-- ========================================= -->
            <!-- QUICK ACTIONS -->
            <!-- ========================================= -->
            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-3">
                <a href="{{ route('chat') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">🤖</div>
                    <p class="text-xs font-medium text-gray-700">AI Assessment</p>
                </a>
                <a href="{{ route('health.logs') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">📊</div>
                    <p class="text-xs font-medium text-gray-700">Export Data</p>
                </a>
                <a href="{{ route('health.logs') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">📈</div>
                    <p class="text-xs font-medium text-gray-700">View Charts</p>
                </a>
                <a href="{{ route('profile.edit') }}" class="bg-white/80 backdrop-blur-sm rounded-xl p-3 text-center hover:shadow-lg transition-all hover:-translate-y-1 border border-gray-100/50 group">
                    <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">👤</div>
                    <p class="text-xs font-medium text-gray-700">My Profile</p>
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