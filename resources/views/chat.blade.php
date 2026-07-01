@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-cyan-50 to-blue-50 py-8">

    <div class="max-w-5xl mx-auto px-4">

        {{-- Chat Card --}}
        <div class="bg-white rounded-3xl shadow-2xl border border-emerald-100 overflow-hidden">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 px-6 py-5 text-white">

                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center text-3xl">
                            🩺
                        </div>

                        <div>
                            <h1 class="text-2xl font-bold">
                                MedAware AI
                            </h1>

                            <p class="text-emerald-100 text-sm">
                                AI-Powered Public Health Assistant
                            </p>
                        </div>

                    </div>

                    <div class="hidden md:flex items-center gap-2 bg-white/20 px-4 py-2 rounded-full">

                        <span class="w-2.5 h-2.5 rounded-full bg-green-300 animate-pulse"></span>

                        <span class="text-sm font-medium">
                            Online
                        </span>

                    </div>

                </div>

            </div>

            {{-- Welcome Banner --}}
            <div class="bg-emerald-50 border-b border-emerald-100 px-6 py-4">

                <div class="flex gap-3">

                    <div class="text-2xl">
                        💡
                    </div>

                    <div>

                        <h2 class="font-semibold text-emerald-800">
                            Welcome to MedAware
                        </h2>

                        <p class="text-sm text-gray-600 mt-1">
                            Describe your symptoms naturally. I can help identify
                            possible conditions, assess risk level, provide
                            preventive guidance, and recommend nearby hospitals
                            if necessary.
                        </p>

                    </div>

                </div>

            </div>

            {{-- Chat Area --}}
            <div id="chat" class="h-[520px] overflow-y-auto bg-slate-50 px-6 py-6 space-y-5">

                {{-- Bot Welcome --}}
                <div class="flex items-start gap-3" id="welcome-message">

                    <div class="w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center text-white font-bold flex-shrink-0">
                        AI
                    </div>

                    <div class="max-w-2xl bg-white rounded-2xl shadow border border-gray-100 p-4">

                        <p class="font-semibold text-emerald-700 mb-2">
                            MedAware Assistant
                        </p>

                        <p class="text-gray-700">
                            Hello! 👋
                        </p>

                        <p class="text-gray-700 mt-2">
                            I can help you understand symptoms,
                            provide disease awareness,
                            assess health risks,
                            and suggest emergency action when needed.
                        </p>

                        <p class="text-gray-700 mt-2">
                            Please tell me what you're experiencing.
                        </p>

                    </div>

                </div>

            </div>

            {{-- Typing Indicator --}}
            <div id="typing" class="hidden px-6 pb-3">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center text-white flex-shrink-0">
                        AI
                    </div>

                    <div class="bg-white shadow rounded-xl px-4 py-3 flex items-center gap-1">

                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>

                    </div>

                </div>

            </div>

            {{-- Input Section --}}
            <div class="border-t bg-white px-6 py-5">

                <form id="chat-form">

                    @csrf

                    <div class="flex gap-3">

                        <input
                            type="text"
                            id="message"
                            autocomplete="off"
                            placeholder="Describe your symptoms..."
                            class="flex-1 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 px-5 py-4 text-gray-700"
                        >

                        <button
                            type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 transition text-white px-8 rounded-xl font-semibold">

                            Send

                        </button>

                    </div>

                </form>

                <div class="mt-4 flex flex-wrap gap-2">

                    <button class="quick-question px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm hover:bg-emerald-200 transition">
                        I have fever and cough
                    </button>

                    <button class="quick-question px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm hover:bg-blue-200 transition">
                        I have headache
                    </button>

                    <button class="quick-question px-4 py-2 rounded-full bg-orange-100 text-orange-700 text-sm hover:bg-orange-200 transition">
                        I have chest pain
                    </button>

                    <button class="quick-question px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm hover:bg-red-200 transition">
                        I have fever and loss of taste
                    </button>

                </div>

            </div>

        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("chat-form");
    const input = document.getElementById("message");
    const chat = document.getElementById("chat");
    const typing = document.getElementById("typing");

    // ===============================
    // Get CSRF Token
    // ===============================

    function getCsrfToken() {
        const metaToken = document.querySelector('meta[name="csrf-token"]');
        if (metaToken) {
            return metaToken.getAttribute('content');
        }
        const inputToken = document.querySelector('input[name="_token"]');
        if (inputToken) {
            return inputToken.value;
        }
        return null;
    }

    // ===============================
    // Auto Scroll
    // ===============================

    function scrollBottom() {
        chat.scrollTop = chat.scrollHeight;
    }

    // ===============================
    // User Bubble
    // ===============================

    function addUserMessage(message) {
        // Remove welcome message if exists
        const welcomeMsg = document.getElementById('welcome-message');
        if (welcomeMsg && chat.children.length === 1) {
            welcomeMsg.remove();
        }

        const msgDiv = document.createElement('div');
        msgDiv.className = 'flex justify-end';
        msgDiv.innerHTML = `
            <div class="max-w-2xl bg-emerald-600 text-white rounded-2xl px-5 py-3 shadow">
                ${escapeHtml(message)}
            </div>
        `;
        chat.appendChild(msgDiv);
        scrollBottom();
    }

    // ===============================
    // Escape HTML
    // ===============================

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // ===============================
    // Format Text
    // ===============================

    function formatText(text) {
        if (!text) return '';
        return text
            .replace(/\*\*(.*?)\*\*/g, "<strong>$1</strong>")
            .replace(/\n/g, "<br>")
            .replace(/•/g, "•");
    }

    // ===============================
    // Render AI Response
    // ===============================

    function renderResponse(data) {
        let html = "";

        // ===============================
        // 1. AI Reply / Message
        // ===============================
        if (data.reply) {
            html += `
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center text-white font-bold flex-shrink-0">
                    AI
                </div>
                <div class="flex-1 bg-white rounded-2xl shadow border border-gray-100 overflow-hidden">
                    <div class="px-5 py-4 border-b bg-emerald-50">
                        <h3 class="font-semibold text-emerald-700">MedAware Assistant</h3>
                    </div>
                    <div class="px-5 py-4 leading-8 text-gray-700">
                        ${formatText(data.reply)}
                    </div>
                </div>
            </div>`;
        }

        // ===============================
        // 2. Disease / Condition
        // ===============================
        if (data.disease && data.disease !== 'Unknown' && data.disease !== null) {
            const isCovid = data.disease.toLowerCase().includes('covid') || data.disease.toLowerCase().includes('corona');
            const diseaseColor = isCovid ? 'red' : 'blue';
            
            html += `
            <div class="bg-${diseaseColor}-50 rounded-xl border border-${diseaseColor}-200 p-5">
                <h3 class="font-semibold text-${diseaseColor}-700 mb-3">🩺 Possible Condition</h3>
                <div class="text-lg font-bold text-${diseaseColor}-900">${escapeHtml(data.disease)}</div>
                ${data.confidence ? `<div class="text-sm text-gray-600 mt-1">Confidence: ${data.confidence}%</div>` : ''}
                ${data.matched_symptoms && data.matched_symptoms.length > 0 ? `<div class="text-sm text-gray-500 mt-1">Matched Symptoms: ${escapeHtml(data.matched_symptoms.join(', '))}</div>` : ''}
            </div>`;
        }

        // ===============================
        // 3. Risk Level
        // ===============================
        if (data.risk) {
            let riskText = data.risk;
            if (typeof data.risk === 'object') {
                riskText = data.risk.risk || data.risk;
            }
            const riskLower = String(riskText).toLowerCase();
            let bgColor = "green";
            let icon = "🟢";

            if (riskLower === "medium") {
                bgColor = "yellow";
                icon = "🟡";
            } else if (riskLower === "high") {
                bgColor = "orange";
                icon = "🟠";
            } else if (riskLower === "critical" || riskLower === "emergency") {
                bgColor = "red";
                icon = "🔴";
            }

            html += `
            <div class="bg-${bgColor}-50 border border-${bgColor}-200 rounded-xl p-5">
                <div class="font-bold text-${bgColor}-700 text-lg">${icon} Risk Assessment</div>
                <div class="mt-2 text-${bgColor}-700 font-semibold">${escapeHtml(riskText)}</div>
                ${data.risk_score ? `<div class="text-sm text-gray-500 mt-1">Risk Score: ${data.risk_score}/100</div>` : ''}
            </div>`;
        }

        // ===============================
        // 4. Recommendations / Advice
        // ===============================
        const adviceItems = data.recommendations || data.advice || [];
        if (adviceItems.length > 0) {
            html += `
            <div class="bg-green-50 rounded-xl border border-green-200 p-5">
                <h3 class="font-semibold text-green-700 mb-3">💊 Recommendations</h3>
                <ul class="list-disc pl-5 space-y-2">`;
            adviceItems.forEach(item => {
                html += `<li class="text-gray-700">${escapeHtml(item)}</li>`;
            });
            html += `</ul></div>`;
        }

        // ===============================
        // 5. Emergency Alert
        // ===============================
        const alertText = data.alert || '';
        const isEmergency = alertText.toLowerCase().includes('emergency') || 
                           alertText.toLowerCase().includes('108') ||
                           data.emergency === true;

        if (isEmergency && alertText) {
            html += `
            <div class="bg-red-100 border-l-4 border-red-600 rounded-xl p-5 animate-pulse">
                <h2 class="text-red-700 font-bold text-xl">🚨 Emergency Warning</h2>
                <p class="mt-3 text-gray-700">${escapeHtml(alertText)}</p>
                <div class="mt-4 flex flex-wrap gap-3">
                    <button onclick="window.location.href='tel:108'" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg transition">
                        Call Emergency (108)
                    </button>
                    <button onclick="window.open('https://www.google.com/maps/search/hospitals+near+me','_blank')" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                        Find Nearby Hospital
                    </button>
                </div>
            </div>`;
        }

        // ===============================
        // 6. Disclaimer
        // ===============================
        html += `
        <div class="text-xs text-gray-500 italic mt-2">
            MedAware provides awareness and educational guidance only.
            It does not replace consultation with a qualified healthcare professional.
        </div>`;

        // Append all content to chat
        const container = document.createElement('div');
        container.innerHTML = html;
        while (container.firstChild) {
            chat.appendChild(container.firstChild);
        }
        scrollBottom();
    }

    // ===============================
    // Typing Indicator
    // ===============================

    function showTyping() {
        typing.classList.remove("hidden");
        scrollBottom();
    }

    function hideTyping() {
        typing.classList.add("hidden");
    }

    // ===============================
    // Send Message to Backend
    // ===============================

    async function sendMessage(message) {
        addUserMessage(message);
        input.value = "";
        showTyping();

        try {
            // FastAPI backend URL - update if your server runs on different port
            const API_URL = "http://localhost:8000/analyze";

            const response = await fetch(API_URL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    message: message
                })
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            hideTyping();

            // Render the response
            renderResponse(data);

        } catch (error) {
            console.error('Error:', error);
            hideTyping();
            
            // Fallback response when backend is not reachable
            renderResponse({
                reply: "⚠️ Unable to connect to the AI server. Please check your connection and try again.",
                disease: null,
                risk: null,
                recommendations: ["Check your internet connection.", "Try again in a few moments.", "If the problem persists, please contact support."],
                alert: null,
                emergency: false
            });
        }
    }

    // ===============================
    // Form Submit
    // ===============================

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const message = input.value.trim();
        if (message === "") return;
        sendMessage(message);
    });

    // ===============================
    // Enter Key
    // ===============================

    input.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            e.preventDefault();
            form.requestSubmit();
        }
    });

    // ===============================
    // Quick Questions
    // ===============================

    document.querySelectorAll(".quick-question").forEach(button => {
        button.addEventListener("click", () => {
            input.value = button.innerText.trim();
            form.requestSubmit();
        });
    });

    // Initial scroll
    scrollBottom();

});
</script>

<style>
    /* Custom scrollbar */
    #chat::-webkit-scrollbar {
        width: 6px;
    }

    #chat::-webkit-scrollbar-track {
        background: transparent;
    }

    #chat::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 3px;
    }

    #chat::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }

    /* Bounce animation for typing indicator */
    @keyframes bounce {
        0%, 60%, 100% {
            transform: translateY(0);
        }
        30% {
            transform: translateY(-6px);
        }
    }

    .animate-bounce {
        animation: bounce 1.2s ease-in-out infinite;
    }

    /* Pulse animation for emergency */
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
        }
    }

    .animate-pulse {
        animation: pulse 1.5s ease-in-out infinite;
    }
</style>

@endsection