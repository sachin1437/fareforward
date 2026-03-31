# 🎫 FareForward

> **Don't let your ticket go to waste.**

FareForward is a peer-to-peer travel ticket resale platform that helps travellers recover the cost of missed train, flight, and bus tickets — while giving other passengers a chance to grab last-minute seats at fair prices.

---

## 🚀 Features

- 🔍 Browse available train, flight, and bus tickets
- 📋 List your missed ticket in minutes
- 💸 Pay instantly via UPI
- 🔐 Secure user login and registration
- 📊 Personal dashboard to manage your listings

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Frontend | HTML, CSS, JavaScript |
| Backend | PHP |
| Database | MySQL |
| Server | XAMPP (Apache) |

---

## 📁 Project Structure
```
fareforward/
├── index.php               ← Homepage
├── includes/
│   ├── header.php          ← Shared navbar
│   └── footer.php          ← Shared footer
├── pages/
│   ├── register.php        ← User registration
│   ├── login.php           ← User login
│   ├── dashboard.php       ← User dashboard
│   ├── list-ticket.php     ← List a ticket
│   └── ticket-detail.php  ← Ticket detail & UPI pay
├── css/
│   └── style.css           ← Global styles
└── js/
    └── main.js             ← Frontend scripts
```

---

## 🗄️ Database

**Database name:** `ticket_resale`

**Tables:**
- `users` — stores registered user info
- `tickets` — stores listed ticket details

---

## ⚙️ Setup Instructions

1. Install [XAMPP](https://www.apachefriends.org/)
2. Clone this repo into `C:/xampp/htdocs/`:
```bash
   git clone https://github.com/sachin1437/fareforward.git
```
3. Start **Apache** and **MySQL** in XAMPP
4. Open `http://localhost/phpmyadmin` and create database `ticket_resale`
5. Import the SQL from the `/database/` folder
6. Open `http://localhost/fareforward/index.php`

---

## 📌 Project Status

- [x] Part 1 — Frontend (HTML + CSS + JS + PHP structure)
- [ ] Part 2 — Backend (PHP logic + MySQL integration)

---

## 👨‍💻 Developer

**Sachin Gupta** — [@sachin1437](https://github.com/sachin1437)