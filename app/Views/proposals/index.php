<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Public Voting App | Proposals</title>
  <style>
    .card { border: 1px solid #ddd; padding: 12px; margin: 12px 0; }
    .meta { color: #555; font-size: 0.9rem; }
    .success { font-weight: bold; }
    .error { font-weight: bold; }
  </style>
</head>
<body>
<h1>View Proposals</h1>

<p><a href="?page=proposals-create">Submit a Proposal</a> | <a href="?page=home">Home</a></p>

<?php if (!empty($created)): ?>
  <p class="success">✅ Proposal submitted successfully.</p>
<?php endif; ?>

<?php if (!empty($deleted)): ?>
  <p class="success">✅ Proposal deleted successfully.</p>
<?php endif; ?>

<?php if (empty($proposals)): ?>
  <p>No proposals have been submitted yet.</p>
<?php else: ?>
  <?php foreach ($proposals as $proposal): ?>
    <div class="card">
      <h2><?= htmlspecialchars($proposal['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h2>
      <p><?= nl2br(htmlspecialchars($proposal['description'] ?? '', ENT_QUOTES, 'UTF-8')) ?></p>

      <?php if (!empty($proposal['created_at'])): ?>
        <p class="meta">Submitted: <?= htmlspecialchars($proposal['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
      <?php endif; ?>

      <p>
        <a href="?page=proposal&id=<?= (int)($proposal['id'] ?? 0) ?>">View details</a>
        | <a href="?page=proposals-edit&id=<?= (int)($proposal['id'] ?? 0) ?>">Edit</a>
        | <a href="?page=proposals-delete&id=<?= (int)($proposal['id'] ?? 0) ?>">Delete</a>
      </p>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
