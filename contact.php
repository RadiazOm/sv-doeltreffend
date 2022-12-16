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
    <div class="section">
        <div class="container">
            <div class="box m-6 has-background-light">
                <form action="" method="post">
                    <h1 class="title is-1 has-text-centered">Contact</h1>
                    <div class="field m-6">
                        <label class="label" for="name">Naam</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-info" type="text" placeholder="Naam" value="" id="name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field m-6">
                        <label class="label" for="email">E-mail</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-info" type="text" placeholder="E-mail" value="" id="email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field m-6">
                        <label class="label" for="subject">Onderwerp</label>
                        <div class="control">
                            <div class="select">
                                <select id="subject" name="subject">
                                    <option value="">Kies een onderwerp</option>
                                    <option value="technical">Technisch probleem</option>
                                    <option value="other">Anders</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field m-6">
                        <label class="label" for="message">Bericht</label>
                        <div class="control">
                            <textarea class="textarea" placeholder="Bericht" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="field m-6">
                        <div class="control">
                            <input type="submit" name="submit" value="Sturen" class="button is-link">
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
