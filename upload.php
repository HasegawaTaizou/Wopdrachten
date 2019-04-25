<?php include('database/config.inc.php')  ?>
<?php
$uploaddone =false;
$fileimage = "" ;
$secondfile = "" ;
$size = "";
$status = "";
$type = "";
$clienterror = "" ;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $fileimage = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $fileimage = "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $secondfile = "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $size = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $type = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $clienterror = "Sorry, your file was not uploaded,due to an error of the client";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $status = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded." ;
        $uploaddone =true ;
    } else {
        $status = "Sorry, there was an error uploading your file, due to server error";
    }

}

  echo "<script type='text/javascript'>alert('$fileimage $secondfile  $size $type  $clienterror  $status');</script>";

 ?>
 <?php include("includes/configtitle.php") ?>
 <!DOCTYPE html>
   <html>
     <head>

       <!--Meta informatie hieronder-->
       <?php include("includes/HEAD.php")
       ?>
     </head>
   <body>
     <!--Dit is de navigatie-->
     <?php include("includes/navbar.php") ?>
     <div class="link">
<p><a href="overzicht.php">terug</a></p>
</div>
<?php if ($uploaddone == true ){
  $link = mysqli_connect($db['server'], $db['user'], $db['password'],$db['database']);
 echo "$target_file";
 $naam = ''.$_POST['name'];
 $description = ''.$_POST['discription'];
 $price = ''.$_POST['price'];
 $image = ''.$target_file;
 $sql = "INSERT INTO `products`
 SET
     `naam` = '" . mysqli_real_escape_string($link, $naam) . "',
     `description` = '" . mysqli_real_escape_string($link, $description) . "',
    `price` = '" . mysqli_real_escape_string($link, $price) . "',
     `image` = '" . mysqli_real_escape_string($link,$image) . "' ";
     echo $sql . '<br>';
     mysqli_query($link, $sql);
     echo mysqli_error($link) . '<br>';
}
 ?>
<?php include("includes/Footer.php") ?>
</body>
</html>
