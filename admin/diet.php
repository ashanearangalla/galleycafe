<?php
session_start();
require_once("../db_conn.php");
include("sidemenu.php");






if (isset($_POST["editDiet"])) {
    $dietId = $_POST["diet_id"];

    $sql = "SELECT * FROM diet_preference WHERE diet_pref_id = $dietId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $overlayDisplay = 'block';
    $popupContainerDisplay = 'block';

    $dietName = $row["diet_pref_name"];
}

if (isset($_POST["deleteDiet"])) {
    $dietId = $_POST["diet_id"];

    $sql = "DELETE FROM diet_preference WHERE diet_pref_id = $dietId";

    mysqli_query($conn, $sql);

    header("Location: diet.php");
}

?>

<div class="dashboard-content">


    <div class="heading-box">
        <div class="box-1">

            <div class="title">
                <p>DIETS</p>
                
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
                        <th>DIET ID</th>
                        <th>DIET NAME</th>
                        <th>DIET ADDED TIME</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>
                    </tr>

                    <?php


                    $sql = "SELECT * FROM diet_preference";

                    $result = mysqli_query($conn, $sql);
                    $queryResults = mysqli_num_rows($result);

                    if ($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<form action='diet.php' method='post'>
                          <tr>
                          <td id='ID'>" . $row["diet_pref_id"] . "</td>
                          <td> " . $row["diet_pref_name"] . "</td>
                          <td>" . $row["diet_pref_added_date"] . "</td>
                          <input type='hidden' name='diet_id' value=" . $row["diet_pref_id"] . ">
                          <td><button id='update' name='editDiet'> Edit</button></td>
                          <td><button id='bin' name='deleteDiet'><i class='ri-delete-bin-line'></i></button> </td>
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
            <button id="popupButtonDiet" class="submit">
                Add a new Diet
            </button>
        </div>

    </div>
</div>


<div id="overlay"></div>

<div id="popupContainerDiet" class="popupContainer">
    <div id="popupContent">
        <div class="popup-header">
            <div class="form-heading-popup">
                <p>Add a Diet</p>
            </div>
            <i onclick="closePopup()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post">
            <div class="popup-content">

                <div class="add-category-form">

                    <div class="inputs-popup">

                        <div class="col1-popup">
                            <label class="labels-popup" for="dietName">Diet Name:</label><br>
                            <input class="divided-input-popup" placeholder="Diet Name" type="text" name="dietName" id="dietName" />
                        </div>

                    </div>


                </div>




            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">
                    <button name="addDiet" class="button-popup">
                        Add Diet
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
                <p>Edit Diet</p>
            </div>
            <i onclick="closePopupEdit()" class="bi bi-x"></i>

        </div>
        <form action="edititem.php" method="post">
            <div class="popup-content">

                <div class="add-category-form">

                    <div class="inputs-popup">

                        <div class="col1-popup">
                            <label class="labels-popup" for="dietName">Diet Name:</label><br>
                            <input type='hidden' name='dietId' value=<?php echo $dietId ?>>
                            <input class="divided-input-popup" placeholder="Diet Name" type="text" name="dietName" id="dietName" value="<?php echo $dietName; ?>" />
                        </div>

                    </div>

                </div>

            </div>

            <div class="popup-footer">
                <div class="button-popup-footer">


                    <button name="updateDiet" class="button-popup">
                        Update Diet
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

    var popupButtonDiet = document.getElementById('popupButtonDiet');
    var overlay = document.getElementById('overlay');
    var popupContainerDiet = document.getElementById('popupContainerDiet');

    overlay.style.display = overlayDisplay;
    popupContainerCategoryEdit.style.display = popupContainerDisplay;



    popupButtonDiet.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupContainerDiet.style.display = 'block';
    });

    popupButtonCategoryEdit.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupContainerCategoryEdit.style.display = 'block';
    });



    function closePopup() {
        overlay.style.display = 'none';

        popupContainerDiet.style.display = 'none';

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