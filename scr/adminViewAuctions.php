<?php
/**
 * Created by PhpStorm.
 * User: arist
 * Date: 12-Jun-15
 * Time: 03:02
 */
include 'ArizFunctions.php';
$result= get_auctions();

global $link;
include 'RegisterConnectToDB.php';

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
        echo '
            <tr>
                <td><img src="data:image;base64,' . base64_encode($auction["auction_file"]) . '" width=100 height=100/></td>
                <td>'.$auction["auction_hotel_name"].'</td>
                <td>'.$auction["checkin_date"].'</td>
                <td>'.$auction["checkout_date"].'</td>
                <td>'.$auction["starting_date"].'</td>
                <td>'.$auction["finishing_date"].'</td>
                <td>'.$bid.'</td>
                <td><input type="button" value="Επεξεργασία">.</td>
                </tr>';
    }
    $link->close();
    echo '</table>
                </div>
            </div>';

?>