<?php

$dbconn = mysqli_connect(
    "localhost",
    "root",
    "",
    "teszta"
);
if (mysqli_connect_error()) {
    die("HIBA: " . mysqli_connect_error());
}

if (isset($_GET["firstName"]) && isset($_GET["lastName"]) && isset($_GET["email"]) && isset($_GET["age"])) {
    $firstName = $_GET["nev"];
    $mail = $_GET["email"];
    $pass = $_GET["pass"];

    $sql = "INSERT INTO users (nev, email, pass) 
        VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($dbconn, $sql);
    $stmt->bind_param('ssss', $firstName, $mail, $pass);

    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_error($stmt)) {
        die("HIBA: " . mysqli_stmt_error($stmt));
    }

    $id = mysqli_insert_id($dbconn);
    echo json_encode($id);

} else {
    echo json_encode("Missing arguments!");
}

