<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile Picture</title>
	<style>
        body{
          margin: auto;
          width: 40%;
          padding: 20px;
        }

        .make-it-center{
          margin: auto;
          width: 75%;
        }

        .error{
        	color: red;
        }

        .required:after {
          content:"*";
          color: red;
        }
    </style>
</head>
<body>
<?php
$imgErr = "";
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["upload_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $mime_type_arr = array('jpg', 'png', 'jpeg');

    if (empty($_POST["upload_image"])) {
      $imgErr .= "Please select an image file! It can't be empty ,";
      $uploadOk = 0;	
    } 

  if (in_array($imageFileType, $mime_type_arr)) {
      echo $_FILES["upload_image"]["size"];

      
  	if ($_FILES["upload_image"]["size"] > 4000000) {
	  $imgErr .= " Sorry, your file is larger than 4MB";
	  $uploadOk = 0;
	} else {
		if (file_exists($target_file)) {
		  $imgErr .= " Sorry, this image already exists.";
		  $uploadOk = 0;
		} else{
			if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $target_file)) {
			    echo "<span style='color:green;'>"."The image ". htmlspecialchars( basename( $_FILES["upload_image"]["name"])). " has been uploaded succesfully for your profile picture :).</span>";
			  } else {
			    $imgErr .= "Sorry, there was a problem uploading your image.";
			  }
		}
	}
  } else {
  	$imgErr .= "You can only upload JPG, JPEG & PNG files";
	$uploadOk = 0;
  }

}
?>

<div class="make-it-center">
<fieldset>
<legend> <b> Profile Picture</b></legend>
<img src="pp.jpg" alt="pp"> <hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"> 

  <input type="file" id="upload_image" name="upload_image"><br>
  <span class="error"> <?php echo $imgErr;?></span> <br><br>
   <hr>
  <input type="submit" value="Upload Profile Picture" name="submit">
  
</form>
</fieldset>
</div>

</body>
</html>