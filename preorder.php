<?php
session_start();
require_once("db_conn.php");

if (!isset($_SESSION["user"])) {
    echo "<script>window.location = 'loginform.php'</script>";
}

// Fetch items from the database
$itemsQuery = "SELECT * FROM item";
$itemsResult = mysqli_query($conn, $itemsQuery);

$items = [];
while ($item = mysqli_fetch_assoc($itemsResult)) {
    $items[] = $item;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outer Clove</title>
    <link rel="stylesheet" href="mainstyles1.css">
    <link rel="stylesheet" href="formstyles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&family=Julius+Sans+One&family=Mulish:wght@200&family=Quattrocento&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-std" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <script src="hamburger.js" defer></script>
    <script src="arrows.js" defer></script>
</head>

<body>

    <header class="header">
        <div class="nav-bar">
            <div class="heading">
                The Gallery Cafe
            </div>
            <div class="links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php
                    $sql = "SELECT * FROM category LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<li><a href="menu.php?category_id=' . $row["category_id"] . '">Menu</a></li>';
                    ?>
                    <li><a href="promotions.php">Promotions & Offers</a></li>
                    <li><a href="location.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="onlineorder.php">Online Order</a></li>
                    <li><a href="reservations.php?reservation=">Reserve</a></li>
                    <?php

if (isset($_SESSION["user"])) {
    // Display logout link if user is logged in
    echo '<li class="nav-item"><a href="logout.php">Logout</a></li>';
    echo '<li class="nav-item"><a href=""><i class="fa-solid fa-user"></i></a></li>';
    echo "<div style='display:flex; padding-top:10px; justify-content:center; align-items:center; margin:0px 5px;'><p style='font-size: 16px'>Hi " . htmlspecialchars($_SESSION['user']['user_fname']) . "</p></div>";
} else {
    // Display login icon if user is not logged in
    echo '<li class="nav-item"><a href="loginform.php"><i class="fa-solid fa-user"></i></a></li>';
}
?>
                </ul>
            </div>
            <div class="cover-offer">
                <div class="hamburger">
                    <i class='bx bx-menu'></i>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </header>

    <main class="reservations-main">
        <section class="form">
            <div class="form-container">
                <h2>Pre-Order Your Food</h2>
                <form id="preOrderForm" action="process_preorder.php" method="post">
                    <div id="itemsContainer">
                        <div class="item-group">
                            <label for="item">Select Item</label>
                            <select class="item-name-select" name="items[0][item_id]" required>
                                <option value="" disabled selected>Select an item</option>
                                <?php foreach ($items as $item): ?>
                                    <option value="<?php echo $item['item_id']; ?>"><?php echo $item['item_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="quantity">Quantity</label>
                            <select class="item-qty-select" name="items[0][quantity]" required>
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <button type="button" class="remove-item">-</button>
                        </div>
                    </div>
                    <button type="button" class="add-item">Add Another Item</button>
                    <button type="submit" class="submit-order">Submit Pre-Order</button>
                </form>
            </div>
            <?php
if (isset($_SESSION['message'])) {
    echo '<div class="overlay" id="popup-overlay">
            <div class="popup">
                <span class="close" id="popup-close">&times;</span>
                <h2>' . $_SESSION['message'] . '</h2>
            </div>
          </div>';
    unset($_SESSION['message']);
}
?>
        </section>
        <?php include("footer.php"); ?>
    </main>

    <script>
        let itemIndex = 1;

        document.querySelector('.add-item').addEventListener('click', function() {
            const lastItemGroup = document.querySelector('.item-group:last-child');
            const itemSelect = lastItemGroup.querySelector('select[name^="items["][name$="[item_id]"]');
            const quantitySelect = lastItemGroup.querySelector('select[name^="items["][name$="[quantity]"]');

            if (itemSelect.value === "" || quantitySelect.value === "") {
                alert("Please fill out the item and quantity fields before adding another item.");
                return;
            }

            const container = document.getElementById('itemsContainer');
            const itemGroup = document.createElement('div');
            itemGroup.className = 'item-group';
            itemGroup.innerHTML = `
                <label for="item">Select Item</label>
                <select class="item-name-select" name="items[${itemIndex}][item_id]" required>
                    <option  value="" disabled selected>Select an item</option>
                    <?php foreach ($items as $item): ?>
                        <option value="<?php echo $item['item_id']; ?>"><?php echo $item['item_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="quantity">Quantity</label>
                <select class="item-qty-select" name="items[${itemIndex}][quantity]" required>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <button type="button" class="remove-item">-</button>
            `;
            container.appendChild(itemGroup);
            itemIndex++;
        });

        document.querySelector('#preOrderForm').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-item')) {
                e.target.parentElement.remove();
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
    const popupOverlay = document.getElementById('popup-overlay');
    const popupClose = document.getElementById('popup-close');

    if (popupOverlay) {
        popupOverlay.style.display = 'flex';
        popupClose.addEventListener('click', function() {
            popupOverlay.style.display = 'none';
        });
    }
});
</script>

<!-- Styles for pre-order form -->

</body>
</html>