# pp_vote — Lesson 7 Full Code Pack (TRUE MVC, FIXED)

This pack is **Lesson 7: Full MVC READ Flow (List + Detail Pages)** and is now **TRUE MVC**:

✅ Controllers coordinate only (no SQL).  
✅ Models handle ALL database queries.  
✅ Views display data only.

## What Lesson 7 Adds
- Detail route: `?page=proposal&id=1`
- Detail view: `app/Views/proposals/show.php`
- “View details” link on the proposals list page
- Proposal model: `app/Models/Proposal.php`

## Key Files
- `app/Models/Proposal.php` (getAll, getById, create)
- `app/Controllers/ProposalController.php` (index, show, create, store — no SQL)
- `app/Views/proposals/index.php` (list + detail links)
- `app/Views/proposals/show.php` (detail view)
- `app/Views/proposals/create.php` (form)
- `public/index.php` (routing)

## Run in XAMPP
1) Put folder in: `C:\xampp\htdocs\pp_vote`
2) Start Apache + MySQL
3) Ensure DB: `pp_vote` and table: `proposals` exist

URLs:
- List: `http://localhost/pp_vote/public/?page=proposals`
- Detail: `http://localhost/pp_vote/public/?page=proposal&id=1`
- Create: `http://localhost/pp_vote/public/?page=proposals-create`
