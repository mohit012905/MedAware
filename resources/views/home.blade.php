@extends('layouts.app')

@section('content')

<!-- ========================= -->
<!-- HERO SECTION -->
<!-- ========================= -->
<section class="relative overflow-hidden bg-gradient-to-br from-emerald-50 via-white to-cyan-50 min-h-[90vh] flex items-center">
    <!-- Animated Background Blobs -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-emerald-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-200 rounded-full blur-3xl opacity-30 animate-pulse delay-1000"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-200 rounded-full blur-3xl opacity-20 animate-pulse delay-2000"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-20 relative w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Side -->
            <div class="space-y-8">
                <span class="inline-flex items-center gap-2 bg-emerald-100/80 backdrop-blur-sm text-emerald-700 px-6 py-2.5 rounded-full font-semibold text-sm shadow-sm border border-emerald-200/50">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </span>
                    🩺 AI Powered Healthcare Platform
                </span>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-800 leading-[1.1] tracking-tight">
                    Your
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">Smart</span>
                    Healthcare
                    <span class="block">Assistant</span>
                </h1>

                <p class="text-xl text-gray-600 leading-relaxed max-w-lg">
                    MedAware helps you understand your symptoms, predict possible diseases using Artificial Intelligence, find nearby hospitals, book appointments, and maintain your personal health history.
                </p>

                <!-- Buttons -->
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white px-8 py-4 rounded-xl shadow-lg shadow-emerald-200/50 transition-all duration-300 hover:scale-105 hover:shadow-xl font-semibold">
                        Get Started Free
                        <span class="inline-block ml-2">→</span>
                    </a>
                    <a href="#features" class="border-2 border-emerald-600 text-emerald-600 hover:bg-emerald-600 hover:text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold hover:shadow-lg">
                        Explore Features
                    </a>
                </div>

                <!-- Search -->
                <div class="mt-6 bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-2 flex items-center border border-gray-100/50">
                    <div class="pl-4 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search disease, symptoms..." class="w-full outline-none px-3 py-3 text-lg bg-transparent">
                    <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl transition-colors font-medium">Search</button>
                </div>

                <!-- Trust Badges -->
                <div class="flex items-center gap-6 pt-2">
                    <div class="flex -space-x-2">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=1" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=2" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=3" alt="User">
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-emerald-100 flex items-center justify-center text-xs font-bold text-emerald-700">+5k</div>
                    </div>
                    <div>
                        <div class="flex text-yellow-400">★★★★★</div>
                        <p class="text-sm text-gray-500">Trusted by 5,000+ users</p>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="relative">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl ring-1 ring-gray-200/50">
                    <img src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=900&h=600&fit=crop&crop=center" alt="Healthcare AI" class="w-full h-auto object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>

                <!-- Floating Cards -->
                <div class="absolute -bottom-6 -left-6 bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl p-5 border border-gray-100/50">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-2xl flex items-center justify-center text-3xl shadow-inner">❤️</div>
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">AI Diagnosis</h3>
                            <p class="text-sm text-gray-500">Accurate & Fast</p>
                            <span class="inline-block mt-1 text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">98% accuracy</span>
                        </div>
                    </div>
                </div>

                <div class="absolute -top-4 -right-4 bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl p-4 border border-gray-100/50 hidden lg:block">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-2xl">🏥</div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">300+ Hospitals</p>
                            <p class="text-xs text-gray-500">Nearby available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- STATISTICS SECTION -->
