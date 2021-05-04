<?php
    require_once('functions/manage.php');
    get_header();

    if(isset($_POST['submit'])){
        $name = htmlentities($_POST['name']);
        $phone = htmlentities($_POST['phone']);
        $email = htmlentities($_POST['email']);
        $subject = htmlentities($_POST['subject']);
        $message = htmlentities($_POST['message']);
        
        $insert = "INSERT INTO web_contact (con_name,con_phone,con_email,con_sub,con_mess) VALUES ('$name','$phone','$email','$subject','$message')";
        
        if(mysqli_query($con,$insert)){
            echo "connection successfully";
        }else{
            echo "connection faild";
        }
    }
?>
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/bg/contact2.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Contact Us</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- courses start -->
    <div class="advisors-area gray-bg pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                    <div class="contact-info-text">
                        <div class="section-title mb-20">
                            <div class="section-title-heading mb-10">
                                <h1>Contact Info</h1>
                            </div>
                            <div class="section-title-para">
                                <p>Lorem ipsum dolor sit amet, consecte adipisicing elit sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-info mb-50 wow fadeInRight" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                        <ul>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-headphone"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Call Us</h5>
                                    <span>+0123456789</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-email"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Email Us</h5>
                                    <span>support@gmail.com</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-location-pin"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Location</h5>
                                    <span>123 Business Avenue, Hoston, USA</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                    <div class="events-details-form faq-area-form mb-30 p-0">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="events-form-title mb-25">
                                        <h2>Do You Have Any Questions</h2>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Name :" type="text" name="name">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Phone :" type="text" name="phone">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Email :" type="email" name="email">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Subject :" type="text" name="subject">
                                </div>
                                <div class="col-xl-12">
                                    <textarea cols="30" rows="10" placeholder="Message :" name="message"></textarea>
                                </div>
                                <div class="col-xl-12">
                                    <div class="faq-form-btn events-form-btn">
                                        <button type="submit" name="submit" class="btn m-0">submit now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end -->
    <!-- map start -->
    <?php
        $query ="SELECT * FROM web_content WHERE content_id='8'";
        $s = mysqli_query($con,$query);
        while ($sel8=mysqli_fetch_assoc($s)) {
        ?>
            <div class="row mt-60">
                <div class="col-xl-12">
                    <div class="university-banner mb-30">
                        <img width="1350px" height="450px" src="admin/upload/<?= $sel8 ['content_image']; ?>" alt="">
                    </div>
                </div>
            </div>
    <?php } ?>
<?php
    get_footer();
?>






<?php
    /*require_once('functions/manage.php');
    get_header();


     if(isset($_POST['submit'])){
       $name=$_POST['name'];
       $phone=$_POST['phone'];
       $email=$_POST['email'];
       $sub=$_POST['subject'];
       $mes=$_POST['message'];

       $inser="INSERT INTO web_contact(con_name,con_phone,con_email,con_sub,con_mess)
       VALUES('$name','$phone','$email','$sub','$mes')";

       if(!empty($name)){
         if(!empty($email)){
           if(mysqli_query($con,$inser)){
             echo "Successfully send your message!";
           }else{
             echo "Message send failed!";
           }
         }else{
           echo "Please enter your email adsress!";
         }
       }else{
         echo "Please enter your name!";
       }
     }*/
?>
