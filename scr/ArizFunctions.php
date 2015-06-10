<?php
/**
 * Created by PhpStorm.
 * User: Kir
 * Date: 10/6/2015
 * Time: 7:44 μμ
 */
function get_hotels()
{
    global $link;
    require('RegisterConnectToDB.php');

    $sql = "SELECT * FROM hotels";
    $result = $link ->query($sql);

    if ($result->num_rows > 0) {
        $link->close();
        return ($result);
    } else {
        echo "0 results";
    }

}

function get_auctions(){
    global $link;
    require('RegisterConnectToDB.php');

    $sql = "SELECT * FROM auctions";
    $result = $link->query($sql);

    if ($result->num_rows>0){
        $link->close();
        return ($result);
    }else{
        $link->close();
       // print '0 results';
    }
}
function get_auction_rating_comment($value){
/*    $v = intval($value);*/
    $v=$value;
    if ($v>=0 && $v<1){return "gtp";}
    else if ($v>=1 && $v<2){return "Κακό";}
    else if ($v>=2 && $v<3){return "Μέτριο";}
    else if ($v>=3 && $v<4){return "Καλό";}
    else if ($v>=4 && $v<5){return "Θαυμάσιο";}
}


function display_auction_row($auction_row){
    echo 'in display';
    global $link;
    require("RegisterConnectToDB.php");
    $auction_id = $auction_row["auction_id"];
    $sql= "SELECT avg(rating) FROM ratings WHERE auction_id = $auction_id";
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $avg = $row['avg(rating)'];
    $sql = "SELECT COUNT(auction_id) FROM ratings WHERE auction_id=".$auction_id;
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $votes = $row['COUNT(auction_id)'];
    $sql = "SELECT * FROM bids WHERE auction_id=".$auction_id." ORDER BY bids.date DESC";
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $last_bid_value=$row['bid'];
    $link->close();

    $comment = get_auction_rating_comment(($avg));

    $date = $auction_row['finishing_date'];
    $now = new DateTime();

    if($date < $now) {
       $auction_progress="Έχει τελειώσει";
    }else{
        $auction_progress="Σε εξέλιξη";
    }

    echo '
    <div class="progressingAuctions"> <!-- to div auto einai mono gia to hover (blue shadow) -->
                    <a href="nefeliAuction.php">
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

