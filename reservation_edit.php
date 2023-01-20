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
<?php if (!empty($errors)): ?>
    <section class="content">
        <ul class="notification is-danger">
            <?php foreach ($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>
<div class="is-flex is-flex-direction-column is-align-items-center">
    <h1 class="title is-1">
        Edit
    </h1>
    <a class="button is-primary" href="reservations.php">Terug naar de lijst</a>
</div>
<div class="section">
    <div class="container">
        <div class="box is-rounded has-background-light is-flex is-align-items-center is-flex-direction-column small">
            <h2 class="subtitle is-3">Edit</h2>
            <form action="" method="post">
                <div class="field m-6">
                    <label class="label" for="weapon">Wapen</label>
                    <div class="control">
                        <div class="select">
                            <select name="weapon-id" id="weapon">
                                <?php foreach ($weapons as $weapon):?>
                                <option value="<?= $weapon->id ?>" <?= $reservation->weapon->id == $weapon->id ? 'selected="selected"' : ''?> ><?= $weapon->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="stance">Stand</label>
                    <div class="control">
                        <div class="select">
                            <select name="stance" id="stance">
                                <option value="standing" <?= $reservation->stance == 'standing' ? 'selected="selected"' : ''?> >Staand</option>
                                <option value="kneeling" <?= $reservation->stance == 'kneeling' ? 'selected="selected"' : ''?> >Knielend</option>
                                <option value="laying" <?= $reservation->stance == 'laying' ? 'selected="selected"' : ''?> >Liggend</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="date">Datum</label>
                    <div class="control has-icons-left">
                        <input class="input" type="date" placeholder="Datum" value="<?= $reservation->date ?? '' ?>" id="date" name="date">
                        <span class="icon is-small is-left">
                                <i class="fas fa-calendar"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="time">Tijd</label>
                    <div class="control has-icons-left">
                        <input class="input" type="time" placeholder="Tijd" value="<?= $reservation->time ?? '' ?>" id="time" name="time">
                        <span class="icon is-small is-left">
                                <i class="fas fa-clock"></i>
                            </span>
                    </div>
                </div>
                <div class="field m-6">
                    <label class="label" for="lane">Baan</label>
                    <div class="control">
                        <div class="select">
                            <select name="lane" id="lane">
                                <option value="1">Baan 1</option>
                                <option value="2">Baan 2</option>
                                <option value="3">Baan 3</option>
                                <option value="4">Baan 4</option>
                                <option value="5" selected="selected">Baan 5</option>
                                <option value="6">Baan 6</option>
                                <option value="7">Baan 7</option>
                                <option value="8">Baan 8</option>
                                <option value="9">Baan 9</option>
                                <option value="10">Baan 10</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field m-6 is-flex is-justify-content-center">
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


