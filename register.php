<?php require_once 'includes/initialize.php'; ?>
<!doctype html>
<html lang="en">
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
            <h2 class="subtitle is-3">Account aanmaken</h2>
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
                    <label class="label" for="first-name">Voornaam</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="text" placeholder="Voornaam" value="<?= $newUser->first_name ?? '' ?>" id="first-name" name="first-name">
                        <span class="icon is-small is-left">
                                <i class="fas fa-person"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="last-name">Achternaam</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="text" placeholder="Achternaam" value="<?= $newUser->last_name ?? '' ?>" id="last-name" name="last-name">
                        <span class="icon is-small is-left">
                                <i class="fas fa-person"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="phone">Telefoonnummer</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="number" placeholder="Telefoonnummer" value="<?= $newUser->phone ?? '' ?>" id="phone" name="phone">
                        <span class="icon is-small is-left">
                                <i class="fas fa-phone"></i>
                            </span>
                    </div>
                </div>

                <div class="field m-6">
                    <label class="label" for="knsa">KNSA-Nummer</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="number" placeholder="KNSA-Nummer" value="<?= $newUser->knsa ?? '' ?>" id="knsa" name="knsa">
                        <span class="icon is-small is-left">
                                <i class="fas fa-hashtag"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="email">Email</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="text" placeholder="Email" value="<?= $newUser->email ?? '' ?>" id="email" name="email">
                        <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="password">Wachtwoord</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-info" type="password" placeholder="Wachtwoord" value="" id="password" name="password">
                        <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6 is-flex is-justify-content-center">
                    <div class="control">
                        <input type="submit" name="submit" value="Aanmaken" class="button is-link">
                    </div>
                </div>
            </form>
            <div>
                <a href="login.php" class="button is-info">Login</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>


