<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Log In - Toko Putra Jaya</title>
    <link rel="icon" href="<?= base_url("public/asset/logo.jpg")?>">
    <link href="<?= base_url("public/bootstrap/dist/css/bootstrap.min.css") ?>" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<div class="container">
    <main class="form-signin w-100 m-auto" style="max-width: 400px;">
        <div class="text-center">
            <img class="mb-4" src="<?= base_url("public/asset/logo.jpg") ?>" alt="" width="70" height="70" style="border-radius: 50%;">
            <h2 class="mt-3">Please sign in</h2>
        </div>
        <hr>
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/login/auth') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-floating">
                <input type="email" class="form-control" id="email_user" name="email_user" placeholder="name@example.com" required>
                <label for="email_user">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password_user" name="password_user" placeholder="Password" required>
                <label for="password_user">Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            </div>
            <p class="mt-3 mb-3 text-body-secondary text-center">Don't have an account? <a href="<?= base_url('/register') ?>">Register here</a></p>
        </form>
    </main>
</div>
<script src="<?= base_url("public/bootstrap-examples/assets/dist/js/bootstrap.bundle.min.js") ?>"></script>
</body>
</html>
