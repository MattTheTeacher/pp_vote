<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Public Voting App | Submitted</title>
</head>
<body>
  <h1>Proposal received (Lesson 2)</h1>

  <p>This is a temporary page to prove POST submission works (no database yet).</p>

  <h2>Submitted data</h2>
  <ul>
    <li><strong>Title:</strong> <?= htmlspecialchars($title ?? '', ENT_QUOTES, 'UTF-8') ?></li>
    <li><strong>Description:</strong> <?= nl2br(htmlspecialchars($description ?? '', ENT_QUOTES, 'UTF-8')) ?></li>
  </ul>

  <p><a href="?page=proposals">Back to Proposals</a></p>
  <p><a href="?page=proposals-create">Submit another</a></p>
</body>
</html>
