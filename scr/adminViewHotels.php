<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet"/>
<link href="../css/style.css" rel="stylesheet">
<link href="../css/navbar.css" rel="stylesheet">
<link href="../css/globalShadowBoxStyle.css" rel="stylesheet">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php
/**
 * Created by PhpStorm.
 * User: arist
 * Date: 12-Jun-15
 * Time: 01:47
 */
global $link;
include ("RegisterConnectToDB.php");
include_once 'ArizFunctions.php';
$result = get_hotels($link);
?>

    <div class="table-responsive" style="width: auto">
        <table class="table">
            <tr>
                <td>Εικόνα</td>
                <td>Όνομα Ξενοδοχείου</td>
                <td>Περιγραφή</td>
                <td>Επεξεργασία</td>
            </tr>

<?php
    while ($hotel = $result->fetch_assoc()) {

        echo '
            <tr>
                <td><img src="data:image;base64,' . base64_encode($hotel["image"]) . '" width=100 height=100/></td>
                <td>' . $hotel["HotelName"] . '</td>
                <td>' . $hotel["Description"] . '</td>
                <td><a href="adminEditHotel.php?id='.$hotel["hotelID"].'">Επεξεργασία</a></td>
                </tr>';
    }

    echo '</table>
 </div> ';
?>