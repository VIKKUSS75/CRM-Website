<?php
session_start();
include 'connect.php';
$mess="";
if(isset($_GET['mess'])){
    $mess=$_GET['mess'];
}
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
$sql="select * from reg where username='$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$email=$row['email'];
$img=$row['image'];
//update query
if(isset($_POST['update'])){
$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$emails= $_POST['emails'];
$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="./image/".$filename;
//$sql="insert into image() values('$filename')";
//$result=mysqli_query($con,$sql);
move_uploaded_file($tempname,$folder);
if($filename!==''){
$sql1="update reg set first_Name='$firstname',last_name='$lastname',email='$emails',image='$filename' where username='$username'";
$result1=mysqli_query($con,$sql1);
header("location:profile.php?mess=Profile has been updated Successfully");
}else{
    $sql1="update reg set first_Name='$firstname',last_name='$lastname',email='$emails' where username='$username'";
    $result1=mysqli_query($con,$sql1);
    header("location:profile.php?mess=Profile has been updated Successfully");
}
}
}else{
    header("location:login.php");
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

    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h2 class=" text-center text-primary pt-3 pb-3"><img src="image/<?php echo $img;?>" alt="" style="width:100px;border-radius:50%;"><?php echo $_SESSION['username']?>'s Profile</h2>
                <div class="text-success"><?php echo $mess;?></div>    
                <form action="" method="post" enctype="multipart/form-data">
                        <label for="" class="form-label">First Name</label>
                        <input type="text" name="firstname" id="" value="<?php echo $first_name;?>" class="form-control">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" name="lastname" id="" value="<?php echo $last_name;?>" class="form-control">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="emails" id="" value="<?php echo $email;?>" class="form-control">
                        <input type="file" name="uploadfile" id="" class="form-control mt-2">
                        <button type="submit" name="update" class="form-control btn btn-success mt-2">Update Profile</button>
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