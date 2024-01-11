<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="custom.css">
</head>
<body>
    <section>
        <div class="img-div">
            <p>UPI ID:&nbsp;mmkhambhatwala@kotak</p>
            <img src="image/qr.jpeg" alt="QR-CODE">
            <div>
                <form method="POST" action="" enctype="multipart/form-data">
                <input type="file" id="file" name="file">
                <button name="submit" id="submit">submit</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php
error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['submit'])) {
 
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "./userphoto/" . $filename;
 
    $db = mysqli_connect("localhost", "root", "", "khambatdb");
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO fileupload (file) VALUES ('$filename')";
 
    // Execute query
    mysqli_query($db, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
?>