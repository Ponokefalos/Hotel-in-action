<?php
/*session_start();
*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ξενοδοχεία</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">
    <link href="../css/userProfileStyle.css" rel="stylesheet">
    <link href="../css/shadowStyle2.css.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/HotelFirstPage.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->

    <?php
    /* include('includes/header.php');
     include('includes/navbar.php');
     include('RegisterConnectToDB.php');

     $search_result = $_SESSION['username'];
     $user = getSuperUserFromDatabase($search_result, $link);

     if ($user->newsLetter == 1) {
         $newsletterValue = "checked";
     }*/


    include('includes/header.php');
    include('includes/navbar.php');
    include('RegisterConnectToDB.php');
    include('database.php');


    $search_result = $_SESSION['username'];
    $user = getSuperUserFromDatabase($search_result, $link);

    if ($user->newsLetter == 1) {
        $newsletterValue = "checked";
    }


    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save'])) {

        $filledVariablesState = 0;//oi metavlites exoun times
        $state = 0;// otan ola einai ok
        $errorMessage = "none";
        $fileState = 0;// 0 otan den kanoume upload nea photo
        $name = mysqli_real_escape_string($link, $_POST['inputName']);
        $surname = mysqli_real_escape_string($link, $_POST['inputSurname']);
        $birthDate = mysqli_real_escape_string($link, $_POST['birthDate']);
        //$eMail = mysqli_real_escape_string($link, $_POST['email']);
        $companyName = mysqli_real_escape_string($link, $_POST['companyName']);
        $newsletter = mysqli_real_escape_string($link, $_POST['newsletter']);
        // $username = mysqli_real_escape_string($link, $_POST['username']);
        $oldPassword = mysqli_real_escape_string($link, $_POST['oldPassword']);
        $newPassword = mysqli_real_escape_string($link, $_POST['newPassword']);
        $confirmNewPassword = mysqli_real_escape_string($link, $_POST['confirmNewPassword']);
        $file = $_FILES['image']['tmp_name'];

        if (empty($file)) {

        } else {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);
            $fileState = 1;
        }

        if (isset($oldPassword)) {
            if (md5($oldPassword) == $user->password) {
                if ((isset($newPassword)) && (isset($confirmNewPassword))) {
                    if ($newPassword == $confirmNewPassword) {
                        $state = 3;
                    } else {
                        $state = 2;
                        $errorMessage = "newPasswordMismatch";
                    }
                }
            } else {
                $state = 1;
                $errorMessage = "oldPasswordMismatch";
            }
        } else {
            $state = 0;
        }

        if (empty($name) || empty($surname) || (empty($birthDate)) || empty($companyName)) {
            $filledVariablesState = 1;
        }

        if (empty($newsletter)) {
            settype($newsletter, "integer");
            $newsletter = 0;
        } else {
            settype($newsletter, "integer");
            $newsletter = 1;
        }

        if ($filledVariablesState == 0) {
            if ($fileState == 1) {/// exei anevasei nea photo
                if ($state == 0) {// den  iparxei neos kwdikos
                    updateUserOnDatabase($user->code, $name, $surname, $birthDate, $user->email, $companyName, $newsletter, $user->password, $user->username, $user->gender, $image,$conn);
                } else if ($state == 3) {/// iparxei neos kwdikos
                    updateUserOnDatabase($user->code, $name, $surname, $birthDate, $user->email, $companyName, $newsletter, md5($newPassword), $user->username, $user->gender, $image,$conn);
                } else if ($state == 2) {// new password mismatch
                    showAlertDialog("Οι νέοι κωδικοί δεν ταιριάζουν μεταξύ τους");
                } else if ($state == 1) {// old password mismatch
                    showAlertDialog("Εσφαλμένος παλιός κωδικός");
                }

            } else {//oxi nea photo
                if ($state == 0) {// den  iparxei neos kwdikos
                    updateUserOnDatabase($user->code, $name, $surname, $birthDate, $user->email, $companyName, $newsletter, $user->password, $user->username, $user->gender, $user->image,$conn);
                } else if ($state == 3) {/// iparxei neos kwdikos
                    updateUserOnDatabase($user->code, $name, $surname, $birthDate, $user->email, $companyName, $newsletter, md5($newPassword), $user->username, $user->gender, $user->image,$conn);
                } else if ($state == 2) {// new password mismatch
                    showAlertDialog("Οι νέοι κωδικοί δεν ταιριάζουν μεταξύ τους");
                } else if ($state == 1) {// old password mismatch
                    showAlertDialog("Εσφαλμένος παλιός κωδικός");
                }
            }
        } else {
            showAlertDialog("Συμπλήρωσε όλα τα παιδία κατάλληλα");
        }


    }



    ?>
</head>

<body style="background-color:#ECECEC">


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<br> <br><br>

