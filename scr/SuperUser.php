<?php

/**
 * Created by PhpStorm.
 * User: filta
 * Date: 9/6/2015
 * Time: 2:03 πμ
 */
class SuperUser
{

    function SuperUser($name, $username, $surname, $email, $image, $password, $birthDate, $companyName, $gender, $code, $newLetter, $userID)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $this->image = $image;
        $this->password = $password;
        $this->birthDate = $birthDate;
        $this->companyName = $companyName;
        $this->gender = $gender;
        $this->code = $code;
        $this->newsLetter = $newLetter;
        $this->userID = $userID;
    }
}