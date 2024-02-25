<?php
    require_once("url.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------------- STYLES ---------------------->
    <link rel="stylesheet" href="css/general_templates.css">
    <link rel="stylesheet" href="css/auth.css">

    <title>Movie Star</title>
</head>

<?php
    require_once("templates/header.php");
?>

<main>
    <section class="user-form">
        <div class="select-form-type">
            <p>Login</p>
            <label for="select-checkbox" class="select-form-button">
                <input type="checkbox" name="select-checkbox" id="select-checkbox">
                <span></span>
            </label>
            <p>Register</p>
        </div>
        <form action="<?= $BASE_URL?>/auth_proccess.php" method="POST" class=" input-fields" id="login" autocomplete="off">
            <input type="hidden" name="type" value="login">
            <label for="email-login">E-mail</label>
            <input type="text" class="form-inputs" name="email-login" id="email-login" required>
            <label for="password-login">Password</label>
            <input type="text" class="form-inputs" name="password-login" id="password-login" required>
            <input type="submit" value="Login" class="btn btn-form">
        </form>

        <form action="<?= $BASE_URL?>/auth_proccess.php" method="POST" class=" input-fields" id="register" autocomplete="off">
            <input type="hidden" name="type" value="register">
            <label for="email-register">E-mail</label>
            <input type="text" class="form-inputs" name="email-register" id="email-register" required>
            <label for="username-register">Username</label>
            <input type="text" class="form-inputs" name="username-register" id="username-register" required>
            <label for="password-register">Password</label>
            <input type="text" class="form-inputs" name="password-register" id="password-register" required>
            <label for="conf-password">Confirm your password</label>
            <input type="text" class="form-inputs" name="conf-password" id="conf-password" id="conf-password" required>
            <input type="submit" value="Register" class="btn btn-form">
        </form>
    </section>
</main>
<script src="js/desktop/form.js"></script>

<?php
    require_once("templates/footer.php");
?>