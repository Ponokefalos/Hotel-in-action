<?php
include('RegisterConnectToDB.php');
include('Functions.php');
$user = getUserFromDatabase($_SESSION['username'], $link);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signOut'])) {
    logOut();
}

function logOut()
{
    global $link;
    include_once ("ArizFunctions.php");
    if (delete_from_login($_SESSION["user_id"],$link))
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

?>



<div class="col-xs-4" style="float: right;">

    <div class="round" style="float: left;  margin-right: 2%">

        <?php
        echo '<img  src="data:image;base64,' . base64_encode($user->image) . '" width=35 height=35/>';
        ?>

    </div>

    <div style="float: left; margin-right: 2%; padding-top: 2.2%;  " class="form-group">
        <label><?php echo $user->name . "  " . $user->surname;   /* flush();*/  /*ob_clean();*/ ?></label>
    </div>

    <form method="post">
        <a href="userProfile.php">
            <button type="button" class="btn btn-primary">Προφίλ</button>
        </a>
        <button type="submit" name="signOut" class="btn btn-danger">Αποσύνδεση</button>
    </form>

</div>

