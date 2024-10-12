<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");



if (isset($_POST["editItem"])) {

    $itemId = $_POST["item_id"];
    $sql = "SELECT * FROM item 
    INNER JOIN category ON category.category_id = item.category_id 
    INNER JOIN cuisine_type ON cuisine_type.cuisine_id = item.cuisine_id 
    INNER JOIN diet_preference ON diet_preference.diet_pref_id = item.diet_pref_id
    WHERE item_id = $itemId";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $overlayDisplay = 'block';
    $popupContainerDisplay = 'block';

    $itemName = $row["item_name"];
    $categoryName = $row["category_name"];
    $categoryId = $row["category_id"];
    $cuisineName = $row["cuisine_name"];
    $cuisineId = $row["cuisine_id"];
    $dietName = $row["diet_pref_name"];
    $dietId = $row["diet_pref_id"];
    $itemDes = $row["item_description"];
    $itemImg = $row["item_image"];
    $price = $row["item_price"];
    $dis = $row["item_discount"];
    $total = $row["item_price"];
    $itemAva = $row["stock"];
}

if (isset($_POST["deleteItem"])) {
    $itemId = $_POST["item_id"];

    $sql = "DELETE FROM item WHERE item_id = $itemId";

    mysqli_query($conn, $sql);

    header("Location: item.php");
}

?>

<div class="dashboard-content">


    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>PRODUCTS</p>
                <!-- <h2>Welcome To 4You</h2> -->
            </div>
        </div>
        <div class="box-1">
            <div class="search-bar">
                <ul>
                    <li class="search">
                        <!--Search bar-->
                        <form action="search.php" method="post">

                            <input type="text" placeholder="Search items" name="search" <?php
                                                                                        // Check if the session variable is set and not empty
                                                                                        if (isset($_SESSION["search"]) && !empty($_SESSION["search"])) {
                                                                                            echo 'value="' . $_SESSION["search"] . '"';
                                                                                        }
                                                                                        ?> required id="search-input" />
                            <i class="bx bx-search-alt-2"></i>


                        </form>
                    </li>

                </ul>


            </div>
        </div>
    </div>

    <div class="table-section-item">


        <div class="table-container-item">

            <div class="table-box">

                <table id="rows-def">
                    <tr id="table-head">
                        <th>ITEM ID</th>
                        <th>CATEGORY</th>
                        <th>CUISINE</th>
                        <th>DIET</th>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>PRICE</th>
                        <th>DISC</th>
                        <th>TOTAL</th>
                        <th>AVAILABLE</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>


                    <?php

                    $sql = "SELECT * FROM item
                    INNER JOIN category ON category.category_id = item.category_id 
                    INNER JOIN cuisine_type ON cuisine_type.cuisine_id = item.cuisine_id 
                    INNER JOIN diet_preference ON diet_preference.diet_pref_id = item.diet_pref_id";

                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<form action='item.php' method='post'>
                            <tr>
                      <td id='ID'>" . $row["item_id"] . "</td>
                      <td> " . $row["category_name"] . "</td>
                      <td>" . $row["cuisine_name"] . "</td>
                      <td> " . $row["diet_pref_name"] . "</td>
                      <td>" . $row["item_name"] . "</td>
                      <td>" . $row["item_description"] . "</td>
                      <td>" . $row["item_price"] . "</td>
                      <td>" . $row["item_discount"] . "</td>
                      <td>" . $row["total_price"] . "</td>
                      <td>" . $row["stock"] . "</td>
                      <input type='hidden' name='item_id' value=" . $row["item_id"] . ">
                    <td><button id='update' name='editItem'> Edit</button></td>
                    <td><button id='bin' name='deleteItem'><i class='ri-delete-bin-line'></i></button> </td>

                  </tr></form>";
                        }
                    }

                    ?>




                </table>


            </div>




        </div>
    </div>
    <div class="bottom-box">
        <div class="button">
            <button id="popupButtonItem" class="submit">
                Add a new Item
            </button>
        </div>

    </div>


</div>



