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

if(isset($_GET['del']))
		  {
		          mysqli_query($dblink,"DELETE from adp_request where id = '".$_GET['id']."'");
				   
                 
                  $_SESSION['delmsg']="Deleted !!";


		  }

?>

<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="page-name">
            <h1 class="text-white">Adoption Requests</h1>
        </div>
    </div>
    
</div>
<div class="my-properties content-area">
    <div class="container">
        <div class="row">
             <div class="col-lg-4 col-md-12 col-sm-12">
                 <div class="edit-profile-photo">
                     <img src="img/dumy.jpg" style="height: 18pc;"alt="profile-photo" class="img-fluid">
                 </div>
                 <div class="my-account-box">
                     <ul>
                         <li>
                             <a href="my-profile.php">
                                 <i class="flaticon-people"></i>My Profile
                             </a>
                         </li>
                  
                         <li>
                             <a href="mypets.php" class="active">
                                 <i class="flaticon-internet"></i>Adoption Requests
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
             <div class="col-lg-8 col-md-12 col-sm-12">
                <h3 class="heading-2">All Requests</h3>
                 <div class="my-properties">
                     <table class="table brd-none">
                         <thead>
                         <tr align="center">
                             <th>Pets Detaile</th>
                             <th></th>
                             <th><span class="hedin-div">Request</span></th>
                             <th>Action</th>
                         </tr>
                         </thead>
                         <tbody>
<?php 
 
$userss_id = isset($_SESSION['users_id']) == true ? $_SESSION['users_id'] : false; 

$sql = "SELECT adp_request.*,pets.*,adp_request.id as adp_id,adp_request.status as reqstatus  FROM adp_request join pets on pets.id=adp_request.pet_id where adp_request.user_id=$userss_id AND pets.id=adp_request.pet_id";
$sql_con = mysqli_query($dblink,$sql);

while($row=mysqli_fetch_assoc($sql_con)){

    $images = json_decode($row['image'])[0];  

?>
                         <tr>                             
                             <td class="image">
                                 <img alt="properties-small" src="img/imagess/<?= $images;?>" class="img-fluid">
                                 </td>
                                <td>
                                 <div class="inner">
                                 <h5><a href="pets-details.php?id=<?php echo $row['id']?>"><?= $row['name'];?></a></h5>
                                     <figure class="hedin-div"> <?= $row['color'];?>&nbsp;<?= $row['gender'];?></figure>
                                     <div class="tag price"><?= $row['age'];?>&nbsp;<?= $row['type'];?></div>
                                 </div>
                             </td>
                             <td align="center">                                 
                             <?php  if($row['reqstatus'] == 0){ ?>
                                  <a href="#" class="btn btn-danger text-white">Pending</a>
								  <td class="actions text-center" align="center">
                                 <a href="mypets.php?id=<?php echo $row['adp_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" title="Remove this row">delete my request</a>
                             </td>

                                 <?php }elseif($row['reqstatus'] == 1){ ?>
                                    <a href="#" class="btn btn-success text-white">Approved</a>
									 <td class="actions text-center" align="center">
									 approved requests can't be cancelled
                                 </td>
									
									

                                <?php  }elseif($row['reqstatus'] == 2){ ?>
                                    <a href="#" class="btn btn-danger text-white">Rejected</a>
									<td class="actions text-center" align="center">
									 rejected requests can't be cancelled
                                 </td>
                                 
                               <?php }?>
                                                            
                             </td>
                             
                             
                         </tr>

                         <?php } ?>

                         </tbody>
                     </table>
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
                                <img src="img/logo.png" alt="" />
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
