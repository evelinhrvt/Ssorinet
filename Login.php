
<?php
$conn = mysqli_connect("localhost","root","","sorinet");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
// felhasználó azonosítása
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["jelszo"];

    $sql = "SELECT id FROM user WHERE email = '$email' AND jelszo = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    var_dump($count);
    // ha a felhasználói adatok helyesek, akkor átirányítunk a főoldalra
    if($count >= 1) {
        header("location: index.html");
    }else {
        echo "Hibás felhasználónév vagy jelszó!";
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="center">
    <h1>Login</h1>
    <form method="post" action="Login.php">
        <div class="txt_field">
            <input id="email" type="text" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input id="pass" type="password" name="jelszo" required>
            <span></span>
            <label>Password</label>
        </div>

        <input type="submit" value="Login">


        <div class="signup_link">
            A member? <a href="Registration.html">Signup</a>
        </div>

    </form>
</div>

</body>
</html>