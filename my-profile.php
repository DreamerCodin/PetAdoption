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

<?php 

$userss_id = isset($_SESSION['users_id']) == true ? $_SESSION['users_id'] : false; 

$sql = "SELECT * FROM users where id= $userss_id ";
$sqlcon = mysqli_query($dblink,$sql);

if($row = mysqli_fetch_array($sqlcon)){
   
     $name = $row['name'];
     $phone = $row['phone'];
     $address = $row['address'];
     $email = $row['email'];
     $username = $row['username'];

}

if(isset($_POST['submit'])){

    $name_e = $_POST['name'];
    $phone_e = $_POST['phone'];
    $address_e = $_POST['address'];
    $email_e = $_POST['email'];


$sqlup = "UPDATE users SET name='$name_e',phone='$phone_e',address='$address_e',email='$email_e' where id= $userss_id ";
$sqlup_con = mysqli_query($dblink,$sqlup);
 
if($sqlup_con){

    ?>

<script>
window.location = window.location
</script>

<?php 
}
}

?>

<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1 class="text-white">My Profile</h1>
        </div>
    </div>
   
</div>
<div class="my-profile content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="edit-profile-photo">
                    <img src="img/dumy.jpg" style="height: 18pc;" alt="profile-photo" class="img-fluid">
                </div>
                <div class="my-account-box">
                    <ul>
                        <li>
                            <a href="my-profile.php" class="active">
                                <i class="flaticon-people"></i>My Profile
                            </a>
                        </li>
                        <li>
                            <a href="mypets.php">
                                <i class="fa fa-paw"></i>Adoption Requests
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <i class="flaticon-exit"></i>Log Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="my-address">
                    <h3 class="heading-2">My Account</h3>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="input-text" name="name" value="<?= $name?>" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="input-text" name="phone" value="<?= $phone?>" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="input-text" name="email" value="<?= $email?>" placeholder="">
                        </div>
                        <div class="form-group mb-5">
                            <label>Address</label>
                            <input type="text" class="input-text" name="address" value="<?= $address?>" placeholder="">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-block btn-round signup-link dashboard btn-box" onsubmit="reload();" name="submit" value="Save Changes">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
  <!-- Footer start -->
<!-- info section -->
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
<script>
function reload() { 

location.href('my-profile.php');

}
</script>

