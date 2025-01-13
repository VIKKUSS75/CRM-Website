<section id="header">
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                          <a class="navbar-brand" href="index.php"><img src="media/logo.png" alt="" id="logo-img"></a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto" >
                              <?php
                              if(isset($_SESSION['username'])){
                               echo '
                               <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                              </li>
                               <li class="nav-item">
                                <a class="nav-link" href="profile.php">Welcome '.$_SESSION['username'].'</a>
                              </li>
                               <li class="nav-item">
                                <a class="nav-link" href="profile.php">Profile</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#footer">Contact</a>
                              </li>
                               <li class="nav-item">
                                <a class="nav-link" href="testi.php">Post Testinominal </a>
                              </li>
                              <li class="nav-item">
                              <a class="nav-link" href="logout.php">logout</a>
                            </li>
                              ';
                              }else{
                                echo'<li class="nav-item">
                                <a class="nav-link" href="reg.php">Registration</a>
                              </li>';
                              }
                              ?>
                              
                              
                              
                            </ul>
                          </div>
                        </div>
                      </nav>
                </div>
               








            </div>
        </div>
    </section>