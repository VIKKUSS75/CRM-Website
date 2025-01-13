<?php
include 'connect.php';
$mess='';
if(isset($_POST['querysubmit'])){
$qemail=$_POST['qemail'];
$query=$_POST['query'];
$status='unread';
$sql1="insert into query(email,query,status) values('$qemail','$query','$status')";
$result1=mysqli_query($con,$sql1);
if($result1){
    $mess="Successfully Query Submitted";
}
}
?>
<section id="footer">
        <img src="media/border2.png" alt="">
        <div class="container pt-5">
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="media/logo.png" alt="" id="logo">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex tempora doloremque aliquam quasi illo placeat omnis officia laudantium optio. Cupiditate, vel iusto magnam natus eum quidem. Fugit voluptatibus nisi quis temporibus odio minus necessitatibus modi quos exercitationem tenetur? Quia voluptatum, ea animi repellendus libero quasi alias dolores consectetur. Cumque, odio.</p>
                </div>
                <div class="col-md-4">
                    <h2>Company Name</h2>
                    <p class="icon"><i class="bi bi-house-door-fill"></i>: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore, odit dolorum rerum sed magnam deleniti vitae doloribus. Vel, error sint.</p>
                    <p class="icon"><i class="bi bi-telephone"></i>:)141-2552525</p>
                    <p class="icon"><i class="bi bi-phone-fill"></i>:+91-73737377</p>
                    <p class="icon"><i class="bi bi-geo-alt"></i>:</p>
                </div>
                <div class="col-md-4">
                    <h2>Query Form</h2>
                    <div>
                    <?php
                    echo $mess;
                    ?>
                    </div>
                    <form action="" method="post">
                    <input type="text" name="qemail" id="" class="form-control mb-2" placeholder="Email" required>
                    <input type="text" name="query" id="" class="form-control mb-2" placeholder="Query" required>
                    <button type="submit" name='querysubmit' class="btn btn-success form-control">Submit Query</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row text-center">
                <div class="col-md-12">
                    <p id="footerp"><img src="media/instagram-icon.png" alt="">
                    <img src="media/linkedin-icon.png" alt="">
                    <img src="media/snapchat-icon.png" alt="">
                    <img src="media/twitter-icon.png" alt="">
                </p>
                </div>
            </div>
        </div>
    </section>