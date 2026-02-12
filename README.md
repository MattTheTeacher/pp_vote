# pp_vote – Lesson 10 Code Pack (TRUE MVC)
**Lesson focus:** DELETE flow (Confirm page → POST destroy → Model DELETE → PRG redirect)

This pack is designed to be a **drop-in XAMPP project folder** for the teaching series.
It includes **everything required up to Lesson 9**, so students can continue seamlessly.

---

## What’s included (Lessons 7–10)
### ✅ Lesson 7 – READ (By ID)
- Proposal detail page (`?page=proposal&id=...`)

### ✅ Lesson 8 – CREATE
- POST form submission with validation + PRG redirect

### ✅ Lesson 9 – UPDATE
- Edit form prefill + POST update with validation + PRG redirect

### ✅ Lesson 10 – DELETE
- Confirmation page (GET)
- Destroy action (POST)
- Proposal model delete() method
- PRG redirect back to list with `deleted=1` message

---

## Requirements
- XAMPP (Apache + MySQL running)
- PHP 8+ recommended (works on 7.4+ in most cases)
- Database: `pp_vote`
- Table: `proposals`

---

## Quick install (IMPORTANT – avoids “old file ghosts”)
1. Delete any existing folder: `C:\xampp\htdocs\pp_vote`
2. Extract this zip into: `C:\xampp\htdocs\pp_vote`
3. Start **Apache** and **MySQL** in XAMPP
4. Run the SQL script:
   - Open phpMyAdmin → SQL → paste from `DATABASE_SETUP.sql` → Run
5. Open in browser:
   - `http://localhost/pp_vote/public/?page=home`

---

## Database setup
Use the included SQL file:
- `DATABASE_SETUP.sql` (creates DB + table, and optional seed row)

---

## Routes (query-string router)
| Purpose | URL |
|---|---|
| Home | `?page=home` |
| About | `?page=about` |
| Proposals list (READ all) | `?page=proposals` |
| Proposal detail (READ one) | `?page=proposal&id=1` |
| Create form | `?page=proposals-create` |
| Create submit (POST) | `?page=proposals-store` |
| Edit form | `?page=proposals-edit&id=1` |
| Update submit (POST) | `?page=proposals-update` |

---

## Validation rules (FormHelper) – **same as Lesson 8**
- **title:** min 5, max 100
- **description:** min 20, max 500

Notes:
- HTML attributes (`required`, `maxlength`) provide basic browser checks
- **Server-side validation is the real rule** (never trust the client)

---

## Lesson 9 testing checklist (must pass)
1. Go to `?page=proposals`
2. Click **Edit** on a proposal → form **pre-filled**
3. Delete title/description and submit → **errors displayed**, no update
4. Submit valid changes → redirect to detail page with `updated=1`
5. Success message shows: “✅ Proposal updated successfully.”
6. Refresh the detail page → update does not re-run (PRG)
7. Check phpMyAdmin → row updated

---

## Common troubleshooting
### “No proposals found”
- Insert a row using phpMyAdmin or run the optional seed in `DATABASE_SETUP.sql`

### “SQLSTATE[HY000] Access denied”
- XAMPP default user is usually `root` with blank password
- Update credentials in `app/Core/Database.php` if yours differ

### Page shows only “Home” or blank content
- You’re probably running the wrong entry file.
- Use: `http://localhost/pp_vote/public/?page=home`

---

## Folder structure (MVC)
```
pp_vote/
  public/
    index.php              # Router entry point
  app/
    Controllers/
      ProposalController.php
    Models/
      Proposal.php
    Core/
      Database.php
      FormHelper.php
    Views/
      home.php
      about.php
      proposals/
        index.php
        show.php
        create.php
        edit.php
  DATABASE_SETUP.sql
```

---

## What changes in the next lesson (preview)
Lesson 10 typically introduces **DELETE** (confirm screen + POST delete + PRG back to list).

---

## Database note
This project expects the timestamp column to be named **`created_at`** in the `proposals` table (to match the teaching sequence in earlier lessons).
