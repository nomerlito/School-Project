<?php
    
    $img = $_POST['image'];
    $id = $_POST['id'];
    $folderPath = "images/avatar/";
    $uploadOk = 1;
    $newURL = "index.php";
    $msg = "Image Uploaded!";

    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $id . '.jpg';
    //$fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    print_r($msg);
    header('Location: '.$newURL);

    
  
?>
