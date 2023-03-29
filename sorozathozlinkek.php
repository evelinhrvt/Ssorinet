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
    <title>Links</title> <!--adatbazisban lesz-->
    <link rel="stylesheet" href="css/styleee.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" type="image/x-icon" href="Kepek/IMDB.png">
    <script type="text/javascript" src="js/jquery.min.js"></script>
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
            url: "dbFunctions.php?event=getLinks",
            cache: false,
            data: {seriesID: seriesID},
            success: function (res) {
                res = JSON.parse(res);
                let data = '';
                for (let i = 0; i < res.length; i++) {
                    data +=
                        '<li>' +
                        '   <a href="' + res[i]['linek'] + '" target="_blank">' +
                        '<span>' + res[i]['hostnev'] + '</span>' +
                        '</a>' +
                        '</li>'
                }
                $("#links").append(data);
            }
        });
    })
</script>

<div class="list">
    <h2>Host name and Links</h2>
    <ul id="links"></ul>
</div>
</body>
</html>