<div id="overlay-2"></div>
<div id="popupContainerItem">
    <div id="popupContent-item">
        <div class="popup-header-item">
            <div class="form-heading-popup-item">
                <p>Add a Category</p>
            </div>
            <i onclick="closePopupItem()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post" enctype="multipart/form-data">
            <div class="popup-content-item">



                <div class="add-category-form-item">

                    <div class="inputs-popup-item">

                        <div class="inputs-popup-item-box1">
                            <div class="col1-popup-item">
                                <label class="labels-popup" for="categoryName">Category Name:</label><br>
                                <select class="average-dropdown-popup" name="categoryName" id="categoryName">
                                <option selected="selected"  hidden>Select Category</option>
                                    <?php


                                    $sql = "SELECT * FROM category";

                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);

                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row["category_id"] . "'>" . $row["category_name"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="cuisineName">Cuisine Name:</label><br>
                                <select class="average-dropdown-popup" name="cuisineName" id="cuisineName">
                                <option selected="selected"  hidden>Select Cuisine</option>
                                    <?php


                                    $sql = "SELECT * FROM cuisine_type";

                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);

                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row["cuisine_id"] . "'>" . $row["cuisine_name"] . "</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="dietName">Diet Name:</label><br>
                                <select class="average-dropdown-popup" name="dietName" id="dietName">
                                    <option selected="selected" hidden>Select Diet</option>
                                    <?php


                                    $sql = "SELECT * FROM diet_preference";

                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);

                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option  value='" . $row["diet_pref_id"] . "'>" . $row["diet_pref_name"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemName">Item Name:</label><br>

                                <input class="divided-input-popup-item" placeholder="Item Name" type="text" name="itemName" id="itemName" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemDescription">Item Description:</label><br>
                                <textarea class="textarea-popup" name="itemDes" id="itemDescription" placeholder="Item Description"></textarea>

                            </div>
                        </div>

                        <div class="inputs-popup-item-box2">

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemImg">Item Image:</label><br>
                                <input class="divided-input-popup-file" type="file" name="itemImg" id="itemImg" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemPrice">Item Price:</label><br>
                                <input class="divided-input-popup-item" placeholder="Item Price" type="text" name="itemPrice" id="itemPrice" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemDis">Item Discount:</label><br>
                                <input class="divided-input-popup-item" placeholder="Item Discount" type="text" name="itemDis" id="itemDis" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="totalPrice">Total Price:</label><br>
                                <input class="divided-input-popup-item" placeholder="Total Price" type="text" name="totalPrice" id="totalPrice" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemAva">Item Availability:</label><br>
                                <input class="divided-input-popup-item" placeholder="Item Availability" type="text" name="itemAva" id="itemAva" />
                            </div>
                        </div>



                    </div>


                </div>


            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">
                    <button name="addItemButton" class="button-popup">
                        Add Item
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>






