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


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" type="text/css" href="mainstyle.css">
    <![endif]-->


    <script type="text/javascript">
        function colorChange() {
            var bgColor = prompt("Enter hex color", "");
            document.body.style.backgroundColor = bgColor;
        }
    </script>

</head>

<body style="background-color:#D7D7D7">


<!--  ---------------------------------------------------------- NAV BAR OLD ----------------------------
   <div class="navbar-wrapper" style="margin-left: 450px;">
       <div class="container" id="nav"  style="margin-top: 15px; width: auto">
           <ul  class="nav navbar-nav">
               <li><a href="index.html">Αρχική</a></li>
               <li><a href="hotel.html">Ξενοδοχεία</a></li>
               <li><a href="auction.html">Δημοπρασίες</a></li>
               <li><a href="about.html">Σχετικά με Εμάς</a></li>
               <li><a href="contact.html">Επικοινωνία</a></li>
           </ul>
       </div>
   </div>
</div>
<!--====================================================================================================================================-->

<!------------------------------------------------------ HEADER  --------------------------------------------------------------------------- -->
<div class="container" style="margin-top: 10px;" id="headerWithoutNavBar">
    <div style="float: right;">
        <form class="form-inline">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
            <button type="button" class="btn btn-primary">Sign in</button>
            <button type="button" class="btn btn-primary">Register</button>
        </form>
    </div>
    <div id="photoContainer">
        <img class="logoImage">
    </div>
</div>
<!--====================================================================================================================================-->

<!------------------------------------------------ CURRENT NAVBAR-------------------------------------------------------------------------------------->
<div class="navbar-wrapper" style="margin-left: 450px;">
    <div class="container" id="nav">
        <nav id="navtag" role="navigation" style=" margin-top: 50px;">
            <!-- class="navbar navbar-inverse navbar-static-top" -->
            <div class="container" style="width: auto;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--
                    <a class="navbar-brand" href="http://www.jssor.com/index.html">Bootstrap Carousel</a>
                         -->
                </div>
                <div id="navbar"> <!-- class="navbar-collapse collapse" -->
                    <ul class="nav navbar-nav"> <!---->
                        <li><a href="index.php">Αρχική</a></li>
                        <li><a href="hotel.php">Ξενοδοχεία</a></li>
                        <li><a href="auction.php">Δημοπρασίες</a></li>
                        <li><a href="about.php">Σχετικά με Εμάς</a></li>
                        <li><a href="contact.php">Επικοινωνία</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--====================================================================================================================================-->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<br>

<div id="conteinerMarketing" class="container marketing"><!-- BG COLOR-->
    <!--<hr class="featurette-divider"> -->


    <!-- Main Container body
  ============================================================================================= -->
    <!-------------------------- -->
    <div class="head_title">

        <p>

        <h2><i> Εγγραφή </i></h2></p>
        <hr class="featurette-divider">
    </div>
    <!-- =============================================PERIEXOMENO SELIDAS ================================================-->

    <div class="container marketing">
        <form role="form" action="registers.php" method="post" enctype="multipart/form-data">
            <div class="form-group" id="personal-info">
                <label>Προσωπικά Στοιχεία</label>

                <div class="form-group" id="sex">
                    <label>Φύλο</label>
                    <label class="radio-inline">
                        <input type="radio" name="sexMale" id="male" value="1"> Άρρεν
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sexFemale" id="female" value="1"> Θύλη
                    </label>
                </div>
                <div class="form-group" id="name">
                    <input type="text" name="inputName" class="form-control" id="inputname" placeholder="Όνομα">
                </div>
                <div class="form-group" id="surname">
                    <input type="text" name="inputSurname" class="form-control" id="inputsurname" placeholder="Επίθετο">
                </div>
                <div class="form-group" id="dateofbirth">
                    <label for="inputdate">Ημερομηνία Γέννησης</label>
                    <input type="date" name="birthDate" class="form-control" id="inputdate">
                </div>
                <div class="form-group" id="email">
                    <label for="inputdate">Ηλεκτρονική Διεύθυνση</label>
                    <input type="email" name="email" class="form-control" id="inputemail"
                           placeholder="Ηλεκτρονική Διεύθυνση">
                </div>
            </div>

            <div class="form-group" id="companyinfo">
                <label>Στοιχεία Εταιρείας</label>

                <div class="form-group" id="companyname">
                    <input type="text" name="companyName" class="form-control" id="inputcompanyname"
                           placeholder="Επωνυμία Εταιρείας">
                </div>
            </div>

            <div class="form-group" id="options">
                <div class="form-group" id="newsletter">
                    <label for="input-newsletter">Ενημερωτικό Δελτίο</label>
                    <input type="checkbox" name="newsletter" id="input-newsletter">
                </div>
            </div>

            <div class="form-group" id="user_name">
                <label for="inputUsername">Username</label>
                <input type="text" name="username" class="form-control" id="user_name" placeholder="Username">
            </div>

            <div class="form-group" id="password">
                <label for="input-pswd">Κωδικός Πρόσβασης</label>
                <input type="password" name="password" class="form-control" id="input-pswd">

                <label for="input-confirm-pswd">Επιβεβαίωση Κωδικού</label>
                <input type="password" name="confirmPassword" class="form-control" id="input-confirm-pswd">
            </div>
            <div class="form-group" id="file">
                <label for="input-photo">Φωτογραφία προφίλ</label>
                <input type="file" name="image" id="image"/>

            </div>


            <div class="form-group" id="extra">
                <div class="form-group" id="hoteladmin">
                    <label for="input-hotel-admin">Είστε Διαχειριστής κάποιου Ξενοδοχείου:</label>
                    <input type="checkbox" name="hotelAdmin" id="input-hotel-admin">
                </div>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Εγγραφή</button>
        </form>
    </div>


    <br><br><br><br><br>


