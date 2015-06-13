<?php
/**
 * Created by PhpStorm.
 * User: Kir
 * Date: 10/6/2015
 * Time: 7:44 μμ
 */



function insert_bid($user_id,$auction_id,$bid,$date,$link){
    $sql = "insert into bids
                             (
                                 user_id,
                                 auction_id,
                                 bid,
                                 date
                             )
                             values
                             (
                                 '$user_id',
                                 '$auction_id',
                                 '$bid',
                                 '$date'
                             )";

    $result = mysqli_query($link, $sql);

    if ($result) {
        mysqli_commit($link);
        return true;
    } else {
        mysqli_rollback($link);
        return false;
    }
}

function delete_hotel_from_id($id, $link){
    $sql = "DELETE FROM hotels WHERE hotelID=$id";
    $result = mysqli_query($link, $sql);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Επιτυχής διαγραφή");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Αδυναμία διαγγραφής στην ιστοσελίδα. Παρακαλώ προσπαθήστε αργότερα.");
        return false;
    }
}

function delete_auction_from_id($id, $link){
    $sql = "DELETE FROM auctions WHERE auction_id=$id";
    $result = mysqli_query($link, $sql);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Επιτυχής διαγραφή");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Αδυναμία διαγγραφής στην ιστοσελίδα. Παρακαλώ προσπαθήστε αργότερα.");
        return false;
    }
}

function is_user_logged_in($id,$link){
    $sql = "SELECT * FROM logins WHERE user_id=$id";
    $result = $link ->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function get_login_date($id,$link){
    $sql = "SELECT * FROM logins WHERE user_id=$id";
    $result = $link ->query($sql);
    if ($result->num_rows > 0) {
        $login =  mysqli_fetch_array($result);
        return ($login['date_since']);
    } else {
        return "Never.";
    }
}

function delete_from_login($id,$link){
    $sql = "DELETE FROM logins WHERE user_id=$id";
    $result = mysqli_query($link, $sql);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Επιτυχής διαγραφή");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Αδυναμία διαγγραφής στην ιστοσελίδα. Παρακαλώ προσπαθήστε αργότερα.");
        return false;
    }
}

function insert_to_logins($id,$date,$link){
    $sql = "insert into logins
                             (
                                 user_id,
                                 date_since
                             )
                             values
                             (
                                 '$id',
                                 '$date'
                             )";

    $result = mysqli_query($link, $sql);

    if ($result) {
        mysqli_commit($link);
        return true;
    } else {
        mysqli_rollback($link);
        return false;
    }
}

function select_auction_by_id($id,$link){
    $sql = "SELECT * FROM auctions WHERE auction_id=".$id;
    $result = $link ->query($sql);

    if ($result->num_rows > 0) {
        $auction =  mysqli_fetch_array($result);
        return ($auction);
    } else {
        echo "0 results";
    }
}

function get_hotel_by_id($id, $link){

    $sql = "SELECT * FROM hotels WHERE hotelID=".$id;
    $result = $link ->query($sql);

    if ($result->num_rows > 0) {
        $hotel =  mysqli_fetch_array($result);
        return ($hotel);
    } else {
        echo "0 results";
    }
}

function get_hotels($link){

    $sql = "SELECT * FROM hotels";
    $result = $link ->query($sql);

    if ($result->num_rows > 0) {
        return ($result);
    } else {
        echo "0 results";
    }

}

function get_auctions($link){

    $sql = "SELECT * FROM auctions";
    $result = $link->query($sql);

    if ($result->num_rows>0){
        return ($result);
    }else{
       echo '0 results';
    }
}

function get_users($link){

    $sql = "SELECT * FROM users";
    $result = $link->query($sql);

    if ($result->num_rows>0){
        return ($result);
    }else{
        echo '0 results';
    }
}

function get_auction_rating_comment($value){
    $v=$value;
    if ($v>=0 && $v<1){return "gtp";}
    else if ($v>=1 && $v<2){return "Κακό";}
    else if ($v>=2 && $v<3){return "Μέτριο";}
    else if ($v>=3 && $v<4){return "Καλό";}
    else if ($v>=4 && $v<5){return "Θαυμάσιο";}
}

function select_user_avg_rating($user_id,$link){
    $sql= "SELECT avg(rating) FROM ratings WHERE user_id=$user_id";
    $result = $link->query($sql);
    if ($result -> num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $avg = $row['avg(rating)'];
        if ($avg==0){
            return 0.0;
        }else
        return $avg;
    }else return 0;
}

function select_count_of_user_ratings($user_id,$link){
    $sql = "SELECT COUNT(user_id) FROM ratings WHERE user_id=$user_id";
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $votes = $row['COUNT(user_id)'];
    return $votes;
}

