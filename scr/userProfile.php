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

    //include('includes/header.php');
     session_start();
    include ('includes/headerProfile.php');
    include('includes/navbar.php');
    global $link;
    include('RegisterConnectToDB.php');

    $search_result = $_SESSION['username'];
    $user = getSuperUserFromDatabase($search_result, $link);

    if ($user->newsLetter == 1) {
        $newsletterValue = "checked";
    }


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['saveInfo'])) {

            $name = mysqli_real_escape_string($link, $_POST['inputName']);
            $surname = mysqli_real_escape_string($link, $_POST['inputSurname']);
            $companyName = mysqli_real_escape_string($link, $_POST['companyName']);
            $newsletter = mysqli_real_escape_string($link, $_POST['newsletter']);

            if (empty($newsletter)) {
                settype($newsletter, "integer");
                $newsletter = 0;
            } else {
                settype($newsletter, "integer");
                $newsletter = 1;
            }

            if (empty($name) || empty($surname) || empty($companyName)) {
                showAlertDialog("Συμπλήρωσε όλα τα πεδία κωδικών");
            } else {

                $response = updateInfo($name, $surname, $companyName, $newsletter, $user->username, $link);

                if ($response) {
                 //   ob_clean();
                    header("Refresh:0");
                  //  header("Location: index.php");
                    exit;
                    //ob_start();

                }
              /*  print '<script type="text/javascript">';
                print 'location.reload(); ';
                print '</script>';*/
            }


        } else if (isset($_POST['savePhoto'])) {

            $file = $_FILES['image']['tmp_name'];

            if (!empty($file)) {
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $image_name = addslashes($_FILES['image']['name']);
                $image_size = getimagesize($_FILES['image']['tmp_name']);
            }

            if ($image_size == FALSE) {

            } else {
                $responsePhoto =  updatePhoto($image, $user->username, $link);

                if ($responsePhoto) {
                    //   ob_clean();
                    header("Refresh:0");
                    //  header("Location: index.php");
                    exit;
                    //ob_start();

                }
            }


        } else if (isset($_POST['savePassword'])) {

            $oldPassword = mysqli_real_escape_string($link, $_POST['oldPassword']);
            $newPassword = mysqli_real_escape_string($link, $_POST['newPassword']);
            $confirmNewPassword = mysqli_real_escape_string($link, $_POST['confirmNewPassword']);

            if (isset($oldPassword) && isset($newPassword) && isset($confirmNewPassword)) {

                if (md5($oldPassword) == $user->password) {

                    if ($newPassword == $confirmNewPassword) {
                      $responsePassword =  updatePassword(md5($newPassword), $user->username, $link);


                        if ($responsePassword) {
                            //   ob_clean();
                            header("Refresh:0");
                            //  header("Location: index.php");
                            exit;
                            //ob_start();

                        }
                    } else {
                        showAlertDialog("Οι νέοι κωδικοί δεν ταιρίαζουν προσπάθησε ξανά");
                    }
                } else {
                    showAlertDialog("Λάθος παλιός κωδικός");
                }
            } else {
                showAlertDialog("Συμπλήρωσε όλα τα πεδία κωδικών");
            }
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
            <?php
                include_once "ArizFunctions.php";
                display_user_bid_history($user->username,$link);
            ?>

            <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br>
        </div>


        <div class="container marketing shadowStyle" id="user_ratings">
            <div class="col-xs-4 main_profile_title shadowStyle2">
                <p>Βαθμολογια</p>
            </div>
            <div class="user_container">
                <p>Η Βαθμολογίας σας είναι:</p>

                <br>

                <p style="text-align: center">
                    <?php
                    $user_id = returnUserIDGivenName($user->username,$link);
                    echo select_user_avg_rating($user_id,$link);
                    ?><br>
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span> <br> <br>από <?php
                        echo select_count_of_user_ratings($user_id,$link);
                    ?> εγγεγραμένους
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
                <form role="form" action="#" method="post" enctype="multipart/form-data">
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

                    <div class="form-group" id="email">
                        <label for="inputdate">Ηλεκτρονική Διεύθυνση</label>
                        <input type="email" name="email" class="form-control" id="inputemail"
                               placeholder=<?php echo $user->email ?> disabled>
                    </div>
                    <button type="submit" name="saveInfo" class="btn btn-primary">Αποθήκευση</button>
                </form>
            </div>
            <br>
        </div>

    </div>


    <div class="row">
        <div class="container marketing shadowStyle" id="user_photo">
            <div class="col-xs-4 main_profile_title shadowStyle2">
                <p>Αλλαγή φωτογραφίας</p>
            </div>
            <br><br>

            <div class="user_container">

                <div class="form-group" id="password">
                    <form action="userProfile.php" method="post" enctype="multipart/form-data">
                        <div class="form-group" id="file">
                            <label for="input-photo">Φωτογραφία προφίλ</label>
                            <input type="file" name="image" id="image"/>
                            <br>
                            <button type="submit" name="savePhoto" class="btn btn-primary">Αποθήκευση</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="container marketing shadowStyle" id="user_password">
            <div class="col-xs-4 main_profile_title shadowStyle2">
                <p>Αλλαγή κωδικού</p>
            </div>
            <br><br>

            <div class="user_container">

                <div class="form-group" id="password">
                    <form action="userProfile.php" method="post" enctype="multipart/form-data">
                        <label for="input-confirm-pswd">Τρέχων Κωδικός</label>
                        <input type="password" name="oldPassword" class="form-control" id="input-confirm-pswd">

                        <label for="input-pswd">Νέος Κωδικός Πρόσβασης</label>
                        <input type="password" name="newPassword" class="form-control" id="input-pswd">

                        <label for="input-confirm-pswd">Επιβεβαίωση Νέου Κωδικού</label>
                        <input type="password" name="confirmNewPassword" class="form-control" id="input-confirm-pswd">
                        <br>
                        <button type="submit" name="savePassword" class="btn btn-primary">Αποθήκευση</button>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>

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