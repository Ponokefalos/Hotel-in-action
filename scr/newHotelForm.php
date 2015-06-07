<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Νέο Ξενοδοχείο</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/HotelFirstPage.css">

    <!-- ---------------------------------BETA ---------------------------------------------------- -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="path/to/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="path/to/js/fileinput.min.js" type="text/javascript"></script>
    <!-- bootstrap.js below is only needed if you wish to use the feature of viewing details
         of text file preview via modal dialog -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- --------------------------------- ---------------------------------------------------- -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->


    <script type="text/javascript">
        function colorChange() {
            var bgColor = prompt("Enter hex color", "");
            document.body.style.backgroundColor = bgColor;
        }
    </script>

</head>

<body style="background-color:#D7D7D7">


<?php
include('includes/header.php');
include('includes/navbar.php');
?>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<br>

<div id="conteinerMarketing" class="container marketing shadowStyle"><!-- BG COLOR-->
    <!--<hr class="featurette-divider"> -->


    <!-- Main Container body
  ============================================================================================= -->
    <!-------------------------- -->
    <div class="head_title">
        <p>

        <h3><i>Προσθήκη Ξενοδχείου</i></h3></p>
        <hr class="featurette-divider">
    </div>
    <!-- =============================================PERIEXOMENO SELIDAS ================================================-->

    <p class="infoTxt"> Καλώς ήρθατε στην φόρμα συμπλήρωσης ξενοδείων. Παρακαλούμε συμπληρώστε τα παρακάτω πεδία με τις
        απαραίτητες πληροφορίες
        για να καταχωρηθεί η ξενοδοχειακή σας μονάδα στην σελίδα μας</p>

    <br><br><br>

    <div class="container marketing">
        <div class="head_title">
            <p><h4><i>Φορμα Εγγραφής</i></h4></p>
            <hr class="featurette-divider">
        </div>


        <div class="row">
            <div class="col-xs-12" id="auctionFormLabels">
                <form class="form-horizontal" method="post">

                    <div class="form-group">
                        <p for="hotelName" class="col-xs-2 control-label">Όνομα Ξενοδοχείου </p>

                        <div class="col-sm-4 col-xs-4">
                            <input type="text" class="form-control" name="hotelName" id="hotelName" placeholder="Όνομα">
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="hotelName" class="col-xs-2 control-label">Μικρή Περιγραφή </p>

                        <div class="col-sm-4">
                            <textarea name="shortDesc" class="form-control user_input" id="hotelShortDescriptionTxt"
                                      rows="3"
                                      placeholder="Μικρή Περιγραφή"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="hotelName" class="col-xs-2 control-label">Περιγραφή </p>

                        <div class="col-sm-4">
                            <textarea name="longDesc" class="form-control user_input" id="hotelLongDescriptionTxt"
                                      rows="3"
                                      placeholder=" Περιγραφή"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="hotelPhotosInput">Φωτογραφία</p>

                        <div class="col-sm-4">
                            <input type="file" id="hotelPhotosInput">
                        </div>
                    </div>

                    <div class="form-group" id="mapLocation">

                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="newHotel" class="btn btn-primary">Εισαγωγή</button>
                        </div>
                    </div>

                </form>
            </div>


        </div>
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


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>

<?php

include("RegisterConnectToDB.php");
include("Functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['newHotel'])) {
    $errorState = 0;


    $hotelName = mysqli_real_escape_string($link, $_POST['hotelName']);
    $shortDesc = mysqli_real_escape_string($link, $_POST['shortDesc']);
    $longDesc = mysqli_real_escape_string($link, $_POST['longDesc']);


    $date = mysqli_real_escape_string($link, $_POST[getCurrentDate()]);

    $tempUserName = $_SESSION['username'];

    $userID = returnUserIDGivenName($tempUserName, $link);

    echo $userID;


    if (empty($hotelName) || empty($shortDesc) || (empty($longDesc))) {
        $errorState = 1;

    }


    if ($errorState == 0) {

        saveNewHotelOnDatabase($hotelName, $shortDesc, $longDesc, $date, $link, $userID);

    } else if ($errorState == 1) {
        showAlertDialog("Παρακαλώ συμπληρώστε κατάλληλα όλα τα πεδία.");
    }


}
?>