<div class="container" id="backgroundContainerHolder">


    <div class="container marketing shadowStyle" id="imageContainer">


        <div class="container" id="userImage">
            <?php
            echo '<img src="data:image;base64,' . base64_encode($user->image) . '" width=200 height=200/>';
            ?>
        </div>
    </div>
</div>

<div class="container" id="main_user_container">
    <div class="row ">
        <div class="container marketing shadowStyle" id="user_history">
            <div class="col-xs-7 main_profile_title shadowStyle2">
                <p>Ιστορικό Δημοπρασιών</p>
            </div>
            <div class="user_container">
                <p> SOme texts goes here, isws na min kanei o responsive table gia toso row me periexomena poy theloume.
                    Episis mporei to Istoriko na thelei kai mia row mono tou!</p>

                <p>sdasdas</p>
                <br>

                <div class="table-responsive">
                    <p>asdsdad</p>
                    <table class="table">
                        <tr>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                        </tr>
                        <tr>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                            <td>Cell 3</td>
                            <td>Cell 4</td>
                            <td>Cell 3</td>
                            <td>Cell 4</td>
                            <td>Cell 3</td>
                            <td>Cell 4</td>
                            <td>Cell 3</td>
                            <td>Cell 4</td>
                            <td>Cell 3</td>
                            <td>LAST</td>
                        </tr>
                        <tr>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                        </tr>
                        <tr>
                            <td>Cell 1</td>
                            <td>Cell 2</td>
                        </tr>
                    </table>
                </div>
            </div>

            <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br>
        </div>


        <div class="container marketing shadowStyle" id="user_ratings">
            <div class="col-xs-4 main_profile_title shadowStyle2">
                <p>Βαθμολογια</p>
            </div>
            <div class="user_container">
                <p>Η Βαθμολογίας σας είναι:</p>
                <br>

                <p style="text-align: center"> 4.2 <br>
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span> <br> <br>από 34 εγγεγραμένους
                    χρήστες</p>
                <br><br><br><br><br>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="container marketing shadowStyle" id="user_info">
            <div class="col-xs-7 main_profile_title shadowStyle2">
                <p style="margin-top: 1%">Προσωπικά Στοιχεία</p>
            </div>

            <div class="container marketing">
                <form role="form" action="userProfile.php" method="post" enctype="multipart/form-data">
                    <div class="form-group" id="personal-info">

                        <label></label>

                        <div class="form-group" id="name">
                            <label for="inputName">Όνομα</label>
                            <input type="text" name="inputName" class="form-control" id="inputname"
                                   value=<?php echo $user->name ?>>
                        </div>
                        <div class="form-group" id="surname">
                            <label for="inputΣθρναμε">Επίθετο</label>
                            <input type="text" name="inputSurname" class="form-control" id="inputsurname"
                                   value=<?php echo $user->surname ?>>
                        </div>
                        <div class="form-group" id="dateofbirth">
                            <label for="inputdate">Ημερομηνία Γέννησης</label>
                            <input type="date" name="birthDate" class="form-control" id="inputdate"
                                   value=<?php echo $user->birthDate; ?>>
                        </div>
                        <div class="form-group" id="email">
                            <label for="inputdate">Ηλεκτρονική Διεύθυνση</label>
                            <input type="email" name="email" class="form-control" id="inputemail"
                                   placeholder=<?php echo $user->email ?> disabled>
                        </div>
                    </div>

                    <div class="form-group" id="companyinfo">
                        <label>Στοιχεία Εταιρείας</label>

                        <div class="form-group" id="companyname">
                            <input type="text" name="companyName" class="form-control" id="inputcompanyname"
                                   value=<?php echo $user->companyName ?>>
                        </div>
                    </div>

                    <div class="form-group" id="options">
                        <div class="form-group" id="newsletter">
                            <label for="input-newsletter">Ενημερωτικό Δελτίο</label>
                            <input type="checkbox" name="newsletter"
                                   id="input-newsletter" <?php if ($user->newsLetter == 1) {
                                echo "checked";
                            } ?> >
                        </div>
                    </div>

                    <div class="form-group" id="user_name">
                        <label for="inputUsername">Username</label>
                        <input type="text" name="username" class="form-control" id="user_name"
                               placeholder=<?php echo $user->username ?>
                               disabled>
                    </div>

                    <div class="form-group" id="password">
                        <label for="input-confirm-pswd">Τρέχων Κωδικός</label>
                        <input type="password" name="oldPassword" class="form-control" id="input-confirm-pswd">

                        <label for="input-pswd">Νέος Κωδικός Πρόσβασης</label>
                        <input type="password" name="newPassword" class="form-control" id="input-pswd">

                        <label for="input-confirm-pswd">Επιβεβαίωση Νέου Κωδικού</label>
                        <input type="password" name="confirmNewPassword" class="form-control" id="input-confirm-pswd">
                    </div>
                    <div class="form-group" id="file">
                        <label for="input-photo">Φωτογραφία προφίλ</label>
                        <input type="file" name="image" id="image"/>

                    </div>


                    <button type="submit" name="save" class="btn btn-primary">Αποθήκευση</button>
                </form>
            </div>


            <br>


        </div>


        <br><br><br><br><br>
    </div>

