<?php require_once 'includes/initialize.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>S.V Doeltreffend</title>
</head>
<body>
<a href="index.php">Terug</a>
<?php if (isset($weapon)): ?>
    <h1><?= $weapon->name ?></h1>
    <p><?= $weapon->day ?></p>
<?php endif; ?>
</body>
</html>