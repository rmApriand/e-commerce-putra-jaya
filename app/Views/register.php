<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Register - Toko Putra Jaya</title>
    <link href="<?= base_url("./public/asset/logo.jpg")?>" rel="icon">
    <link href="<?= base_url("./public/bootstrap/dist/css/bootstrap.min.css") ?>" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<div class="container">
    <main class="form-signin w-120 m-auto" style="max-width: 400px;">
        <div class="text-center">
            <img class="mb-4" src="<?= base_url("/public/asset/logo.jpg") ?>" alt="" width="70" height="70" style="border-radius: 50%;">
            <h2 class="mt-3">Register</h2>
        </div>
        <hr>
        <form action="<?= base_url('/register/save') ?>" method="post">
            <div class="form-group">
                <label for="nama_user" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user" required>
            </div>
            <div class="form-group">
                <label for="alamat_user" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="alamat_user" name="alamat_user" required>
            </div>
            <div class="form-group">
                <label for="no_hp_user" class="form-label">No HP:</label>
                <input type="text" class="form-control" id="no_hp_user" name="no_hp_user" required>
            </div>
            <div class="form-group">
                <label for="email_user" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email_user" name="email_user" required>
            </div>
            <div class="form-group">
                <label for="password_user" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password_user" name="password_user" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3">Register</button>
                <p class="mt-3 mb-3 text-body-secondary text-center">Already have an account? <a href="<?= base_url('/login') ?>">Login here</a></p>
            </div>
        </form>
    </main>
</div>
<script src="<?= base_url("./public/bootstrap-examples/assets/dist/js/bootstrap.bundle.min.js") ?>"></script>
</body>
</html>
