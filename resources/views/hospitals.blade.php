@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-8">

        Nearby Hospitals

    </h1>
    <form method="GET">

    <input

        type="text"

        name="search"

        placeholder="Search Hospital..."

        class="border rounded p-3 w-full mb-8">

</form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($hospitals as $hospital)

        <div class="bg-white rounded-lg shadow-lg p-6">

            <h2 class="text-xl font-bold text-green-700">

                {{ $hospital->name }}

            </h2>

            <p class="mt-3">

                📍 {{ $hospital->address }}

            </p>

            <p>

                📞 {{ $hospital->phone }}

            </p>

            <p class="mt-2">

                ICU Beds :

                <span class="font-bold">

                    {{ $hospital->icu_beds }}

                </span>

            </p>

            <p>

                General Beds :

                <span class="font-bold">

                    {{ $hospital->general_beds }}

                </span>

            </p>

            <div class="mt-5">

                <a href="{{ route('appointments') }}"
                   class="bg-green-700 text-white px-5 py-2 rounded">

                    Book Appointment

                </a>

            </div>
                <a

href="#"

class="bg-blue-700 text-white px-5 py-2 rounded">

View Doctors

</a>
        </div>

        @endforeach

    </div>

</div>

@endsection