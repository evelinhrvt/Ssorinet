<?php

if (!empty($_POST['submit']) && $_POST['submit'] == 'Registration') {
    $name = $_POST['nev'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];
    if ($password == $passwordAgain) {
        include 'database/dbConfig.php';
        //email alapján kérjük le, és ha van akkor a regisztrácio sikertelen
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            ?><script>alert('Ezzel az email cimmel már regisztráltak')</script><?php
        }else {
            $target_dir = "Kepek/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            //maximális kép méret 5MB
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                ?><script>alert('A kép túl nagy. A megengedett méret: 5MB')</script><?php
            }else{
                $imageName = '';
                if(!empty($_FILES["fileToUpload"])){
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $imageName = basename( $_FILES["fileToUpload"]["name"]);
                    } else {
                        ?><script>alert('Átmeneti hiba. Kérlek probáld ujra')</script><?php
                        header("location: registration.php");
                    }
                }
                // Sozzuk a jelszavat mert adatbáziba nem mentjük direkt a jelszavat hanem kódolva, biztonsági szempont miatt
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user (nev, email, jelszo, kep) VALUES ('$name', '$email', '$password', '$imageName')";
                if ($db->query($sql) === true) {
                    ?><script>alert('A regisztrácio sikeres volt. Jelentkezz be!')</script><?php
                    header("location: index.php");
                }else {
                    ?><script>alert('Átmeneti hiba. Kérlek probáld ujra')</script><?php
                    header("location: registration.php");
                }
            }
        }
    }else {
        ?><script>alert('A két jelszó nem egyezik meg')</script><?php
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="Kepek/IMDB.png">
</head>
<body>
<div class="center">
    <h1>Registration</h1>
    <form method="post" action="registration.php" enctype="multipart/form-data">
        <div class="txt_field">
            <input type="text" id="nev" name="nev" required>
            <span></span>
            <label>Full name</label>
        </div>
        <div class="txt_field">
            <input type="email" id="email" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input type="password" id="jelszo" name="password" required>
            <span></span>
            <label>Password</label>
        </div>
        <div class="txt_field">
            <input type="password" name="passwordAgain" required>
            <span></span>
            <label>Password again</label>
        </div>
        Select profile image:
        <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload">
        <br>
        <br>
        <input type="submit" name="submit" value="Registration">
        <div class="signup_link">
            Already signed up? <a href="index.php">Sign in</a>
        </div>
        <div id="loader"></div>
    </form>
</div>

</body>
</html>