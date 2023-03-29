<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="Kepek/IMDB.png">
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div class="center">
    <h1>Login</h1>
    <form>
        <div class="txt_field">
            <input id="email" type="text" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input id="pass" type="password" name="password" required>
            <span></span>
            <label>Password</label>
        </div>

        <input type="submit" id="loginBTN" value="Login">

        <div class="signup_link">
            A member? <a href="registration.php">Signup</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#loginBTN').click(function () {
        $.ajax({
            type: "POST",
            url: "dbFunctions.php?event=login",
            cache: false,
            data: {email: $('#email').val(), password: $('#pass').val()},
            success: function (res) {
                if (JSON.parse(res) == 'success') {
                    window.location = 'home.php';
                } else {
                    alert(JSON.parse(res));
                }
            }
        });
    })
</script>
</body>
</html>