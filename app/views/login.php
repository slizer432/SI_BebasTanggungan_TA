<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= IMAGE; ?>icon.png">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/login.css">
    <title>Login SIBETA!</title>
</head>

<body>
    <div class="container">
        <div class="img">
            <img src="<?= IMAGE; ?>login1.png" alt="" class="lingkaran">
            <img src="<?= IMAGE; ?>login2.png" alt="" class="comp">
        </div>

        <div class="login-box">
            <h1 class="welcome">Welcome to <span class="blue-text">SIBETA!</span></h1>
            <br><br>

            <form class="login-form" action="<?= BASEURL; ?>/Login/login" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-container">
                        <input type="text" id="username" name="username">
                        <span class="user-icon"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-container">
                        <input type="password" id="password" name="password">
                        <span class="eye-icon"></span>
                    </div>
                </div>

                <button type="submit" class="login-button">LOGIN</button>
            </form>
        </div>
    </div>

    <script src="<?= BASEURL; ?>/js/login.js"></script>
</body>

</html>