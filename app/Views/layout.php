<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Student Management</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <a href="<?= base_url('/') ?>" class="navbar-brand mb-0 h1">Student Management System</a>
        </nav>
    </header>
    <main class="mt-3">
        <div class="container">
            <h2><?= $title ?></h2>
            <?php
            $localSession = \Config\Services::session();
            $localSession = $localSession->getFlashdata();
            ?>
            <?php if (isset($localSession['success'])) : ?>
                <div class="alert alert-success">
                    <?= $localSession['success'] ?>
                </div>
            <?php endif ?>

            <?php if (isset($localSession['error'])) : ?>
                <div class="alert alert-danger">
                    <?= $localSession['error'] ?>
                </div>
            <?php endif ?>

            <?= $this->renderSection('content') ?>
            <br/><hr/>
        </div>
    </main>

    <!-- <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>Page rendered in {elapsed_time} seconds.</p>
                </div>
                <div class="col">
                    <p class="text-center">PHP <?= phpversion() ?></p>
                </div>
                <div class="col">
                    <p class="text-right">Environment: <?= ENVIRONMENT ?></p>
                </div>
            </div>
        </div>
    </footer> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
