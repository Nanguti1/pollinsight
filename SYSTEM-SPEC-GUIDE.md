# AGENTS.md

## 🧠 Project Overview

This is a Laravel + Inertia (React) application that serves as a centralized platform for tracking political aspirants and public opinion across Kenya’s 47 counties through structured polls and analytics.

The system includes:
- Geographic hierarchy (County → Constituency → Ward)
- Political aspirants management
- Poll creation and voting system
- Results aggregation and rankings
- Public-facing modern UI with animations

---

## ⚙️ Tech Stack Rules

### Backend
- Laravel (latest stable)
- MySQL database
- Eloquent ORM
- Service layer architecture (MANDATORY)

### Frontend
- Inertia.js (React)
- Tailwind CSS (styling only)
- Framer Motion (ONLY animation library allowed)
- No 3D libraries (NO Three.js)

### Optional Lightweight Libraries
- FingerprintJS (for voting integrity)
- Recharts (for charts only)
- Lucide React (icons)

---

## 🧱 Architecture Rules (STRICT)

### Controllers
- MUST be thin
- No business logic inside controllers
- Only call service classes

### Services (MANDATORY)
All business logic must be placed in services:

- PollService
- VoteService
- RankingService
- AspirantService

---

### Models
- Must define proper relationships
- No query logic inside controllers

---

### Database Rules
- Always enforce integrity using DB constraints (NOT only code)
- Use indexes where appropriate
- Use UNIQUE constraints for voting integrity

---

## 🗳️ Voting Integrity System (CRITICAL)

The system MUST prevent duplicate voting per poll using layered protection:

### Required Mechanisms:

1. Fingerprint (PRIMARY)
   - Generated using FingerprintJS on frontend
   - Sent with every vote request

2. IP Address logging (SECONDARY)

3. Laravel Rate Limiting (MANDATORY)
   - throttle votes per minute

4. Database constraint (MANDATORY)
   - UNIQUE(poll_id, fingerprint)

---

### Voting Rule:
A user can vote ONLY ONCE per poll based on fingerprint.

If fingerprint exists for poll → reject vote.

---

## 🧑‍💼 Domain Models

### Counties
- id
- name

### Constituencies
- id
- county_id
- name

### Wards
- id
- constituency_id
- name

### Positions
- id
- name
- level (national | county | constituency | ward)

### Aspirants
- id
- name
- photo
- party
- position_id
- county_id (nullable)
- constituency_id (nullable)
- ward_id (nullable)
- bio
- status

### Polls
- id
- title
- position_id
- county_id (nullable)
- constituency_id (nullable)
- ward_id (nullable)
- start_date
- end_date
- is_active

### Poll Options
- id
- poll_id
- aspirant_id

### Votes
- id
- poll_id
- poll_option_id
- fingerprint
- ip_address
- user_agent

---

## 🗳️ Polling System Rules

- Polls must dynamically link aspirants based on:
  - position
  - location filters

- Only active polls can accept votes

- Results must be computed using aggregated vote counts

---

## 📊 Ranking System Rules

- Ranking must be computed via VoteService or RankingService
- Sorting: DESC by total votes
- Must support filtering by:
  - position
  - county
  - constituency

---

## 🎨 Frontend UI Rules

### Design Philosophy
- Modern, fast, minimal, futuristic
- NO heavy animation libraries except Framer Motion

### Required UI Behaviors

#### Page Transitions
- Smooth transitions using Framer Motion

#### Voting Interaction
- Animated button feedback
- Success confirmation animation

#### Results
- Live updating (poll every 5 seconds, NOT websockets)

#### Styling
- Tailwind CSS only
- Glassmorphism allowed:
  - backdrop-blur
  - semi-transparent cards
  - soft borders

#### Micro-interactions
- hover scale effects
- click feedback
- smooth transitions (max 300ms)

---

## 🚫 Forbidden Practices

- No business logic in controllers
- No reliance on IP-only voting protection
- No Three.js or heavy 3D libraries
- No websockets (use polling instead for MVP)
- No storing sensitive personal data (ID numbers, etc.)

---

## 🚀 Build Order (MANDATORY SEQUENCE)

Agents must implement in this order:

1. Geographic structure (counties, constituencies, wards)
2. Positions system
3. Aspirants CRUD
4. Poll creation system
5. Voting system (with integrity rules)
6. Results aggregation
7. Rankings system
8. Frontend UI polish (Framer Motion + Tailwind)

---

## 🧠 Code Quality Rules

- Prefer service classes over fat controllers
- Always validate input using Form Requests
- Keep frontend components reusable
- Ensure consistent naming conventions
- Optimize queries (avoid N+1 problems)

---

## 📡 Future Extensibility (DO NOT IMPLEMENT YET)

System must be designed to later support:
- CSV import of aspirants
- External API ingestion (IEBC-like feeds)
- User authentication system
- Phone OTP verification voting system

---

## 🧾 Goal Summary

Build a scalable political polling and analytics platform that is:
- Fast
- Secure against duplicate voting
- Visually modern
- Easy to extend
- Data-accurate and structured