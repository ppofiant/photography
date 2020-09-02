<?php
  session_start();
  if(isset($_SESSION['admin_email'])) {
    header("Location: gallery.php");
    exit();
  } else {
    session_destroy();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/home.css">
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
            <li><a href="#" id="active">GALLERY</a></li>
            <li><a href="#">ABOUT</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="content__login__as">
    <div class="content__ct">
      <h2>WELCOME TO MY PHOTOGRAPHY PAGE</h2>
      <p>This is page just for improve my PHP Framework by creating photography website.
        You only can see this page as guest and see whole gallery but can't upload something.</p>
    </div>
    <div class="content__button__choice">
      <p><a id="guest" href="gallery.php">I'm a guest</a></p>
      <p><a id="admin" href="login.php">I'm a Admin</a></p>
    </div>
  </div>
</body>

</html>