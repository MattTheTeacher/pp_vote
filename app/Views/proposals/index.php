<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Public Voting App | Proposals</title>
  <style>
    .card { border: 1px solid #ddd; padding: 12px; margin: 12px 0; max-width: 860px; }
    .meta { color: #555; font-size: 0.9rem; }
  </style>
</head>
<body>
  <h1>Proposals</h1>
  <p><a href="?page=proposals-create">Submit a Proposal</a> | <a href="?page=home">Home</a></p>

  <?php if (empty($proposals)): ?>
    <p>No proposals have been submitted yet.</p>
  <?php else: ?>
    <?php foreach ($proposals as $proposal): ?>
      <div class="card">
        <h3><?= htmlspecialchars($proposal['title'], ENT_QUOTES, 'UTF-8') ?></h3>
        <p><?= nl2br(htmlspecialchars($proposal['description'], ENT_QUOTES, 'UTF-8')) ?></p>
        <p class="meta">Submitted: <?= htmlspecialchars($proposal['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>
