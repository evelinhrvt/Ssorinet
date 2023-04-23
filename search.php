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
    <title>Home</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="icon" type="image/x-icon" href="Kepek/IMDB.png">
    <style>
        .box {

            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            display: inline-block;
            width: 150px;
            height: 200px;
            margin: 2px;
        }

        .kep {
            display: inline-block;
            border-radius: 20px;
            width: 145px;
            height: 195px;
            margin: 5px;

        }

        .search-box {
            text-align: center;
        }
    </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<?php
include 'header.php' ?>

<div class="search-box">
    <form action="search.php" method="GET">
        <input type="text" name="query">
        <input class="subbtn" name="submit" type="submit" value="Search">
        <h6><i>Search by name</i></h6>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        const urlParams = new URLSearchParams(window.location.search);
        const query = urlParams.get('query');
        $.ajax({
            type: "POST",
            url: "dbFunctions.php?event=searchData",
            cache: false,
            data: {query: query},
            success: function (res) {
                res = JSON.parse(res);
                let data = '';
                for (let i = 0; i < res.length; i++) {
                    data +=
                        '<div class="box" title="' + res[i]['nev'] + '">' +
                        '<a href="sorozatFooldal.php?seriesID=' + res[i]['id'] + '">' +
                        '<img class="kep" src="Kepek/' + res[i]['kep'] + '"></a>' +
                        '</div> ';
                }
                $("#series").append(data);
            }
        });
    })
</script>
<div id="series"></div>
</body>
</html>