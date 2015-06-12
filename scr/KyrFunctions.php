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





function returnHotelId ($link,$hotel_name){
    $query="select hotelID from hotels WHERE HotelName='$hotel_name'";
    $result= mysqli_query($link,$query);

    $row = mysqli_fetch_assoc($result);

    $hotelID = $row['hotelID'];

    return $hotelID;


}

function get_auction_by_id($link,$auctionID){

    $query="select * from auctions where auction_id='$auctionID'";
    $result= mysqli_query($link, $query);

    if ($result){
        $auction =  mysqli_fetch_array($result);
    }
    else{
        showAlertDialog("there was an error in getting the auction ID");
    }

    return $auction;
}

function updateAuction($auction_hotel_name, $description, $rooms_number, $room_type, $checkin_date, $checkout_date, $starting_price, $min_price, $buy_out_box, $buy_out_price, $starting_date, $finishing_date, $image ,$link,$id)
{

    if ($image == 1) {
        $updateAuctionQuery = "UPDATE auctions SET auction_hotel_name='$auction_hotel_name' , Description='$description' , rooms_nimber='$rooms_number' , room_type='$room_type' , checkin_date='$checkin_date' , checkout_date='$checkout_date' , starting_price='$starting_price' , min_price='$min_price' , buy_out_box='$buy_out_box' , buy_out_price='$buy_out_price' , starting_date='$starting_date' , finishing_date='$finishing_date' WHERE userID='$id'";
    } else {
        $updateAuctionQuery = "UPDATE auctions SET auction_hotel_name='$auction_hotel_name' , Description='$description' , rooms_nimber='$rooms_number' , room_type='$room_type' , checkin_date='$checkin_date' , checkout_date='$checkout_date' , starting_price='$starting_price' , min_price='$min_price' , buy_out_box='$buy_out_box' , buy_out_price='$buy_out_price' , starting_date='$starting_date' , finishing_date='$finishing_date' , auction_file='$image' WHERE userID='$id'";
    }



    $result = mysqli_query($link, $updateAuctionQuery);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Οι πληροφορίες της δημοπρασίας ενημερώθηκαν επιτυχώς");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Οι πληροφορίες της δημοπρασίας δεν ενημερώθηκαν, κάτι πήγε λάθος");
        return false;
    }

}



?>