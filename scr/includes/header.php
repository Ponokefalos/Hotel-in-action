<div id="headerWithoutNavBar" class="container" style="margin-top: 10px;">
    <?php

    session_start();

        if (isset($_SESSION['loggedIn'])) {
            include 'LoggedIn.php';

        } else {
            include 'LogIn.php';
        }
    ?>
    <div id="photoContainer" >
        <img class="logoImage">
    </div>
</div>