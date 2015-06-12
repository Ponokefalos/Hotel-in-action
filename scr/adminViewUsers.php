<?php
/**
 * Created by PhpStorm.
 * User: arist
 * Date: 12-Jun-15
 * Time: 16:14
 */
include_once 'ArizFunctions.php';
$result= get_users();
global $link;
include "RegisterConnectToDB.php";
?>

    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>Εικόνα</td>
                <td>Ηλεκτρονική Διεύθυνση</td>
                <td>Όνομα </td>
                <td>Ρόλοι Πελατών</td>
                <td>Επωνυμία Εταιρείας</td>
                <td>Ενεργό</td>
                <td>Είναι Μάνατζερ Ξενοδοχείου</td>
                <td>Δημιουργήθηκε στις</td>
                <td>Τελευταία δραστηριότητα</td>
                <td>Επεξεργασία</td>
            </tr>

<?php
    while($user = $result->fetch_assoc()){
        switch ($user["code"]){
            case 0:
                $role = "Admin";
                break;
            case 1:
                $role = "Registered";
                break;
            case 2:
                $role = "Registered,VendorS";
                break;
        }
        echo'
            <tr>
                <td><img src="data:image;base64,' . base64_encode($user["image"]) . '" width=100 height=100/></td>
                <td>'.$user["email"].'</td>
                <td>'.$user["name"].'</td>
                <td>'.$role.'</td>
                <td>'.$user["company_name"].'</td>
                <td>???????</td>
                <td>DEITE TO SCREENSHOT</td>
                <td>'.$user["date_registered"].'</td>
                <td>'.get_login_date($user['user_id'],$link).'</td>
                <td><input type="button" value="Επεξεργασία">.</td>
                </tr>';
    }

    echo '</table>
                </div>
            </div>';
?>