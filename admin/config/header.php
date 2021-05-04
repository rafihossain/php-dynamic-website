<!DOCTYPE html>
<html lang="en">

<head>
    <!--meta tag-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--title-->
    <title>admin panel project</title>

    <!--font awesome-->
    <link rel="stylesheet" href="inc/css/font-awesome.min.css">

    <!--boostrap-->
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">

    <!--custome css-->
    <link rel="stylesheet" href="inc/css/style.css">
</head>

<body>
    <!--heading section start-->
    <header>
        <div class="container-fluid header_full">

        </div>
    </header>
    <!--main section start-->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 side-bar">
                    <div class="user-profile ">
                        <img src="upload/<?php echo $_SESSION['photo'];?>" >

                        <h4><?= $_SESSION['name']; ?></h4>
                        <p><?= $_SESSION['role_name']; ?></p>
                        <p><i class="fa fa-circle"></i>Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
                            <?php if($_SESSION['role']=='1') { ?>
                            <li><a href="user-all.php"><i class="fa fa-user-circle"></i>User</a></li>
                            
                            <li><a href="banner-all.php"><i class="fa fa-image"></i>Banner</a></li>
                            <li><a href="facility-all.php"><i class="fa fa-compass"></i>Our Facility</a></li>
                            <li><a href="event-all.php"><i class="fa fa-calendar"></i>Our Event</a></li>  
                            <li><a href="course-all.php"><i class="fa fa-book"></i>Our Course</a></li>
                            <li><a href="team-all.php"><i class="fa fa-heart"></i>Our Mentor</a></li>
                            <li><a href="blog-all.php"><i class="fa fa-rocket"></i>Our Blog</a></li>
                            <li><a href="partner-all.php"><i class="fa fa-gratipay"></i>Our Partner</a></li>
                            <li><a href="page-content.php"><i class="fa fa-address-card"></i>Page Content</a></li>
                            <li><a href="test-all.php"><i class="fa fa-address-card"></i>Client Testimonial</a></li>
                            <li><a href="message-all.php"><i class="fa fa-comments"></i>Contact Message</a></li>
                            <?php } ?>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 content_part">
                    <div class="row custome_bread_part">
                        <div class="col-md-12 bread">
                            <ul>
                                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Dashboard</a></li>
                            </ul>
                        </div>
                    </div>