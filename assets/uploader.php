<?php

  if (isset($_FILES["file"])) {
    $name = $_FILES["file"]["name"];
    $file = $_FILES["file"]["tmp_name"];
    $error = $_FILES["file"]["error"];
    $destination = "../files/$name";
    $upload = move_uploaded_file($file, $destination);

    if ($upload) {
      $json = array(
        "error" => false,
        "status" => http_response_code(200),
        "statusText" => "File uploaded succesfully",
        "files" => $_FILES["file"]
      );
    } else {
      $json = array(
        "error" => true,
        "status" => http_response_code(404),
        "statusText" => "Not Found",
        "files" => $_FILES["file"]
      );
    }
    echo json_encode($json);
  }

 ?>