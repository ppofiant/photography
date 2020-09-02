<?php

if(isset($_POST['submit'])) {
  require 'dbh.inc.php';

  $email = $_POST['email'];
  $password = $_POST['pwd'];

  if(empty($email) || empty($password)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
  } else {
    $sql = "SELECT * FROM admintable WHERE admin_email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      //Error condition
      header ("Location: ../login.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)) {
        if($password != $row['admin_password']) {
          header("Location: ../login.php?error=wrongpassword".$row['admin_password']);
          exit();
        } else if($password == $row['admin_password']) {
          session_start();
          $_SESSION['admin_uid'] = $row['admin_id'];
          $_SESSION['admin_email'] = $row['admin_email'];
          header("Location: ../gallery.php?login=success");
          exit();
        } else {
          header("Location: ../login.php?error=runtimeerror");
          exit();
        }
      } else {
        header("Location: ../login.php?error=notfound");
        exit();
      }
    }
  }
} else {
  header("Location: ../index.php");
  exit();
}