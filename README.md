# 🎫 FareForward

> **Don't let your ticket go to waste.**

FareForward is a peer-to-peer ticket resale platform that helps people recover the cost of missed or unused tickets — whether it's a train, flight, bus, movie, concert, cricket match, or any live event. Buyers get last-minute tickets at fair prices, sellers recover their money instantly via UPI.

---

## 🚀 Features

- 🔍 Browse travel & entertainment tickets in one place
- 🎬 Support for 8+ ticket types (Train, Flight, Bus, Ferry, Movie, Concert, Cricket, Theatre)
- 📋 List your missed ticket in minutes with image upload
- 💸 Instant UPI payment — no middleman, no commission
- 🔐 Secure user login and registration
- 📊 Personal dashboard to manage your listings
- ⭐ Reviews and ratings for sellers
- 📞 Contact seller directly from ticket detail page
- 📅 Date validation — no past dates allowed
- 📱 Fully responsive — works on mobile, tablet & desktop

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Frontend | HTML, CSS, JavaScript |
| Backend | PHP |
| Database | MySQL |
| Server | XAMPP (Apache) |
| UI Style | Glass Morphism, Gradient, Responsive Grid |
| Fonts | Inter + Poppins (Google Fonts) |
| Icons | Font Awesome 6 |

---

## 🎟️ Supported Ticket Types

### ✈️ Travel
- 🚆 Train
- ✈️ Flight
- 🚌 Bus
- ⛴️ Ferry

### 🎭 Entertainment
- 🎬 Movie
- 🎵 Concert / Live Music
- 🏏 Cricket Match
- 🎭 Theatre / Play

---

## 🗄️ Database

**Database name:** `ticket_resale`

**Tables:**
- `users` — stores registered user info (name, email, phone, password)
- `tickets` — stores listed ticket details (type, route, date, price, UPI ID, status)

---

## ⚙️ Setup Instructions

1. Install [XAMPP](https://www.apachefriends.org/)
2. Clone this repo into `C:/xampp/htdocs/`:
```bash
   git clone https://github.com/sachin1437/fareforward.git
```
3. Start **Apache** and **MySQL** in XAMPP Control Panel
4. Open `http://localhost/phpmyadmin`
5. Create database named `ticket_resale`
6. Run the SQL queries to create `users` and `tickets` tables
7. Open `http://localhost/fareforward/index.php`

---

## 📌 Project Status

- [x] Part 1 — Frontend (PHP structure + HTML + CSS + JS)
  - [x] Homepage with ticket listings & filters
  - [x] Register & Login pages
  - [x] Dashboard with stats
  - [x] Multi-step List Ticket form
  - [x] Ticket Detail with UPI payment UI
  - [x] About & Contact pages
  - [x] Fully responsive design
- [ ] Part 2 — Backend (PHP logic + MySQL integration)
  - [ ] User authentication (register/login/logout)
  - [ ] Ticket CRUD operations
  - [ ] Session management
  - [ ] Database connectivity

---

## 👨‍💻 Developers

**Sachin Gupta** — [@sachin1437](https://github.com/sachin1437)
🧙 Full Stack Sorcerer & Chief Ticket Whisperer

**Aditya Kumar**
⚔️ Bug Slayer General & CSS Destroyer

---

*Made with ❤️ in India — No seat goes to waste!* 🇮🇳