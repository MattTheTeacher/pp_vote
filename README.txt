Lesson 6 Code Pack – Public Voting App (pp_vote)

Includes Lessons 1–6 functionality:
- Lesson 4: Server-side validation (FormHelper)
- Lesson 5: Store proposals in MySQL using PDO INSERT
- Lesson 6: Retrieve and display proposals using PDO SELECT (fetchAll)

REPOSITORY (reference)
https://github.com/MattTheTeacher/pp_vote

PREREQUISITES
- XAMPP installed
- Apache AND MySQL started in XAMPP Control Panel
- phpMyAdmin available (usually: http://localhost/phpmyadmin/)

DATABASE SETUP (phpMyAdmin) – REQUIRED
1) Create database:
   pp_vote

2) Create table:
   proposals

3) Columns:
   id INT PRIMARY KEY AUTO_INCREMENT
   title VARCHAR(100) NOT NULL
   description TEXT NOT NULL
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

(Optional) SQL you can paste into phpMyAdmin → SQL tab:

CREATE DATABASE IF NOT EXISTS pp_vote
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE pp_vote;

CREATE TABLE IF NOT EXISTS proposals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

HOW TO RUN
1) Copy the 'pp_vote' folder into XAMPP htdocs, e.g.
   C:\xampp\htdocs\pp_vote\
2) Start Apache + MySQL in XAMPP
3) Open:
   http://localhost/pp_vote/public/

LESSON 6 TESTS (must all pass)
1) Submit a valid proposal:
   - Go to Submit a Proposal
   - Submit valid title + description
   - Confirmation page appears

2) Check database:
   - phpMyAdmin → pp_vote → proposals
   - A new row exists

3) View proposals list (Lesson 6):
   - Go to View Proposals
   - Your proposals display in the browser (newest first)

4) Security checks:
   - Invalid input shows server-side errors and does NOT insert
   - Output is escaped using htmlspecialchars (prevents XSS)

NOTES
- Database credentials are in app/Core/Database.php (XAMPP defaults: root / blank password).
- Lesson 7 will introduce viewing individual proposals by ID and cleaner links.
