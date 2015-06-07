<?php

/**
 * Created by PhpStorm.
 * User: Jim
 * Date: 31/5/2015
 * Time: 4:24 μμ
 */

/*
 * Configuration information is stored here.
 */
$conf['db']['db_Host'] = '83.212.96.13';
$conf['db']['db_Login'] = 'toor';
$conf['db']['db_PWord'] = 'toor';
$conf['db']['db_Name'] = 'site';
$conf['db']['db_Port'] = '3306';

$link = mysqli_connect($conf['db']['db_Host'], $conf['db']['db_Login'], $conf['db']['db_PWord'], $conf['db']['db_Name'], $conf['db']['db_Port']);
mysqli_query($link, 'SET NAMES utf8');
//session_start();
if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}
?>
