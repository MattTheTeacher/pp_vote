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
    .wrap { max-width: 820px; }
  </style>
</head>
<body>
  <div class="wrap">
    <h1>Submit a Proposal</h1>
    <p><a href="?page=proposals">← Back to Proposals</a> | <a href="?page=home">Home</a></p>

    <form action="?page=proposals-store" method="POST" novalidate>
      <div>
        <label for="title">Title</label><br />
        <input
          type="text"
          id="title"
          name="title"
          value="<?= htmlspecialchars($old['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
          maxlength="100"
          required
        />
        <?php if (!empty($errors['title'])): ?>
          <div class="error"><?= htmlspecialchars($errors['title'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
      </div>

      <br />

      <div>
        <label for="description">Description</label><br />
        <textarea
          id="description"
          name="description"
          rows="6"
          maxlength="500"
          required
        ><?= htmlspecialchars($old['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        <?php if (!empty($errors['description'])): ?>
          <div class="error"><?= htmlspecialchars($errors['description'], ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>
      </div>

      <br />

      <button type="submit">Submit Proposal</button>
    </form>
  </div>
</body>
</html>
