<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/upload.css">
</head>
<body>

    <div class="header__wrapper">
        <div class="header">
            <div class="header__container__left">
                <div class="header__logo">
                    <a href="gallery.php"><img src="img/logo.png" alt="logo"></a>
                </div>
                <div class="header__navbar">
                    <ul>
                        <li><a href="gallery.php">GALLERY</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#" id="active">UPLOAD</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="upload__wrapper">
        <div class="upload">
            <h1>UPLOAD IMAGE</h1>
            <form action="includes/gallery-upload.php" method="post" enctype="multipart/form-data">
                <input type="text" name="filename" placeholder="File Name">
                <br>
                <input type="text" name="imagetitle" placeholder="Image Title">
                <br>
                <textarea name="imagedesc" rows="4" placeholder="Image Description"></textarea>
                <br>
                <input type="file" name="file">
                <br>
                <button type="submit" name="submit">UPLOAD</button>
            </form>
        </div>
    </div>


</body>
</html>