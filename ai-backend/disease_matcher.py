# Disease database

DISEASES = {
    "Common Cold": [
        "cough",
        "runny nose",
        "sore throat"
    ],

    "Viral Fever": [
        "fever",
        "headache",
        "body pain",
        "fatigue"
    ],

    "Influenza": [
        "fever",
        "cough",
        "headache",
        "fatigue"
    ],

    "COVID-19": [
        "fever",
        "cough",
        "loss of smell",
        "loss of taste",
        "shortness of breath"
    ],

    "Food Poisoning": [
        "vomiting",
        "diarrhea",
        "nausea"
    ],

    "Migraine": [
        "headache",
        "dizziness"
    ]
}


def match_disease(symptoms):

    best_disease = "Unknown"
    best_score = 0

    for disease, disease_symptoms in DISEASES.items():

        score = len(set(symptoms) & set(disease_symptoms))

        if score > best_score:
            best_score = score
            best_disease = disease

    confidence = 0

    if best_score > 0:
        confidence = round((best_score / len(DISEASES[best_disease])) * 100)

    return {
        "disease": best_disease,
        "confidence": confidence
    }