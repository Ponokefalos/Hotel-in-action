<?php
/**
 * Created by PhpStorm.
 * User: Jim
 * Date: 31/5/2015
 * Time: 4:24 μμ
 */


function returnUserCode($hotelAdmin)
{
    if ($hotelAdmin = 0) {
        return 1;
    } else {
        return 2;
    }

}


function showAlertDialog($warningText)
{
    print '<script type="text/javascript">';
    print 'alert("' . $warningText . '")';
    print '</script>';
}

function checkIfUserEmailExists($email, $link)
{
    $sql = "SELECT username "
        . "FROM users WHERE email='$email' ";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        return true;
    } else {
        return false;
    }
}

/** Checks if a user exist on database
 * @param $name
 * @param $link
 * @return bool
 */
function checkIfUserNameExists($name, $link)
{
    $sql = "SELECT username "
        . "FROM users WHERE username='$name' ";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        return true;
    } else {
        return false;
    }
}


function returnUserIDGivenName($name, $link)
{
    $sql = "SELECT user_id "
        . "FROM users WHERE username='$name' ";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

    $userID = $row['user_id'];

    return $userID;

}

function getCurrentDate()
{
    return date("Y/m/d");
}

function saveNewHotelOnDatabase($hotelName, $shortDesc, $longDesc, $date, $link, $userID, $image)
{
    mysqli_autocommit($link, false);

    $query = "insert into hotels
                             (
                                 HotelName,
                                 ShortDesc,
                                 Description,
                                 user_id,
                                 Date,
                                 image
                             )
                             Values
                             (
                                '$hotelName',
                                '$shortDesc',
                                '$longDesc',
                                '$userID',
                                '$date',
                                '$image'
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

function getUserFromDatabase($username, $link)
{
    include("user.php");
    $sql = "SELECT * "
        . "FROM users WHERE username='$username' ";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);

        $user = new User($row['name'], $row['username'], $row['surname'], $row['email'], $row['image']);
    }

    return $user;
}


function getSuperUserFromDatabase($username, $link)
{
    include("SuperUser.php");
    $sql = "SELECT * "
        . "FROM users WHERE username='$username' ";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);

        $user = new SuperUser($row['name'], $row['username'], $row['surname'], $row['email'], $row['image'], $row['password'], $row['birth_date'], $row['company_name'], $row['gender'], $row['code'], $row['newsletter'], $row['user_id']);
    }

    return $user;
}


function getSuperUserFromDatabaseGivenId($id, $link)
{
    include("SuperUser.php");
    $sql = "SELECT * "
        . "FROM users WHERE user_id='$id' ";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);

        $user = new SuperUser($row['name'], $row['username'], $row['surname'], $row['email'], $row['image'], $row['password'], $row['birth_date'], $row['company_name'], $row['gender'], $row['code'], $row['newsletter'], $row['user_id']);
    }

    return $user;
}
/*
function getUserFromDatabase($username,$link){
    $sql = "SELECT password "
        . "FROM users WHERE username='$username' ";
}*/
/**Saves a new User to Database
 *
 *
 * @param $userCode 1 for simple user \ 2 for hotel owner \ 0 for admin
 * @param $name
 * @param $surname
 * @param $birthDate
 * @param $email
 * @param $companyName
 * @param $newsletter
 * @param $password
 * @param $username
 * @param $maleSex
 * @param $link
 * @param $image
 * @return bool Returns TRUE if user was added successfully FALSE otherwise
 */
function saveNewUserOnDatabase($userCode, $name, $surname, $birthDate, $email, $companyName, $newsletter, $password, $username, $maleSex, $link, $image, $date_registered)
{

    mysqli_autocommit($link, false);

    $query = "insert into users
                             (
                                 code,
                                 name,
                                 surname,
                                 birth_date,
                                 email,
                                 company_name,
                                 newsletter,
                                 password,
                                 username,
                                 gender,
                                 image,
                                 date_registered
                             )
                             Values
                             (
                                 '$userCode',
                                 '$name',
                                 '$surname',
                                 '$birthDate',
                                 '$email',
                                 '$companyName',
                                 '$newsletter',
                                 '$password',
                                 '$username',
                                 '$maleSex',
                                 '$image',
                                 '$date_registered'
                             )";

    $result = mysqli_query($link, $query);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Επιτυχής εγγραφή");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Αδυναμία εγγραφής στην ιστοσελίδα. Παρακαλώ προσπαθήστε αργότερα.");
        return false;
    }

}


/** Deletes a user from database
 *
 * @param $username The name of the user to delete
 * @param $link
 * @return bool Returns TRUE if user was deleted successfully FALSE otherwise
 */
function deleteUserFromDatabase($username, $link)
{

    mysqli_autocommit($link, false);

    $deleteQuery = "DELETE FROM users WHERE username='$username'";

    $result = mysqli_query($link, $deleteQuery);

    if ($result) {
        mysqli_commit($link);
        return true;
    } else {
        mysqli_rollback($link);
        return false;
    }
}

/** Deletes a user from database
 *
 * @param $userId
 * @param $link
 * @return bool Returns TRUE if user was deleted successfully FALSE otherwise
 */
function deleteUserFromDatabaseGivenId($userId, $link)
{

    mysqli_autocommit($link, false);

    $deleteQuery = "DELETE FROM users WHERE user_id='$userId'";

    $result = mysqli_query($link, $deleteQuery);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("O χρήστης διαγράφτηκε επιτυχώς");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Αποτυχία διαγραφής χρήστη");
        return false;
    }
}

/**Updates a user's password
 *
 * @param $newPassword User's new password
 * @param $username The User to update
 * @param $link
 * @return bool TRUE if successful FALSE otherwise
 */
