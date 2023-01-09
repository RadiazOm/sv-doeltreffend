<?php require_once 'includes/initialize.php'; ?>
<!doctype html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/aa25eb13aa.js" crossorigin="anonymous"></script>
    <title>S.V Doeltreffend</title>
</head>
<body class="login">
    <div class="is-flex is-justify-content-center">
        <h1 class="title is-1">
            S.V. Doeltreffend
        </h1>
    </div>
    <div class="section">
        <div class="container">
            <div class="box is-rounded has-background-light is-flex is-align-items-center is-flex-direction-column small">
                <h2 class="subtitle is-3">Inloggen</h2>
                <?php if (!empty($errors)): ?>
                    <section class="content">
                        <ul class="notification is-danger">
                            <?php foreach ($errors as $error): ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="field m-6">
                        <label class="label" for="knsa">KNSA-Nummer</label>
                        <div class="control has-icons-left">
                            <input class="input is-info" type="number" placeholder="KNSA-Nummer" value="<?= $knsa ?? '' ?>" id="knsa" name="knsa">
                            <span class="icon is-small is-left">
                                <i class="fas fa-hashtag"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field m-6">
                        <label class="label" for="password">Wachtwoord</label>
                        <div class="control has-icons-left">
                            <input class="input is-info" type="password" placeholder="Wachtwoord" value="" id="password" name="password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field m-6 is-flex is-justify-content-center">
                        <div class="control">
                            <input type="submit" name="submit" value="Login" class="button is-link">
                        </div>
                    </div>
                </form>
                <div>
                    <a href="register.php" class="is-underlined">Of maak een nieuw account</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


