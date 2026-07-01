def assess_risk(symptoms, disease, user_message):

    symptom_count = len(symptoms)

    high_risk_diseases = [
        "COVID-19"
    ]

    medium_risk_diseases = [
        "Influenza",
        "Viral Fever"
    ]

    if disease in high_risk_diseases:
        return {
            "risk": "High",
            "risk_score": 90
        }

    if disease in medium_risk_diseases:
        return {
            "risk": "Medium",
            "risk_score": 60
        }

    if symptom_count >= 4:
        return {
            "risk": "High",
            "risk_score": 85
        }

    if symptom_count >= 2:
        return {
            "risk": "Medium",
            "risk_score": 50
        }

    return {
        "risk": "Low",
        "risk_score": 20
    }