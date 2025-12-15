# ⚽ Football Agent System – User Management

## 📌 Project Overview
The Football Agent System is a PHP & MySQL–based web application designed to manage users in a football agency environment.  
It supports **role-based authentication** and provides different access levels for system users.

---

## 🗄️ Database Design

- Two main tables:
  - `roles`
  - `users`
- The `users` table references `roles` using `role_id`
- One-to-many relationship (one role → many users)

---

## 👥 User Roles

- Admin  
- Agent  
- Player  
- Club Manager  

---

## 🔐 Sample Login Credentials

| Role          | Email                   | Password |
|---------------|-------------------------|----------|
| Admin         | admin@football.com      | 123456   |
| Agent         | agent@football.com      | 123456   |
| Player        | player@football.com     | 123456   |
| Club Manager  | manager@football.com   | 123456   |

---

## 🚀 System Features

- Secure login with role-based dashboard
- Admin can add new users
- Users can edit their profile
- Logout functionality
- Fully styled using `style.css`
- Robust POST method validation for all forms

---

## 📸 Screenshots

### Database Structure
![Database Structure](screens/datastructure.png)

### Sample Users
![Sample Users](screens/dashboard.png)

### Dashboard Page
![Dashboard](screens/login.png)

---

## ⚙️ Installation & Setup

### 1️⃣ Import the Database
- Open **phpMyAdmin** or **MySQL Workbench**
- Create a database named:


- Import the `init.sql` file to create tables and sample users

---

### 2️⃣ Configure Database Connection
Open `db.php` and update if necessary:

```php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "football_agent_system";

Place Project Files

C:/xampp/htdocs/football_agent_system

Notes

Passwords are stored using MD5 hashing

Default password for all sample users is 123456

Only Admin users can add new users

All pages use a consistent professional design via style.css

✅ Technologies Used

PHP

MySQL

HTML5

CSS3

XAMPP (Apache & MySQL)

📄 License

This project is developed for academic purposes.


---

### ✅ Final checklist for you
- Folder name: `screenshots`
- File names:
  - `db_structure.png`
  - `sample_users.png`
  - `dashboard.png`
- Use **Ctrl + Shift + V** in VS Code to preview

If you want, I can:
✔️ Verify your folder structure  
✔️ Check screenshot naming  
✔️ Do a final lecturer-ready review  

Just say **“check everything”** 💪
