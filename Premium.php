<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Premium</title>
  <link rel="stylesheet" href="style2.css">

  <style>
    .box{

      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 20px;
      border:1px solid rgba(255, 255, 255, 0.18);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
      display: inline-block;
      width: 350px;
      height: 400px;
      margin: 2px;
    }

    .kep{
      display: inline-block;
      border-radius: 20px;
      width: 345px;
      height: 395px;
      margin: 2px;

    }
    .kepp{
      display: inline-block;
      border-radius: 20px;
      width: 100px;
      height: 50px;
      margin: 5px;

    }

  </style>

</head>
<body>
<nav>
  <a href="Home.html">Home</a>
  <a href="Rules.html">Rules</a>
  <a class="active" href="Premium.php">Profile</a>
  <a href="Search.html">Search</a>
  <div class="animation start-home"></div>
</nav>
<div class="box" id="box1">
  <a href="Sorozat.fooldal.html"><img class="kep" src="Kepek/GoT.jpg"></a></div>
<!--adatbazisban lesz-->

</div>
<br>
Mail: <input type=text name=id value='<?php echo $id ?>' disabled> <br><br>
Username: <input type=text name=id value='<?php echo $id ?>' disabled> <br><br>
password: <input type=password name=id value='<?php echo $id ?>' disabled> <br><br>
<input type="submit">

</div>
</body>
</html>