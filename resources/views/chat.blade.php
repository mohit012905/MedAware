@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10">

<div class="bg-white rounded shadow">

<div class="bg-green-700 text-white p-4">

MedAware AI Chatbot

</div>

<div
class="h-[500px] overflow-y-scroll p-6"
id="chat-box">

<p>

Hello 👋

I am MedAware.

Describe your symptoms.

</p>

</div>

<div class="p-4">

<input
type="text"
class="border w-full rounded p-3"
placeholder="Describe your symptoms...">

</div>

</div>

</div>

@endsection