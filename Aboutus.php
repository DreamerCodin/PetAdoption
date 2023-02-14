<?php include('config.php')?>

<?php 
$user_id = isset($_SESSION['usename']) == true ? $_SESSION['usename'] : false;
$userss_id = isset($_SESSION['users_id']) == true ? $_SESSION['users_id'] : false; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <title>Adoption is an option</title>
<link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
<body>
<div class="page_loader"></div>        
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="index.php">
                <img src="img/logo.png" alt="logo">
                <span>
              Adoption is an option
            </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                     <li class="nav-item dropdown active">
                        <a class="nav-link " href="index.php" id="" >
                            Home
                        </a>                   
                    </li> 
                     <li class="nav-item dropdown">
                        <a class="nav-link " href="a_pets.php"  aria-haspopup="true" aria-expanded="false">
                           Available Pets
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="Aboutus.php"  aria-haspopup="true" aria-expanded="false">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="contactus.php"  aria-haspopup="true" aria-expanded="false">
                            Contact Us
                        </a>
                    </li>

                    <?php if(!empty($user_id)){ ?>


                   <?php }elseif(!empty($userss_id)){?>


                
                    <li class="nav-item dropdown">
                       <a href="my-profile.php?id=<?php echo $userss_id;?>" class="btn btn-sm btn-block btn-round signup-link dashboard btn-box" aria-haspopup="true" aria-expanded="false">
                           My Account
                        </a>
                    </li>

                 

                    <?php } ?>

                    <li class="nav-item">     
                        
                         <?php if(!empty($user_id)){?>   
                           <a class="btn btn-sm btn-block btn-round signup-link dashboard btn-box" href="adminpanel/index.php">Dashboad</a> 

                           <?php }elseif(empty($userss_id) && empty($user_id)){?>

                           <a class="btn btn-sm btn-block btn-round signup-link dashboard" href="signup.php">Sign up</a> 
                           <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1 class="text-white">About Us</h1>
        </div>
    </div>
  
</div>
<!-- Sub Banner end -->

<div class="my-properties content-area">
    <div class="container">

<h2 class="mb-4">About US</h2>
<p>
<strong> Pet project is a charity site that brings together pets and those wishing to adopt</strong><br><br>
 our website creats a profile for each user, allowing them to add and edit personal data,
                check available pets and request to adopt them.<br>after requesting to adopt a pet,the user will recive a confirmation or denial of their request.
                <br> in pet project we bring you together with your next pet friend^_^
</p>



</div>
</div>



  <section class="info_section footer">
    <div class="container footer-inner">
      <div class="info_form">
        <div class="row">

      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-2 col-md-6 col-sm-6">
          <div class="info_logo">
            <div>
              <a href="">
              
                <span>
                  Adoption is an option
                </span>
              </a>
            </div>
            <h4>
              INFORMATION
            </h4>
            <p>
              Pet project is a charity site that brings together pets and those wishing to adopt.
                           
            </p>
          </div>
        </div>
        <div class="col-xl-4 col-lg-2 col-md-6 col-sm-6">
          <div class="info_insta ml-5">
          <div class="footer-item">
                    <h4>
                        Useful Links
</h4>
                    <ul class="links">
                        <li>
                            <a href="index.php"><i class="fa fa-angle-right"></i>Home</a>
                        </li>
                        <li>
                            <a href="Aboutus.php"><i class="fa fa-angle-right"></i>About Us</a>
                        </li>
                        <li>
                            <a href="contactus.php"><i class="fa fa-angle-right"></i>Contact Us</a>
                        </li>
                    

                        <?php if(!empty($user_id)){ ?>
                    
                        <li>
                            <a href="./adminpanel/index.php"><i class="fa fa-angle-right"></i>Dashboard</a>
                        </li>                    
                        <?php }elseif(!empty($userss_id)){?>
                        <li>
                            <a href="my-profile.php?id=<?=$userss_id?>"><i class="fa fa-angle-right"></i>My Account</a>
                        </li>  

                        <?php } ?>
                       
                    </ul>
                </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-2 col-md-6 col-sm-6">
          <div class="info_links ">
            <h4>
              Get in touch
                        </h4>
            <div class="info_contact">
              <div class="contact_link_box">
               
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span>
                    Call +01 1234567890
                  </span>
                </a>
                <a href="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span>
                    PetProject@gmail.com
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </section>

  

</body>

</html>
