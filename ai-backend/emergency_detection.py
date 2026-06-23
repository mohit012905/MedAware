# List of emergency symptoms
EMERGENCY_SYMPTOMS = [
    "chest pain",
    "shortness of breath",
    "difficulty breathing",
    "unconscious",
    "heavy bleeding",
    "seizure",
    "stroke",
    "heart attack"
]

def detect_emergency(user_message, symptoms):

    message = user_message.lower()

    detected = []

    # Check emergency phrases in full message
    for item in EMERGENCY_SYMPTOMS:
        if item in message:
            detected.append(item)

    # Check extracted symptoms
    for symptom in symptoms:
        if symptom in EMERGENCY_SYMPTOMS and symptom not in detected:
            detected.append(symptom)

    if detected:
        return {
            "emergency": True,
            "detected": detected,
            "message": "⚠ Emergency detected. Please visit the nearest hospital immediately or call emergency services (108)."
        }

    return {
        "emergency": False,
        "detected": [],
        "message": "No emergency symptoms detected."
    }