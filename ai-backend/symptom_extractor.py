import spacy

nlp = spacy.load("en_core_web_sm")

# Initial symptom list
SYMPTOMS = [
    "fever",
    "cough",
    "cold",
    "headache",
    "vomiting",
    "nausea",
    "diarrhea",
    "fatigue",
    "dizziness",
    "chest pain",
    "shortness of breath",
    "sore throat",
    "body pain",
    "runny nose",
    "loss of smell",
    "loss of taste"
]

def extract_symptoms(text):
    doc = nlp(text)

    text = text.lower()

    detected = []

    for symptom in SYMPTOMS:
        if symptom in text:
            detected.append(symptom)

    return detected