<!-- ========================= -->
<section class="py-16 bg-white relative">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-50/30 to-transparent h-32"></div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 transition-all duration-300 hover:shadow-2xl border border-gray-100/50">
                <div class="text-5xl group-hover:scale-110 transition-transform duration-300">🦠</div>
                <h2 class="mt-5 text-5xl font-bold bg-gradient-to-r from-emerald-600 to-emerald-400 bg-clip-text text-transparent">150+</h2>
                <p class="mt-3 text-gray-600 font-medium">Diseases Covered</p>
                <div class="mt-2 h-1 w-12 bg-emerald-200 rounded-full group-hover:w-20 transition-all"></div>
            </div>

            <div class="group bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 transition-all duration-300 hover:shadow-2xl border border-gray-100/50">
                <div class="text-5xl group-hover:scale-110 transition-transform duration-300">🩹</div>
                <h2 class="mt-5 text-5xl font-bold bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">500+</h2>
                <p class="mt-3 text-gray-600 font-medium">Symptoms</p>
                <div class="mt-2 h-1 w-12 bg-blue-200 rounded-full group-hover:w-20 transition-all"></div>
            </div>

            <div class="group bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 transition-all duration-300 hover:shadow-2xl border border-gray-100/50">
                <div class="text-5xl group-hover:scale-110 transition-transform duration-300">🤖</div>
                <h2 class="mt-5 text-5xl font-bold bg-gradient-to-r from-purple-600 to-purple-400 bg-clip-text text-transparent">24/7</h2>
                <p class="mt-3 text-gray-600 font-medium">AI Support</p>
                <div class="mt-2 h-1 w-12 bg-purple-200 rounded-full group-hover:w-20 transition-all"></div>
            </div>

            <div class="group bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 transition-all duration-300 hover:shadow-2xl border border-gray-100/50">
                <div class="text-5xl group-hover:scale-110 transition-transform duration-300">🏥</div>
                <h2 class="mt-5 text-5xl font-bold bg-gradient-to-r from-red-500 to-red-400 bg-clip-text text-transparent">300+</h2>
                <p class="mt-3 text-gray-600 font-medium">Hospitals</p>
                <div class="mt-2 h-1 w-12 bg-red-200 rounded-full group-hover:w-20 transition-all"></div>
            </div>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- TRUST SECTION -->
<!-- ========================= -->
<section class="relative overflow-hidden bg-gradient-to-r from-emerald-600 to-cyan-600 py-20">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyek0zNiAyNHYySDI0di0yaDEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-20"></div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="grid lg:grid-cols-3 gap-12 text-white text-center lg:text-left">
            <div class="group">
                <div class="flex items-center lg:justify-start justify-center gap-4">
                    <div class="text-5xl group-hover:scale-110 transition-transform">📊</div>
                    <div>
                        <h2 class="text-5xl font-bold tracking-tight">98%</h2>
                        <p class="mt-1 text-emerald-100 font-medium">Prediction Accuracy</p>
                    </div>
                </div>
                <div class="mt-3 h-1 w-16 bg-white/20 rounded-full group-hover:w-24 transition-all mx-auto lg:mx-0"></div>
            </div>

            <div class="group">
                <div class="flex items-center lg:justify-start justify-center gap-4">
                    <div class="text-5xl group-hover:scale-110 transition-transform">📋</div>
                    <div>
                        <h2 class="text-5xl font-bold tracking-tight">50,000+</h2>
                        <p class="mt-1 text-emerald-100 font-medium">Health Assessments</p>
                    </div>
                </div>
                <div class="mt-3 h-1 w-16 bg-white/20 rounded-full group-hover:w-24 transition-all mx-auto lg:mx-0"></div>
            </div>

            <div class="group">
                <div class="flex items-center lg:justify-start justify-center gap-4">
                    <div class="text-5xl group-hover:scale-110 transition-transform">👥</div>
                    <div>
                        <h2 class="text-5xl font-bold tracking-tight">15,000+</h2>
                        <p class="mt-1 text-emerald-100 font-medium">Registered Users</p>
                    </div>
                </div>
                <div class="mt-3 h-1 w-16 bg-white/20 rounded-full group-hover:w-24 transition-all mx-auto lg:mx-0"></div>
            </div>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- WHY CHOOSE MEDAWARE -->
