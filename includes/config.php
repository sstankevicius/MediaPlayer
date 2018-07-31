<?php

ob_start();
session_start();

$timezone = date_default_timezone_set("Europe/Vilnius");

$con = mysqli_connect("localhost", "root", "root", "slotify");

if (mysqli_connect_errno()) {
  echo "failed to connect: " . mysqli_connect_errno();
}



 ?>
