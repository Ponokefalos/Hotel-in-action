<?php
/**
 * Created by PhpStorm.
 * User: Kir
 * Date: 12/6/2015
 * Time: 8:03 μμ
 */
include('includes/navbar.php');
include('includes/header.php');
include('KyrFunctions.php');
include('ArizFunctions.php');
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"
                type="text/javascript"></script>
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
    <?php
    $id = htmlspecialchars($_GET["id"]);
    $auction = get_auction_by_id($link, $id);
    $userId = $auction['userID'];
    ?>

    <!-- =============================================PERIEXOMENO SELIDAS ================================================-->

    <div id="conteinerMarketing" class="container marketing shadowStyle"><!-- BG COLOR-->


        <div class="head_title">
            <p>

            <h3><i>Τροποίηση Δημοπρασίας</i></h3></p>
            <hr class="featurette-divider">
        </div>


        <p class="infoTxt"> Καλώς ήρθατε στην φόρμα τροποίησης ξενοδοχείων. Παρακαλούμε συμπληρώστε τα παρακάτω πεδία με
            τις
            απαραίτητες πληροφορίες
            για να αλλάξετε την εμφάνηση της ξενοδοχειακής σας μονάδας στην σελίδα μας</p>

        <br><br><br>

        <div class="container marketing">
            <div class="head_title">
                <p><h4><i>Φορμα τροποίησης</i></h4></p>
                <hr class="featurette-divider">
            </div>


            <div class="row">
                <div class="col-xs-12" id="auctionFormLabels">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <p for="auctionHotelName" id="auctionHotelName" class="col-xs-2 control-label">Όνομα
                                Ξενοδοχείου </p>
                            <?php
                            $hotels = get_hotels($link);
                            ?>
                            <div class="col-sm-4">
                                <select class="form-control" name="auction_hotel_name">
                                    <?php
                                    while ($row = mysqli_fetch_array($hotels)) {
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
                                       value="<?php echo $auction['Description'] ?>" placeholder="Περιγραφή">
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionHotelRooms" class="col-xs-2 control-label">Αριθμός Δωματίων </p>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="auctionHotelRooms" name="rooms_number"
                                       value="<?php echo $auction['rooms_number'] ?>" placeholder="Αριθμός Δωματίων">
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionHotelRoomType" class="col-xs-2 control-label">Τύπος Δωματίου</p>

                            <div class="col-sm-4">
                                <select class="form-control" name="room_type">
                                    <option <?php if ($auction['room_type'] == 'Δίκλινο') {
                                        echo "selected";
                                    } ?> >Δίκλινο
                                    </option>
                                    <option <?php if ($auction['room_type'] == 'Τρίκλινο') {
                                        echo "selected";
                                    } ?> >Τρίκλινο
                                    </option>
                                    <option <?php if ($auction['room_type'] == 'Τετρακλινο') {
                                        echo "selected";
                                    } ?>>Τετρακλινο
                                    </option>
                                    <option <?php if ($auction['room_type'] == 'Διαμέρισμα') {
                                        echo "selected";
                                    } ?>>Διαμέρισμα
                                    </option>
                                    <option <?php if ($auction['room_type'] == 'Studio') {
                                        echo "selected";
                                    } ?>>Studio
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionRoomCheckIn" class="col-xs-2 control-label">Ημ/νια Άφιξης </p>

                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="checkin_date" id="auctionRoomCheckIn"
                                       value="<?php echo $auction['checkin_date'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionRoomCheckIn" class="col-xs-2 control-label">Ημ/νια Αναχώρησης </p>

                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="checkout_date" id="auctionRoomCheckOut"
                                       value="<?php echo $auction['checkout_date'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionHotelStartPrice" class="col-xs-2 control-label">Τιμή Εκκίνησης </p>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="starting_price"
                                       id="auctionHotelStartPrice" value="<?php echo $auction['starting_price'] ?>"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionHotelLessPrice" class="col-xs-2 control-label">Ελάχιστη Τιμή </p>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="min_price" id="auctionHotelLessPrice"
                                       value="<?php echo $auction['min_price'] ?> " placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionHotelLessPrice" class="col-xs-2 control-label">Ενεργεί Εξαγορά </p>

                            <div class="col-sm-offset-1 col-sm-1 ">
                                <div class="checkbox">
                                    <input type="checkbox" <?php if ($auction['buy_out_box'] == 1) {
                                        echo "checked";
                                    } ?> name="buy_out_box">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionHotelByOutPrice" class="col-xs-2 control-label">Τιμή Εξαγοράς </p>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="buy_out_price" id="auctionHotelByOutPrice"
                                       value="<?php echo $auction['buy_out_price'] ?> " placeholder="">
                            </div>
                        </div>


                        <div class="form-group">
                            <p for="auctionHotelStarts" class="col-xs-2 control-label">Ημ/νια Εκκίνησης </p>

                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="starting_date" id="auctionHotelStarts"
                                       value="<?php echo $auction['starting_date'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="auctionHotelEnds" class="col-xs-2 control-label">Ημ/νια Λήξης </p>

                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="finishing_date" id="auctionHotelEnds"
                                       value="<?php echo $auction['finishing_date'] ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <p for="hotelPhotosInput">Φωτογραφία</p>

                            <div class="col-sm-4">
                                <input type="file" name="image" id="hotelPhotosInput">
                                <?php
                                echo '<img src="data:image;base64,' . base64_encode($auction['auction_file']) . '" width=50 height=50/>';
                                ?>
                                <div class="container" id="userImage">

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" name="newAuction">Εισαγωγή</button>
                                <button align="right" style="margin-left: 2%" type="submit" name="adminDeleteAuction"
                                        class="btn btn-danger">Διαγραφή Δημοπρασίας
                                </button>
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

    <?php include "includes/footer.php"; ?>


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
    $file = $_FILES['image']['tmp_name'];

    if (empty($file)) {
        // $errorState = 1;
        $image = 1;
    } else {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
    }

    if (empty($buy_out_box)) {
        settype($buy_out_box, "integer");
        $buy_out_box = 0;
    } else {
        settype($buy_out_box, "integer");
        $buy_out_box = 1;
    }


    if (empty($auction_hotel_name) || empty($description) || empty($rooms_number) || empty($room_type) || empty($checkin_date) ||
        empty($checkout_date) || empty($starting_price) || empty($min_price)  || empty($buy_out_price) ||
        empty($starting_date) || empty($finishing_date)
    ) {
        $errorState = 1;
    }


    if ($errorState == 0) {


        updateAuction($auction_hotel_name, $description, $rooms_number, $room_type, $checkin_date, $checkout_date, $starting_price, $min_price, $buy_out_box, $buy_out_price, $starting_date, $finishing_date,$image, $link, $id);


        echo '<script > document.location = "adminViewAuctions.php" </script>';

    }else{
        showAlertDialog("ffff");
    }

}else if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['adminDeleteAuction'])) {
    include_once('ArizFunctions.php');
    delete_auction_from_id($id, $link);
    echo '<script > document.location = "admin.php" </script>';
}



?>