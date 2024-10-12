<?php
include("header.php");
?>


    <section class="cover-promotion">

        <div class="cover-image-promotions">




        </div>
    </section>
<main>
    <section class="promotions-container">
        <div class="promotions-heading">
            <p>Promotions & Offers</p>
        </div>
        <div class="promotions">
            <div class="banner-box-1">

            </div>
            <div class="banner-box-2">

            </div>
            <div class="banner-box-3">

            </div>
            <div class="banner-box-4">

            </div>
            <div class="banner-box-5">

            </div>
            <div class="banner-box-6">

            </div>
            <div class="banner-box-7">

            </div>
        </div>

    </section>


    
<section class="promotions-browse">

<div class="menu-container-home">
    <div class="menu-card-home">
        <div class="menu-heading-home">
            <p>
                Browse Our Items
            </p>
            <div class="arrows">
                <i class="fa-solid fa-angle-left"></i>
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </div>
        <div class="menu-list-home">
        <?php
                $sql = "SELECT * FROM item
                        WHERE offers = 'Yes' ";
                        
                
                $result = mysqli_query($conn,$sql);
                $queryResults = mysqli_num_rows($result);
                            
                    if($queryResults > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="item-home">
    
                                <img id="resturant-image-home" src="images/'.$row["item_image"].'" alt="">
                                <p class="order-item-name-home">
                                    '.$row["item_name"].'
    
                                </p>
                                <div class="prices">
                                    <p class="price">LKR '.$row["item_price"].'</p>
                                    <p class="total">LKR '.$row["total_price"].'</p>
                                </div>
                            </div>
                       ';
                        }
                    }
                ?>
            

        </div>





    </div>
</div></section>


<?php
    include("footer.php");
?>



</body>

</html>