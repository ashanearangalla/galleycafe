<?php
include("db_conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            min-height: 100vh;
        }

        .alb {

            height: 200px;
            padding: 5px;
        }

        .alb img {
            width: 100%;
            height: 100%;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <a href="index.php">&#8592;</a>
    <?php
    $sql = "SELECT * FROM gallery ORDER BY image_id DESC";

    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) { ?>

            <div class="alb">
                <img src="images/<?= $row["image_name"]?>">
            </div>
    <?php }
    } ?>
    <a href="index.html">Home</a>
</body>

</html>