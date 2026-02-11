<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Public Voting App | Proposal Details</title>
  <style>
    .card { border: 1px solid #ddd; padding: 12px; margin: 12px 0; max-width: 860px; }
    .meta { color: #555; font-size: 0.9rem; }
    .error { border: 1px solid #cc0000; padding: 12px; margin: 12px 0; max-width: 860px; }
  </style>
</head>
<body>
  <h1>Proposal Details</h1>
  <p><a href="?page=proposals">Back to Proposals</a> | <a href="?page=home">Home</a></p>

  <?php if (!empty($error)): ?>
    <div class="error">
      <p><strong><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></strong></p>
    </div>
  <?php else: ?>
    <div class="card">
      <h2><?= htmlspecialchars($proposal['title'], ENT_QUOTES, 'UTF-8') ?></h2>
      <p><?= nl2br(htmlspecialchars($proposal['description'], ENT_QUOTES, 'UTF-8')) ?></p>
      <p class="meta">Submitted: <?= htmlspecialchars($proposal['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
    </div>
  <?php endif; ?>
</body>
</html>
