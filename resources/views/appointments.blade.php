@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-10">

<h1 class="text-3xl font-bold mb-6">

Book Appointment

</h1>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-3 rounded mb-5">

{{ session('success') }}

</div>

@endif

<div class="bg-white shadow rounded p-6">

<form action="{{ route('appointments.store') }}"
method="POST">

@csrf

<div class="mb-4">

<label class="font-semibold">

Hospital

</label>

<select
name="hospital_id"
class="w-full border rounded p-2">

@foreach($hospitals as $hospital)

<option value="{{ $hospital->id }}">

{{ $hospital->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label>

Doctor

</label>

<select
name="doctor_id"
class="w-full border rounded p-2">

@foreach($doctors as $doctor)

<option value="{{ $doctor->id }}">

{{ $doctor->name }}

({{ $doctor->specialization }})

</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label>

Appointment Date

</label>

<input
type="date"
name="appointment_date"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label>

Appointment Time

</label>

<input
type="time"
name="appointment_time"
class="w-full border rounded p-2">

</div>

<div class="mb-4">

<label>

Reason

</label>

<textarea
name="reason"
rows="4"
class="w-full border rounded p-2"></textarea>

</div>

<button
class="bg-green-700 text-white px-6 py-2 rounded">

Book Appointment

</button>

</form>

</div>

<hr class="my-8">

<h2 class="text-2xl font-bold mb-4">

My Appointments

</h2>

<table class="w-full bg-white shadow rounded">

<thead class="bg-green-700 text-white">

<tr>

<th class="p-3">Hospital</th>

<th>Doctor</th>

<th>Date</th>

<th>Time</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($appointments as $appointment)

<tr class="border-b">

<td class="p-3">

{{ $appointment->hospital->name }}

</td>

<td>

{{ $appointment->doctor->name }}

</td>

<td>

{{ $appointment->appointment_date }}

</td>

<td>

{{ $appointment->appointment_time }}

</td>

<td>

<span class="px-3 py-1 rounded bg-yellow-200">

{{ $appointment->status }}

</span>

</td>

<td>

<form
action="{{ route('appointments.destroy',$appointment->id) }}"
method="POST">

@csrf

@method('DELETE')

<button
onclick="return confirm('Cancel Appointment?')"
class="bg-red-600 text-white px-3 py-1 rounded">

Cancel

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="text-center p-6">

No Appointment Found

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection