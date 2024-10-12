<?php

require_once("../db_conn.php");

if (isset($_POST["addCategory"])) {
    $categoryName = $_POST["categoryName"];

    $sql = "INSERT INTO category (category_name) VALUES ('$categoryName')";


    mysqli_query($conn, $sql);

    header("Location: category.php");
}

if (isset($_POST["updateCategory"])) {
    $categoryName = $_POST["categoryName"];
    $categoryId = $_POST["categoryId"];

    $sql = "UPDATE category SET category_name = '$categoryName' WHERE category_id = $categoryId";

    mysqli_query($conn, $sql);

    header("Location: category.php");
}





if (isset($_POST["addCuisine"])) {
    $cuisineName = $_POST["cuisineName"];

    $sql = "INSERT INTO cuisine_type (cuisine_name) VALUES ('$cuisineName')";


    mysqli_query($conn, $sql);

    header("Location: cuisine.php");
}


if (isset($_POST["updateCuisine"])) {
    $cuisineName = $_POST["cuisineName"];
    $cuisineId = $_POST["cuisineId"];

    $sql = "UPDATE cuisine_type SET cuisine_name = '$cuisineName' WHERE cuisine_id = $cuisineId";

    mysqli_query($conn, $sql);

    header("Location: cuisine.php");
}








if (isset($_POST["addDiet"])) {
    $dietName = $_POST["dietName"];

    $sql = "INSERT INTO diet_preference (diet_pref_name) VALUES ('$dietName')";


    mysqli_query($conn, $sql);

    header("Location: diet.php");
}


if (isset($_POST["updateDiet"])) {
    $dietName = $_POST["dietName"];
    $dietId = $_POST["dietId"];

    $sql = "UPDATE diet_preference SET diet_pref_name = '$dietName' WHERE diet_pref_id = $dietId";

    mysqli_query($conn, $sql);

    header("Location: diet.php");
}




if (isset($_POST["addItemButton"])) {
    $category = $_POST["categoryName"];
    $cuisine = $_POST["cuisineName"];
    $diet = $_POST["dietName"];
    $itemName = $_POST["itemName"];
    $itemDes = $_POST["itemDes"];
    $price = $_POST["itemPrice"];
    $dis = $_POST["itemDis"];
    $total = $_POST["totalPrice"];
    $itemAva = $_POST["itemAva"];

    $img_name = $_FILES["itemImg"]["name"];
    $img_size = $_FILES["itemImg"]["size"];
    $tmp_name = $_FILES["itemImg"]["tmp_name"];
    $error = $_FILES["itemImg"]["error"];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png", "webp");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . "." . $img_ex_lc;
        $img_upload_path = "../images/" . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        $sql = "INSERT INTO item (category_id,cuisine_id,diet_pref_id, item_name,item_description,item_image,
        item_price,item_discount ,total_price,stock) VALUES ('$category','$cuisine','$diet','$itemName','$itemDes',
        '$new_img_name','$price','$dis','$total','$itemAva')";

        mysqli_query($conn, $sql);
        header("Location: item.php");
    } else {
        $em = "You can't upload files of this type";
        header("Location: item.php?error=$em");
    }
}

if (isset($_POST["updateItemButton"])) {
    $itemId = $_POST["itemId"];
    $category = $_POST["categoryName"];
    $cuisine = $_POST["cuisineName"];
    $diet = $_POST["dietName"];
    $itemName = $_POST["itemName"];
    $itemDes = $_POST["itemDes"];
    $itemImg = $_POST["itemImg"];
    $price = $_POST["itemPrice"];
    $dis = $_POST["itemDis"];
    $total = $_POST["totalPrice"];
    $itemAva = $_POST["itemAva"];

    echo $category;

    if (!empty($_FILES["itemImg"]["name"])) {
        // Handle file upload and update $itemImg with the new file name
        $new_img_name = handleFileUpload($_FILES["itemImg"]);
        $itemImg = $new_img_name;
    }

    $sql = "UPDATE item SET category_id = '$category',cuisine_id = '$cuisine',
    diet_pref_id = '$diet',item_name = '$itemName',item_description = '$itemDes',item_image = '$itemImg',
    item_price = '$price',item_discount = '$dis',total_price = '$total',stock = '$itemAva'
     WHERE item_id = $itemId";


    mysqli_query($conn, $sql);

    

    header("Location: item.php");
}



function handleFileUpload($file) {
    $img_name = $file["name"];
    $img_size = $file["size"];
    $tmp_name = $file["tmp_name"];
    $error = $file["error"];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png", "webp");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . "." . $img_ex_lc;
        $img_upload_path = "../images/" . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        return $new_img_name;
    } else {
        $em = "You can't upload files of this type";
        header("Location: edititem.php?error=$em");
        exit(); // Exit to avoid further execution
    }
}
