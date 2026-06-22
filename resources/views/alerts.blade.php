@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10">

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-red-600">

            Emergency Alerts

        </h1>

        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">

            Total Alerts : {{ $alerts->count() }}

        </span>

    </div>

    @if($alerts->count()==0)

        <div class="bg-green-100 text-green-700 p-5 rounded">

            🎉 No Alerts Found

        </div>

    @else

    <div class="space-y-6">

        @foreach($alerts as $alert)

        <div class="bg-white shadow-lg rounded-lg p-6 border-l-8

            @if($alert->severity=='Critical')
                border-red-600
            @elseif($alert->severity=='High')
                border-orange-500
            @elseif($alert->severity=='Medium')
                border-yellow-500
            @else
                border-green-500
            @endif
        ">

            <div class="flex justify-between">

                <h2 class="text-xl font-bold">

                    {{ $alert->severity }} Alert

                </h2>

                <span>

                    {{ $alert->created_at->format('d M Y h:i A') }}

                </span>

            </div>

            <p class="mt-4 text-gray-700">

                {{ $alert->message }}

            </p>

            <div class="mt-5 flex gap-3">

                @if($alert->severity=="Critical")

                    <a href="{{ route('hospitals') }}"
                       class="bg-red-600 text-white px-5 py-2 rounded">

                        Find Hospital

                    </a>

                    <a href="{{ route('appointments') }}"
                       class="bg-green-700 text-white px-5 py-2 rounded">

                        Book Appointment

                    </a>

                @elseif($alert->severity=="High")

                    <a href="{{ route('appointments') }}"
                       class="bg-orange-600 text-white px-5 py-2 rounded">

                        Consult Doctor

                    </a>

                @else

                    <button
                        class="bg-blue-600 text-white px-5 py-2 rounded">

                        Read Health Advice

                    </button>

                @endif

            </div>

        </div>

        @endforeach

    </div>

    @endif

</div>

@endsection