</div>
<!-- /.container -->

<br><br>

<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>

    <p>&copy; Your Hotel In Action 2015. &middot; <a href="#">Privacy</a> &middot; </p>
    <button type="button" class="btn btn-warning" onclick="colorChange()">Bg Changer</button>
    <button type="button" class="btn btn-warning" onclick="colorChange()">Conteiner Changer</button>
</footer>

</body>
</html>
<?php
//session_start();
include("RegisterConnectToDB.php");
include("Functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {

    $errorState = 0;
    $femaleSex = 0;
    $maleSex = 0;

    $maleSex = mysqli_real_escape_string($link, $_POST['sexMale']);
    $femaleSex = mysqli_real_escape_string($link, $_POST['sexFemale']);
    $name = mysqli_real_escape_string($link, $_POST['inputName']);
    $surname = mysqli_real_escape_string($link, $_POST['inputSurname']);
    $birthDate = mysqli_real_escape_string($link, $_POST['birthDate']);
    $eMail = mysqli_real_escape_string($link, $_POST['email']);
    $companyName = mysqli_real_escape_string($link, $_POST['companyName']);
    $newsletter = mysqli_real_escape_string($link, $_POST['newsletter']);
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($link, $_POST['confirmPassword']);
    $hotelAdmin = mysqli_real_escape_string($link, $_POST['hotelAdmin']);
    $file = $_FILES['image']['tmp_name'];

    if (empty($file)) {
        $errorState = 1;
    } else {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
    }


    if (empty($name) || empty($surname) || (empty($birthDate)) || empty($eMail) || empty($companyName) || empty($username) || empty($password) || empty($confirmPassword)) {
        $errorState = 1;
    }

    if (empty($image)) {
        $errorState = 1;
    }

    $gender = 0;

    if ((empty($maleSex) && empty($femaleSex)) || ($maleSex == 1 && $femaleSex == 1)) {
        $errorState = 1;
    } else if ($maleSex == 1) {
        $gender = 0;
    } else {
        $gender = 1;
    }

    if (empty($newsletter)) {
        settype($newsletter, "integer");
        $newsletter = 0;
    } else {
        settype($newsletter, "integer");
        $newsletter = 1;
    }

    if (empty($hotelAdmin)) {
        settype($hotelAdmin, "integer");
        $hotelAdmin = 0;
    } else {
        settype($hotelAdmin, "integer");
        $hotelAdmin = 1;
    }

    if ($password != $confirmPassword) {
        $errorState = 1;
    }

    if (checkIfUserNameExists($username, $link)) {
        $errorState = 2;
    }


    if ($image_size == FALSE) {
        $errorState = 3;
    }
    if ($errorState == 0) {
        $userCode = returnUserCode($hotelAdmin);
        $password = md5($password);
        saveNewUserOnDatabase($userCode, $name, $surname, $birthDate, $eMail, $companyName, $newsletter, $password, $username, $gender, $link,$image);
        header("Location: index.php");
        exit();
    } else if ($errorState == 1) {
        showAlertDialog("Παρακαλώ συμπληρώστε κατάλληλα όλα τα πεδία.");
    } else if ($errorState == 2) {
        showAlertDialog("To username υπάρχει. Δοκιμάστε διαφορετικό username.");
    } else if ($errorState == 3) {
        showAlertDialog("Το αρχείο που επιλέξατε δεν είναι εικόνα. Παρακαλώ επιλέξτε μια εικόνα");
    }
}
?>


