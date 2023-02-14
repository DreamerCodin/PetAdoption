<?php ob_start();?>
<?php include('config.php')?>

<?php 
$user_id = isset($_SESSION['usename']) == true ? $_SESSION['usename'] : false;
$userss_id = isset($_SESSION['users_id']) == true ? $_SESSION['users_id'] : false; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <title>
  Adoption is an option
  </title>
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

$msg = "";
$pet_id = $_GET['id'];

if(isset($_POST['add'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	$pliving = $_POST['pliving'];
	$age = $_POST['age'];
	$owned = $_POST['owned'];

  if(!empty($userss_id)){
    $user_id = $userss_id;
  }else{
    $user_id = 'admin';
  }
  
	$sql_client = "INSERT INTO adp_request VALUES(NULL,'{$fname}','{$lname}','{$phone}','{$email}','{$city}','{$pliving}','{$owned}','{$age}','{$pet_id}','{$user_id}',0)";

	$sql_client_con = mysqli_query($dblink, $sql_client);
   
	$last_id = $dblink->insert_id;

	if(!$sql_client_con){
		echo mysqli_error($dblink) ;
		// dangerMsg('There was an error.');
	}
	else{
      
		$msg ='Request submit successfully';
	}
}

?>

<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1>Pet Detail</h1>
        </div>
    </div>
   
</div>


<?php 


$select = "SELECT * FROM pets where id=$pet_id ";
$sel_con =mysqli_query($dblink,$select);

if($row = mysqli_fetch_assoc($sel_con)){

    $pet_id_id = $row['id'];
    $name = $row['name'];
    $color = $row['color'];
    $gender = $row['gender'];
    $age = $row['age'];
    $type = $row['type'];
    $gender = $row['gender'];
    $imagess = json_decode($row['image'])[0];
    $images = json_decode($row['image']);

}

?>

<div class="properties-details-page content-area">
    <div class="container">
        
<?php if($msg!=''){ ?>

<h4 class="text-dark mb-5" align="center"><?php echo $msg?></h4>

 <?php
  }
?>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                  

<section class="siderss">
  
  <div id="slider">

<?php
  foreach($images as $image){

?>
    <img src="img/imagess/<?= $image;?>" alt="random-image.jpg" class="item img-fluid" style="width:100% !important;height:600px;">
    <?php } ?>     
    
  </div>
</section>

                    <div class="heading-properties">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h3><?= $name?></h3>
                              <p><?= $age?>&nbsp;<?= $type?>&nbsp;<?= $color?></p>
                                </div>
                                <div class="pull-right">
                                    <h3>
                                    <span class="text-right"><?= $gender?></span>  
                                   </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>         
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="sidebar-left">
                   
                    <div class="widget search-area advanced-search d-none d-xl-block d-lg-block">
                        <h3 class="sidebar-title">Adoption Detail</h3>
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" name="fname" required class="form-control" id="date" placeholder="First Name">                           
                            </div>
                            <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="lname" name="lname" required class="form-control" id="lname" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Phone No.</label>

                            <input type="text" value="" name="phone" required class="form-control" placeholder="Phone#" required="">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Email</label>

                            <input type="email" value="" name="email" required class="form-control" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                            <label class="form-label">City</label>

                            <input type="text" value="" name="city" required class="form-control"placeholder="City" required="">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Place Of Living</label>

                            <input type="text" value="" name="pliving" required class="form-control" placeholder="Place of living" required="">
                            </div>               
                            <div class="form-group">
                            <label class="form-label">Age</label>

                            <input type="number" value="" name="age" required class="form-control" placeholder="Age" required="">
                            </div>
                            <div class="form-group">
                            <label class="form-label">Owned Pets</label>

                            <input type="number" value="" name="owned" required class="form-control" required="" placeholder="Owned pets">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="add" class="btn btn-sm btn-block btn-round signup-link dashboard nav-link ml-0">Submit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
       </div>
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





<script src="https://kit.fontawesome.com/3fd6ded94d.js" crossorigin="anonymous">
</script>