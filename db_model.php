<?php

session_start();

require_once("db_conn.php");

if (isset($_POST["inquire"])) {

    $email = $_POST["email"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $phoneNo = $_POST["phoneNo"];
    $nic = $_POST["nic"];
    $venue = $_POST["venue"];
    $date = $_POST["date"];
    $starttime = $_POST["starttime"];
    $endtime = $_POST["endtime"];
    $type = $_POST["type"];
    $noPeople = $_POST["noPeople"];
    $additional = $_POST["additional"];

    $sql = "INSERT INTO bookings (nic_number,first_name,last_name,
        email,mobile_number,venue,event_date,start_time,end_time,type_of_event
        ,no_of_people,additional) VALUES ('$nic','$fName','$lName','$email','$phoneNo'
        ,'$venue','$date','$starttime','$endtime','$type',
        '$noPeople','$additional')";

    mysqli_query($conn, $sql);

    header("Location: inquireform.php?inquiry=success");

}



if (isset($_POST["reservation"])) {

    $email = $_POST["email"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $phoneNo = $_POST["phoneNo"];
    $nic = $_POST["nic"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $noofpeople = $_POST["noofpeople"];
    $request = $_POST["request"];


    $sql = "INSERT INTO reservations (nic_number,no_of_people,date,time,first_name,last_name,
        phone_number,email,request) VALUES ('$nic', '$noofpeople','$date','$time','$fName','$lName','$phoneNo',
        '$email','$request')";

    mysqli_query($conn, $sql);

    
    header("Location: reservations.php?reservation=success");

}


?>