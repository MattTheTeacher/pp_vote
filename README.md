# pp_vote — Lesson 7 Full Code Pack

This pack is for **Lesson 7: Full MVC Read Flow (List + Detail Pages)**.

Lesson 6 introduced the **READ list page** (PDO SELECT + display).  
Lesson 7 extends READ by adding a **detail page** that loads a single proposal by ID.

## What Lesson 7 Adds

- A new route: `?page=proposal&id=1`
- A prepared SELECT query with `WHERE id = :id LIMIT 1`
- A detail view page for one proposal
- A “View details” link on the list page

## Files Changed / Added

**Changed**
- `public/index.php` (adds route: `proposal` → `show()`)
- `app/Controllers/ProposalController.php` (adds `show()` method)
- `app/Views/proposals/index.php` (adds “View details” links)

**Added**
- `app/Views/proposals/show.php` (proposal detail view)

## Run in XAMPP

1) Place the folder in:
- `C:\xampp\htdocs\pp_vote`

2) Start **Apache** + **MySQL** in XAMPP.

3) In phpMyAdmin, confirm:
- Database: `pp_vote`
- Table: `proposals`
- Rows exist (create a few proposals if needed)

Open in browser:
- Home: `http://localhost/pp_vote/public/`
- List: `http://localhost/pp_vote/public/?page=proposals`
- Detail example: `http://localhost/pp_vote/public/?page=proposal&id=1`

## Testing Checklist

- [ ] List page loads and shows proposals
- [ ] Each proposal has a “View details” link
- [ ] Detail page loads for valid numeric IDs
- [ ] Invalid/missing IDs show a safe error
- [ ] Output is escaped with `htmlspecialchars()`

## Notes

- Do **not** commit database exports unless your tutor asks.
- Keep commits limited to the lesson files only.
