<?php include 'includes/topheader.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'admin/includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background: #F1F4FD;
    }

    .slider-wrapper {
        overflow: hidden;
        white-space: nowrap;
    }

    .slider-wrapper .image-list {
        display: inline-block;
        white-space: nowrap;
        animation: scroll 60s linear infinite;
    }

    .slider-wrapper .image-list .image-item {
        width: 325px;
        height: 400px;
        object-fit: cover;
        margin-right: 4px;
    }

    img {
        margin: 4px;
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .one {
        min-height: 600px;
        margin-top: 200px;
    }
    </style>
</head>

<body>
    <div class="one">
        <div class="slider-wrapper">
            <div class="image-list">
                <?php
            $sql = "SELECT * FROM picture_gal where status=1";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <a href="review.php?id=<?php echo $row['category_id']; ?>">
                    <img src="admin/uploadimage/galleryimg/<?php echo $row['image']; ?>" alt="" class="image-item">
                </a>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
    <?php include 'includes/topfooter.php'; ?>
    <?php include 'includes/footer.php'; ?>
</body>

</html>