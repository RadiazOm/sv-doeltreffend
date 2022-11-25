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
<form action="" method="post">
    <div class="data-field">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="<?php if (isset($weapon->name)) {echo htmlentities($weapon->name);} ?>"/>
    </div>
    <div class="data-field">
        <label for="day">Dag</label>
        <input id="day" type="text" name="day" value="<?php if (isset($weapon->day)) {echo htmlentities($weapon->day);} ?>"/>
    </div>
    <div class="data-submit">
        <input type="hidden" name="submit" value=""/>
        <input type="submit" value="Submit"/>
    </div>
</form>
</body>
</html>
