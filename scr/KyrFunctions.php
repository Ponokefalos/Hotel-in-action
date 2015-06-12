<?php
/**
 * Created by PhpStorm.
 * User: Kir
 * Date: 10/6/2015
 * Time: 7:44 μμ
 */


function saveNewHotelOnDatabase1($hotelName, $shortDesc, $longDesc, $date, $link, $userID, $image, $kouzinaBox, $theaBox, $tvBox, $wifiBox, $wcBox, $parkingBox, $acBox, $poolBox, $lat, $lond,$stars)
{
    mysqli_autocommit($link, false);

    $query = "insert into hotels
                             (
                                 HotelName,
                                 ShortDesc,
                                 Description,
                                 user_id,
                                 Date,
                                 image,
                                 kouzinaBox,
                                 theaBox,
                                 tvBox,
                                 wifiBox,
                                 wcBox,
                                 parkingBox,
                                 acBox,
                                 poolBox,
                                 latitude,
                                 longitude,
                                 stars
                             )
                             Values
                             (
                                '$hotelName',
                                '$shortDesc',
                                '$longDesc',
                                '$userID',
                                '$date',
                                '$image',
                                '$kouzinaBox',
                                '$theaBox',
                                '$tvBox',
                                '$wifiBox',
                                '$wcBox',
                                '$parkingBox',
                                '$acBox',
                                '$poolBox',
                                '$lat',
                                '$lond',
                                '$stars'

                             )";

    $result = mysqli_query($link, $query);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Επιτυχής εγγραφή");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Αδυναμία εισαγωγής του ξενοδοχείου στην ιστοσελίδα. Παρακαλώ προσπαθήστε αργότερα.");
        return false;
    }


}


function saveNewAuctionInDatabase($auction_hotel_name, $description, $rooms_number, $room_type, $checkin_date, $checkout_date, $starting_price, $min_price, $buy_out_box, $buy_out_price, $starting_date, $finishing_date, $image, $currentUser, $link,$hotel_id)
{
    mysqli_autocommit($link, false);

    $query = "insert into auctions (
                                    auction_hotel_name,
                                    description,
                                    rooms_number,
                                    room_type,
                                    checkin_date,
                                    checkout_date,
                                    starting_price,
                                    min_price,
                                    buy_out_box,
                                    buy_out_price,
                                    starting_date,
                                    finishing_date,
                                    auction_file,
                                    userID,
                                    hotel_id

                                    )
                                    VALUES
                                    (
                                    '$auction_hotel_name',
                                    '$description',
                                    '$rooms_number',
                                    '$room_type',
                                    '$checkin_date',
                                    '$checkout_date',
                                    '$starting_price',
                                    '$min_price',
                                    '$buy_out_box',
                                    '$buy_out_price',
                                    '$starting_date',
                                    '$finishing_date',
                                    '$image',
                                    '$currentUser',
                                    '$hotel_id'
                                    )";


    $result = mysqli_query($link, $query);
    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Επιτυχής εγγραφή");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Αδυναμία εισαγωγής του ξενοδοχείου στην ιστοσελίδα. Παρακαλώ προσπαθήστε αργότερα.");
        return false;
    }
}

<<<<<<< HEAD
function returnAllUsers($link){
    $query = "select username from users";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);



=======


function returnHotelId ($link,$hotel_name){
    $query="select hotelID from hotels WHERE HotelName='$hotel_name'";
    $result= mysqli_query($link,$query);

    $row = mysqli_fetch_assoc($result);

    $hotelID = $row['hotelID'];

    return $hotelID;
>>>>>>> origin/Kyr-Pc
}

?>