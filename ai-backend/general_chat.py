def general_chat(message):

    message = message.lower().strip()

    greetings = [
        "hi", "hello", "hey", "hii", "hiii",
        "good morning", "good afternoon", "good evening",
        "good night", "yo", "hola", "namaste"
    ]

    thanks = [
        "thanks", "thank you", "thankyou",
        "thx", "thanks a lot", "appreciate"
    ]

    help_words = [
        "help",
        "who are you",
        "what can you do",
        "how can you help",
        "about you",
        "about medaware"
    ]

    health_tips = [
        "health tips",
        "tips",
        "healthy",
        "stay healthy",
        "health advice",
        "suggestion",
        "recommendation"
    ]

    water = [
        "water",
        "how much water",
        "drink water",
        "hydration"
    ]

    diet = [
        "diet",
        "healthy food",
        "nutrition",
        "food",
        "what should i eat"
    ]

    exercise = [
        "exercise",
        "workout",
        "fitness",
        "gym",
        "physical activity"
    ]

    sleep = [
        "sleep",
        "insomnia",
        "sleep tips"
    ]

    emergency = [
        "emergency",
        "ambulance",
        "108",
        "critical"
    ]

    hospital = [
        "hospital",
        "doctor",
        "appointment",
        "nearby hospital"
    ]

    goodbye = [
        "bye",
        "goodbye",
        "see you",
        "take care"
    ]

    # ---------------- Greeting ----------------

    if any(word == message for word in greetings):
        return {
            "general": True,
            "response":
            "👋 Hello! Welcome to MedAware AI.\n\n"
            "I'm your AI-powered healthcare assistant.\n\n"
            "I can help you with:\n"
            "✅ Disease prediction\n"
            "✅ Symptom analysis\n"
            "✅ Risk assessment\n"
            "✅ Emergency detection\n"
            "✅ Health tips\n"
            "✅ Hospital & doctor guidance\n\n"
            "How can I assist you today?"
        }

    # ---------------- Thanks ----------------

    if any(word in message for word in thanks):
        return {
            "general": True,
            "response":
            "😊 You're welcome! Stay healthy and take care. If you have any health concerns, I'm always here to help."
        }

    # ---------------- About ----------------

    if any(word in message for word in help_words):
        return {
            "general": True,
            "response":
            "🤖 I am MedAware AI.\n\n"
            "I analyze symptoms using AI and NLP to:\n"
            "• Predict possible diseases\n"
            "• Assess health risk\n"
            "• Detect emergencies\n"
            "• Suggest basic health advice\n"
            "• Recommend medical consultation when necessary."
        }

    # ---------------- Health Tips ----------------

    if any(word in message for word in health_tips):
        return {
            "general": True,
            "response":
            "💚 Healthy Lifestyle Tips:\n\n"
            "🥗 Eat a balanced diet.\n"
            "💧 Drink 2–3 litres of water daily.\n"
            "🏃 Exercise at least 30 minutes.\n"
            "😴 Sleep 7–8 hours.\n"
            "🚭 Avoid smoking.\n"
            "🍺 Limit alcohol.\n"
            "🩺 Get regular health check-ups."
        }

    # ---------------- Water ----------------

    if any(word in message for word in water):
        return {
            "general": True,
            "response":
            "💧 Most adults should drink around 2–3 litres of water daily. Increase your intake during hot weather or after exercise."
        }

    # ---------------- Diet ----------------

    if any(word in message for word in diet):
        return {
            "general": True,
            "response":
            "🥗 A healthy diet includes:\n\n"
            "• Fruits and vegetables\n"
            "• Whole grains\n"
            "• Lean protein\n"
            "• Low-fat dairy\n"
            "• Nuts and seeds\n\n"
            "Avoid excessive sugar, salt, and processed foods."
        }

    # ---------------- Exercise ----------------

    if any(word in message for word in exercise):
        return {
            "general": True,
            "response":
            "🏃 Adults should perform at least 150 minutes of moderate exercise every week along with muscle-strengthening activities."
        }

    # ---------------- Sleep ----------------

    if any(word in message for word in sleep):
        return {
            "general": True,
            "response":
            "😴 Adults should sleep 7–9 hours every night. Maintain a consistent sleep schedule and avoid screens before bedtime."
        }

    # ---------------- Emergency ----------------

    if any(word in message for word in emergency):
        return {
            "general": True,
            "response":
            "🚨 If you have severe chest pain, difficulty breathing, heavy bleeding, seizures, or loss of consciousness, call 108 immediately or visit the nearest emergency hospital."
        }

    # ---------------- Hospital ----------------

    if any(word in message for word in hospital):
        return {
            "general": True,
            "response":
            "🏥 MedAware can help you locate nearby hospitals and book appointments with available doctors."
        }

    # ---------------- Goodbye ----------------

    if any(word == message for word in goodbye):
        return {
            "general": True,
            "response":
            "👋 Thank you for using MedAware AI. Stay healthy and have a wonderful day!"
        }

    # ---------------- Unknown ----------------

    return {
        "general": False
    }