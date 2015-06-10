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
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
        }
    } else {
        echo "0 results";
    }

}

