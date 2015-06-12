<?php
/**
 * Created by PhpStorm.
 * User: arist
 * Date: 12-Jun-15
 * Time: 01:47
 */
    include 'ArizFunctions.php';
    $result= get_hotels();
?>

<div class="table-responsive">
                    <table class="table">
                    <tr>
                    <td>Εικόνα</td>
                    <td>Όνομα Ξενοδοχείου </td>
                    <td>Περιγραφή </td>
                    <td>Επεξεργασία</td>
                    </tr>

<?php
    while($hotel = $result->fetch_assoc()){
        echo'
            <tr>
                <td><img src="data:image;base64,' . base64_encode($hotel["image"]) . '" width=100 height=100/></td>
                <td>'.$hotel["HotelName"].'</td>
                <td>'.$hotel["Description"].'</td>
                <td><input type="button" value="Επεξεργασία">.</td>
                </tr>';
    }

    echo '</table>
                </div>
            </div>';
?>