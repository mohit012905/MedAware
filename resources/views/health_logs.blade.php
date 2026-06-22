@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10">

<div class="flex justify-between items-center mb-8">

<h1 class="text-3xl font-bold text-green-700">

Health Logs

</h1>

<span
class="bg-green-100 px-4 py-2 rounded">

Total Logs :
{{ $logs->total() }}

</span>

</div>

@if($logs->count()==0)

<div
class="bg-blue-100 p-5 rounded">

No Health Records Found.

</div>

@else

<div class="overflow-x-auto">

<table
class="w-full bg-white rounded shadow">

<thead
class="bg-green-700 text-white">

<tr>

<th class="p-3">

Date

</th>

<th>

Disease

</th>

<th>

Risk

</th>

<th>

Recommendation

</th>

</tr>

</thead>

<tbody>

@foreach($logs as $log)

<tr
class="border-b">

<td class="p-3">

{{ $log->log_date->format('d M Y') }}

</td>

<td>

{{ $log->disease }}

</td>

<td>

@if($log->risk_level=="Critical")

<span
class="bg-red-500 text-white px-3 py-1 rounded">

Critical

</span>

@elseif($log->risk_level=="High")

<span
class="bg-orange-500 text-white px-3 py-1 rounded">

High

</span>

@elseif($log->risk_level=="Medium")

<span
class="bg-yellow-500 text-white px-3 py-1 rounded">

Medium

</span>

@else

<span
class="bg-green-600 text-white px-3 py-1 rounded">

Low

</span>

@endif

</td>

<td>

{{ $log->recommendation }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="mt-6">

{{ $logs->links() }}

</div>

@endif

</div>

@endsection