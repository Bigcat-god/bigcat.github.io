<?php
if (isset($_POST['send'])) {
    $id = $_POST['id'];
    $server = $_POST['server'];
    $price = $_POST['price'];
$target_file = $_FILES["image"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
    $to = 'minthihaoo.13@gmail.com';
    $subject = "New Customer";
    $body = "New Customer
             ID number     = $id
             Server        = $server
             Price         = $price
             Cash-Image Details--> $target_file";
    $headers  ="ID number: ".$id."\r\n";
    $headers .="Server number: ".$server."\r\n";
    $headers .="Amount : ".$price."\r\n";
    $headers .="Image : ".$target_file."\r\n";
    $headers .="MIME-Version: 1.0\r\n";
    $headers .="Content-type: text/html; charset=utf-8";
    $send = mail($to,$subject,$body,$headers);
    if ($send) {
        echo '<br>';
        echo 'ဝယ်ယူအားပေးမှုကိုအထူးကေျးဇူးတင်ပါသည်။';
    } else {
        echo 'လုပ်ေဆာင်မှုမအောင်မြင်ပါ။';
    }
    }
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    