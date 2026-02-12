<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Public Voting App | Confirm Delete</title>
  <style>
    .card { border: 1px solid #ddd; padding: 12px; margin: 12px 0; }
    .meta { color: #555; font-size: 0.9rem; }
    .success { font-weight: bold; }
    .error { font-weight: bold; }
    .warning { font-weight: bold; }
  </style>
</head>
<body>
<h1>Confirm Delete</h1>

<p>
  <a href="?page=proposals">Back to proposals</a>
  | <a href="?page=home">Home</a>
</p>

<?php if (!empty($error)): ?>
  <p class="error">❌ <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php else: ?>
  <div class="card">
    <h2><?= htmlspecialchars($proposal['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h2>
    <p><?= nl2br(htmlspecialchars($proposal['description'] ?? '', ENT_QUOTES, 'UTF-8')) ?></p>

    <?php if (!empty($proposal['created_at'])): ?>
      <p class="meta">Submitted: <?= htmlspecialchars($proposal['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <p class="warning">⚠️ Are you sure you want to permanently delete this proposal? This cannot be undone.</p>

    <form method="POST" action="?page=proposals-destroy">
      <input type="hidden" name="id" value="<?= (int)($proposal['id'] ?? 0) ?>">
      <button type="submit">Yes — delete this proposal</button>
      <a href="?page=proposal&id=<?= (int)($proposal['id'] ?? 0) ?>">Cancel</a>
    </form>
  </div>
<?php endif; ?>

</body>
</html>
