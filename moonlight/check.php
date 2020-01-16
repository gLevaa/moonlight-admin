<?php

session_start();

if(!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['suwoo'] != 'suwoo')
{
    header("Location: https://antrax.pw/indica/");
}

?>