<!-- ========================= -->
<section class="py-24 bg-gray-50 relative" id="features">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-emerald-100/20 via-transparent to-transparent"></div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="text-center">
            <span class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-700 px-5 py-2 rounded-full font-semibold text-sm border border-emerald-200/50">
                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                Why Choose MedAware
            </span>
            <h2 class="mt-6 text-5xl font-bold text-gray-800 tracking-tight">
                Healthcare Made <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">Intelligent</span>
            </h2>
            <p class="mt-5 text-gray-600 text-xl max-w-3xl mx-auto leading-relaxed">
                MedAware combines Artificial Intelligence, Natural Language Processing, disease prediction, hospital recommendations, and appointment booking into one smart healthcare platform.
            </p>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 mt-16">
            <div class="group bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100/50">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-100 to-emerald-200 flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">🤖</div>
                <h3 class="text-2xl font-bold mt-6 text-gray-800">AI Chatbot</h3>
                <p class="text-gray-600 mt-3 leading-relaxed">Chat naturally with MedAware AI and describe your symptoms in your own words.</p>
                <div class="mt-4 flex items-center text-emerald-600 font-medium text-sm group-hover:gap-2 transition-all">
                    Learn more <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                </div>
            </div>

            <div class="group bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100/50">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">🩺</div>
                <h3 class="text-2xl font-bold mt-6 text-gray-800">Disease Prediction</h3>
                <p class="text-gray-600 mt-3 leading-relaxed">AI predicts possible diseases based on your symptoms with high accuracy.</p>
                <div class="mt-4 flex items-center text-emerald-600 font-medium text-sm group-hover:gap-2 transition-all">
                    Learn more <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                </div>
            </div>

            <div class="group bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100/50">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">🚨</div>
                <h3 class="text-2xl font-bold mt-6 text-gray-800">Risk Assessment</h3>
                <p class="text-gray-600 mt-3 leading-relaxed">Detect Low, Medium, High and Critical health risks instantly with clear indicators.</p>
                <div class="mt-4 flex items-center text-emerald-600 font-medium text-sm group-hover:gap-2 transition-all">
                    Learn more <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                </div>
            </div>

            <div class="group bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-gray-100/50">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-yellow-100 to-yellow-200 flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">🏥</div>
                <h3 class="text-2xl font-bold mt-6 text-gray-800">Hospital Finder</h3>
                <p class="text-gray-600 mt-3 leading-relaxed">Locate nearby hospitals and book appointments in seconds with real-time availability.</p>
                <div class="mt-4 flex items-center text-emerald-600 font-medium text-sm group-hover:gap-2 transition-all">
                    Learn more <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- POPULAR DISEASES -->
<!-- ========================= -->
<section class="py-24 bg-white relative">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-cyan-50/30 via-transparent to-transparent"></div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <span class="inline-block bg-red-50 text-red-600 px-4 py-1.5 rounded-full text-sm font-medium border border-red-100">Trending</span>
                <h2 class="text-5xl font-bold text-gray-800 mt-3 tracking-tight">Popular Diseases</h2>
                <p class="text-gray-600 mt-2">Click a disease to learn more about symptoms and treatments.</p>
            </div>
            <a href="#" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:text-emerald-700 transition-colors group">
                View All
                <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
            </a>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 mt-12">
            <!-- Card 1 -->
            <div class="group bg-white border rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
                <div class="bg-gradient-to-br from-red-100 to-red-50 h-40 flex justify-center items-center text-7xl group-hover:scale-110 transition-transform duration-300">🫀</div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800">Heart Attack</h3>
                    <p class="text-gray-500 mt-1">Cardiovascular Disease</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs font-medium text-red-600 bg-red-50 px-3 py-1 rounded-full">Critical</span>
                        <a href="#" class="text-red-600 font-semibold hover:text-red-700 transition-colors group">
                            Details <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="group bg-white border rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
                <div class="bg-gradient-to-br from-green-100 to-green-50 h-40 flex justify-center items-center text-7xl group-hover:scale-110 transition-transform duration-300">🤒</div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800">Influenza</h3>
                    <p class="text-gray-500 mt-1">Viral Infection</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs font-medium text-yellow-600 bg-yellow-50 px-3 py-1 rounded-full">Medium</span>
                        <a href="#" class="text-green-600 font-semibold hover:text-green-700 transition-colors group">
                            Details <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-white border rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
                <div class="bg-gradient-to-br from-yellow-100 to-yellow-50 h-40 flex justify-center items-center text-7xl group-hover:scale-110 transition-transform duration-300">🦟</div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800">Dengue</h3>
                    <p class="text-gray-500 mt-1">Mosquito-borne Disease</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs font-medium text-red-600 bg-red-50 px-3 py-1 rounded-full">High Risk</span>
                        <a href="#" class="text-yellow-600 font-semibold hover:text-yellow-700 transition-colors group">
                            Details <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="group bg-white border rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden hover:-translate-y-1">
                <div class="bg-gradient-to-br from-blue-100 to-blue-50 h-40 flex justify-center items-center text-7xl group-hover:scale-110 transition-transform duration-300">🫁</div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800">COVID-19</h3>
                    <p class="text-gray-500 mt-1">Respiratory Disease</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs font-medium text-yellow-600 bg-yellow-50 px-3 py-1 rounded-full">Medium</span>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors group">
                            Details <span class="inline-block transition-transform group-hover:translate-x-1">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- AI CHATBOT PREVIEW -->
