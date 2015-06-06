<div id="headerWithoutNavBar" class="container" style="margin-top: 10px;">
    <?php

    session_start();

        if (isset($_SESSION['loggedIn'])) {
            /*$userz = $_SESSION['user'];
            */$useznamez = $_SESSION['username'];
            echo "kala eimai" .$useznamez ;
            session_unset();
            session_destroy();
           /* header("Location : hotel.php");
            exit();*/
        } else {
            include 'LogIn.php';
        }
    ?>
    <div id="photoContainer">
        <img class="logoImage">
    </div>
</div>