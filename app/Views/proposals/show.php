<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Public Voting App | Proposal Details</title>
  <style>
    .card { border: 1px solid #ddd; padding: 12px; margin: 12px 0; }
    .meta { color: #555; font-size: 0.9rem; }
    .success { font-weight: bold; }
    .error { font-weight: bold; }
  </style>
</head>
<body>
<h1>Proposal Details</h1>

<p><a href="?page=proposals">Back to Proposals</a> | <a href="?page=home">Home</a></p>

<?php if (!empty($error)): ?>
  <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php else: ?>

  <?php if (!empty($updated)): ?>
    <p class="success">✅ Proposal updated successfully.</p>
  <?php endif; ?>

  <div class="card">
    <h2><?= htmlspecialchars($proposal['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h2>
    <p><?= nl2br(htmlspecialchars($proposal['description'] ?? '', ENT_QUOTES, 'UTF-8')) ?></p>

    <?php if (!empty($proposal['created_at'])): ?>
      <p class="meta">Created: <?= htmlspecialchars($proposal['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
  </div>

  <p><a href="?page=proposals-edit&id=<?= (int)($proposal['id'] ?? 0) ?>">Edit</a></p>

<?php endif; ?>

</body>
</html>
