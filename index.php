<?php require_once 'includes/initialize.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.V Doeltreffend</title>
</head>
<body>
    <h1>S.V Doeltreffend</h1>
    <?php if (isset($error)): ?>
        <span class="error"><?= $error ?></span>
    <?php endif; ?>
    <?php if (isset($weapens)): ?>
    <table>
        <thread>
            <tr>
                <th>#</th>
                <th>Naam</th>
            </tr>
        </thread>

        <tfoot>
        <tr>
            <td colspan="2">yes</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($weapens as $weapen): ?>
            <tr>
                <td> <?= $weapen->id; ?></td>
                <td> <?= $weapen->name; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</body>
</html>
