<?php

$result = null;
if (!empty($_GET['event'])) {
    switch ($_GET['event']) {
        case 'getData':
            $result = GetSeries();
            break;
        case 'searchData':
            $result = GetSeriesBySearch();
            break;
        case 'login':
            $result = Login();
            break;
        case 'getSerie':
            $result = GetSerie();
            break;
        case 'getLinks':
            $result = GetLinks();
            break;
        case 'getProfile':
            $result = GetProfile();
            break;
        default:
            $result = 'error';
            break;
    }
}
$result = json_encode($result);
echo $result;

function GetSeries()
{
    include 'database/dbConfig.php';
    $query = "SELECT * FROM sorozat";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function GetSeriesBySearch()
{
    include 'database/dbConfig.php';

    $searchedWord = $_POST['query'];

    $query = "SELECT * FROM sorozat WHERE `nev` LIKE '%$searchedWord%'";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function Login()
{
    include 'database/dbConfig.php';

    $email = $_POST['email'];
    $password = $_POST["password"];

    $query = "SELECT id, jelszo FROM user WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($count >= 1 && password_verify($password, $row['jelszo'])) {
        session_start();
        $_SESSION["loggedUserID"] = $row['id'];
        return 'success';
    }
    else {
        return 'Hibás felhasználónév vagy jelszó!';
    }
}

function GetSerie()
{
    include 'database/dbConfig.php';

    $sorozatID = $_POST['seriesID'];

    $query = "SELECT * FROM sorozat WHERE id = '$sorozatID'";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function GetLinks()
{
    include 'database/dbConfig.php';

    $sorozatID = $_POST['seriesID'];

    $query = "SELECT * FROM link WHERE sorozatid = '$sorozatID'";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function GetProfile()
{
    include 'database/dbConfig.php';
    session_start();
    $loggedUserID = $_SESSION["loggedUserID"];

    $query = "SELECT * FROM user WHERE id = '$loggedUserID' LIMIT 1";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