<!-- ========================= -->
<section class="py-24 bg-gradient-to-r from-emerald-600 to-cyan-600 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyek0zNiAyNHYySDI0di0yaDEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-10"></div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="inline-block bg-white/20 text-white px-5 py-2 rounded-full font-semibold text-sm backdrop-blur-sm border border-white/10">🤖 AI Powered</span>
                <h2 class="text-5xl font-bold text-white mt-6 leading-tight tracking-tight">
                    Meet Your <span class="text-emerald-200">AI Doctor</span>
                </h2>
                <p class="text-xl text-emerald-100 mt-6 leading-relaxed">
                    Describe your symptoms naturally. Our AI understands your language, extracts symptoms, predicts diseases, assesses health risks, and recommends the next step.
                </p>
                <div class="flex flex-wrap gap-4 mt-8">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-white text-emerald-700 px-8 py-4 rounded-xl font-bold hover:shadow-2xl transition-all hover:scale-105">
                        Start AI Chat <span class="text-xl">→</span>
                    </a>
                    <a href="#" class="inline-flex items-center gap-2 text-white border border-white/30 px-8 py-4 rounded-xl font-medium hover:bg-white/10 transition-all">
                        Watch Demo <span>▶</span>
                    </a>
                </div>
            </div>

            <!-- Chat Preview -->
            <div class="bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl p-6 border border-white/20">
                <div class="bg-white rounded-2xl p-6 shadow-xl">
                    <!-- Chat Header -->
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-cyan-500 rounded-full flex items-center justify-center text-white text-sm font-bold">AI</div>
                        <div>
                            <h4 class="font-bold text-gray-800">MedAware Assistant</h4>
                            <p class="text-xs text-green-500 flex items-center gap-1">
                                <span class="w-2 h-2 bg-green-500 rounded-full inline-block animate-pulse"></span>
                                Online
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4 mt-4">
                        <!-- User Message -->
                        <div class="flex justify-end">
                            <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-2xl rounded-tr-sm px-5 py-3 max-w-sm shadow-lg">
                                I have fever, headache and cough.
                            </div>
                        </div>

                        <!-- AI Response -->
                        <div class="flex">
                            <div class="bg-gray-50 rounded-2xl rounded-tl-sm px-5 py-4 max-w-md shadow-sm border border-gray-100">
                                <div class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                    <span>🤖</span> <strong>MedAware AI</strong>
                                </div>
                                <hr class="my-3 border-gray-200">
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Possible Disease</p>
                                        <p class="font-bold text-gray-900">Influenza</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Risk Level</p>
                                        <span class="inline-block bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">⚠️ Medium</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Recommendations</p>
                                        <ul class="text-sm text-gray-600 list-disc list-inside space-y-1 mt-1">
                                            <li>💧 Drink plenty of water</li>
                                            <li>🛌 Take proper rest</li>
                                            <li>🏥 Consult physician if symptoms persist</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- HOW IT WORKS -->
