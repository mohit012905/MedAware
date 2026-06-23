@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedAware AI Chatbot</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* ========================================= */
        /* RESET & BASE */
        /* ========================================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 30%, #ecfeff 70%, #f0f9ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* ========================================= */
        /* CONTAINER */
        /* ========================================= */
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(16, 185, 129, 0.15), 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }

        /* ========================================= */
        /* HEADER */
        /* ========================================= */
        .header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(16, 185, 129, 0.15);
        }

        .header-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #059669, #0d9488);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .header-text h2 {
            font-size: 24px;
            font-weight: 700;
            color: #065f46;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .header-text p {
            font-size: 13px;
            color: #6b7280;
            margin: 2px 0 0 0;
        }

        .status-badge {
            margin-left: auto;
            background: #d1fae5;
            color: #065f46;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-badge .dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            display: inline-block;
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        /* ========================================= */
        /* CHAT BOX */
        /* ========================================= */
        #chat {
            height: 420px;
            overflow-y: auto;
            padding: 20px;
            background: rgba(249, 250, 251, 0.6);
            border-radius: 16px;
            border: 1px solid rgba(229, 231, 235, 0.5);
            margin-bottom: 20px;
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
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

        /* ========================================= */
        /* MESSAGE STYLES */
        /* ========================================= */
        .message {
            margin-bottom: 16px;
            animation: fadeInUp 0.4s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .user {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .user .bubble {
            background: linear-gradient(135deg, #059669, #0d9488);
            color: white;
            padding: 12px 18px;
            border-radius: 18px 18px 4px 18px;
            max-width: 80%;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
            font-size: 14px;
            line-height: 1.6;
            word-wrap: break-word;
        }

        .user .label {
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 4px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .bot {
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .bot .bubble {
            background: white;
            color: #1f2937;
            padding: 16px 20px;
            border-radius: 18px 18px 18px 4px;
            max-width: 85%;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(229, 231, 235, 0.3);
            font-size: 14px;
            line-height: 1.7;
            word-wrap: break-word;
        }

        .bot .label {
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 4px;
            font-weight: 600;
            letter-spacing: 0.3px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .bot .label .avatar {
            width: 22px;
            height: 22px;
            background: linear-gradient(135deg, #059669, #0d9488);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: white;
        }

        /* ========================================= */
        /* BOT RESPONSE FORMATTING */
        /* ========================================= */
        .bot-disease {
            font-weight: 700;
            color: #065f46;
            font-size: 15px;
            display: block;
            margin-bottom: 4px;
        }

        .bot-risk {
            display: inline-block;
            padding: 2px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            margin: 4px 0 8px 0;
        }

        .bot-risk.critical {
            background: #fee2e2;
            color: #dc2626;
        }

        .bot-risk.high {
            background: #fef3c7;
            color: #d97706;
        }

        .bot-risk.medium {
            background: #fef9c3;
            color: #ca8a04;
        }

        .bot-risk.low {
            background: #d1fae5;
            color: #059669;
        }

        .bot-advice {
            margin: 8px 0;
            padding-left: 16px;
            border-left: 3px solid #059669;
        }

        .bot-advice li {
            list-style: none;
            padding: 2px 0;
            color: #4b5563;
            font-size: 13px;
        }

        .bot-advice li::before {
            content: "• ";
            color: #059669;
            font-weight: 700;
        }

        .bot-alert {
            margin-top: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            background: #fef2f2;
            color: #dc2626;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid #fecaca;
        }

        .bot-alert.emergency {
            background: #fee2e2;
            color: #b91c1c;
            border-color: #f87171;
            animation: pulse-alert 1.5s ease-in-out infinite;
        }

        @keyframes pulse-alert {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        /* ========================================= */
        /* INPUT AREA */
        /* ========================================= */
        .input-area {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .input-area input {
            flex: 1;
            padding: 14px 18px;
            border: 2px solid #e5e7eb;
            border-radius: 14px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            font-family: inherit;
        }

        .input-area input:focus {
            border-color: #059669;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-area input::placeholder {
            color: #9ca3af;
        }

        .input-area button {
            padding: 14px 28px;
            background: linear-gradient(135deg, #059669, #0d9488);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            font-family: inherit;
        }

        .input-area button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .input-area button:active {
            transform: translateY(0);
        }

        .input-area button svg {
            width: 18px;
            height: 18px;
        }

        /* ========================================= */
        /* FOOTER */
        /* ========================================= */
        .footer {
            margin-top: 16px;
            text-align: center;
            font-size: 11px;
            color: #9ca3af;
        }

        .footer kbd {
            background: #f3f4f6;
            padding: 1px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-family: monospace;
            border: 1px solid #e5e7eb;
        }

        /* ========================================= */
        /* TYPING INDICATOR */
        /* ========================================= */
        .typing-indicator {
            display: flex;
            gap: 4px;
            padding: 8px 0;
        }

        .typing-indicator span {
            width: 8px;
            height: 8px;
            background: #9ca3af;
            border-radius: 50%;
            display: inline-block;
            animation: typing-bounce 1.4s ease-in-out infinite;
        }

        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing-bounce {
            0%, 60%, 100% {
                transform: translateY(0);
                opacity: 0.4;
            }
            30% {
                transform: translateY(-8px);
                opacity: 1;
            }
        }

        /* ========================================= */
        /* RESPONSIVE */
        /* ========================================= */
        @media (max-width: 640px) {
            .container {
                padding: 16px;
                border-radius: 16px;
            }

            .header-text h2 {
                font-size: 18px;
            }

            .status-badge {
                font-size: 10px;
                padding: 3px 10px;
            }

            #chat {
                height: 320px;
                padding: 14px;
            }

            .user .bubble,
            .bot .bubble {
                max-width: 95%;
                font-size: 13px;
                padding: 10px 14px;
            }

            .input-area {
                flex-direction: column;
                gap: 10px;
            }

            .input-area input {
                width: 100%;
                padding: 12px 16px;
                font-size: 14px;
            }

            .input-area button {
                width: 100%;
                justify-content: center;
                padding: 12px 20px;
            }

            .header {
                flex-wrap: wrap;
                gap: 10px;
            }

            .status-badge {
                margin-left: 0;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 12px;
                border-radius: 12px;
            }

            #chat {
                height: 280px;
                padding: 10px;
            }

            .bot .bubble,
            .user .bubble {
                font-size: 12px;
                padding: 8px 12px;
            }

            .header-icon {
                width: 40px;
                height: 40px;
                font-size: 22px;
            }

            .header-text h2 {
                font-size: 16px;
            }
        }

        /* ========================================= */
        /* EMPTY STATE */
        /* ========================================= */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #9ca3af;
        }

        .empty-state .icon {
            font-size: 48px;
            margin-bottom: 12px;
        }

        .empty-state h4 {
            color: #4b5563;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .empty-state p {
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- ========================================= -->
        <!-- HEADER -->
        <!-- ========================================= -->
        <div class="header">
            <div class="header-icon">🩺</div>
            <div class="header-text">
                <h2>MedAware AI</h2>
                <p>Your AI-Powered Health Assistant</p>
            </div>
            <div class="status-badge">
                <span class="dot"></span>
                Online
            </div>
        </div>

        <!-- ========================================= -->
        <!-- CHAT BOX -->
        <!-- ========================================= -->
        <div id="chat">
            <div class="empty-state">
                <div class="icon">💬</div>
                <h4>How can I help you?</h4>
                <p>Describe your symptoms and I'll assist you</p>
            </div>
        </div>

        <!-- ========================================= -->
        <!-- INPUT AREA -->
        <!-- ========================================= -->
        <div class="input-area">
            <input
                id="message"
                placeholder="Describe your symptoms..."
                autocomplete="off"
                onkeypress="if(event.key==='Enter') sendMessage()"
            >
            <button onclick="sendMessage()">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                Send
            </button>
        </div>

        <!-- ========================================= -->
        <!-- FOOTER -->
        <!-- ========================================= -->
        <div class="footer">
            Press <kbd>Enter</kbd> to send • AI responses are for informational purposes only
        </div>
    </div>

    <!-- ========================================= -->
    <!-- SCRIPTS -->
    <!-- ========================================= -->
    <script>
        // =========================================
        // DOM Elements
        // =========================================
        const chatBox = document.getElementById('chat');
        const messageInput = document.getElementById('message');
        let isWaiting = false;

        // =========================================
        // Scroll to Bottom
        // =========================================
        function scrollToBottom() {
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // =========================================
        // Show Typing Indicator
        // =========================================
        function showTypingIndicator() {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'message bot';
            typingDiv.id = 'typing-indicator';
            typingDiv.innerHTML = `
                <div class="label">
                    <span class="avatar">AI</span> MedAware is thinking...
                </div>
                <div class="bubble">
                    <div class="typing-indicator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            `;
            chatBox.appendChild(typingDiv);
            scrollToBottom();
        }

        // =========================================
        // Remove Typing Indicator
        // =========================================
        function removeTypingIndicator() {
            const indicator = document.getElementById('typing-indicator');
            if (indicator) {
                indicator.remove();
            }
        }

        // =========================================
        // Add User Message
        // =========================================
        function addUserMessage(message) {
            // Remove empty state if exists
            const emptyState = chatBox.querySelector('.empty-state');
            if (emptyState) {
                emptyState.remove();
            }

            const msgDiv = document.createElement('div');
            msgDiv.className = 'message user';
            msgDiv.innerHTML = `
                <div class="label">You</div>
                <div class="bubble">${escapeHtml(message)}</div>
            `;
            chatBox.appendChild(msgDiv);
            scrollToBottom();
        }

        // =========================================
        // Add Bot Message
        // =========================================
        function addBotMessage(data) {
            const msgDiv = document.createElement('div');
            msgDiv.className = 'message bot';

            // Determine risk class
            let riskClass = 'low';
            if (data.risk && data.risk.toLowerCase() === 'critical') riskClass = 'critical';
            else if (data.risk && data.risk.toLowerCase() === 'high') riskClass = 'high';
            else if (data.risk && data.risk.toLowerCase() === 'medium') riskClass = 'medium';

            // Build advice list
            let adviceHtml = '';
            if (data.advice && data.advice.length > 0) {
                adviceHtml = '<ul class="bot-advice">';
                data.advice.forEach(item => {
                    adviceHtml += `<li>${escapeHtml(item)}</li>`;
                });
                adviceHtml += '</ul>';
            }

            // Build alert
            let alertHtml = '';
            if (data.alert) {
                const isEmergency = data.alert.toLowerCase().includes('emergency') || data.alert.toLowerCase().includes('immediate');
                alertHtml = `<div class="bot-alert ${isEmergency ? 'emergency' : ''}">⚠️ ${escapeHtml(data.alert)}</div>`;
            }

            msgDiv.innerHTML = `
                <div class="label">
                    <span class="avatar">AI</span> MedAware
                </div>
                <div class="bubble">
                    <span class="bot-disease">🩺 ${escapeHtml(data.disease || 'General Symptoms')}</span>
                    <span class="bot-risk ${riskClass}">${escapeHtml(data.risk || 'Low')} Risk</span>
                    ${adviceHtml}
                    ${alertHtml}
                </div>
            `;
            chatBox.appendChild(msgDiv);
            scrollToBottom();
        }

        // =========================================
        // Send Message
        // =========================================
        async function sendMessage() {
            const message = document.getElementById('message').value.trim();
            if (message === '' || isWaiting) return;

            // Add user message
            addUserMessage(message);

            // Clear input
            document.getElementById('message').value = '';

            // Show typing indicator
            isWaiting = true;
            showTypingIndicator();

            try {
                const response = await fetch("/chatbot/analyze", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        message: message
                    })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                const bot = data.chatbot_response || data;

                // Remove typing indicator
                removeTypingIndicator();

                // Add bot message
                addBotMessage(bot);

            } catch (error) {
                console.error('Error:', error);
                removeTypingIndicator();

                // Fallback error message
                const fallbackData = {
                    disease: 'Unable to Analyze',
                    risk: 'Unknown',
                    advice: ['Please try again or consult a doctor directly.'],
                    alert: 'We encountered an error processing your request. Please try again.'
                };
                addBotMessage(fallbackData);
            }

            isWaiting = false;
        }

        // =========================================
        // Escape HTML
        // =========================================
        function escapeHtml(text) {
            if (!text) return '';
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // =========================================
        // Focus input on load
        // =========================================
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('message').focus();
        });
    </script>

</body>
</html>
@endsection