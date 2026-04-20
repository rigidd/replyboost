# SPEC — ReplyBoost (MVP)

## 🎯 Product Objective

Build a Laravel MVP that allows users to generate AI-powered responses to Google reviews for their businesses, in order to improve local reputation and save time.

The product must be simple, fast, and fully functional within 48 hours of development.

---

## 👤 Target Users

- Local businesses (restaurants, salons, garages, shops)
- Freelancers / independents with a Google Business Profile

---

## 🔁 User Flow

1. User pastes a Google Business URL
2. System retrieves associated reviews
3. Reviews are displayed in a simple interface
4. User clicks “Generate response”
5. AI generates a reply for the review
6. User can copy the response

---

## 🚫 Out of Scope (IMPORTANT)

Do NOT implement:
- Automatic posting to Google
- Advanced multi-tenant system
- Complex analytics dashboard
- Advanced or robust scraping system
- CRM features or invoicing
- Marketing automation campaigns

---

## 🧱 Tech Stack (Mandatory)

### Backend
- Laravel 11

### Frontend
- Blade
- TailwindCSS

### Internal Services
- ScraperService (fetch reviews)
- AIService (generate responses)

---

## 🧩 Data Model

### Place
- id
- name
- google_url

### Review
- id
- place_id
- author_name
- rating
- content
- review_date
- response (nullable)

---

## ⚙️ Features

### 1. Landing Page
- Input field for Google Business URL
- Single CTA: “Analyze”

### 2. Review Extraction
- Fetch reviews from provided URL
- Store them in database

### 3. Reviews Display
- List of reviews
- Show author, rating, content

### 4. AI Response Generation
- Generate a professional response for each review
- Tone:
  - polite
  - professional
  - concise (2–3 sentences)

### 5. Copy to Clipboard
- Button to copy generated response

---

## 🤖 AI Service Rules

- Never generate overly long responses
- Always personalize response using review content
- Never be aggressive, even for negative reviews
- Always produce a usable response ready to send

---

## 🧠 Scraping Rules

- Simple and fragile implementation is acceptable (MVP)
- If scraping fails → return a simple error message
- Do not over-engineer or optimize scraping

---

## 🎨 UI Rules

- Simple SaaS-style interface
- No complex navigation
- One primary action per screen
- Focus on readability and clarity

---

## 📊 Definition of Done

The MVP is complete when:

- A Google Business URL can be submitted
- Reviews are displayed
- AI response can be generated
- Response can be copied

---

## ⚠️ Principles

- Simplicity > architecture
- Functionality > perfection
- No over-engineering
- Always choose the simplest possible solution

---

## 🧠 Agent Execution Rule (CRITICAL)

The agent MUST NOT execute any system commands, terminal commands, or destructive operations automatically.

Instead:

- The agent must **always output proposed commands clearly**
- The agent must then **wait for explicit user confirmation**
- Only after confirmation that the user has executed the command, the agent may continue to the next step

### Execution Flow Rule:
1. Agent proposes command(s)
2. Agent waits for user confirmation
3. User confirms execution manually
4. Agent continues based on confirmed state

### Strict Constraint:
- Never assume a command has been executed
- Never auto-run or simulate execution results
- Always rely on user confirmation before proceeding