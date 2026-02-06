# pp_vote – Lesson 9 Code Pack (READ + CREATE + UPDATE)

This code pack supports **Lesson 9** of the PHP MVC series and demonstrates a **complete UPDATE workflow**:
- Load an **Edit** form pre-filled with existing data (GET)
- Submit updated values using **POST**
- Perform the **UPDATE SQL in the Model** (prepared statement)
- Redirect after POST (PRG) back to the detail page with `updated=1`

It also includes the prior working features:
- **READ**: list all proposals + view a single proposal by ID
- **CREATE**: add a proposal via a POST form

---

## What learners should see (visible outcomes)

✅ From the proposals list you can:
- **View** a proposal (detail page)
- **Edit** a proposal (edit form)

✅ After saving edits:
- The browser redirects to the detail page with `updated=1`
- The page displays **“Updated successfully”** (proof of PRG)

---

## Requirements

- XAMPP (Apache + MySQL running)
- PHP 8+ recommended
- A MySQL database named: `pp_vote`
- A table named: `proposals`

---

## Database setup (phpMyAdmin)

Create database: `pp_vote`

Then run this SQL:

```sql
CREATE TABLE proposals (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  description TEXT NOT NULL
);
```

Add a test record (optional):

```sql
INSERT INTO proposals (title, description)
VALUES ('Test Proposal', 'This is a test proposal description.');
```

---

## Installation (IMPORTANT – avoids “old file ghosts”)

1. Delete any existing folder:
   `C:\xampp\htdocs\pp_vote`

2. Extract this zip into:
   `C:\xampp\htdocs\pp_vote`

3. Start **Apache** and **MySQL** in XAMPP

4. Open in browser:
   `http://localhost/pp_vote/public/index.php?page=proposals`

---

## Routes used in Lesson 9

**List proposals (READ all)**  
- GET: `?page=proposals`

**View proposal detail (READ one)**  
- GET: `?page=proposal&id=1`

**Create proposal form (CREATE)**  
- GET: `?page=proposals-create`

**Create proposal submit (CREATE)**  
- POST: `?page=proposals-store`

**Edit proposal form (UPDATE – Lesson 9)**  
- GET: `?page=proposals-edit&id=1`

**Update proposal submit (UPDATE – Lesson 9)**  
- POST: `?page=proposals-update`

**Redirect after update (PRG)**  
- GET: `?page=proposal&id=1&updated=1`

---

## File map (where to look)

**Router**
- `public/index.php` (switch statement for routes)

**Controller**
- `app/Controllers/ProposalController.php`
  - `index()` – list proposals
  - `show()` – proposal detail
  - `create()` / `store()` – create flow
  - `edit()` / `update()` – **lesson 9 update flow**

**Model**
- `app/Models/Proposal.php`
  - `getAll()` / `getById()`
  - `create()` – INSERT
  - `update()` – UPDATE (**SQL lives here**)

**Views**
- `app/Views/proposals/index.php` – proposals list
- `app/Views/proposals/show.php` – proposal detail (+ updated message)
- `app/Views/proposals/create.php` – create form
- `app/Views/proposals/edit.php` – edit form (**Lesson 9**)  

---

## Testing checklist (what must work)

1. Open proposals list:
   - `?page=proposals` loads without errors
2. View details:
   - click **View** OR go to `?page=proposal&id=1`
3. Edit:
   - click **Edit** OR go to `?page=proposals-edit&id=1`
   - form shows existing title + description
4. Update:
   - change title or description
   - click Save
   - redirect occurs to `?page=proposal&id=1&updated=1`
   - message **Updated successfully** appears
5. Verify in phpMyAdmin:
   - record values changed

---

## Common issues & fixes

**“Undefined array key id”**
- You are missing `id` in the URL or form hidden field.
- Use `?page=proposal&id=1` and ensure edit form includes:
  `<input type="hidden" name="id" value="...">`

**Database connection error**
- Confirm MySQL is running in XAMPP.
- Confirm database name is `pp_vote`.
- If your MySQL user/password differs, update:
  `app/Models/Proposal.php` (PDO constructor).

**Blank page**
- Turn on error reporting in PHP or check Apache error logs.
- Ensure the entry point is:
  `/public/index.php`

---

## Lesson 9 focus (for students)

The key takeaway is **TRUE MVC separation**:
- Controller coordinates the flow and validates input
- Model executes the UPDATE query
- Views display data and forms
- PRG prevents resubmitting POST on refresh
