<?php
/**
 * Created by PhpStorm.
 * User: filta
 * Date: 12/6/2015
 * Time: 8:09 μμ
 */

class Hotel{
    function  Hotel($hotelID,$hotelName,$hotelShortDesc,$hotelDescription,$hotelUserID,$hotelDate,$hotelImage,$hotelLatitude,$hotelLongitude,$kouzinaBox,$theaBox,$tvBox,$wifiBox,$wcBox,$parkingBox,$acBox,$poolBox,$hotelStars){
        $this->hotelID = $hotelID;
        $this->hotelName = $hotelName;
        $this->hotelShortDesc=$hotelShortDesc;
        $this->hotelDescription = $hotelDescription;
        $this->hotelUserID = $hotelUserID;
        $this->hotelDate = $hotelDate;
        $this->hotelImage = $hotelImage;
        $this->hotelLatitude = $hotelLatitude;
        $this->hotelLongitude = $hotelLongitude;
        $this->kouzinaBox = $kouzinaBox;
        $this->theaBox = $theaBox;
        $this->tvBox = $tvBox;
        $this->wifiBox = $wifiBox;
        $this->wcBox = $wcBox;


    }
}