@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-cyan-50 py-8 px-4">
    <div class="max-w-7xl mx-auto">

        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold">
                        Welcome, {{ Auth::user()->name }}
                    </h1>
                    <p class="text-gray-500">{{ now()->format('l, F j, Y') }}</p>
                </div>

                <a href="{{ route('profile.edit') }}"
                   class="px-4 py-2 rounded-lg bg-emerald-600 text-white">
                    Edit Profile
                </a>
            </div>
        </div>

        <div class="grid md:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-gray-500">Appointments</p>
                <h2 class="text-3xl font-bold">
                    {{ $appointmentsCount }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-gray-500">Health Score</p>
                <h2 class="text-3xl font-bold text-green-600">
                    {{ $healthScore }}%
                </h2>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-green-500 h-2 rounded-full"
                         style="width: {{ $healthScore }}%"></div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-gray-500">Active Alerts</p>
                <h2 class="text-3xl font-bold text-red-600">
                    {{ $alertsCount }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow p-5">
                <p class="text-gray-500">Hospitals</p>
                <h2 class="text-3xl font-bold">
                    {{ $hospitalCount }}
                </h2>
            </div>

        </div>

        <h2 class="text-2xl font-bold mb-4">Quick Actions</h2>

        <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">

            <a href="{{ route('chat') }}" class="bg-white shadow rounded-xl p-5 text-center hover:bg-emerald-50">
                🤖
                <div class="font-semibold mt-2">AI Chatbot</div>
            </a>

            <a href="{{ route('appointments') }}" class="bg-white shadow rounded-xl p-5 text-center hover:bg-emerald-50">
                📅
                <div class="font-semibold mt-2">Appointments</div>
            </a>

            <a href="{{ route('hospitals') }}" class="bg-white shadow rounded-xl p-5 text-center hover:bg-emerald-50">
                🏥
                <div class="font-semibold mt-2">Hospitals</div>
            </a>

            <a href="{{ route('health.logs') }}" class="bg-white shadow rounded-xl p-5 text-center hover:bg-emerald-50">
                📋
                <div class="font-semibold mt-2">Health Logs</div>
            </a>

            <a href="{{ route('alerts') }}" class="bg-white shadow rounded-xl p-5 text-center hover:bg-emerald-50">
                🔔
                <div class="font-semibold mt-2">Alerts</div>
            </a>

            <a href="{{ route('profile.edit') }}" class="bg-white shadow rounded-xl p-5 text-center hover:bg-emerald-50">
                👤
                <div class="font-semibold mt-2">Profile</div>
            </a>

        </div>

        <div class="grid lg:grid-cols-2 gap-6">

            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-bold text-xl mb-4">Recent Activities</h3>

                @forelse($recentActivities as $activity)
                    <div class="border-b py-3">
                        <div class="font-semibold">
                            {{ $activity->title ?? 'Health Activity' }}
                        </div>

                        <div class="text-gray-500 text-sm">
                            {{ $activity->description ?? '-' }}
                        </div>

                        <div class="text-xs text-gray-400">
                            {{ $activity->created_at->diffForHumans() }}
                        </div>
                    </div>
                @empty
                    <p>No recent activities.</p>
                @endforelse

            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-bold text-xl mb-4">Upcoming Appointments</h3>

                @forelse($upcomingAppointments as $appointment)

                    <div class="border-b py-3">

                        <div class="font-semibold">
                            {{ $appointment->doctor_name }}
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ $appointment->hospital }}
                        </div>

                        <div class="text-sm">
                            {{ $appointment->appointment_date }}
                        </div>

                    </div>

                @empty
                    <p>No appointments available.</p>
                @endforelse

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow p-6 mt-8">
            <h3 class="text-xl font-bold mb-3">
                🤖 AI Health Summary
            </h3>

            @if(isset($lastChat))

                <p><strong>Last Symptoms:</strong> {{ $lastChat->user_message }}</p>

                <p><strong>Predicted Disease:</strong> {{ $lastChat->disease }}</p>

                <p><strong>Risk:</strong> {{ $lastChat->risk }}</p>

                <a href="{{ route('chat') }}"
                   class="inline-block mt-4 px-5 py-2 bg-emerald-600 text-white rounded-lg">
                    Continue Chat
                </a>

            @else

                <p>No AI diagnosis yet.</p>

            @endif
        </div>

    </div>
</div>
@endsection
