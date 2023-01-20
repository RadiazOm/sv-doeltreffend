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
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="logo-item" href="index.php">
            <img src="img/logo-sv.png" alt="Logo picture" class="logo">
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
        <?php if ($session->get('user')->admin > 0): ?>
            <a href="reservations.php" class="navbar-item">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fa-solid fa-clipboard"></i>
                    </span>
                    <span>Afspraken</span>
                </span>
            </a>
            <a href="forms.php" class="navbar-item">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fa-solid fa-inbox"></i>
                    </span>
                    <span>Formulieren</span>
                </span>
            </a>
        <?php endif; if ($session->get('user')->admin == 2): ?>
            <a href="users.php" class="navbar-item">
                <span class="icon-text">
                    <span class="icon">
                        <i class="fa-solid fa-person"></i>
                    </span>
                    <span>Leden</span>
                </span>
            </a>
        <?php endif; ?>
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
<div class="section">
    <div class="container">
        <div class="box is-rounded has-background-light is-flex is-align-items-center is-flex-direction-column small">
            <h2 class="subtitle is-3">Account aanpassen</h2>
            <?php if (!empty($errors)): ?>
                <section class="content">
                    <ul class="notification is-danger">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>
            <div>
                <a href="login.php" class="button is-info">Terug naar profiel</a>
            </div>
            <form action="" method="post">
                <div class="field m-6">
                    <label class="label" for="first-name">Voornaam</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="text" placeholder="Voornaam" value="<?= $user->first_name ?? '' ?>" id="first-name" name="first-name">
                        <span class="icon is-small is-left">
                                <i class="fas fa-person"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="last-name">Achternaam</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="text" placeholder="Achternaam" value="<?= $user->last_name ?? '' ?>" id="last-name" name="last-name">
                        <span class="icon is-small is-left">
                                <i class="fas fa-person"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="phone">Telefoonnummer</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="number" placeholder="Telefoonnummer" value="<?= $user->phone ?? '' ?>" id="phone" name="phone">
                        <span class="icon is-small is-left">
                                <i class="fas fa-phone"></i>
                            </span>
                    </div>
                </div>

                <div class="field m-6">
                    <label class="label" for="knsa">KNSA-Nummer</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="number" placeholder="KNSA-Nummer" value="<?= $user->knsa ?? '' ?>" id="knsa" disabled>
                        <span class="icon is-small is-left">
                                <i class="fas fa-hashtag"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="email">Email</label>
                    <div class="control has-icons-left">
                        <input class="input is-info" type="text" placeholder="Email" value="<?= $user->email ?? '' ?>" id="email" name="email">
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
                        <input type="submit" name="submit" value="Aanpassen" class="button is-link">
                    </div>
                </div>
            </form>
        </div>
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
