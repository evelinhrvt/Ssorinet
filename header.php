<nav>
    <a <?php if (basename($_SERVER['PHP_SELF']) == 'home.php'
    || basename($_SERVER['PHP_SELF']) == 'sorozatFooldal.php'
    || basename($_SERVER['PHP_SELF']) == 'sorozathozlinkek.php'){ ?>class="active"<?php } ?> href="home.php">Home</a>
    <a <?php if (basename($_SERVER['PHP_SELF']) == 'rules.php'){ ?>class="active"<?php } ?> href="rules.php">Rules</a>
    <a <?php if (basename($_SERVER['PHP_SELF']) == 'premium.php'){ ?>class="active"<?php } ?> href="premium.php">Profile</a>
    <a href="logOut.php">LogOut</a>
    <div class="animation start-home"></div>
</nav>
