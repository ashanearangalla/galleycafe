<?php
session_start();
require_once("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["login"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];
        $errors = [];
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            $row = mysqli_fetch_assoc($result);

            if (!password_verify($password,$row["password"])) {
                $errors["login_incorrect"]= "Incorrect login Info!";
            } 
            
        }else {
            $errors["login_incorrect"]= "Incorrect login Info!";
        }

        if($errors) {
            $_SESSION["errors_login"] =$errors;
            header("Location: loginform.php?login=unsuccess");
            die();
        }
        
        $user_id=$row["user_id"];
        $user_email= htmlspecialchars($row["email"]);
        $user_type=htmlspecialchars($row["user_type"]);
        $user_fname=htmlspecialchars($row["first_name"]);
        $user_lname=htmlspecialchars($row["last_name"]);


        $userarray=array (
            "user_id"=>$user_id,"user_email"=> $user_email,"user_fname"=>$user_fname, "user_lname"=>$user_lname, "user_type"=>$user_type
        );

        $_SESSION["user"]=$userarray;

        if($user_type==="Customer"){
            header("Location: preorder.php");
        }else if(strtolower($user_type)==="admin") {
            header("Location: admin/item.php");
        }else if(strtolower($user_type)==="staff") {
            header("Location: admin/staff_itemview.php");
        }
        die();

    }


} else {
    header(" Location:signup.php");
    die();
}


?>