function select_auction_avg_rating($auction_id,$link){
    $sql= "SELECT avg(rating) FROM ratings WHERE auction_id=$auction_id";
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $avg = $row['avg(rating)'];
    return $avg;
}

function select_count_of_auction_ratings($auction_id,$link){
    $sql = "SELECT COUNT(auction_id) FROM ratings WHERE auction_id=$auction_id";
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $votes = $row['COUNT(auction_id)'];
    return $votes;
}

function select_auction_winner($auction_id,$link){
    $sql = "SELECT * FROM bids WHERE auction_id=".$auction_id." ORDER BY bids.date DESC";
    $result = $link->query($sql);
    if ($result->num_rows>0){
        $row = mysqli_fetch_array($result);
        $winner_id=$row['user_id'];
        $sql="SELECT * FROM users WHERE user_id=".$winner_id;
        $result = $link->query($sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }else return 0;
}

function select_auction_last_bid($auction_id,$link){
    $sql = "SELECT * FROM bids WHERE auction_id=".$auction_id." ORDER BY bids.bid DESC";
    $result = $link->query($sql);
    if ($result->num_rows>0){
        $row = mysqli_fetch_array($result);
        $last_bid_value=$row['bid'];
        return $last_bid_value;
    }else return 0;
}

function display_auction_row($auction_row, $link){
    //echo 'in display';
    $auction_id = $auction_row["auction_id"];
    $avg = select_auction_avg_rating($auction_id,$link);
    $votes = select_count_of_auction_ratings($auction_id,$link);
    $last_bid_value=select_auction_last_bid($auction_id,$link);

    $comment = get_auction_rating_comment(($avg));
    $date = $auction_row['finishing_date'];
    $now = new DateTime();

    if($date < $now->format('Y-m-d H:i:s')) {
       $auction_progress="Έχει τελειώσει";
    }else{
        $auction_progress="Σε εξέλιξη";
    }

    echo '
    <div class="progressingAuctions"> <!-- to div auto einai mono gia to hover (blue shadow) -->
                    <a href="viewAuction.php?a='.$auction_id.'">
                        <div class="container marketing">
                            <div class="col-md-3">
                                <img class="img-thumbnail" src="data:image;base64,' . base64_encode($auction_row["auction_file"]) . '" width=200 height=200/>
                                <p class="hotelTitles"> '.$auction_row["auction_hotel_name"].' </p>
                            </div>
                            <div class="col-md-2">
                                <h5 class="AuctionTitles">Βαθμολογία</h5>
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                <br>
                                '.$avg.'
                                <br>
                                <p class="userRating"><i> '.$comment.' </i></p>
                                <br>

                                <p class="userRating"><i> Βαθμολογήθηκε από: '.$votes.' χρήστες </i></p>
                            </div>
                            <div class="col-md-2">
                                <h5 class="AuctionTitles"> Δημοπρασία </h5>

                                <p> '.$auction_progress.' </p>
                            </div>
                            <div class="col-md-2">
                                <h5 class="AuctionTitles"> Αρχική Τιμή </h5>

                                <p> '.$auction_row["starting_price"].' <span>€</span></p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="AuctionTitles"> Τελευτάια Προσφορά </h5>

                                <p> '.$last_bid_value.' <span>€</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                ';
}
function get_auction_name($auction_id, $link){
    $sql = "SELECT auction_hotel_name FROM auctions WHERE auction_id=$auction_id";
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $auction_name= $row['auction_hotel_name'];
    return $auction_name;
}
function display_user_bid_history($username, $link){
    //getUserID
    $sql = "SELECT user_id FROM users WHERE username='$username'";
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $user_id= $row['user_id'];
    $sql= "SELECT * FROM bids WHERE user_id=$user_id";
    $result = $link -> query($sql);

    if ($result->num_rows<=0) {
        echo '0 results';
        return;
    }

    //print table
    echo'<div class="user_container">
                <p> SOme texts goes here, isws na min kanei o responsive table gia toso row me periexomena poy theloume.
                    Episis mporei to Istoriko na thelei kai mia row mono tou!</p>

                <p>sdasdas</p>
                <br>

                <div class="table-responsive">
                    <table class="table">
                    <tr>
                    <td>Ημερομηνία</td>
                    <td>Δημοπρασία </td>
                    <td>Ποσό</td>
                    </tr>
                    ';

    while($row = $result->fetch_assoc()){
        echo'
            <tr>
                <td>'.$row['date'].'</td>
                <td>'.get_auction_name($row['auction_id'],$link).'</td>
                <td>'.$row['bid'].'€</td>
            </tr>
        ';
    }

    echo '</table>
                </div>
            </div>';
}
