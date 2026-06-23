# Health recommendations

ADVICE = {

    "Common Cold": [
        "Drink warm fluids.",
        "Get enough rest.",
        "Take vitamin C rich foods."
    ],

    "Viral Fever": [
        "Drink plenty of water.",
        "Take adequate rest.",
        "Monitor your temperature."
    ],

    "Influenza": [
        "Drink more fluids.",
        "Take enough rest.",
        "Consult a doctor if symptoms persist."
    ],

    "COVID-19": [
        "Isolate yourself.",
        "Wear a face mask.",
        "Seek medical advice immediately."
    ],

    "Food Poisoning": [
        "Drink ORS solution.",
        "Avoid oily foods.",
        "Stay hydrated."
    ],

    "Migraine": [
        "Rest in a quiet room.",
        "Avoid bright lights.",
        "Drink sufficient water."
    ]
}


def generate_response(disease, risk, emergency):

    response = {}

    response["disease"] = disease
    response["risk"] = risk

    if disease in ADVICE:
        response["advice"] = ADVICE[disease]
    else:
        response["advice"] = [
            "Consult a healthcare professional."
        ]

    if emergency:
        response["alert"] = (
            "⚠ Emergency detected! Please go to the nearest hospital or call 108 immediately."
        )
    else:
        response["alert"] = (
            "No emergency symptoms detected."
        )

    return response