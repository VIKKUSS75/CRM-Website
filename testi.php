<?php
session_start();
include 'connect.php';
$mess="";
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
$sql1="select * from reg where username='$username'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($result1);
$status= $row1['role'];
$role=$row1['role'];
}
?>
<?php
if($role=='pvt'){
if(isset($_POST['testi'])){
$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="./image/".$filename;
$word=$_POST['word'];
$company=$_POST['company'];
$status="inactive";
$sql="insert into testi(image,word,company,status) values('$filename','$word','$company','$status')";
$result=mysqli_query($con,$sql);
if(move_uploaded_file($tempname,$folder)){
$mess="Posted Successfully";
}else{
 $mess="not uploaded Successfully";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Start here-->
    <?php
    include 'header.php';
    ?>
    <!-- Header end here-->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
       <img src="media/border1.png" alt="" id="img1">
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h2 class="text-center text-primary pt-3">Testinominal Post Here</h2>
                <div class="text-success"><?php echo $mess;?></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="uploadfile" id="" class="form-control" required>
                    <label for="" class="form-label">Word For Us</label>
                    <textarea name="word" id="" class="form-control" required></textarea>
                    <label for="" class="form-label">Company/Origanization</label>
                    <input type="text" name="company" id="" class="form-control" required>
                    <button type="submit" name="testi" class="form-control btn btn-success mt-2">Image Upload</button>
    </form>
                </div>
            </div>
        </div>
       
    </section>


    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php
}else{
    echo"You don't have rights to see the page.Please cordinate with Admin.";
}
?>