Lesson 1 Code Pack – PHP, XAMPP & MVC (Public Voting App)

WHAT THIS IS
- A tiny starter project you can copy into XAMPP's htdocs folder.
- Includes:
  1) hello.php (first PHP file)
  2) A mini MVC-style structure with a Front Controller:
     pp_vote/public/index.php
     pp_vote/app/Views/home.php
     pp_vote/app/Views/about.php

WHERE TO PUT IT
1) Locate your XAMPP htdocs folder (commonly one of these):
   - C:\xampp\htdocs\
   - /Applications/XAMPP/htdocs/   (macOS)
   - /opt/lampp/htdocs/            (Linux)

2) Copy the 'pp_vote' folder into htdocs so the final path becomes:
   .../htdocs/pp_vote/

HOW TO RUN IT (in a browser)
A) First PHP page:
   http://localhost/pp_vote/hello.php

B) MVC Front Controller pages:
   http://localhost/pp_vote/public/
   http://localhost/pp_vote/public/?page=about

TROUBLESHOOTING
- If it says 'Not Found' (404): check the folder is really inside htdocs and the URL matches.
- If it shows PHP code instead of output: Apache/PHP not running OR wrong extension (must be .php).
- If nothing loads: start Apache in XAMPP Control Panel.
