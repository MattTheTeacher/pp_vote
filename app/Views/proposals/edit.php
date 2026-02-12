<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Public Voting App | Edit Proposal</title>
  <style>
    .card { border: 1px solid #ddd; padding: 12px; margin: 12px 0; }
    .meta { color: #555; font-size: 0.9rem; }
    .success { font-weight: bold; }
    .error { font-weight: bold; }
  </style>
</head>
<body>
<h1>Edit Proposal</h1>

<p>
  <a href="?page=proposal&id=<?= (int)($proposal['id'] ?? 0) ?>">Back to Details</a>
  | <a href="?page=proposals">Back to Proposals</a>
  | <a href="?page=home">Home</a>
</p>

<?php if (!empty($error)): ?>
  <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php else: ?>

<form action="?page=proposals-update" method="POST" novalidate>
  <input type="hidden" name="id" value="<?= (int)($proposal['id'] ?? 0) ?>"/>

  <p>
    <label for="title"><strong>Title</strong></label><br />
    <input type="text" id="title" name="title"
      value="<?= htmlspecialchars($old['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
      style="width: 100%;"
      maxlength="100" required />
    <?php if (!empty($errors['title'])): ?>
      <br /><span class="error"><?= htmlspecialchars($errors['title'], ENT_QUOTES, 'UTF-8') ?></span>
    <?php endif; ?>
  </p>

  <p>
    <label for="description"><strong>Description</strong></label><br />
    <textarea id="description" name="description" rows="8"
      style="width: 100%;"
      maxlength="500" required><?= htmlspecialchars($old['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    <?php if (!empty($errors['description'])): ?>
      <br /><span class="error"><?= htmlspecialchars($errors['description'], ENT_QUOTES, 'UTF-8') ?></span>
    <?php endif; ?>
  </p>

  <button type="submit">Save Changes</button>
</form>

<?php endif; ?>

</body>
</html>
