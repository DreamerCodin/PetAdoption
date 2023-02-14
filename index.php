<?php include('config.php')?>

<?php 
$user_id = isset($_SESSION['usename']) == true ? $_SESSION['usename'] : false;
$userss_id = isset($_SESSION['users_id']) == true ? $_SESSION['users_id'] : false; 
?>

<!DOCTYPE html>

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
    <section class=" slider_section position-relative">
      <div class="slider_bg_box">
        <img src="img/slider-bg.jpg" alt="">
      </div>
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-7 col-lg-6">
                  <div class="detail-box">
                    <h1>
                      Welcome to
                                        <br>Our Pet adoption service
                    </h1>
                    <p>
                      every pet deserves a home. find your next pet friend <3
                                  
					 </p>
                    <div class="btn-box">
                      <a href="contactus.php" class="btn-1">
                      Contact us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
           
      </div>
    </section>
  </div>
  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="img-box">
            <img src="img/about-img.jpg" alt="" />
          </div>
        </div>
        <div class="col-lg-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
                <hr>
              </h2>
            </div>
            <p>
              Pet project is a charity site that brings together pets and those wishing to adopt.<br>
                            our website creats a profile for each user, allowing them to add and edit personal data,
                            check available pets and request to adopt them.<br>after requesting to adopt a pet,the user will recive a confirmation or denial of their request.
                            <br> in pet project we bring you together with your next pet friend^_^

                        </p>
            <a href="Aboutus.php" class="btn-box">
              <span class="text-white">
                Read More
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="wedo_section layout_padding-bottom mt-5">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          <hr>
          List of Pets
          <hr>
        </h2>
        <p>
          Here you will be able to check all available pets.
        </p>
      </div>
      <div class="row mt-4">

      <?php                
                $sql_all = "SELECT * FROM pets where status=0 OR status=1" ;
                $sql_all_con = mysqli_query($dblink,$sql_all);
                while($row = mysqli_fetch_assoc($sql_all_con)){
                   $images = json_decode($row['image'])[0];
               
               ?>
               
                           <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                               <div class="property-box">
                               <div class="team-1">
                                   <div class="team-photo">
                                   <?php if($row['status'] == 0){
                                      if(!empty($userss_id) || !empty($user_id)){ 
                                     ?>
                                   <a href="pets-details.php?id=<?= $row['id']?>" class="property-img" tabindex="0">
                                               <div class="listing-badges">
                                                   <span class="featured">Adopt Now</span>
                                               </div>
                                            
                                               <img class="d-block w-100" src="img/imagess/<?= $images;?>" alt="properties">
                                           </a>
                                           <?php }else{ ?>

                                            <a class="property-img" tabindex="0" data-bs-toggle="modal" data-bs-target="#myModal5"><!-- here -->

                                               <div class="listing-badges">
                                                   <span class="featured">Adopt Now</span>
                                               </div>
                                            
                                               <img class="d-block w-100" src="img/imagess/<?= $images;?>" alt="properties">
                                           </a>
                                           
                                     <?php } }else{?>   
                                      
                                      <a  class="property-img" tabindex="0" style="cursor:auto">
                                               <div class="listing-badges">
                                                   <span class="featured">Adopted</span>
                                               </div>
                                            
                                               <img class="d-block w-100" src="img/imagess/<?= $images;?>" alt="properties">
                                           </a>
                                           <?php }?> 
                                   </div>
                                   
                                   <div class="detail">
                                           <h1 class="title" style="cursor:auto">
                                               <a tabindex="0"><?= $row['name'];?></a>
                                           </h1>
                                           <div class="location">
                                           <ul class="facilities-list clearfix">
                                           
                                    <li>
                                       <strong> Color :</strong>
                                        <span>  <?= $row['color']?></span>
                                    </li>
                                    <li>
                                        <strong> Gender :  </strong>
                                        <span><?= $row['gender']?></span>
                                    </li>
                                    <li>
                                        <strong> Age :  </strong>
                                        <span><?= $row['age']?></span>
                                    </li> 
                                                                    
                                    <li>                                       
                                        <strong> Type :  </strong>
                                        <span><?= $row['type']?></span>
                                    </li>  
                                    <li>
                                       
                                        <strong> Description :  </strong>
                                        <span><?= $row['description']?></span>
                                    </li>                             
                                </ul>                                              
                                           </div>
                                       </div>
                                       <div class="footer clearfix booknow">
                                         <?php if($row['status'] == 0){
                                           if(!empty($userss_id) || !empty($user_id)){ ?>
                                       <a href="pets-details.php?id=<?= $row['id']?>" class="btn btn-outline pt-2 pb-2 w-100">Adopt Now</a> 
                                       <?php }else{ ?>
                                        <button class="btn btn-outline pt-2 pb-2 w-100 adopt">Adopt Now</button> 
                                      <?php } }else{ ?>
                                      <button class="btn btn-outline pt-2 pb-2 w-100" >Adopted</button> 
                                        
                                        <?php }?>                      
                                       </div>                                   
                               </div>
                             </div>
                           </div>
               
                           <?php }?>
      </div>
    </div>
  </section>
  <section class="wedo_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          <hr>
          What We Do
          <hr>
        </h2>
        <p>
          
        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="img/s1.png" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Pet Adoption
              </h6>
              <p>
                we allow users to submit adoption requests
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="img/s2.png" alt="">
            </div>
            <div class="detail-box">
              <h6>
                Pet Care
              </h6>
              <p>
               We take care of animals until they find a new home!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="gallery_section ">
    <div class="container-fluid">
      <div class="heading_container heading_center">
        <h2>
          <hr>
          Gallery
          <hr>
        </h2>
      </div>
      <div class="row">
        <div class=" col-sm-8 col-md-6 px-0">
          <div class="img-box">
            <img src="img/g1.jpg" alt="">
            
          </div>
        </div>
        <div class="col-sm-4 col-md-3 px-0">
          <div class="img-box">
            <img src="img/g2.jpg" alt="">
            
          </div>
        </div>
        <div class="col-sm-6 col-md-3 px-0">
          <div class="img-box">
            <img src="img/g3.jpg" alt="">
            
          </div>
        </div>
        <div class="col-sm-6 col-md-3 px-0">
          <div class="img-box">
            <img src="img/g4.jpg" alt="">
            
          </div>
        </div>
        <div class="col-sm-4 col-md-3 px-0">
          <div class="img-box">
            <img src="img/g5.jpg" alt="">
           
          </div>
        </div>
        <div class="col-sm-8 col-md-6 px-0" >
          <div class="img-box">
            <img src="img/g6.jpg" alt="" >
            
          </div>
        </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="myModal5" tabindex="-1" class="justify-content-center" role="dialog">
	<form id="demo-form2" method="POST" enctype="multipart/form-data" class="form-horizontal" accept-charset="utf-8">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="popup" style="padding: 0.2em;background: rgb(255, 255, 255);border: 2px solid #5aa469;border-left: 6px solid #5aa469;border-radius: 5px;border-radius: 4px;font-family: Verdana, Arial, sans-serif;transform: translateY(5vh);position: absolute;width: 600px;height: auto;top: -44px;">
				<div class="modal-body" style="padding:10px;">
					<div class="col-sm-12 d-flex">
					
					&nbsp; &nbsp;<h6 class="mt-2">You must Sign Up</h6>
					</div>
				</div>
			</div>
		</div>
	</form>
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

<script src="js/jquery-2.2.0.min.js"></script>

<script src="js/bootstrap.min.js"></script>






</body>

</html>


<script>
$('.adopt').on('click',function(){

console.log('product_check');

      $('#myModal5').modal('show');
      setTimeout("$('#myModal5').modal('hide');",2000);

});

$('[data-fancybox]').fancybox({
  buttons : [
    'close'
  ],
  wheel : false,
  transitionEffect: "slide",
  loop            : true,
  toolbar         : false,
  clickContent    : false
});

</script>
