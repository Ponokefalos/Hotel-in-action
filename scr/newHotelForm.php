<?php
include('includes/header.php');
include('includes/navbar.php');
include('KyrFunctions.php');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Νέο Ξενοδοχείο</title>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/navbar.css" rel="stylesheet">
        <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/HotelFirstPage.css">
        <style>
            #mapLocation {
                height: 370px;
                width: 100%;
                margin-top: 20px;
                padding: 0px
            }
        </style>
        <!---------------------------------------Google Maps Geolocation Coordinates--------------------------------->

        <script>
            var map;
            var markers = [];
            function initialize() {

                var location = new google.maps.LatLng(37.801767, 26.793818);
                var mapOptions = {
                    zoom: 10,
                    center: location,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                };
                var map = new google.maps.Map(document.getElementById('mapLocation'),
                    mapOptions);

                google.maps.event.addListener(map, 'click', function (e) {
                    /*  window.location.href="newHotelForm.php?longitude="+e.latLng.lng();*/
                    /*window.location.hash="longitude"+e.latLng.lng();*/
                    /*  window.location.search += '&longitude='+e.latLng.lng();*/


                    clearMarkers();
                    alterlotLat(e.latLng.lng(), e.latLng.lat());
                    placeMarker(e.latLng, map);


                    <?php

                    ?>


                });
            }

            //Adding a new Marker
            function placeMarker(position, map) {
                var marker = new google.maps.Marker({
                    position: position,
                    map: map
                });
                markers.push(marker);
            }
            // Sets the map on all markers in the array.
            function setAllMap(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            // Removes the markers from the map, but keeps them in the array.
            function clearMarkers() {
                setAllMap(null);
            }

            // Shows any markers currently in the array.
            function showMarkers() {
                setAllMap(map);
            }

            // Deletes all markers in the array by removing references to them.
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            function alterlotLat(lond, lat) {

                document.getElementById("londTxt").value = lond;
                document.getElementById("latTxt").value = lat;
            }

            google.maps.event.addDomListener(window, 'load', initialize);

        </script>

        <!----------------------------------------------------------------------------------------------------------------->


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

    <div id="conteinerMarketing" class="container marketing shadowStyle">
        <!-- =============================================PERIEXOMENO SELIDAS ================================================-->
        <div class="head_title">
            <p>

            <h3><i>Προσθήκη Ξενοδχείου</i></h3></p>
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
                            <p for="hotelName" class="col-xs-2 control-label">Όνομα Ξενοδοχείου </p>

                            <div class="col-sm-4 col-xs-4">
                                <input type="text" class="form-control" name="hotelName" id="hotelName"
                                       placeholder="Όνομα">
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
                            <p for="hotelName" class="col-xs-2 control-label">Ανέσεις </p>

                            <div class="row ">
                                <div class="col-xs-2">
                                    <p for="hotelName" class="col-xs-2 control-label">Κουζίνα</p>

                                    <div class="checkbox">
                                        <input type="checkbox" name="kouzinaBox">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <p for="hotelName" class="col-xs-2 control-label">Θέα</p>

                                    <div class="checkbox">
                                        <input type="checkbox" name="theaBox">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <p for="hotelName" class="col-xs-2 control-label">TV</p>

                                    <div class="checkbox">
                                        <input type="checkbox" name="tvBox">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <p for="hotelName" class="col-xs-2 control-label">WiFi</p>

                                    <div class="checkbox">
                                        <input type="checkbox" name="wifiBox">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <p for="hotelName" class="col-xs-2 control-label"></p>

                            <div class="row ">
                                <div class="col-xs-2">
                                    <p for="hotelName" class="col-xs-2 control-label">W/C</p>

                                    <div class="checkbox">
                                        <input type="checkbox" name="wcBox">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <p for="hotelName" class="col-xs-2 control-label">Parking</p>

                                    <div class="checkbox">
                                        <input type="checkbox" name="parkingBox">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <p for="hotelName" class="col-xs-2 control-label">A/C</p>

                                    <div class="checkbox">
                                        <input type="checkbox" name="acBox">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <p for="hotelName" class="col-xs-2 control-label">Pool</p>

                                    <div class="checkbox">
                                        <input type="checkbox" name="poolBox">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <p class="col-xs-6"> Παρακαλώ δώστε τον Αριθμό των Αστεριών του ξενοδοχείο σας.</p>

                            <div class="form-group">
                                <select name="stars" class="col-xs-2">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <p for="hotelPhotosInput">Φωτογραφία</p>


                            <div class="col-sm-4">
                                <input type="file" id="image" name="image">
                            </div>
                        </div>

                        <div class="form-group">
                            <p> Βαλτε το γεωγραφικό μήκος και πλάτος του ξενοδοχείου σας</p>

                            <!--kodikas gia ta fanera text boxes-->
                            <div class="col-xs-2">
                                <p>Γεωφραφικό Πλάτος</p>
                                <input type="text" class="form-control" id="londTxt" name="lat">
                            </div>

                            <div class="col-xs-2">
                                <p>Γεωφραφικό μήκος</p>
                                <input type="text" class="form-control" id="latTxt" name="lond">
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

    <?php include('includes/footer.php') ?>

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
/*include("Functions.php");*/

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['newHotel'])) {
    $errorState = 0;

    $hotelName = mysqli_real_escape_string($link, $_POST['hotelName']);
    $shortDesc = mysqli_real_escape_string($link, $_POST['shortDesc']);
    $longDesc = mysqli_real_escape_string($link, $_POST['longDesc']);


    $kouzinaBox = isset($_POST['kouzinaBox']) ? $_POST['kouzinaBox'] : '';
    $theaBox = isset($_POST['theaBox']) ? $_POST['theaBox'] : '';
    $tvBox = isset($_POST['tvBox']) ? $_POST['tvBox'] : '';
    $wifiBox = isset($_POST['wifiBox']) ? $_POST['wifiBox'] : '';
    $wcBox = isset($_POST['wcBox']) ? $_POST['wcBox'] : '';
    $parkingBox = isset($_POST['parkingBox']) ? $_POST['parkingBox'] : '';
    $acBox = isset($_POST['acBox']) ? $_POST['acBox'] : '';
    $poolBox = isset($_POST['poolBox']) ? $_POST['poolBox'] : '';
    $file = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : '';

    $stars = mysqli_real_escape_string($link, $_POST['stars']);

    $lat = mysqli_real_escape_string($link, $_POST['lat']);
    $lond = mysqli_real_escape_string($link, $_POST['lond']);


    $date = getCurrentDate();
    $tempUserName = $_SESSION['username'];
    $userID = returnUserIDGivenName($tempUserName, $link);

    /* $file = $_FILES['image']['tmp_name'];*/


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

    if (empty($hotelName) || empty($shortDesc) || (empty($longDesc)) || empty($lat) || empty($lond)) {
        $errorState = 1;

    }


    /*  if (empty($image)) {

          $errorState = 1;
      }*/

    echo $userID;


    /*   -----------------------------Arxi Dilwshs Check Boxes*/
    if (empty($kouzinaBox)) {
        settype($kouzinaBox, "integer");
        $kouzinaBox = 0;
    } else {
        settype($kouzinaBox, "integer");
        $kouzinaBox = 1;
    }

    if (empty($theaBox)) {
        settype($theaBox, "integer");
        $theaBox = 0;
    } else {
        settype($theaBox, "integer");
        $theaBox = 1;
    }

    if (empty($tvBox)) {
        settype($tvBox, "integer");
        $tvBox = 0;
    } else {
        settype($tvBox, "integer");
        $tvBox = 1;
    }

    if (empty($wifiBox)) {
        settype($wifiBox, "integer");
        $wifiBox = 0;
    } else {
        settype($wifiBox, "integer");
        $wifiBox = 1;
    }

    if (empty($wcBox)) {
        settype($wcBox, "integer");
        $wcBox = 0;
    } else {
        settype($wcBox, "integer");
        $wcBox = 1;
    }

    if (empty($parkingBox)) {
        settype($parkingBox, "integer");
        $parkingBox = 0;
    } else {
        settype($parkingBox, "integer");
        $parkingBox = 1;
    }

    if (empty($acBox)) {
        settype($acBox, "integer");
        $acBox = 0;
    } else {
        settype($acBox, "integer");
        $acBox = 1;
    }

    if (empty($poolBox)) {
        settype($poolBox, "integer");
        $poolBox = 0;
    } else {
        settype($poolBox, "integer");
        $poolBox = 1;
    }

    /*   -----------------------------Telos Dilwshs Check Boxes*/


    if ($errorState == 0) {

        saveNewHotelOnDatabase1($hotelName, $shortDesc, $longDesc, $date, $link, $userID, $file, $kouzinaBox, $theaBox, $tvBox, $wifiBox, $wcBox, $parkingBox, $acBox, $poolBox, $lat, $lond, $stars);

    } else if ($errorState == 1) {
        showAlertDialog("Παρακαλώ συμπληρώστε κατάλληλα όλα τα πεδία.");
    } elseif ($errorState == 2) {
        showAlertDialog("Το αρχείο που εισάγατε δεν είναι εικόνα.");
    }


}
?>