<?php
    require_once('functions/manage.php');
    get_header();
?>
    <!-- header-end -->
    <!-- slider-start -->
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/bg/Student-Discounts.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">About Us</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
    <!-- about start -->
    <div id="about" class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <?php
                    $query ="SELECT * FROM web_content WHERE content_id='1'";
                    $s = mysqli_query($con,$query);
                    while ($sel2=mysqli_fetch_assoc($s)) {
                    ?>
                <div class="col-xl-7 col-lg-7">
                    <div class="about-img mb-55">
                        <img src="admin/upload/<?= $sel2 ['content_image']; ?>" alt="">
                    </div>
                    <div class="about-title-section about-title-section-2 mb-30">
                        <h1><?= $sel2 ['content_title']; ?></h1>
                        <p><?= $sel2 ['content_details']; ?></p>
                    </div>
                </div>
            <?php } ?>
            <?php
                    $query ="SELECT * FROM web_content WHERE content_id='7'";
                    $s = mysqli_query($con,$query);
                    while ($sel7=mysqli_fetch_assoc($s)) {
                    ?>
                <div class="col-xl-5 col-lg-5">
                    <div class="about-img mb-55">
                        <img src="admin/upload/<?= $sel7 ['content_image']; ?>" alt="">
                    </div>
                    <div class="about-title-section about-title-section-2 mb-30">
                        <h1><?= $sel7 ['content_title']; ?></h1>
                        <p><?= $sel7 ['content_details']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
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
        </div>
    </div>
    <!-- about end -->

    <!-- counter start -->
    <div class="counter-area primary-bg">
        <div class="container pt-90 pb-65">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="couter-wrapper couter-wrapper-2 mb-30 text-center">
                        <img src="img/counter/counter_icon1.png" alt="">
                        <span class="counter">10532</span>
                        <h3>Satisfied Students</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="couter-wrapper couter-wrapper-2 mb-30 text-center">
                        <img src="img/counter/counter_icon2.png" alt="">
                        <span class="counter">7985</span>
                        <h3>Courses Complated</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="couter-wrapper couter-wrapper-2 mb-30 text-center">
                        <img src="img/counter/counter_icon3.png" alt="">
                        <span class="counter">5382</span>
                        <h3>Satisfied Students</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="couter-wrapper couter-wrapper-2 mb-30 text-center">
                        <img src="img/counter/counter_icon4.png" alt="">
                        <span class="counter">354</span>
                        <h3>Expert Advisors</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter end -->
    <!-- team start -->
    <div class="team-area pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <?php
                        $query ="SELECT * FROM web_content WHERE content_id='3'";
                        $s = mysqli_query($con,$query);
                        while ($sel3=mysqli_fetch_assoc($s)) {
                    ?>
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color"><?= $sel3['content_title'];?></h1>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color"><?= $sel3['content_subtitle'];?></p>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="team-list">
                <div class="row">
                    <?php
                        $query ="SELECT * FROM web_team ";
                        $s = mysqli_query($con,$query);
                        while ($team=mysqli_fetch_assoc($s)) {
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-thumb">
                                <img width="300px" height="350px" src="admin/upload/<?= $team['team_image']; ?>" alt="">
                            </div>
                            <div class="team-social-info text-center">
                                <div class="team-social-para">
                                    <p><?= $team['team_details']; ?></p>
                                </div>
                                <div class="team-social-icon-list">
                                    <ul>
                                        <li><a href="#"><span class="ti-facebook"></span></a></li>
                                        <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                                        <li><a href="#"><span class="ti-google"></span></a></li>
                                        <li><a href="#"><span class="ti-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-teacher-info text-center">
                                <h1><?= $team['team_name']; ?></h1>
                                <h2><?= $team['team_subject']; ?></h2>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- team end -->
    <!-- testimonials start -->
    <div class="testimonilas-area pt-100 pb-90 gray-bg">
        <div class="container">
            <div class="row">
                <?php
                    $query ="SELECT * FROM web_content WHERE content_id='5'";
                    $s = mysqli_query($con,$query);
                    while ($sel5=mysqli_fetch_assoc($s)) {
                ?>
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color"><?= $sel5['content_title'];?></h1>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color"><?= $sel5['content_subtitle'];?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="testimonilas-list">
                <div class="row testimonilas-active">
                    <?php
                        $query= "SELECT * FROM web_testimonial";
                        $te = mysqli_query($con,$query);
                        while ($test=mysqli_fetch_assoc($te)) {
                    ?>
                    <div class="col-xl-12">
                        <div class="testimonilas-wrapper mb-110">
                            <div class="testimonilas-heading d-flex">
                                <div class="testimonilas-author-thumb">
                                    <img height="50px" src="admin/upload/<?= $test ['test_image']; ?>" alt="">
                                </div>
                                <div class="testimonilas-author-title">
                                    <h1><?= $test ['test_name']; ?></h1>
                                    <h2><?= $test ['test_subject']; ?></h2>
                                </div>
                            </div>
                            <div class="testimonilas-para">
                                <p><?= substr($test ['test_subtitle'],0,250); ?></p>
                            </div>
                            <div class="testimonilas-rating">
                                <ul>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonials end -->

<?php
    get_footer();
?>
