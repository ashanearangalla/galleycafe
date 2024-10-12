<?php

session_start();
require_once("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["signup"])) {

        $email = $_POST["email"];
        $fName = $_POST["firstName"];
        $lName = $_POST["lastName"];
        $password = $_POST["password"];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO user (email,first_name,last_name
        ,password) VALUES ('$email','$fName','$lName','$hashed_password')";

        mysqli_query($conn, $sql);

        header("Location: loginform.php?signup=success");
    }


} else {
    header(" Location:signup.php");
    die();
}
