<?php

session_start();
if (empty($_SESSION["loggedUserID"])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Premium</title> <!--adatbazisban lesz-->
    <link rel="stylesheet" href="css/styleee.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" type="image/x-icon" href="Kepek/IMDB.png">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <style>
        .box {

            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            display: inline-block;
            width: 350px;
            height: 400px;
            margin: 2px;
        }

        .kep {
            display: inline-block;
            border-radius: 20px;
            width: 345px;
            height: 395px;
            margin: 2px;

        }

        .kepp {
            display: inline-block;
            border-radius: 20px;
            width: 100px;
            height: 50px;
            margin: 5px;

        }

    </style>
</head>
<body>
<?php
include 'header.php'; ?>

<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "dbFunctions.php?event=getProfile",
            cache: false,
            success: function (res) {
                res = JSON.parse(res);
                let i = 0;
                let data =
                    '<div class="box" id="box1">' +
                    '<img class="kep" src="Kepek/' + res[i]['kep'] + '">' +
                    '</div>' +
                    '<br><br>' +
                    'Mail: <input type=text name=id value="' + res[i]['email'] + '" disabled>' +
                    '<br><br>' +
                    'Username: <input type=text name=id value="' + res[i]['nev'] + '" disabled>' +
                    '<br><br>' +
                    '<h4>password (hash): ' + res[i]['jelszo'] + '</h4>';

                $("#profileData").append(data);
            }
        });
    })
</script>
<div id="profileData"></div>
</body>
</html>
