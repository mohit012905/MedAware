from fastapi import FastAPI
from pydantic import BaseModel
from disease_matcher import match_disease
from risk_assessment import assess_risk
from symptom_extractor import extract_symptoms
from emergency_detection import detect_emergency
from response_generator import generate_response

app = FastAPI()

class ChatRequest(BaseModel):
    message: str

@app.get("/")
def home():
    return {"message": "MedAware AI Backend Running"}

@app.post("/analyze")
def analyze(request: ChatRequest):

    symptoms = extract_symptoms(request.message)

    prediction = match_disease(symptoms)

    risk = assess_risk(
        symptoms,
        prediction["disease"]
    )

    emergency = detect_emergency(
        request.message,
        symptoms
    )

    chatbot = generate_response(
        prediction["disease"],
        risk["risk"],
        emergency["emergency"]
    )

    return {
        "user_input": request.message,
        "symptoms": symptoms,
        "chatbot_response": chatbot
    }