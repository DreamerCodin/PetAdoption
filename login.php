<?php ob_start();?>

<?php
 include('config.php');

$username = "";
$msg = "";
if (isset($_POST['login'])) {

  $username = $_POST["username"];
	$password = ($_POST["password"]);
	$user=mysqli_query($dblink,"SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1")
	
	or die(mysqli_error($dblink));
	$row=mysqli_fetch_array($user);

    if ($row){

		$_SESSION['usename']= $row['username'];

			if($row['type']=='admin'){
				setcookie('admin',true,time()+60*60*24*7);
			}
			
			
			setcookie('username',$username,time()+60*60*24*7);
			setcookie('loggedin',$username,time()+60*60*24*7);
			redirect_to("adminpanel/index.php");
    }else {
		$user=mysqli_query($dblink,"SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1")
	
		or die(mysqli_error($dblink));
		$row=mysqli_fetch_array($user);
	
		if ($row) {
		
			$_SESSION['users_id']= $row['id'];
            $users_id =$_SESSION['users_id'];
				if($row['type']=='hallowner'){
					setcookie('hallowner',true,time()+60*60*24*7);
				}
				
				
				setcookie('username',$username,time()+60*60*24*7);
				setcookie('loggedin',$username,time()+60*60*24*7);
				redirect_to("my-profile.php?id=$users_id");
		}else {
		  $msg = "Invalid Login.";
		}
    }
  }

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
                        <a href="my-profile.php?id=<?php echo $userss_id;?>" class="btn btn-sm btn-block btn-round signup-link dashboard nav-link" aria-haspopup="true" aria-expanded="false">
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
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="form-content-box">
                    <a href="index.html">
                    </a>
                    <div class="details ">
                        <h3>Sign into your account</h3>
                      
                        <form action="" method="post">
                        <?php if($msg!=''){ ?>

			            <p class="text-danger"><?php echo $msg?></p>

                         <?php
		                  }
		                ?>
                            <div class="form-group">
                                <input type="text" name="username" autocomplete="off" class="input-text" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" autocomplete="off" class="input-text" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <div class="ez-checkbox pull-left">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="login" class="btn-md button-theme btn-block">login</button>
                            </div>
                        </form>
                    </div>
                    <div class="footer">
                    <span>
                        Don't have an account? <a href="signup.php">Register here</a>
                    </span>
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



