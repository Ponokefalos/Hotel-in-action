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
 * Time: 03:02
 */
global $link;
include("RegisterConnectToDB.php");
include_once('ArizFunctions.php');
$result = get_auctions($link);

global $link;
include_once 'RegisterConnectToDB.php';

?>

<div class="table-responsive">
    <table class="table">
        <tr>
            <td>Εικόνα</td>
            <td>Όνομα</td>
            <td>Ημερομηνία άφιξης</td>
            <td>Ημερομηνία αναχώρησης</td>
            <td>Ημερομηνία εκκίνησης</td>
            <td>Ημερομηνία λήξης</td>
            <td>Τρέχουσα μεγαλύτερη προσφορά</td>
            <td>Όνομα νικητή</td>
            <td>Επεξεργασία</td>
        </tr>

<?php
while ($auction = $result->fetch_assoc()) {
    $bid = select_auction_last_bid($auction['auction_id'], $link);
    $now = date('Y-m-d');
    if ($auction['finishing_date']<$now){
        $winner = select_auction_winner($auction['auction_id'],$link);
        $winner = $winner['username'];
    }else{
        $winner = "Δημοπρασία σε εξέλιξη";
    }
    echo '
            <tr>
                <td><img src="data:image;base64,' . base64_encode($auction["auction_file"]) . '" width=100 height=100/></td>
                <td>' . $auction["auction_hotel_name"] . '</td>
                <td>' . $auction["checkin_date"] . '</td>
                <td>' . $auction["checkout_date"] . '</td>
                <td>' . $auction["starting_date"] . '</td>
                <td>' . $auction["finishing_date"] . '</td>
                <td>' . $bid . '</td>
                <td>' . $winner . '</td>
                <td><a href="adminEditAuction.php?id=' . $auction["auction_id"] . '">Επεξεργασία</a></td>
                </tr>';
}
$link->close();
echo '</table>
                </div>
           ';

?>