function updatePassword($newPassword, $username, $link)
{

    mysqli_autocommit($link, false);

    $updatePasswordQuery = "UPDATE users SET password='$newPassword' WHERE username='$username'";

    $result = mysqli_query($link, $updatePasswordQuery);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("O κωδικός ενημερώθηκε επιτυχώς");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("O κωδικός δεν ενημερώθηκε, κάτι πήγε λάθος");
        return false;
    }
}

/** Updates a user's image
 *
 * @param $newImage User's new photo
 * @param $username The User to update
 * @param $link
 * @return bool TRUE if successful FALSE otherwise
 */
function updatePhoto($newImage, $username, $link)
{

    mysqli_autocommit($link, false);

    $updatePhotoQuery = "UPDATE users SET image='$newImage' WHERE username='$username'";

    $result = mysqli_query($link, $updatePhotoQuery);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Η φωτογραφία ενημερώθηκε επιτυχώς");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Η φωτογραφία δεν ενημερώθηκε, κάτι πήγε λάθος");
        return false;
    }
}

function updateInfo($newName, $newSurname, $newCompanyName, $newNewsletter, $username, $link)
{

    mysqli_autocommit($link, false);

    $updateInfoQuery = "UPDATE users SET name='$newName' , surname='$newSurname' , company_name='$newCompanyName' , newsletter='$newNewsletter' WHERE username='$username'";

    $result = mysqli_query($link, $updateInfoQuery);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Οι πληροφορίες ενημερώθηκαν επιτυχώς");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Οι πληροφορίες δεν ενημερώθηκαν, κάτι πήγε λάθος");
        return false;
    }
}

function updateUser($code, $name, $surname, $username, $email, $password, $gender, $companyName, $newsLetter, $image, $birthDate, $userID, $link)
{

    mysqli_autocommit($link, false);

    if ($password == 1) {

        if ($image == 1) {
            $updateUserQuery = "UPDATE users SET code='$code' , name='$name' , surname='$surname' , birth_date='$birthDate' , email='$email' , company_name='$companyName' , newsletter='$newsLetter'  , username='$username' , gender='$gender'  WHERE user_id='$userID'";
        } else {
            $updateUserQuery = "UPDATE users SET code='$code' , name='$name' , surname='$surname' , birth_date='$birthDate' , email='$email' , company_name='$companyName' , newsletter='$newsLetter' , username='$username' , gender='$gender' , image='$image' WHERE user_id='$userID'";
        }
    } else {
        if ($image == 1) {
            $updateUserQuery = "UPDATE users SET code='$code' , name='$name' , surname='$surname' , birth_date='$birthDate' , email='$email' , company_name='$companyName' , newsletter='$newsLetter' , password='$password' , username='$username' , gender='$gender'  WHERE user_id='$userID'";
        } else {
            $updateUserQuery = "UPDATE users SET code='$code' , name='$name' , surname='$surname' , birth_date='$birthDate' , email='$email' , company_name='$companyName' , newsletter='$newsLetter' , password='$password' , username='$username' , gender='$gender' , image='$image' WHERE user_id='$userID'";
        }
    }

    //$updateUserQuery = "UPDATE users SET code='$code' , name='$name' , surname='$surname' , birth_date='$birthDate' , email='$email' , company_name='$companyName' , newsletter='$newsLetter' , password='$password' , username='$username' , gender='$gender' , image='$image' WHERE user_id='$userID'";

    $result = mysqli_query($link, $updateUserQuery);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Οι πληροφορίες του χρήστη ενημερώθηκαν επιτυχώς");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Οι πληροφορίες του χρήστη δεν ενημερώθηκαν, κάτι πήγε λάθος");
        return false;
    }
}

function updateHotel($hotelName, $shortDesc, $longDesc, $date, $link, $userID, $image, $kouzinaBox, $theaBox, $tvBox, $wifiBox, $wcBox, $parkingBox, $acBox, $poolBox, $lat, $lond, $stars, $hotelID)
{

    if ($image == 1) {
        $updateHotelQuery = "UPDATE hotels SET HotelName='$hotelName' , ShortDesc='$shortDesc' , Description='$longDesc' , kouzinaBox='$kouzinaBox' , theaBox='$theaBox' , tvBox='$tvBox' , wifiBox='$wifiBox' , wcBox='$wcBox' , parkingBox='$parkingBox' , acBox ='$acBox' , poolBox='$poolBox' , latitude='$lat' , longitude='$lond' , stars='$stars' WHERE hotelID='$hotelID'";
    } else {
        $updateHotelQuery = "UPDATE hotels SET HotelName='$hotelName' , ShortDesc='$shortDesc' , Description='$longDesc' , kouzinaBox='$kouzinaBox' , theaBox='$theaBox' , tvBox='$tvBox' , wifiBox='$wifiBox' , wcBox='$wcBox' , parkingBox='$parkingBox' , acBox ='$acBox' , poolBox='$poolBox' , latitude='$lat' , longitude='$lond' , stars='$stars' , image='$image' WHERE hotelID='$hotelID'";
    }

    $result = mysqli_query($link, $updateHotelQuery);

    if ($result) {
        mysqli_commit($link);
        showAlertDialog("Οι πληροφορίες του ξενοδοχείου ενημερώθηκαν επιτυχώς");
        return true;
    } else {
        mysqli_rollback($link);
        showAlertDialog("Οι πληροφορίες του ξενοδοχείου δεν ενημερώθηκαν, κάτι πήγε λάθος");
        return false;
    }
}

function getAllHotelsGivenUserId($userId,$link){
    $sql = "SELECT * FROM hotels WHERE userID=".$userId;
    $result = $link ->query($sql);

    if ($result->num_rows > 0) {
        return ($result);
    } else {
        echo "0 results";
    }

}

?>