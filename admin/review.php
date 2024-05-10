<?php
include 'includes/topheader.php';
include 'includes/header.php';
include 'admin/includes/functions.php';

$image_id = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "SELECT * FROM picture_gal WHERE category_id = $image_id";
$result = mysqli_query($conn, $sql);
$image = mysqli_fetch_assoc($result);

// Check if image exists
if ($image) {
    $image_path = 'admin/uploadimage/' . $image['image'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Review Image</title>
        <style>
            .main-container {
                margin-top: 10%;
            }
        </style>
    </head>

    <body>
        <div class="container main-container">
            <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                <div class="row flex-lg-row align-items-center g-5 py-5 my-5" style="width: 90%;">
                    <div class="col-8 col-sm-6 col-lg-4" style="top: 0; left: 0; width: 100%; height: 100%; opacity: 1;">
                        <img src="<?php echo $image_path; ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" style="width: 100%; max-height:450px;" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-center">
                            <?php echo $image['name'] ?></h1>
                        <p class="lead text-center">
                            <?php echo $image['description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    // If the image doesn't exist, display an error message
    echo "Image not found.";
}
?>
<?php
include 'includes/topfooter.php';
include 'includes/footer.php';
?>