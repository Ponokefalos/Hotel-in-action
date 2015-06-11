<?php
/**
 * Created by PhpStorm.
 * User: Kir
 * Date: 10/6/2015
 * Time: 7:44 μμ
 */


function saveNewHotelOnDatabase1($hotelName, $shortDesc, $longDesc, $date, $link, $userID,$image,$kouzinaBox,$theaBox,$tvBox,$wifiBox,$wcBox,$parkingBox,$acBox,$poolBox,$lat,$lond)
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
                                 longitude
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
                                '$lond'
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

?>