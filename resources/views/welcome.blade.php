<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedAware - AI Healthcare Assistant</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-50">

<!-- Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">

            <div class="text-3xl font-bold text-emerald-600">
                🩺 MedAware
            </div>

            <div class="flex items-center space-x-8">

                <a href="#features"
                   class="text-gray-700 hover:text-emerald-600">
                    Features
                </a>

                <a href="#about"
                   class="text-gray-700 hover:text-emerald-600">
                    About
                </a>

                <a href="#contact"
                   class="text-gray-700 hover:text-emerald-600">
                    Contact
                </a>

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="bg-emerald-600 text-white px-6 py-2 rounded-lg hover:bg-emerald-700">

                        Dashboard

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="text-emerald-600 font-semibold">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-emerald-600 text-white px-6 py-2 rounded-lg hover:bg-emerald-700">

                        Register

                    </a>

                @endauth

            </div>

        </div>
    </div>
</nav>

<!-- Hero -->
<section class="bg-gradient-to-r from-emerald-500 to-cyan-600">

<div class="max-w-7xl mx-auto px-6 py-24">

<div class="grid lg:grid-cols-2 gap-16 items-center">

<div>

<h1 class="text-6xl font-extrabold text-white leading-tight">

Your Intelligent

Healthcare Assistant

</h1>

<p class="text-xl text-green-100 mt-8">

Analyze symptoms using Artificial Intelligence,
predict possible diseases,
find nearby hospitals,
book appointments,
and keep your health history safely.

</p>

<div class="mt-10 flex gap-5">

<a href="{{ route('register') }}"
class="bg-white text-emerald-700 px-8 py-4 rounded-xl font-bold shadow-lg">

Start Free

</a>

<a href="#features"
class="border border-white text-white px-8 py-4 rounded-xl">

Learn More

</a>

</div>

</div>

<div>

<img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=900"
     class="rounded-3xl shadow-2xl w-full h-[500px] object-cover">

</div>

</div>

</div>

</section>

<!-- Statistics -->

<section class="py-16 bg-white">

<div class="max-w-7xl mx-auto">

<div class="grid md:grid-cols-4 gap-8 text-center">

<div class="bg-gray-50 rounded-xl p-8 shadow">

<h2 class="text-5xl font-bold text-emerald-600">

150+

</h2>

<p class="mt-4">

Diseases

</p>

</div>

<div class="bg-gray-50 rounded-xl p-8 shadow">

<h2 class="text-5xl font-bold text-blue-600">

500+

</h2>

<p>

Symptoms

</p>

</div>

<div class="bg-gray-50 rounded-xl p-8 shadow">

<h2 class="text-5xl font-bold text-red-500">

24/7

</h2>

<p>

AI Support

</p>

</div>

<div class="bg-gray-50 rounded-xl p-8 shadow">

<h2 class="text-5xl font-bold text-yellow-500">

100%

</h2>

<p>

Free

</p>

</div>

</div>

</div>

</section>

<!-- Features -->

<section id="features" class="py-20 bg-gray-100">

<div class="max-w-7xl mx-auto">

<h2 class="text-5xl font-bold text-center">

Our Features

</h2>

<p class="text-center text-gray-600 mt-3">

Everything you need in one healthcare platform

</p>

<div class="grid lg:grid-cols-3 gap-8 mt-16">

<div class="bg-white rounded-2xl p-8 shadow hover:shadow-xl transition">

<div class="text-5xl">

🤖

</div>

<h3 class="text-2xl font-bold mt-6">

AI Chatbot

</h3>

<p class="mt-4 text-gray-600">

Describe symptoms and receive intelligent healthcare guidance.

</p>

</div>

<div class="bg-white rounded-2xl p-8 shadow hover:shadow-xl transition">

<div class="text-5xl">

🦠

</div>

<h3 class="text-2xl font-bold mt-6">

Disease Prediction

</h3>

<p class="mt-4 text-gray-600">

Predict diseases using Natural Language Processing.

</p>

</div>

<div class="bg-white rounded-2xl p-8 shadow hover:shadow-xl transition">

<div class="text-5xl">

🏥

</div>

<h3 class="text-2xl font-bold mt-6">

Hospital Finder

</h3>

<p class="mt-4 text-gray-600">

Locate nearby hospitals with available beds.

</p>

</div>

<div class="bg-white rounded-2xl p-8 shadow hover:shadow-xl transition">

<div class="text-5xl">

📅

</div>

<h3 class="text-2xl font-bold mt-6">

Appointments

</h3>

<p class="mt-4 text-gray-600">

Book appointments with doctors instantly.

</p>

</div>

<div class="bg-white rounded-2xl p-8 shadow hover:shadow-xl transition">

<div class="text-5xl">

📊

</div>

<h3 class="text-2xl font-bold mt-6">

Health Logs

</h3>

<p class="mt-4 text-gray-600">

Maintain a complete history of your AI health assessments.

</p>

</div>

<div class="bg-white rounded-2xl p-8 shadow hover:shadow-xl transition">

<div class="text-5xl">

🚨

</div>

<h3 class="text-2xl font-bold mt-6">

Emergency Alerts

</h3>

<p class="mt-4 text-gray-600">

Receive critical alerts and emergency recommendations.

</p>

</div>

</div>

</div>

</section>

<!-- CTA -->

<section class="py-24 bg-emerald-600 text-white">

<div class="max-w-5xl mx-auto text-center">

<h2 class="text-5xl font-bold">

Start Your AI Health Assessment Today

</h2>

<p class="mt-6 text-xl">

Join MedAware and experience AI-powered healthcare.

</p>

<a href="{{ route('register') }}"
class="inline-block mt-10 bg-white text-emerald-700 px-10 py-4 rounded-xl font-bold shadow-lg">

Create Free Account

</a>

</div>

</section>

<!-- Footer -->

<footer class="bg-gray-900 text-gray-300 py-10">

<div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">

<div>

<h3 class="text-white text-2xl font-bold">

MedAware

</h3>

<p class="mt-4">

AI Driven Public Healthcare Chatbot

</p>

</div>

<div>

<h4 class="text-white font-bold mb-3">

Quick Links

</h4>

<ul class="space-y-2">

<li>Features</li>

<li>Hospitals</li>

<li>Appointments</li>

<li>Health Logs</li>

</ul>

</div>

<div id="contact">

<h4 class="text-white font-bold mb-3">

Contact

</h4>

<p>Ahmedabad, Gujarat</p>

<p>support@medaware.com</p>

</div>

</div>

<div class="text-center mt-10 border-t border-gray-700 pt-6">

© {{ date('Y') }} MedAware. All Rights Reserved.

</div>

</footer>

</body>
</html>