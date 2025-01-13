<?php
$mess='';
if(isset($_GET['mess'])){
$mess=$_GET['mess'];
}
session_start();
include 'connect.php';

if(isset($_POST['login'])){
  $username=  $_POST['username'];
   $passowrd= $_POST['password'];
   $sql="select * from reg where username='$username' and password='$passowrd'";
   $result= mysqli_query($con,$sql);
   $row =mysqli_fetch_assoc($result);
   if($row!==null){
    if($row['status']!=='suspended'){
    $_SESSION['username']=$row['username'];
    //echo $_SESSION['username'];
    header("location:index.php");
    }else{
        $mess="Your account is suspended.Please contact your Admin";
    }
   }else{
    $mess="Username and Password incorrect";
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
                    <h2 class="text-center text-primary">Login Here</h2>
                </div>
            </div>
        </div>
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-danger">
                    <?php
                    
                        echo $mess;
        
                    ?>
                    </div>
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="username" id="" class="form-control">
                    <label for="" class="form-label">Password</label>
                    <input type="text" name="password" id="" class="form-control">
                    <button type="submit" name="login" class="form-control btn btn-success mt-3 mb-5">Register</button>
                </div>
            </div>
        </div>
        </form>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">If You have account Already Please click <a href="login.php">Login Here</a></div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>