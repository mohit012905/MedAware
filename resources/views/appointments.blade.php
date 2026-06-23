@extends('layouts.app')

@section('content')
    <!-- ========================================= -->
    <!-- BOOK APPOINTMENT PAGE - ENHANCED DESIGN -->
    <!-- ========================================= -->
    <div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-cyan-50 py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden">

        <!-- ========================================= -->
        <!-- ANIMATED BACKGROUND BLOBS -->
        <!-- ========================================= -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-emerald-200 rounded-full blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-20 animate-pulse delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-200 rounded-full blur-3xl opacity-10 animate-pulse delay-2000"></div>

        <div class="max-w-6xl mx-auto relative z-10">

            <!-- ========================================= -->
            <!-- PAGE HEADER -->
            <!-- ========================================= -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">
                    Book Appointment
                </h1>
                <p class="text-sm text-gray-500 mt-1">Schedule your appointment with trusted healthcare professionals</p>
            </div>

            <!-- ========================================= -->
            <!-- SUCCESS MESSAGE -->
            <!-- ========================================= -->
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- ========================================= -->
            <!-- TWO COLUMN LAYOUT -->
            <!-- ========================================= -->
            <div class="grid lg:grid-cols-5 gap-8">

                <!-- ========================================= -->
                <!-- LEFT COLUMN - BOOK APPOINTMENT FORM -->
                <!-- ========================================= -->
                <div class="lg:col-span-3">
                    <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-6 sm:p-8 border border-gray-100/50">

                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center text-white text-lg">
                                📅
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-gray-800">Schedule New Appointment</h2>
                                <p class="text-xs text-gray-500">Fill in the details below to book your appointment</p>
                            </div>
                        </div>

                        <form action="{{ route('appointments.store') }}" method="POST" class="space-y-5">
                            @csrf

                            <!-- ========================================= -->
                            <!-- HOSPITAL SELECT -->
                            <!-- ========================================= -->
                            <div>
                                <label for="hospital" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Hospital <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <select
                                        id="hospital"
                                        name="hospital_id"
                                        required
                                        class="w-full pl-10 pr-4 py-3 text-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 appearance-none @error('hospital_id') border-red-500 @enderror"
                                    >
                                        <option value="">Select Hospital</option>
                                        @foreach($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}" {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>
                                                {{ $hospital->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('hospital_id')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- ========================================= -->
                            <!-- DOCTOR SELECT -->
                            <!-- ========================================= -->
                            <div>
                                <label for="doctor" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Doctor <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <select
                                        id="doctor"
                                        name="doctor_id"
                                        required
                                        class="w-full pl-10 pr-4 py-3 text-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 appearance-none @error('doctor_id') border-red-500 @enderror"
                                    >
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                Dr. {{ $doctor->name }} - {{ $doctor->specialization }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                @error('doctor_id')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- ========================================= -->
                            <!-- DATE & TIME - TWO COLUMNS -->
                            <!-- ========================================= -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="appointment_date" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                        Appointment Date <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <input
                                            type="date"
                                            id="appointment_date"
                                            name="appointment_date"
                                            value="{{ old('appointment_date') }}"
                                            required
                                            min="{{ date('Y-m-d') }}"
                                            class="w-full pl-10 pr-4 py-3 text-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('appointment_date') border-red-500 @enderror"
                                        >
                                    </div>
                                    @error('appointment_date')
                                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="appointment_time" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                        Appointment Time <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <input
                                            type="time"
                                            id="appointment_time"
                                            name="appointment_time"
                                            value="{{ old('appointment_time') }}"
                                            required
                                            class="w-full pl-10 pr-4 py-3 text-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('appointment_time') border-red-500 @enderror"
                                        >
                                    </div>
                                    @error('appointment_time')
                                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- ========================================= -->
                            <!-- REASON -->
                            <!-- ========================================= -->
                            <div>
                                <label for="reason" class="block text-sm font-semibold text-gray-700 mb-1.5">
                                    Reason for Visit <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </div>
                                    <textarea
                                        id="reason"
                                        name="reason"
                                        rows="4"
                                        required
                                        placeholder="Briefly describe your symptoms or reason for visit..."
                                        class="w-full pl-10 pr-4 py-3 text-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50 transition-all duration-200 bg-white/50 @error('reason') border-red-500 @enderror"
                                    >{{ old('reason') }}</textarea>
                                </div>
                                @error('reason')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- ========================================= -->
                            <!-- SUBMIT BUTTON -->
                            <!-- ========================================= -->
                            <button
                                type="submit"
                                class="w-full bg-gradient-to-r from-emerald-600 to-cyan-600 hover:from-emerald-700 hover:to-cyan-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-emerald-200/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl flex items-center justify-center gap-2 group text-base"
                            >
                                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Book Appointment
                            </button>
                        </form>
                    </div>
                </div>

                <!-- ========================================= -->
                <!-- RIGHT COLUMN - INFO & QUICK TIPS -->
                <!-- ========================================= -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Quick Tips -->
                    <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl p-6 border border-gray-100/50">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center text-white text-lg">
                                💡
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Quick Tips</h3>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3 text-sm text-gray-600">
                                <span class="text-emerald-500 mt-0.5">✓</span>
                                <span>Arrive 15 minutes before your appointment time</span>
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-600">
                                <span class="text-emerald-500 mt-0.5">✓</span>
                                <span>Bring your ID and insurance card if applicable</span>
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-600">
                                <span class="text-emerald-500 mt-0.5">✓</span>
                                <span>List your current medications and allergies</span>
                            </li>
                            <li class="flex items-start gap-3 text-sm text-gray-600">
                                <span class="text-emerald-500 mt-0.5">✓</span>
                                <span>Write down your symptoms and questions beforehand</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Need Help -->
                    <div class="bg-gradient-to-br from-emerald-50 to-cyan-50 rounded-2xl p-6 border border-emerald-100/50">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-xl flex items-center justify-center text-white text-2xl flex-shrink-0">
                                🆘
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Need Help?</h4>
                                <p class="text-sm text-gray-600 mt-1">
                                    Having trouble booking? Contact our support team and we'll help you schedule your appointment.
                                </p>
                                <a href="#" class="inline-block mt-3 text-sm text-emerald-600 hover:text-emerald-700 font-semibold hover:underline transition-all">
                                    Contact Support →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================= -->
            <!-- MY APPOINTMENTS SECTION -->
            <!-- ========================================= -->
            <div class="mt-12">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">My Appointments</h2>
                        <p class="text-sm text-gray-500 mt-0.5">View and manage your upcoming appointments</p>
                    </div>
                    <span class="text-xs bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-medium">
                        {{ $appointments->count() }} Total
                    </span>
                </div>

                <!-- ========================================= -->
                <!-- APPOINTMENTS TABLE -->
                <!-- ========================================= -->
                <div class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl border border-gray-100/50 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-emerald-600 to-cyan-600 text-white">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold">Hospital</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold">Doctor</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold">Date</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold">Time</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                                        <td class="px-4 py-3 text-sm text-gray-800">
                                            {{ $appointment->hospital->name }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-800">
                                            Dr. {{ $appointment->doctor->name }}
                                            <span class="text-xs text-gray-500 block">
                                                {{ $appointment->doctor->specialization }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                        </td>
                                        <td class="px-4 py-3">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                                    'confirmed' => 'bg-blue-100 text-blue-700',
                                                    'completed' => 'bg-green-100 text-green-700',
                                                    'cancelled' => 'bg-red-100 text-red-700',
                                                    'rescheduled' => 'bg-purple-100 text-purple-700',
                                                ];
                                                $statusColor = $statusColors[$appointment->status] ?? 'bg-gray-100 text-gray-700';
                                            @endphp
                                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            @if($appointment->status !== 'cancelled' && $appointment->status !== 'completed')
                                                <form
                                                    action="{{ route('appointments.destroy', $appointment->id) }}"
                                                    method="POST"
                                                    class="inline-block"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm('Are you sure you want to cancel this appointment?')"
                                                        class="text-red-600 hover:text-red-700 text-sm font-medium hover:underline transition-all flex items-center gap-1"
                                                    >
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                        Cancel
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-xs text-gray-400">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-10 text-center">
                                            <div class="flex flex-col items-center gap-2">
                                                <span class="text-4xl">📋</span>
                                                <p class="text-gray-500 font-medium">No Appointments Found</p>
                                                <p class="text-sm text-gray-400">Book your first appointment using the form above</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('hospital').addEventListener('change', function () {
            let hospitalId = this.value;
            let doctorSelect = document.getElementById('doctor');

            doctorSelect.innerHTML = '<option value="">Loading...</option>';

            if (!hospitalId) {
                doctorSelect.innerHTML = '<option value="">Select Doctor</option>';
                return;
            }

            fetch('/doctors/' + hospitalId)
                .then(response => response.json())
                .then(data => {
                    doctorSelect.innerHTML = '<option value="">Select Doctor</option>';

                    data.forEach(function(doctor) {
                        doctorSelect.innerHTML +=
                            `<option value="${doctor.id}">
                                ${doctor.name}
                            </option>`;
                    });
                })
                .catch(error => {
                    console.log(error);
                    doctorSelect.innerHTML =
                        '<option value="">No Doctors Found</option>';
                });
        });
    </script>
@endsection