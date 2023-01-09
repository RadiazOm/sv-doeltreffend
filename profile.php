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
        <?php if ($session->get('user')->admin == 1): ?>
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
    <h1 class="title is-1 has-text-centered">
        Mijn profiel
    </h1>
    <div class="container">
        <div class="box small has-background-light is-flex-direction-column is-flex">
            <div class="control">
                <label for="name" class="title is-3">Naam</label>
                <input class="input is-light" type="text" id="name" value="<?= $user->first_name . ' ' . $user->last_name ?? '' ?>" readonly>
            </div>
            <div class="control">
                <label for="name" class="title is-3">Telefoonnummer</label>
                <input class="input is-light" type="text" id="name" value="<?= $user->phone ?? '' ?>" readonly>
            </div>
            <div class="control">
                <label for="name" class="title is-3">Email</label>
                <input class="input is-light" type="text" id="name" value="<?= $user->email ?? '' ?>" readonly>
            </div>
            <div class="control">
                <label for="name" class="title is-3">KNSA-Nummer</label>
                <input class="input is-light" type="text" id="name" value="<?= $user->knsa ?? '' ?>" readonly>
            </div>
            <div class="mt-6">
                <a href="profile_edit.php" class="button is-primary">Aanpassen</a>
            </div>
        </div>
    </div>
</div>
