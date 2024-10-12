<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");



if (isset($_POST["editCategory"])) {
    $categoryId = $_POST["category_id"];

    $sql = "SELECT * FROM category WHERE category_id = $categoryId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $overlayDisplay = 'block';
    $popupContainerDisplay = 'block';

    $categoryName = $row["category_name"];
}

if (isset($_POST["deleteCategory"])) {
    $categoryId = $_POST["category_id"];

    $sql = "DELETE FROM category WHERE category_id = $categoryId";

    mysqli_query($conn, $sql);

    header("Location: category.php");
}

?>

<div class="dashboard-content">

    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>CATEGORIES</p>
               
            </div>
        </div>
        <div class="box-1">
            <div class="search-bar">
                <ul>
                    <li class="search">
                  
                        <form action="search.php" method="post">

                            <input type="text" placeholder="Search items" name="search" <?php
                           
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

    <div class="table-section">

        <div class="sort-button-box">

            <form action="category.php"><button class="filter">Categories</button></form>
            <form action="cuisine.php"><button class="filter">Cuisines</button></form>
            <form action="diet.php"><button class="filter">Diets</button></form>
        </div>


        <div class="table-container">

            <div class="table-box">

                <table id="rows-def">
                    <tr id="table-head">
                        <th>CATEGORY ID</th>
                        <th>CATEGORY NAME</th>
                        <th>CATEGORY ADDED TIME</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>
                    </tr>

                    <?php


                    $sql = "SELECT * FROM category";

                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<form action='category.php' method='post'>
                            <tr>
                          <td id='ID'>" . $row["category_id"] . "</td>
                          <td> " . $row["category_name"] . "</td>
                          <td>" . $row["cat_added_date"] . "</td>
                          <input type='hidden' name='category_id' value=" . $row["category_id"] . ">
                          <td><button id='update' name='editCategory'> Edit</button></td>
                          <td><button id='bin' name='deleteCategory'><i class='ri-delete-bin-line'></i></button> </td>
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
            <button id="popupButtonCategory" class="submit">
                Add a new Category
            </button>
        </div>


    </div>
</div>


<div id="overlay"></div>
<div id="popupContainerCategory" class="popupContainer">
    <div id="popupContent">
        <div class="popup-header">
            <div class="form-heading-popup">
                <p>Add a Category</p>
            </div>
            <i onclick="closePopup()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post">
            <div class="popup-content">

                <div class="add-category-form">

                    <div class="inputs-popup">

                        <div class="col1-popup">
                            <label class="labels-popup" for="categoryName">Category Name:</label><br>
                            <input class="divided-input-popup" placeholder="Category Name" type="text" name="categoryName" id="categoryName" value="" />
                        </div>

                    </div>

                </div>

            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">


                    <button name="addCategory" class="button-popup">
                        Add Category
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>


<div id="popupContainerCategory-edit" class="popupContainer">
    <div id="popupContent">
        <div class="popup-header">
            <div class="form-heading-popup">
                <p>Edit Category</p>
            </div>
            <i onclick="closePopupEdit()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post">
            <div class="popup-content">

                <div class="add-category-form">

                    <div class="inputs-popup">

                        <div class="col1-popup">
                            <label class="labels-popup" for="categoryName">Category Name:</label><br>
                            <input type='hidden' name='categoryId' value=<?php echo $categoryId ?>>
                            <input class="divided-input-popup" placeholder="Category Name" type="text" name="categoryName" id="categoryName" value="<?php echo $categoryName; ?>" />
                        </div>

                    </div>

                </div>

            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">


                    <button name="updateCategory" class="button-popup">
                        Update Category
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>


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