</div>

</div>

<?php
/*
include('includes/header.php');
include('includes/navbar.php');
include('RegisterConnectToDB.php');

$search_result = $_SESSION['username'];
$user = getSuperUserFromDatabase($search_result, $link);

if ($user->newsLetter == 1) {
    $newsletterValue = "checked";
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save'])) {

    $filledVariablesState = 0;//oi metavlites exoun times
    $state = 0;// otan ola einai ok
    $errorMessage = "none";
    $fileState = 0;// 0 otan den kanoume upload nea photo
    $name = mysqli_real_escape_string($link, $_POST['inputName']);
    $surname = mysqli_real_escape_string($link, $_POST['inputSurname']);
    $birthDate = mysqli_real_escape_string($link, $_POST['birthDate']);
    //$eMail = mysqli_real_escape_string($link, $_POST['email']);
    $companyName = mysqli_real_escape_string($link, $_POST['companyName']);
    $newsletter = mysqli_real_escape_string($link, $_POST['newsletter']);
    // $username = mysqli_real_escape_string($link, $_POST['username']);
    $oldPassword = mysqli_real_escape_string($link, $_POST['oldPassword']);
    $newPassword = mysqli_real_escape_string($link, $_POST['newPassword']);
    $confirmNewPassword = mysqli_real_escape_string($link, $_POST['confirmNewPassword']);
    $file = $_FILES['image']['tmp_name'];

    if (empty($file)) {

    } else {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        $fileState = 1;
    }

    if (isset($oldPassword)) {
        if (md5($oldPassword) == $user->password) {
            if ((isset($newPassword)) && (isset($confirmNewPassword))) {
                if ($newPassword == $confirmNewPassword) {
                    $state = 3;
                } else {
                    $state = 2;
                    $errorMessage = "newPasswordMismatch";
                }
            }
        } else {
            $state = 1;
            $errorMessage = "oldPasswordMismatch";
        }
    } else {
        $state = 0;
    }

    if (empty($name) || empty($surname) || (empty($birthDate)) || empty($companyName)) {
        $filledVariablesState = 1;
    }

    if (empty($newsletter)) {
        settype($newsletter, "integer");
        $newsletter = 0;
    } else {
        settype($newsletter, "integer");
        $newsletter = 1;
    }

    if ($filledVariablesState == 0) {
        if ($fileState == 1) {/// exei anevasei nea photo
            if ($state == 0) {// den  iparxei neos kwdikos
                updateUserOnDatabase($user->code, $name, $surname, $birthDate, $user->email, $companyName, $newsletter, $user->password, $user->username, $user->gender, $link, $image);
            } else if ($state == 3) {/// iparxei neos kwdikos
                updateUserOnDatabase($user->code, $name, $surname, $birthDate, $user->email, $companyName, $newsletter, md5($newPassword), $user->username, $user->gender, $link, $image);
            } else if ($state == 2) {// new password mismatch
                showAlertDialog("Οι νέοι κωδικοί δεν ταιριάζουν μεταξύ τους");
            } else if ($state == 1) {// old password mismatch
                showAlertDialog("Εσφαλμένος παλιός κωδικός");
            }

        } else {//oxi nea photo
            if ($state == 0) {// den  iparxei neos kwdikos
                updateUserOnDatabase($user->code, $name, $surname, $birthDate, $user->email, $companyName, $newsletter, $user->password, $user->username, $user->gender, $link, $user->image);
            } else if ($state == 3) {/// iparxei neos kwdikos
                updateUserOnDatabase($user->code, $name, $surname, $birthDate, $user->email, $companyName, $newsletter, md5($newPassword), $user->username, $user->gender, $link, $user->image);
            } else if ($state == 2) {// new password mismatch
                showAlertDialog("Οι νέοι κωδικοί δεν ταιριάζουν μεταξύ τους");
            } else if ($state == 1) {// old password mismatch
                showAlertDialog("Εσφαλμένος παλιός κωδικός");
            }
        }
    } else {
        showAlertDialog("Συμπλήρωσε όλα τα παιδία κατάλληλα");
    }


}*/

?>
<br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br>

<?php
include('includes/footer.php');
?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../js/ie10-viewport-bug-workaround.js"></script>

<!-- jssor slider scripts-->
<!-- use jssor.js + jssor.slider.js instead for development -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
<script type="text/javascript" src="../js/jssor.slider.mini.js"></script>

</body>
</html>