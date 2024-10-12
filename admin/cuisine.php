<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");




if (isset($_POST["editCuisine"])) {
    $cuisineId = $_POST["cuisine_id"];

    $sql = "SELECT * FROM cuisine_type WHERE cuisine_id = $cuisineId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $overlayDisplay = 'block';
    $popupContainerDisplay = 'block';

    $cuisineName = $row["cuisine_name"];
}

if (isset($_POST["deleteCuisine"])) {
    $cuisineId = $_POST["cuisine_id"];

    $sql = "DELETE FROM cuisine_type WHERE cuisine_id = $cuisineId";

    mysqli_query($conn, $sql);

    header("Location: cuisine.php");
}

?>

<div class="dashboard-content">


    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>CUISINES</p>
              
            </div>
        </div>
        <div class="box-1">
            <div class="search-bar">
                <ul>
                    <li class="search">
                
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
                        <th>CUISINE ID</th>
                        <th>CUISINE NAME</th>
                        <th>CUISINE ADDED TIME</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>
                    </tr>

                    <?php


                    $sql = "SELECT * FROM cuisine_type";

                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<form action='cuisine.php' method='post'>
                          <tr>
                          <td id='ID'>" . $row["cuisine_id"] . "</td>
                          <td> " . $row["cuisine_name"] . "</td>
                          <td>" . $row["cuisine_added_date"] . "</td>
                          <input type='hidden' name='cuisine_id' value=" . $row["cuisine_id"] . ">
                          <td><button id='update' name='editCuisine'> Edit</button></td>
                          <td><button id='bin' name='deleteCuisine'><i class='ri-delete-bin-line'></i></button> </td>
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
            <button id="popupButtonCuisine" class="submit">
                Add a new Cuisine
            </button>
        </div>


    </div>
</div>


<div id="overlay"></div>

<div id="popupContainerCuisine" class="popupContainer">
    <div id="popupContent">
        <div class="popup-header">
            <div class="form-heading-popup">
                <p>Add a Cuisine</p>
            </div>
            <i onclick="closePopup()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post">
            <div class="popup-content">


                <div class="add-category-form">

                    <div class="inputs-popup">

                        <div class="col1-popup">
                            <label class="labels-popup" for="cuisineName">Cuisine Name:</label><br>
                            <input class="divided-input-popup" placeholder="Cuisine Name" type="text" name="cuisineName" id="cuisineName" />
                        </div>

                    </div>


                </div>




            </div>


            <div class="popup-footer">
                <div class="button-popup-footer">
                    <button name="addCuisine" class="button-popup">
                        Add Cuisine
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
                <p>Edit Cuisine</p>
            </div>
            <i onclick="closePopupEdit()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post">
            <div class="popup-content">

                <div class="add-category-form">

                    <div class="inputs-popup">

                        <div class="col1-popup">
                            <label class="labels-popup" for="cuisineName">Cuisine Name:</label><br>
                            <input type='hidden' name='cuisineId' value=<?php echo $cuisineId ?>>
                            <input class="divided-input-popup" placeholder="Cuisine Name" type="text" name="cuisineName" id="cuisineName" value="<?php echo $cuisineName; ?>" />
                        </div>

                    </div>

                </div>

            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">


                    <button name="updateCuisine" class="button-popup">
                        Update Cuisine
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>




<script>
    var overlayDisplay = '<?php echo isset($overlayDisplay) ? $overlayDisplay : 'none'; ?>';
    var popupContainerDisplay = '<?php echo isset($popupContainerDisplay) ? $popupContainerDisplay : 'none'; ?>';

    var popupContainerCategoryEdit = document.getElementById('popupContainerCategory-edit');

    var popupButtonCuisine = document.getElementById('popupButtonCuisine');
    var overlay = document.getElementById('overlay');
    var popupContainerCuisine = document.getElementById('popupContainerCuisine');

    overlay.style.display = overlayDisplay;
    popupContainerCategoryEdit.style.display = popupContainerDisplay;


    popupButtonCuisine.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupContainerCuisine.style.display = 'block';
    });

    popupButtonCategoryEdit.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupContainerCategoryEdit.style.display = 'block';
    });


    function closePopup() {
        overlay.style.display = 'none';
        popupContainerCuisine.style.display = 'none';

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