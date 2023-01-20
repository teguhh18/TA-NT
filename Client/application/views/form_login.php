<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/login/style_login.css")?>">
</head>
<body>
    <div class="login-form">
        <h1>Login</h1>
        <form action="<?= base_url('Hunian'); ?>">
            <p>User Name</p>
            <input type="text" name="user" id="username" placeholder="User Name" tabindex="1" autofocus>
            <p>Password</p>
            <input type="password" name="password" id="pass" placeholder="Password" tabindex="2">
            <button type="submit" tabindex="4" action="<?= base_url('Hunian'); ?>">Login</button>
            <!-- <button><a href="<?= base_url('register'); ?>">Register</a></button> -->
        </form>
    </div>
</body>
</html>

<!-- CODE BY TEGUH BUDIONO -->