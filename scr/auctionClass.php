<?php

/**
 * Created by PhpStorm.
 * User: Kir
 * Date: 12/6/2015
 * Time: 8:09 μμ
 */
class auction
{
    function auction($auction_hotel_name, $description, $rooms_number, $room_type, $checkin_date, $checkout_date, $starting_price, $min_price, $buy_out_box, $buy_out_price, $starting_date, $finishing_date, $auction_file)
    {
        $this->$auction_hotel_name = $auction_hotel_name;
        $this->$description=$description;
        $this->$rooms_number=$rooms_number;
        $this->$room_type=$room_type;
        $this->$checkin_date;
        $this->$checkout_date=$checkout_date;
        $this->$starting_price=$starting_price;
        $this->$min_price=$min_price;
        $this->$buy_out_box=$buy_out_box;
        $this->$buy_out_price=$buy_out_price;
        $this->$starting_date=$starting_date;
        $this->$finishing_date=$finishing_date;
        $this->$auction_file=$auction_file;
    }

}


?>
