<?php
/**
 * Created by PhpStorm.
 * User: Kir
 * Date: 12/6/2015
 * Time: 9:49 πμ
 */


?>


<?php
include('includes/header.php');
include('includes/navbar.php');
include('RegisterConnectToDB.php');
include('KyrFunctions.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Νέα Δημοπρασία</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">

    <link href="../css/newAuctionFormStyle.css" rel="stylesheet">

    <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">


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


<br>


<!-- =============================================PERIEXOMENO SELIDAS ================================================-->

<div id="conteinerMarketing" class="container marketing shadowStyle"><!-- BG COLOR-->


    <div class="head_title">
        <p>

        <h3><i>Προσθήκη Δημοπρασίας</i></h3></p>
        <hr class="featurette-divider">
    </div>


    <p class="infoTxt"> Καλώς ήρθατε στην φόρμα συμπλήρωσης ξενοδείων. Παρακαλούμε συμπληρώστε τα παρακάτω πεδία με
        τις
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
                <form class="form-horizontal" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <p for="hotelName" class="col-xs-2 control-label">Όνομα Χρήστη </p>
                        <?php
                        $query = "select username from users WHERE code=2";
                        $result = mysqli_query($link, $query) or die(mysqli_error($link));

                        ?>
                        <div class="col-sm-4 col-xs-4">
                            <select class="form-control" name="admin_hotel_username">
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    print '<option>' . $row['username'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>




                    <div class="form-group">
                        <p for="auctionHotelName" id="auctionHotelName" class="col-xs-2 control-label">Όνομα
                            Ξενοδοχείου </p>
                        <?php

                        $query = "SELECT HotelName FROM hotels WHERE user_id= '$currentUser'";
                        $result = mysqli_query($link, $query);
                        ?>
                        <div class="col-sm-4">
                            <select class="form-control" name="auction_hotel_name">
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    print' <option name="auction_hotel_name">' . $row['HotelName'] . '</option>';
                                }
                                ?>
                            </select>


                        </div>

                    </div>


                    <div class="form-group">
                        <p for="auctionLongDescription" class="col-xs-2 control-label">Περιγραφή </p>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="auctionLongDescription" name="description"
                                   placeholder="Περιγραφή">
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionHotelRooms" class="col-xs-2 control-label">Αριθμός Δωματίων </p>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="auctionHotelRooms" name="rooms_number"
                                   placeholder="Αριθμός Δωματίων">
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionHotelRoomType" class="col-xs-2 control-label">Τύπος Δωματίου</p>

                        <div class="col-sm-4">
                            <select class="form-control" name="room_type">
                                <option>Δίκλινο</option>
                                <option>Τρίκλινο</option>
                                <option>Τετρακλινο</option>
                                <option>Διαμέρισμα</option>
                                <option>Studio</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionRoomCheckIn" class="col-xs-2 control-label">Ημ/νια Άφιξης </p>

                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="checkin_date" id="auctionRoomCheckIn">
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionRoomCheckIn" class="col-xs-2 control-label">Ημ/νια Αναχώρησης </p>

                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="checkout_date" id="auctionRoomCheckOut">
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionHotelStartPrice" class="col-xs-2 control-label">Τιμή Εκκίνησης </p>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="starting_price" id="auctionHotelStartPrice"
                                   placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionHotelLessPrice" class="col-xs-2 control-label">Ελάχιστη Τιμή </p>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="min_price" id="auctionHotelLessPrice"
                                   placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionHotelLessPrice" class="col-xs-2 control-label">Ενεργεί Εξαγορά </p>

                        <div class="col-sm-offset-1 col-sm-1 ">
                            <div class="checkbox">
                                <input type="checkbox" name="buy_out_box">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionHotelByOutPrice" class="col-xs-2 control-label">Τιμή Εξαγοράς </p>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="buy_out_price" id="auctionHotelByOutPrice"
                                   placeholder="">
                        </div>
                    </div>


                    <div class="form-group">
                        <p for="auctionHotelStarts" class="col-xs-2 control-label">Ημ/νια Εκκίνησης </p>

                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="starting_date" id="auctionHotelStarts">
                        </div>
                    </div>

                    <div class="form-group">
                        <p for="auctionHotelEnds" class="col-xs-2 control-label">Ημ/νια Λήξης </p>

                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="finishing_date" id="auctionHotelEnds">
                        </div>
                    </div>


                    <div class="form-group">
                        <p for="hotelPhotosInput">Φωτογραφία</p>

                        <div class="col-sm-4">
                            <input type="file" name="image" id="hotelPhotosInput">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="newAuction">Εισαγωγή</button>
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

<?php include "includes/footer.php";?>


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

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['newAuction'])) {
    $errorState = 0;
    $auction_status='Ενεργεί';

    $auction_hotel_name = mysqli_real_escape_string($link, $_POST['auction_hotel_name']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $rooms_number = mysqli_real_escape_string($link, $_POST['rooms_number']);
    $room_type = mysqli_real_escape_string($link, $_POST['room_type']);
    $checkin_date = mysqli_real_escape_string($link, $_POST['checkin_date']);
    $checkout_date = mysqli_real_escape_string($link, $_POST['checkout_date']);
    $starting_price = mysqli_real_escape_string($link, $_POST['starting_price']);
    $min_price = mysqli_real_escape_string($link, $_POST['min_price']);
    $buy_out_box = mysqli_real_escape_string($link, $_POST['buy_out_box']);
    $buy_out_price = mysqli_real_escape_string($link, $_POST['buy_out_price']);
    $starting_date = mysqli_real_escape_string($link, $_POST['starting_date']);
    $finishing_date = mysqli_real_escape_string($link, $_POST['finishing_date']);
    $file = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : '';

    if (empty($file)) {
        $errorState = 1;
    } else {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
    }

    if (empty($image)) {
        $errorState = 1;
    }
    if ($image_size == FALSE) {
        $errorState = 2;
    }

    if (empty($auction_hotel_name) || empty($description) || empty($rooms_number) || empty($room_type) || empty($checkin_date) ||
        empty($checkout_date) || empty($starting_price) || empty($min_price) || empty($buy_out_box) || empty($buy_out_price) ||
        empty($starting_date) || empty($finishing_date)){
        $errorState=1;
    }



    if (empty($buy_out_box)) {
        settype($buy_out_box, "integer");
        $buy_out_box = 0;
    } else {
        settype($buy_out_box, "integer");
        $buy_out_box = 1;
    }

    if ($errorState == 0) {
        //to $currentUser to pernoume apo panw me ta selections des line: 98
        saveNewAuctionInDatabase($auction_hotel_name, $description, $rooms_number, $room_type, $checkin_date, $checkout_date, $starting_price, $min_price, $buy_out_box, $buy_out_price, $starting_date, $finishing_date, $image, $currentUser,$link);
        showAlertDialog("Επιτυχής εγγραφή");
    } elseif ($errorState == 1) {
        showAlertDialog("Παρακαλώ συμπληρώστε κατάλληλα όλα τα πεδία.");
    }elseif ($errorState == 2) {
        showAlertDialog("Το αρχείο που εισάγατε δεν είναι εικόνα.");
    }


}





?>