<!-- ========================= -->
<section class="py-24 bg-gray-50 relative">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-emerald-50/20 via-transparent to-transparent"></div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="text-center">
            <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-5 py-2 rounded-full font-semibold text-sm border border-blue-200/50">
                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                Simple Process
            </span>
            <h2 class="text-5xl font-bold mt-6 text-gray-800 tracking-tight">
                How <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">MedAware</span> Works
            </h2>
            <p class="mt-4 text-gray-600 text-xl">AI powered healthcare in just four simple steps.</p>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-10 mt-16 relative">
            <!-- Connecting line - desktop only -->
            <div class="hidden lg:block absolute top-24 left-[12.5%] w-[75%] h-0.5 bg-emerald-200"></div>

            <!-- Step 1 -->
            <div class="relative text-center group">
                <div class="relative">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-emerald-100 to-emerald-200 flex items-center justify-center text-5xl shadow-lg group-hover:scale-110 transition-transform duration-300">💬</div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-emerald-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-lg">1</div>
                </div>
                <h3 class="mt-6 text-2xl font-bold text-gray-800">Describe Symptoms</h3>
                <p class="mt-3 text-gray-600 leading-relaxed">Tell MedAware how you're feeling in your own words.</p>
            </div>

            <!-- Step 2 -->
            <div class="relative text-center group">
                <div class="relative">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center text-5xl shadow-lg group-hover:scale-110 transition-transform duration-300">🤖</div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-lg">2</div>
                </div>
                <h3 class="mt-6 text-2xl font-bold text-gray-800">AI Analysis</h3>
                <p class="mt-3 text-gray-600 leading-relaxed">NLP extracts symptoms and predicts possible diseases.</p>
            </div>

            <!-- Step 3 -->
            <div class="relative text-center group">
                <div class="relative">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-yellow-100 to-yellow-200 flex items-center justify-center text-5xl shadow-lg group-hover:scale-110 transition-transform duration-300">📊</div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-lg">3</div>
                </div>
                <h3 class="mt-6 text-2xl font-bold text-gray-800">Risk Assessment</h3>
                <p class="mt-3 text-gray-600 leading-relaxed">Health risk is calculated and displayed instantly.</p>
            </div>

            <!-- Step 4 -->
            <div class="relative text-center group">
                <div class="relative">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center text-5xl shadow-lg group-hover:scale-110 transition-transform duration-300">🏥</div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-lg">4</div>
                </div>
                <h3 class="mt-6 text-2xl font-bold text-gray-800">Get Help</h3>
                <p class="mt-3 text-gray-600 leading-relaxed">Find nearby hospitals and book appointments.</p>
            </div>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- TESTIMONIALS -->
<!-- ========================= -->
<section class="py-24 bg-white relative">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-emerald-50/10 via-transparent to-transparent"></div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="text-center">
            <span class="inline-flex items-center gap-2 bg-yellow-50 text-yellow-700 px-5 py-2 rounded-full font-semibold text-sm border border-yellow-200/50">★ Testimonials</span>
            <h2 class="text-5xl font-bold mt-6 text-gray-800 tracking-tight">
                What <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-cyan-600">Users Say</span>
            </h2>
            <p class="mt-3 text-gray-600 text-lg">Trusted by thousands of users across India.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 mt-16">
            <div class="group bg-gray-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-gray-100/50">
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/60?img=11" alt="User" class="w-14 h-14 rounded-full border-2 border-emerald-200">
                    <div>
                        <h4 class="font-bold text-gray-800">Rahul Sharma</h4>
                        <p class="text-sm text-gray-500">Ahmedabad</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-2xl mt-4">★★★★★</div>
                <p class="mt-4 text-gray-600 leading-relaxed">"Very easy to use. The AI helped me understand my symptoms before visiting a doctor. Highly recommended!"</p>
            </div>

            <div class="group bg-gray-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-gray-100/50">
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/60?img=5" alt="User" class="w-14 h-14 rounded-full border-2 border-emerald-200">
                    <div>
                        <h4 class="font-bold text-gray-800">Priya Patel</h4>
                        <p class="text-sm text-gray-500">Surat</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-2xl mt-4">★★★★★</div>
                <p class="mt-4 text-gray-600 leading-relaxed">"Hospital finder saved a lot of time. Found a great doctor nearby in minutes. Absolutely love this platform."</p>
            </div>

            <div class="group bg-gray-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 border border-gray-100/50">
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/60?img=12" alt="User" class="w-14 h-14 rounded-full border-2 border-emerald-200">
                    <div>
                        <h4 class="font-bold text-gray-800">Amit Shah</h4>
                        <p class="text-sm text-gray-500">Vadodara</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-2xl mt-4">★★★★★</div>
                <p class="mt-4 text-gray-600 leading-relaxed">"Excellent healthcare assistant. Simple interface with accurate suggestions. The risk assessment feature is a lifesaver."</p>
            </div>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- CTA SECTION -->
