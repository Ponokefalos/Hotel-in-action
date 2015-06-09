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

function saveNewHotelOnDatabase($hotelName, $shortDesc, $longDesc, $date, $link, $userID)
{
    mysqli_autocommit($link, false);

    $query = "insert into hotels
                             (
                                 HotelName,
                                 ShortDesc,
                                 Description,
                                 user_id,
                                 Date
                             )
                             Values
                             (
                                '$hotelName',
                                '$shortDesc',
                                '$longDesc',
                                '$userID',
                                '$date'

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

        $user = new SuperUser($row['name'], $row['username'], $row['surname'], $row['email'], $row['image'], $row['password'], $row['birth_date'], $row['company_name'], $row['gender'], $row['code'], $row['newsletter']);
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
 * @param $userCode
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
 * @return bool
 */
function saveNewUserOnDatabase($userCode, $name, $surname, $birthDate, $email, $companyName, $newsletter, $password, $username, $maleSex, $link, $image)
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
                                 image
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
                                 '$image'
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


/** Anavathmizei tis plirofories tou xristi stin vasi dedomenwn
 *
 * @param $userCode o tipos tou xristi
 * @param $name to onoma tou xristi
 * @param $surname to epitheto tou xristi
 * @param $birthDate i imerominia gennisis tou xristi
 * @param $email to email tou xristi
 * @param $companyName to onoma tis etairias pou apasxoleite
 * @param $newsletter na lamvanei idopoieiseis apo emas
 * @param $password o kwdikos tou (md5ed)
 * @param $username to onoma tou stin istoselida mas
 * @param $maleSex to filo tou (paraplanitiko onoma metavlitis)
 * @param $image i fwtografia tou xristi
 * @param $conn
 * @return bool egine to update i oxi
 * @internal param gia $link epikoinwnia me db
 */
function updateUserOnDatabase($userCode, $name, $surname, $birthDate, $email, $companyName, $newsletter, $password, $username, $maleSex, $image,$conn)
{

    include ('database.php');


    $conn->autocommit(FALSE);

    $updateQuery = "UPDATE users  SET  code='$userCode',
                                           name='$name',
                                     surname='$surname',
                                birth_date='$birthDate',
                                         email='$email',
                            company_name='$companyName',
                               newsletter='$newsletter',
                                   password='$password',
                                   username='$username',
                                      gender='$maleSex',
                                         image='$image'
                                         WHERE  username='$username'";

    $result = $conn->query($updateQuery) or die(mysql_error());
    $result = $conn->commit();
    if ($result) {
      showAlertDialog("Οι αλλαγές αποθηκεύτηκαν");
    }
    else {
        //mysql_query("ROLLBACK");
        showAlertDialog("Κάτι πήγε λάθος");
    }

}

?>