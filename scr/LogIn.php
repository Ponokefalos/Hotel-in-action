<div style="float: right;">

    <form class="form-inline" method="post">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Username</label>
            <input type="email" class="form-control" name="email" id="emailLogIn" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label class="sr-only" for="exampleInputPassword3">Password</label>
            <input type="password" class="form-control" name="password" id="passwordLogIn" placeholder="Password">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Remember me
            </label>
        </div>
        <button type="submit" name="signIn" class="btn btn-primary">Sign in</button>
        <a href="registers.php">
            <button type="button" class="btn btn-primary">Register</button>
        </a>
    </form>

</div>

<?php
/**
 * Created by PhpStorm.
 * User: Jim
 * Date: 31/5/2015
 * Time: 5:12 μμ
 */
//session_start();


include("Functions.php");
include("RegisterConnectToDB.php");


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signIn'])) {

    $errorCode = 0;

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    if (!isset($email)) {
        $errorCode = 1;
    }

    if (!isset($password)) {
        $errorCode = 1;
    }

    $password = md5($password);

    if ($errorCode == 0) {

        $sql = "SELECT * "
            . "FROM users WHERE email='$email' "
            . "AND password='$password'";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            include("user.php");
            $row = mysqli_fetch_assoc($result);

            $user = new User($row['name'], $row['surname'], $row['username'], $row['email'], $row['image'], $row['userType']);
            $_SESSION['user'] = $user;
            $_SESSION['username'] =  $row['username'];
            $_SESSION['loggedIn'] = true;
          /*  header("Location: index.php");*/
            header("Refresh:0");
            exit();
        } else {
            showAlertDialog("Λάθος στοιχεία.");
            /*  header("Location: index.php");
              exit();*/
        }

    } else if ($errorCode == 1) {
        showAlertDialog("Παρακαλώ συμπληρώστε κατάλληλα όλα τα πεδία.");
    }


}




?>