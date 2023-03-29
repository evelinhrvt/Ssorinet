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
    <title>Series name</title>
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
        const urlParams = new URLSearchParams(window.location.search);
        const seriesID = urlParams.get('seriesID')
        $.ajax({
            type: "POST",
            url: "dbFunctions.php?event=getSerie",
            cache: false,
            data: {seriesID: seriesID},
            success: function (res) {
                res = JSON.parse(res);
                let i = 0;
                let data =
                    '<div class="fejsor"> ' +
                    '<h2>' + res[i]['nev'] + '</h2>' +
                    '</div>' +
                    '<div class="fejsor>">' +
                    '   <p>' +
                    '       <div class="box" id="box1">' +
                    '           <img id="balkep" class="kep" src="Kepek/' + res[i]['kep'] + '">' +
                    '       </div>' +
                    '       <br>' +
                    '       ' + res[i]['leiras'] + '' +
                    '   </p>' +
                    '   <br>' +
                    '   <br>' +
                    '</div>' +
                    '<a href="https://www.imdb.com/">' +
                    '   <img class="kepp" src="./Kepek/IMDB.png">' +
                    '</a>' +
                    '<a href="sorozathozlinkek.php?seriesID=' + res[i]['id'] + '">' +
                    '   <input type="submit" value="Link">' +
                    '</a>'
                $("#series").append(data);
            }
        });
    })
</script>
<div id="series"></div>
</body>
</html>