<!-- ========================= -->
<section class="py-24 bg-gradient-to-r from-emerald-600 to-cyan-600 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyek0zNiAyNHYySDI0di0yaDEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-10"></div>
    <div class="max-w-5xl mx-auto text-center px-6 relative">
        <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-12 border border-white/20">
            <span class="inline-block bg-white/20 text-white px-5 py-2 rounded-full font-semibold text-sm backdrop-blur-sm">🚀 Get Started</span>
            <h2 class="text-5xl font-bold text-white mt-6 leading-tight tracking-tight">
                Take Charge of <span class="text-emerald-200">Your Health</span> Today
            </h2>
            <p class="text-xl text-emerald-100 mt-6 leading-relaxed max-w-2xl mx-auto">
                Start using MedAware and experience the power of Artificial Intelligence for smarter healthcare decisions.
            </p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-white text-emerald-700 px-10 py-4 rounded-xl font-bold shadow-lg hover:scale-105 transition-all duration-300 hover:shadow-2xl flex items-center gap-2">
                    Create Free Account <span>→</span>
                </a>
                <a href="{{ route('login') }}" class="border-2 border-white text-white px-10 py-4 rounded-xl hover:bg-white hover:text-emerald-700 transition-all duration-300 font-semibold">
                    Login
                </a>
            </div>
            <p class="mt-6 text-emerald-100/80 text-sm">No credit card required • Free forever</p>
        </div>
    </div>
</section>

<!-- ========================= -->
<!-- FOOTER -->
<!-- ========================= -->
<footer class="bg-slate-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <!-- Brand -->
            <div class="lg:col-span-1">
                <div class="flex items-center gap-2">
                    <span class="text-3xl">🩺</span>
                    <h2 class="text-3xl font-bold text-white">MedAware</h2>
                </div>
                <p class="mt-6 leading-relaxed text-gray-400">
                    AI-Driven Public Health Chatbot that assists users with symptom analysis, disease prediction, hospital recommendations, appointments and health tracking.
                </p>
                <div class="flex gap-4 mt-6">
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-emerald-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-emerald-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-emerald-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-emerald-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.23 0H1.77C.8 0 0 .77 0 1.72v20.56C0 23.23.8 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.2 0 22.23 0zM7.08 20.44H3.55V8.97h3.53v11.47zM5.31 7.42c-1.13 0-2.04-.92-2.04-2.04s.91-2.04 2.04-2.04 2.04.92 2.04 2.04-.91 2.04-2.04 2.04zm15.13 13.02h-3.53v-5.59c0-1.33-.03-3.04-1.85-3.04s-2.13 1.45-2.13 2.95v5.68H9.4V8.97h3.39v1.56h.05c.47-.89 1.62-1.83 3.33-1.83 3.56 0 4.22 2.34 4.22 5.38v6.36z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold text-white">Quick Links</h3>
                <ul class="mt-6 space-y-3">
                    <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><span class="text-emerald-500">›</span> Home</a></li>
                    <li><a href="#features" class="hover:text-white transition-colors flex items-center gap-2"><span class="text-emerald-500">›</span> Features</a></li>
                    <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><span class="text-emerald-500">›</span> Diseases</a></li>
                    <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><span class="text-emerald-500">›</span> Hospitals</a></li>
                    <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><span class="text-emerald-500">›</span> About Us</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-xl font-bold text-white">Services</h3>
                <ul class="mt-6 space-y-3">
                    <li class="flex items-center gap-2"><span class="text-emerald-500">•</span> AI Chatbot</li>
                    <li class="flex items-center gap-2"><span class="text-emerald-500">•</span> Disease Prediction</li>
                    <li class="flex items-center gap-2"><span class="text-emerald-500">•</span> Hospital Finder</li>
                    <li class="flex items-center gap-2"><span class="text-emerald-500">•</span> Appointments</li>
                    <li class="flex items-center gap-2"><span class="text-emerald-500">•</span> Health Logs</li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-xl font-bold text-white">Contact</h3>
                <div class="mt-6 space-y-4">
                    <p class="flex items-start gap-3">
                        <span class="text-emerald-500 mt-1">📍</span>
                        <span>Ahmedabad, Gujarat, India</span>
                    </p>
                    <p class="flex items-center gap-3">
                        <span class="text-emerald-500">📞</span>
                        <span>+91 7383481030</span>
                    </p>
                    <p class="flex items-center gap-3">
                        <span class="text-emerald-500">✉</span>
                        <span>support@medaware.com</span>
                    </p>
                    <p class="flex items-center gap-3">
                        <span class="text-emerald-500">🕐</span>
                        <span>24/7 Available</span>
                    </p>
                </div>
            </div>
        </div>

        <hr class="border-gray-800 my-12">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-500 text-sm">© {{ date('Y') }} MedAware. All Rights Reserved.</p>
            <div class="flex gap-6 text-sm">
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Support</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Cookies</a>
            </div>
        </div>
    </div>
</footer>

@endsection