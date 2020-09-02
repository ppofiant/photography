<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photography Index</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <!-- <p>Welcome to Photography</p> -->
  <div class="header__wrapper">
    <div class="header">
      <div class="header__container__left">
        <div class="header__logo">
          <a href="gallery.php"><img src="img/logo.png" alt="logo"></a>
        </div>
        <div class="header__navbar">
          <ul>
            <li><a href="#" id="active">GALLERY</a></li>
            <li><a href="#">ABOUT</a></li>
            <?php
                            if(isset($_SESSION['admin_uid'])) {
                                echo '<li><a href="upload_photo.php">UPLOAD</a></li>';
                            }
                        ?>
          </ul>
        </div>
      </div>
      <div class="header__container__right">
        <div class="header__profile">
          <?php
            if(isset($_SESSION['admin_uid'])) {
              echo '<a href="#">'.strtoupper('WELCOME, ' . $_SESSION['admin_email']).'</a>
                    <form action="includes/logout.inc.php" method="POST">
                      <button type="submit" name="logout-submit">LOGOUT</button>
                    </form>';
            } else {
              echo '<a href="login.php">LOGIN</a>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="content__wrapper">
    <div class="content">
      <div class="content__title">
        <h1>MY GALLERY</h1>
        <div class="underline"></div>
      </div>
      <div class="photo__container">
        <?php
                include_once 'includes/dbh.inc.php';

                $sql = "SELECT * FROM gallery ORDER BY gallery_order DESC";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL Statement Failed";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="#">
                                <div class="photo__content__link"><img src="img/gallery/'.$row['gallery_img_name'].'"></div>
                            </a>';
                    }
                }
                ?>
      </div>

      <?php
                if(isset($_SESSION['admin_uid'])) {
                    echo '<div class="button__upload">
                    <a href="upload_photo.php">Upload Photo</a>
                </div>';
                }
            ?>
    </div>
  </div>

  <div class="footer__wrapper">
    <div class="footer">
      <div class="contact__form">
        <div class="footer__address">
          <h1>
            Contact
            <div class="underline"></div>
          </h1>
          <p>Phone Number : +62 812345678910</p>
          <p>Linkedin : ppofiant26</p>
        </div>
        <div class="footer__logo">
          <img src="img/instagram.png" alt="instagram">
          <img src="img/mail-icon.png" alt="email">
        </div>
      </div>
      <p>&copy; All right reserved. PHP Framework</p>
    </div>
  </div>

</body>

</html>