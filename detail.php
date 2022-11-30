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
                <a class="navbar-item" href="pofile.php">
                    Profiel
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item" href="logout.php">
                    Logout
                </a>
            </div>
        </div>
        <a class="navbar-item" href="pofile.php">
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
        <div class="columns">
            <div class="column">
                <figure>
                    <img src="" alt="picture that i dont have">
                </figure>
            </div>
            <div class="column has-text-centered">
                <?php if (isset($weapon)): ?>
                    <h1 class="title is-1"><?= $weapon->name ?></h1>
                <?php endif; ?>
                <form action="detail.php?id=<?= $id ?>" class="field" method="post">
                    <div class="field m-6">
                        <label for="lane"></label>
                        <div class="control">
                            <div class="select">
                                <select name="lane" id="lane">
                                    <option value="1">Baan 1</option>
                                    <option value="2">Baan 2</option>
                                    <option value="3">Baan 3</option>
                                    <option value="4">Baan 4</option>
                                    <option value="5">Baan 5</option>
                                    <option value="6">Baan 6</option>
                                    <option value="7">Baan 7</option>
                                    <option value="8">Baan 8</option>
                                    <option value="9">Baan 9</option>
                                    <option value="10">Baan 10</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field m-6">
                        <div class="control" id="radiobuttons">
                            <label for="rad1" class="button">
                                <input id="rad1" type="radio" name="question">
                                Staand
                            </label>
                            <label for="rad2" class="button">
                                <input id="rad2" type="radio" name="question">
                                Knielend
                            </label>
                            <label for="rad3" class="button">
                                <input id="rad3" type="radio" name="question">
                                Liggend
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <div class="columns">
            <div class="column">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <td>Zo</td>
                            <td>Ma</td>
                            <td>Di</td>
                            <td>Wo</td>
                            <td>Do</td>
                            <td>Vr</td>
                            <td>Za</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                    <?php for ($i = 0; $i < 42; $i++): ?>
                    <?php if ($i % 7 === 0): ?>
                        </tr>
                        <tr>
                            <?php endif; ?>
                            <td><?php if($i > $day - 1 && $i <= $monthLength + $day - 1): ?><a class="button is-outlined is-info" href="detail.php?id=<?= $id ?>&date=<?php echo $i - $day + 1;?>"><?php echo  $i - $day + 1; ?></a> <?php endif; ?></td>
                    <?php endfor; ?>
                        </tr>
                    </tbody>
                </table>
                <!-- todo make calender thingy -->
            </div>
            <div class="column">
                <!-- todo make time selection thingy -->
            </div>
        </div>
    </div>
</div>
</body>
</html>