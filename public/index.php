<?php
$sha = getenv('GIT_SHA') ?: 'unknown';

$dbTime = 'db not connected';
try {
  $dsn = "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME') . ";charset=utf8mb4";
  $pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'), [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  $dbTime = $pdo->query("SELECT NOW() AS t")->fetch(PDO::FETCH_ASSOC)['t'];
} catch (Throwable $e) {}

header("Content-Type: text/html; charset=utf-8");
?>
<!doctype html>
<html lang="fi">
<head><meta charset="utf-8"><title>CI/CD</title></head>
<body>
  <h1>CI/CD demo</h1>
  <p><b>GIT_SHA:</b> <?= htmlspecialchars($sha) ?></p>
  <p><b>DB time:</b> <?= htmlspecialchars($dbTime) ?></p>
</body>
</html>
