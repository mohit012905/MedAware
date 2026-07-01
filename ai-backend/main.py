from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel

from disease_matcher import match_disease
from risk_assessment import assess_risk
from symptom_extractor import extract_symptoms
from emergency_detection import detect_emergency
from response_generator import generate_response
from general_chat import general_chat

app = FastAPI()

# ===============================
# CORS Configuration - FIX 405 ERROR
# ===============================
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # In production, replace with your frontend URL
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


class ChatRequest(BaseModel):
    message: str


@app.get("/")
def home():
    return {
        "message": "✅ MedAware AI Backend Running Successfully"
    }


@app.post("/analyze")
def analyze(request: ChatRequest):

    user_message = request.message.strip()

    # ---------------------------------
    # STEP 1 : Handle General Chat
    # ---------------------------------

    general = general_chat(user_message)

    if general["general"]:
        return {
            "status": "success",
            "type": "general",
            "user_input": user_message,
            "reply": general["response"],
            "disease": None,
            "risk": None,
            "confidence": None,
            "recommendations": [],
            "alert": None,
            "emergency": False,
            "matched_symptoms": []
        }

    # ---------------------------------
    # STEP 2 : Extract Symptoms
    # ---------------------------------

    symptoms = extract_symptoms(user_message)

    # No symptoms detected
    if len(symptoms) == 0:
        return {
            "status": "success",
            "type": "general",
            "user_input": user_message,
            "reply": "🤔 I couldn't identify any medical symptoms.\n\nPlease describe your symptoms clearly.\n\nExample:\n• I have fever and cough\n• My ear hurts\n• I have chest pain\n• I feel dizzy and vomiting",
            "disease": None,
            "risk": None,
            "confidence": None,
            "recommendations": [],
            "alert": None,
            "emergency": False,
            "matched_symptoms": []
        }

    # ---------------------------------
    # STEP 3 : Disease Prediction
    # ---------------------------------

    prediction = match_disease(symptoms)

    # ---------------------------------
    # STEP 4 : Risk Assessment
    # ---------------------------------

    risk = assess_risk(
        symptoms,
        prediction["disease"],
        user_message
    )

    # ---------------------------------
    # STEP 5 : Emergency Detection
    # ---------------------------------

    emergency = detect_emergency(
        user_message,
        symptoms
    )

    # ---------------------------------
    # STEP 6 : Generate Response
    # ---------------------------------

    chatbot = generate_response(
        prediction["disease"],
        risk["risk"],
        emergency["emergency"]
    )

    # Build the response
    response = {
        "status": "success",
        "type": "medical",
        "user_input": user_message,
        "reply": chatbot.get("message", "I've analyzed your symptoms."),
        "disease": prediction["disease"],
        "risk": risk["risk"],
        "confidence": prediction["confidence"],
        "recommendations": chatbot.get("advice", []),
        "alert": chatbot.get("alert", "No emergency symptoms detected."),
        "emergency": emergency["emergency"],
        "matched_symptoms": prediction["matches"],
        "risk_score": risk.get("risk_score", 0)
    }

    return response