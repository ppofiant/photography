<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">
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

  <div class="login__form">
    <h2>LOGIN</h2>
    <form action="includes/login.inc.php" method="POST">
      <input type="text" name="email" placeholder="E-Mail">
      <br>
      <input type="password" name="pwd" placeholder="Password">
      <br>
      <button name="submit">LOGIN</button>
    </form>
  </div>

</body>

</html>