<?php
require_once("db_conn.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_SESSION['user']['user_id']; // Assuming customer is logged in and ID is stored in session
    $items = $_POST['items'];
    
    // Calculate total cost
    $total = 0;
    foreach ($items as $item) {
        $item_id = $item['item_id'];
        $quantity = $item['quantity'];
        
        // Query to get the price of the item
        $priceQuery = "SELECT item_price FROM item WHERE item_id = ?";
        $priceStmt = mysqli_prepare($conn, $priceQuery);
        mysqli_stmt_bind_param($priceStmt, 'i', $item_id);
        mysqli_stmt_execute($priceStmt);
        mysqli_stmt_bind_result($priceStmt, $price);
        mysqli_stmt_fetch($priceStmt);
        mysqli_stmt_close($priceStmt);
        
        $total += $price * $quantity;
    }

    // Insert into order table
    $orderQuery = "INSERT INTO `order` (user_id, total, status) VALUES (?, ?, 'Pending')";
    $orderStmt = mysqli_prepare($conn, $orderQuery);
    mysqli_stmt_bind_param($orderStmt, 'id', $customer_id, $total);
    $orderResult = mysqli_stmt_execute($orderStmt);
    $order_id = mysqli_insert_id($conn); // Get the inserted order ID
    mysqli_stmt_close($orderStmt);

    if ($order_id) {
        // Insert into order_item table
        foreach ($items as $item) {
            $item_id = $item['item_id'];
            $quantity = $item['quantity'];
            
            $orderItemQuery = "INSERT INTO order_item (order_id, item_id, quantity) VALUES (?, ?, ?)";
            $orderItemStmt = mysqli_prepare($conn, $orderItemQuery);
            mysqli_stmt_bind_param($orderItemStmt, 'iii', $order_id, $item_id, $quantity);
            mysqli_stmt_execute($orderItemStmt);
            mysqli_stmt_close($orderItemStmt);
        }

        $_SESSION['message'] = "Pre-order placed successfully!<br/> Order No: #$order_id<br/> Total: Rs $total.00";
        $_SESSION['order_id'] = $order_id; // Store order ID in session
        $_SESSION['total'] = $total; // Store total in session
        header('Location: preorder.php'); // Redirect to the pre-order page
    } else {
        $_SESSION['message'] = "Failed to place pre-order. Please try again.";
        header('Location: preorder.php'); // Redirect to the pre-order page
    }
    exit();
}