<div id="popupContainerItem-edit">
    <div id="popupContent-item">
        <div class="popup-header-item">
            <div class="form-heading-popup-item">
                <p>Edit Item</p>
            </div>
            <i onclick="closePopupItemEdit()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post" enctype="multipart/form-data">
            <div class="popup-content-item">



                <div class="add-category-form-item">

                    <div class="inputs-popup-item">

                        <div class="inputs-popup-item-box1">
                            <div class="col1-popup-item">
                                <label class="labels-popup" for="categoryName">Category Name:</label><br>
                                <select class="average-dropdown-popup" name="categoryName" id="categoryName">
                                    <option selected="selected"  value='<?php echo $categoryId; ?>' hidden><?php echo $categoryName; ?></option>

                                    <?php


                                    $sql = "SELECT * FROM category";

                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);

                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row["category_id"] . "'>" . $row["category_name"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="cuisineName">Cuisine Name:</label><br>
                                <select class="average-dropdown-popup" name="cuisineName" id="cuisineName">
                                    <option selected="selected" value='<?php echo $cuisineId; ?>' hidden><?php echo $cuisineName; ?></option>
                                    <?php


                                    $sql = "SELECT * FROM cuisine_type";

                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);

                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row["cuisine_id"] . "'>" . $row["cuisine_name"] . "</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="dietName">Diet Name:</label><br>
                                <select class="average-dropdown-popup" name="dietName" id="dietName">
                                    <option selected="selected" value='<?php echo $dietId; ?>' hidden><?php echo $dietName; ?></option>

                                    <?php


                                    $sql = "SELECT * FROM diet_preference";

                                    $result = mysqli_query($conn, $sql);
                                    $queryResults = mysqli_num_rows($result);

                                    if ($queryResults > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row["diet_pref_id"] . "'>" . $row["diet_pref_name"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemName">Item Name:</label><br>
                                <input type='hidden' name='itemId' value=<?php echo $itemId ?>>
                                <input class="divided-input-popup-item" placeholder="Item Name" type="text" name="itemName" id="itemName" value="<?php echo $itemName; ?>" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemDescription">Item Description:</label><br>
                                <textarea class="textarea-popup" name="itemDes" id="itemDescription" placeholder="Item Description"><?php echo $itemDes; ?></textarea>

                            </div>
                        </div>

                        <div class="inputs-popup-item-box2">

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemImg">Item Image:</label><br>
                                <input class="divided-input-popup-file" type="file" name="itemImg" id="itemImg"  />
                                <input type='hidden' name='itemImg' value=<?php echo $itemImg ?>>
                                <?php
                                if (!empty($itemImg)) {
                                    echo "<p>Selected File: $itemImg</p>";
                                }
                                ?>
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemPrice">Item Price:</label><br>
                                <input class="divided-input-popup-item" placeholder="Item Price" type="text" name="itemPrice" id="itemPrice" value="<?php echo $price; ?>" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemDis">Item Discount:</label><br>
                                <input class="divided-input-popup-item" placeholder="Item Discount" type="text" name="itemDis" id="itemDis" value="<?php echo $dis; ?>" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="totalPrice">Total Price:</label><br>
                                <input class="divided-input-popup-item" placeholder="Total Price" type="text" name="totalPrice" id="totalPrice" value="<?php echo $total; ?>" />
                            </div>

                            <div class="col1-popup-item">
                                <label class="labels-popup-item" for="itemAva">Item Availability:</label><br>
                                <input class="divided-input-popup-item" placeholder="Item Availability" type="text" name="itemAva" id="itemAva" value="<?php echo $itemAva; ?>" />
                            </div>
                        </div>



                    </div>


                </div>


            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">
                    <button name="updateItemButton" class="button-popup">
                        Update Item
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>





<script>
    var overlayDisplay = '<?php echo isset($overlayDisplay) ? $overlayDisplay : 'none'; ?>';
    var popupContainerDisplay = '<?php echo isset($popupContainerDisplay) ? $popupContainerDisplay : 'none'; ?>';


    var popupContainerItemEdit = document.getElementById('popupContainerItem-edit');
    var popupButtonItem = document.getElementById('popupButtonItem');
    var overlay2 = document.getElementById('overlay-2');
    var popupContainerItem = document.getElementById('popupContainerItem');

    overlay2.style.display = overlayDisplay;
    popupContainerItemEdit.style.display = popupContainerDisplay;


    popupButtonItem.addEventListener('click', function() {
        overlay2.style.display = 'block';
        popupContainerItem.style.display = 'block';
    });

    popupButtonItemEdit.addEventListener('click', function() {
        overlay2.style.display = 'block';
        popupContainerItemEdit.style.display = 'block';
    });

    function closePopupItem() {
        overlay2.style.display = 'none';
        popupContainerItem.style.display = 'none';

    }

    function closePopupItemEdit() {
        overlay2.style.display = 'none';
        popupContainerItemEdit.style.display = 'none';
    }

    overlay2.addEventListener('click', function() {
        closePopupItem();
        closePopupItemEdit()
    });
</script>



<script>
    var overlayDisplay = '<?php echo isset($overlayDisplay) ? $overlayDisplay : 'none'; ?>';
    var popupContainerDisplay = '<?php echo isset($popupContainerDisplay) ? $popupContainerDisplay : 'none'; ?>';
    var popupButtonCategory = document.getElementById('popupButtonCategory');
    var overlay = document.getElementById('overlay');
    var popupContainerCategory = document.getElementById('popupContainerCategory');
    var popupContainerCategoryEdit = document.getElementById('popupContainerCategory-edit');

    overlay.style.display = overlayDisplay;
    popupContainerCategoryEdit.style.display = popupContainerDisplay;

    popupButtonCategory.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupContainerCategory.style.display = 'block';
    });

    popupButtonCategoryEdit.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupContainerCategoryEdit.style.display = 'block';
    });

    function closePopup() {
        overlay.style.display = 'none';
        popupContainerCategory.style.display = 'none';
    }

    function closePopupEdit() {
        overlay.style.display = 'none';
        popupContainerCategoryEdit.style.display = 'none';
    }

    overlay.addEventListener('click', function() {
        closePopup();
        closePopupEdit()
    });
</script>


</body>

</html>