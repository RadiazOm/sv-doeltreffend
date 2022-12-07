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
    <script src="javascript/javascript.js"></script>
    <title>S.V Doeltreffend</title>
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="https://bulma.io/images/bulma-logo.png" alt="Logo picture" width="112" height="28">
        </a>
    </div>

    <div class="navbar-start">
        <a href="index.php" class="navbar-item">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>
                    <span>Reserveren</span>
                </span>
        </a>
        <a href="aboutus.php" class="navbar-item">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fa-solid fa-user-group"></i>
                    </span>
                    <span>Over ons</span>
                </span>
        </a>
        <a href="contact.php" class="navbar-item">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <span>Contact</span>
                </span>
        </a>
    </div>

    <div class="navbar-end">
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">

            </a>

            <div class="navbar-dropdown is-right">
                <a class="navbar-item" href="profile.php">
                    Profiel
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item" href="logout.php">
                    Logout
                </a>
            </div>
        </div>
        <a class="navbar-item" href="profile.php">
            <i class="fa-solid fa-user"></i>
        </a>
    </div>
</nav>
<?php if (!empty($errors)): ?>
    <section class="content">
        <ul class="notification is-danger">
            <?php foreach ($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>

<div class="container is-flex is-justify-content-center is-flex-direction-column is-align-items-center">
    <a class="button is-primary" href="forms.php">Terug naar de lijst</a>
    <h1 class="title is-1"><?= $form->subject?></h1>
    <h2 class="subtitle is-2"><?= $form->user_id?></h2>
    <div class="box">
        <p><?= $form->question?></p>
    </div>
</div>
<footer class="footer has-background-dark">
    <div class="content has-text-centered has-text-white">
        <p>
            S.V. Doeltreffend reserserveringsysteem gemaakt door <a href="https://github.com/RadiazOm">Jeffrey van Otterloo</a>. Deze website is gemaakt met
            <a href="https://bulma.io">Bulma</a>
            <br>
            © S.V. Doeltreffend
        </p>
    </div>
</footer>
</body>
</html>
