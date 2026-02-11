# pp_vote – Lesson 8 Full Code Pack (CREATE + PRG)

Lesson 8 improves the CREATE flow so learners can clearly see the change in the app.

## Visible changes in Lesson 8
- After submitting a proposal, the app redirects to:
  `?page=proposals&created=1`
- The proposals list shows:
  ✅ Proposal submitted successfully.
- Refreshing the page does NOT duplicate the insert (PRG best practice).

## True MVC
- Controller: validates input + coordinates flow (no SQL)
- Model: performs INSERT using a prepared statement
- Views: display data only

## Routes
- Create form (GET): `?page=proposals-create`
- Store (POST): `?page=proposals-store`
- List (GET): `?page=proposals`
