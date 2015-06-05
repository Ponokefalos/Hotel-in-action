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

    if ($count >=1 ) {
       return true;
    } else {
       return false;
    }
}


function getUserFromDatabase($username,$link){
    $sql = "SELECT * "
        . "FROM users WHERE username='$username' ";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if($count ==1){
        $row = mysqli_fetch_assoc($result);

        $user = new User($row['name'], $row['surname'], $row['username'], $row['email'], $row['image'], $row['userType']);
    }
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
function saveNewUserOnDatabase($userCode, $name, $surname, $birthDate, $email, $companyName, $newsletter, $password, $username, $maleSex, $link,$image)
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

?>