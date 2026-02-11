Lesson 5 Code Pack – Public Voting App (pp_vote)

Includes Lesson 1–4 functionality plus:
- Lesson 5: Database integration using PDO (store proposals in MySQL)

PREREQUISITES
- XAMPP installed
- Apache AND MySQL started in XAMPP Control Panel
- phpMyAdmin available (usually: http://localhost/phpmyadmin/)

DATABASE SETUP (phpMyAdmin)
1) Create a new database called:
   pp_vote

2) Create a table called:
   proposals

3) Use these columns:
   id INT PRIMARY KEY AUTO_INCREMENT
   title VARCHAR(100) NOT NULL
   description TEXT NOT NULL
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

RUN THE APP
1) Copy the 'pp_vote' folder into XAMPP htdocs, e.g.
   C:\xampp\htdocs\pp_vote\
2) Start Apache + MySQL in XAMPP
3) Open:
   http://localhost/pp_vote/public/

LESSON 5 TESTS
- Submit a valid proposal: confirmation page appears
- In phpMyAdmin, check proposals table: new row exists
- Try invalid input: server-side errors show and nothing is inserted

NOTES
- Database credentials are set in app/Core/Database.php for local XAMPP defaults (root / blank password).
- Lesson 6 will retrieve and display proposals using SELECT queries.
