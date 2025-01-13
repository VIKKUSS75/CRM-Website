<?php 
if(isset($_POST['upload'])){
$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="./image/".$filename;
//$sql="insert into image() values('$filename')";
//$result=mysqli_query($con,$sql);
if(move_uploaded_file($tempname,$folder)){
    echo"uploaded Successfully";
}else{
    echo"not uploaded Successfully";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadfile" id="">
        <button type="submit" name="upload">Image Upload</button>
    </form>
</body>
</html>