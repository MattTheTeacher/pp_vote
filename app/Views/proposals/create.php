<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Public Voting App | Submit Proposal</title>
  <style>
    .error { color: #b00020; font-size: 0.95rem; }
    label { font-weight: 600; }
    input, textarea { width: 100%; max-width: 720px; padding: 8px; }
    .box { max-width: 760px; }
  </style>
</head>
<body>
  <div class="box">
    <h1>Submit a Proposal</h1>

    <p><a href="?page=proposals">← Back to Proposals</a></p>

    <form method="POST" action="?page=proposals-store" onsubmit="return validateProposalForm();">
      <div>
        <label for="title">Title</label><br />
        <input type="text" id="title" name="title" placeholder="e.g. Extend library opening hours" required />
        <div id="titleError" class="error"></div>
      </div>

      <br />

      <div>
        <label for="description">Description</label><br />
        <textarea id="description" name="description" rows="6" placeholder="Explain the proposal clearly..." required></textarea>
        <div id="descriptionError" class="error"></div>
      </div>

      <br />

      <button type="submit">Submit Proposal</button>
    </form>
  </div>

  <script src="/pp_vote/public/assets/js/validate.js"></script>
</body>
</html>
