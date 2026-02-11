function validateProposalForm() {
  const titleEl = document.getElementById("title");
  const descEl  = document.getElementById("description");

  const title = titleEl.value.trim();
  const desc  = descEl.value.trim();

  const titleErr = document.getElementById("titleError");
  const descErr  = document.getElementById("descriptionError");
  if (titleErr) titleErr.textContent = "";
  if (descErr) descErr.textContent = "";

  let ok = true;

  if (title.length < 5 || title.length > 60) {
    if (titleErr) titleErr.textContent = "Title must be 5–60 characters.";
    ok = false;
  }

  if (desc.length < 20 || desc.length > 500) {
    if (descErr) descErr.textContent = "Description must be 20–500 characters.";
    ok = false;
  }

  return ok;
}
