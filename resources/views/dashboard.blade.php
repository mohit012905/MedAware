@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10">

<h1 class="text-3xl font-bold">

Welcome {{ Auth::user()->name }}

</h1>

<div class="grid grid-cols-3 gap-6 mt-8">

<div class="bg-white shadow rounded p-6">

<h2 class="font-bold">

AI Chatbot

</h2>

<p>

Talk with MedAware AI

</p>

<a href="/chat"
class="text-blue-600">

Open

</a>

</div>

<div class="bg-white shadow rounded p-6">

<h2>

Appointments

</h2>

<a href="/appointments">

Book Appointment

</a>

</div>

<div class="bg-white shadow rounded p-6">

<h2>

Nearby Hospitals

</h2>

<a href="/hospitals">

View Hospitals

</a>

</div>

<div class="bg-white shadow rounded p-6">

<h2>

Health Logs

</h2>

<a href="/health-logs">

View

</a>

</div>

<div class="bg-white shadow rounded p-6">

<h2>

Alerts

</h2>

<a href="/alerts">

View

</a>

</div>

<div class="bg-white shadow rounded p-6">

<h2>

Profile

</h2>

<a href="/profile">

Open

</a>

</div>

</div>

</div>

@endsection