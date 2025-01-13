<?php
session_start();
include 'connect.php';
if(isset($_SESSION['username'])){
$sql="select * from banner";
$result =mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$title =$row['title'];
$sdesc =$row['sdesc'];
$ldesc =$row['ldes'];
$img=$row['image'];

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
                    <h2><?php echo $title;?></h2>
                    <p><?php echo $sdesc;?></p>
                    <a href="banner.php"><button class="btn btn-success">More Deatils</button></a>
                </div>
                <div class="col-md-4"><img src="admin/image/<?php echo $img;?>" alt="" style="border-radius:50%;width:150px;" class="d-block mx-auto"></div>
            </div>
        </div>
       <img src="media/border1.png" alt="" id="img1">
    </section>

    <section id="services">
        <div class="container">
            <h2 class="text-center text-success">Services</h2>
            <div class="row text-center">
            <?php
$sql="select * from service where status='active'";
$result=mysqli_query($con,$sql);
$sno=0;
if($result){
 while($row= mysqli_fetch_assoc($result)){
    $sno +=1;
    $id=$row['id'];
    $img="admin/image/".$row['image'];
    $sn=$row['sn'];
    $sdesc=$row['sdesc'];
               echo'<div class="col-md-3">
               <img src="'.$img.'" alt="" class="img-fluid">
               <h3>'.$sn.'</h3>
               <p>'.$sdesc.'</p>
           </div>';
 }
}
                ?>

                
                
            </div>
        </div>
    </section>

    <section id="testi" class="mt-2 mb-2">
        <div class="container">
            <h2 class="text-center text-primary">What Customers Says About Us</h2>
            <div class="row">
<?php
$sql="select * from testi where status='active'";
$result=mysqli_query($con,$sql);
$sno=0;
if($result){
 while($row= mysqli_fetch_assoc($result)){
    $sno +=1;
    $id=$row['id'];
    $img="image/".$row['image'];
    $word=$row['word'];
    $company=$row['company'];
               echo' <div class="col-md-4">
                <img src="'.$img.'" alt="" class="img-fluid" style="width: 80px;height:100px;">
                <p><span >Words For Us: </span>'.$word.'</p>
                <p><span>Company Name:</span>'. $company.'</p>
                </div>';
 }
}
                ?>
            </div>
        </div>
    </section>

    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>