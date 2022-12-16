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
                <form action="" method="post">
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
                        <label class="label" for="knsa">KNSA-Nummer</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-info" type="text" placeholder="KNSA-Nummer" value="" id="knsa">
                            <span class="icon is-small is-left">
                                <i class="fas fa-hashtag"></i>
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
                    <div class="field m-6 is-flex is-justify-content-center">
                        <div class="control">
                            <input type="submit" name="submit" value="Sturen" class="button is-link">
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


