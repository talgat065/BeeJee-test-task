<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tasks</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/album.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
            integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <strong>Tasks</strong>
            </a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-success" type="button" href="/home/create">Create a New Task</a>
                <?php if (isset($_SESSION['user']) && ! empty($_SESSION['user'])): ?>
                    <a class="btn btn-info" type="button" href="/auth/logout">Logout</a>
                <?php else: ?>
                    <a class="btn btn-info" type="button" href="/auth/signin">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<?php include 'app/views/'.$contentView; ?>
</body>
</html>
