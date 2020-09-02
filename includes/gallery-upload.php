<?php

  if(isset($_POST['submit'])) {
    $newFileName = $_POST['filename'];
    if(empty($newFileName)) {
      $newFileName = "gallery";
    } else {
      $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $newImageTitle = $_POST['imagetitle'];
    $newImageDesc = $_POST['imagedesc'];
    
    $fileSrc = $_FILES['file'];

    //di dalam $_FILES itu ada beberapa idx seperti dibawah ini
    $fileName = $fileSrc["name"];
    $fileType = $fileSrc["type"];
    $fileTempName = $fileSrc["tmp_name"];
    $fileError = $fileSrc["error"];
    $fileSize = $fileSrc["size"];

    $fileActualExt = '';
    $fileExt = explode(".", $fileName);
    if(end($fileExt) === 'png') $fileActualExt = strtolower(end($fileExt));
    else $fileActualExt = strtoupper(end($fileExt));

    //Constraint extention allowed
    $allowed = array("JPG", "JPEG", "PNG");

    if(!in_array($fileActualExt, $allowed)) {
      echo "You need to upload a proper file type! ['JPEG', 'JPG', 'PNG']";
      exit();
    } else {
      if(!$fileActualExt === 0) {
        echo "Error Detected!";
        exit();
      } else {
        if($fileSize > 20000000) {
          echo "Your file size is to Big!";
        } else {
          $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
          $fileDestination = "../img/gallery/". $imageFullName;
          //make connection
          include_once "dbh.inc.php";
          //proper statement
          if(empty($newImageTitle) || empty($newImageDesc)) {
            header("Location: ../gallery.php?upload=empty");
            exit();
          } else {
            $sql = "SELECT * FROM gallery;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL Statement Failed";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $rowCount = mysqli_num_rows($result);
              $setImageOrder = $rowCount + 1;

              $sql= "INSERT INTO gallery (gallery_title,	gallery_desc,	gallery_img_name,	gallery_order) 
              VALUES (?,?,?,?);";
              if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL Statement Failed";
              } else {
                mysqli_stmt_bind_param($stmt, "ssss", $newImageTitle, $newImageDesc, $imageFullName, $setImageOrder);
                mysqli_stmt_execute($stmt);

                move_uploaded_file($fileTempName, $fileDestination);
                header("Location: ../gallery.php?upload=success");
              }

            }
          }
        }
      }
    }
  }
?>