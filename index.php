<?php
    require_once('functions/manage.php');
    get_header();
?>
    <div class="slider-area pos-relative">
        <div class="slider-active">
           <?php
                $query = "SELECT * FROM web_banner";
                $s = mysqli_query($con,$query);
                while($banner=mysqli_fetch_assoc($s)){
            ?>
            <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url('admin/upload/<?= $banner['ban_photo']; ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-md-12">
                            <div class="slider-content slider-content-2">
                                <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s"><?= $banner['ban_title']; ?></h1>
                                <p data-animation="fadeInUp" data-delay=".4s"><?= $banner['ban_subtitle']; ?></p>
                                <a href="<?= $banner['ban_url']; ?>" class="theme-btn" data-animation="fadeInUp" data-delay=".6s"><span class="btn-text"><?= $banner['ban_btn']; ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
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
                    <div class="about-title-section mb-30">
                        <h1><?= $sel2 ['content_title']; ?></h1>
                        <p><?= substr($sel2 ['content_details'],0,300); ?></p>
                        <button> <a href="about.php" class="theme-btn blue-bg-border mt-20"><span class="btn-text">Read More</span></a></button>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about-right-img mb-30">
                        <img src="admin/upload/<?= $sel2 ['content_image']; ?>" alt="content-image">
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="row pt-65">
                <?php
                    $i = 1;
                        $query ="SELECT * FROM web_facility order by facility_id DESC limit 0,3";
                        $s = mysqli_query($con,$query);
                        while ($sel1=mysqli_fetch_assoc($s)) {
                    ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="feature-wrapper mb-30">
                        <div class="feature-title-heading">
                            <h3><?= $sel1['facility_title']; ?></h3>
                            <span>0<?= $i++; ?></span>
                        </div>
                        <div class="feature-text">
                            <p><?= substr($sel1['facility_subtitle'],0,200); ?></p>
                        </div>
                    
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- about end -->
    <!-- courses start -->
    <div id="courses" class="courses-area courses-bg-height pt-100 pb-70" style="background-image: url(img/courses/courses_bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <?php
                            $query ="SELECT * FROM web_content WHERE content_id='2'";
                            $s = mysqli_query($con,$query);
                            while ($sel2=mysqli_fetch_assoc($s)) {
                        ?>
                        <div class="section-title-heading mb-20">
                            <h1 class="white-color"><?= $sel2 ['content_title']; ?></h1>
                        </div>
                        <div class="section-title-para">
                            <p class="white-color"><?= $sel2 ['content_subtitle']; ?></p>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="courses-list">
                <div class="row courses-active">
                <?php
                    $q= "SELECT * FROM web_course ";
                    $s= mysqli_query($con,$q);
                    while($course=mysqli_fetch_assoc($s)) {

                ?> 
                    <div class="col-xl-12">
                    
                        <div class="courses-wrapper course-radius-none mb-30">
                            <div class="courses-thumb">
                                <a href="course.php"><img height="200" width="300px" src="admin/upload/<?= $course['course_photo']; ?>" alt="course-photo"></a>
                            </div>
                            <div class="courses-author">
                                <img src="admin/upload/<?= $course['course_auth']; ?>" alt="">
                            </div>
                            <div class="course-main-content clearfix">
                                <div class="courses-content">
                                    <div class="courses-category-name">
                                        <span>
                                            <a href="#"><?= $course['course_category']; ?></a>
                                        </span>
                                    </div>
                                    <div class="courses-heading">
                                        <h1><a href="course.php"><?= $course['course_title']; ?></a></h1>
                                    </div>
                                    <div class="courses-para">
                                        <p><?= $course['course_subtitle']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="courses-wrapper-bottom clearfix">
                                <div class="courses-icon d-flex f-left">
                                    <div class="courses-single-icon">
                                        <span class="ti-user"></span>
                                        <span class="user-number">35</span>
                                    </div>
                                    <div class="courses-single-icon">
                                        <span class="ti-heart"></span>
                                        <span class="user-number">35</span>
                                    </div>
                                </div>
                                <div class="courses-button f-right">
                                    <a href="course.php">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>   
                </div>
                <div class="col-xl-12">
                    <div class="single-courses-btn text-center mt-15 mb-30">
                        <a href="course.php" class="btn white-bg-btn">View all course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end -->
    <!-- team start -->
    <div class="team-area pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <?php
                            $query ="SELECT * FROM web_content WHERE content_id='3'";
                            $s = mysqli_query($con,$query);
                            while ($sel3=mysqli_fetch_assoc($s)) {
                        ?>
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color"><?= $sel3['content_title'];?></h1>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color"><?= $sel3['content_subtitle'];?></p>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="team-list">
                <div class="row testimonilas-active">
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
    <!-- events start -->
    <div id="events" class="events-area events-bg-height pt-100 pb-95" style="background-image: url(img/courses/courses_bg.png)">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <?php
                            $query ="SELECT * FROM web_content WHERE content_id='4'";
                            $s = mysqli_query($con,$query);
                            while ($sel4=mysqli_fetch_assoc($s)) {
                        ?>
                        <div class="section-title-heading mb-20">
                            <h1 class="white-color"><?= $sel4['content_title'];?></h1>
                        </div>
                        <div class="section-title-para">
                            <p class="white-color"><?= $sel4['content_subtitle'];?></p>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="events-list mb-30">
                <div class="row">
                    <?php
                            $query = "SELECT * FROM web_event limit 0,4";
                            $s = mysqli_query($con,$query);
                            while($event=mysqli_fetch_assoc($s)){
                        ?>
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-events mb-30">
                            <div class="events-wrapper">
                                <div class="events-inner d-flex">
                                    <div class="events-thumb">
                                        <img width="197px" height="240px" src="admin/upload/<?= $event ['event_image'];?>" alt="">
                                    </div>
                                    <div class="events-text white-bg">
                                        <div class="event-text-heading mb-20">
                                            <div class="events-calendar text-center f-left">
                                                <span class="date">25</span>
                                                <span class="month">March,2020</span>
                                            </div>
                                            <div class="events-text-title clearfix">
                                                <a href="#">
                                                    <h4><?= $event ['event_title'];?></h4>
                                                </a>
                                                <div class="time-area">
                                                    <span class="ti-time"></span>
                                                    <span class="published-time">02:00 PM- 04:00 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="events-para">
                                            <p><?= $event ['event_subtitle'];?></p>
                                        </div>
                                        <div class="events-speaker">
                                            <h2>Speaker : <span><?= $event ['event_speaker'];?></span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>

            <div class="col-xl-12">
                <div class="view-all-events text-center">
                    <a href="event.php" class="btn white-bg-btn ">view all events<span>&rarr;</span></a>
                </div>
            </div>

        </div>
    </div>
    <!-- events end -->
    <!-- testimonials start -->
    <div class="testimonilas-area pt-100 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <?php
                            $query ="SELECT * FROM web_content WHERE content_id='5'";
                            $s = mysqli_query($con,$query);
                            while ($sel5=mysqli_fetch_assoc($s)) {
                        ?>
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color"><?= $sel5['content_title'];?></h1>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color"><?= $sel5['content_subtitle'];?></p>
                        </div>
                    <?php } ?>
                    </div>
                </div>
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
    <!-- video start -->
    <div class="video-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="video-wrapper text-center">
                        <div class="video-content">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=x50HVEENBhc"><img src="img/video/play_icon.png" alt=""></a>
                            <span>Watch Our Latest Video</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video end -->
    <!-- counter start -->
    <div class="counter-area">
        <div class="container pt-90 pb-65">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="couter-wrapper mb-30 text-center">
                        <img src="img/counter/counter_icon1.png" alt="">
                        <span class="counter">10532</span>
                        <h3>Satisfied Students</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="couter-wrapper mb-30 text-center">
                        <img src="img/counter/counter_icon2.png" alt="">
                        <span class="counter">7985</span>
                        <h3>Courses Complated</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="couter-wrapper mb-30 text-center">
                        <img src="img/counter/counter_icon3.png" alt="">
                        <span class="counter">5382</span>
                        <h3>Satisfied Students</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="couter-wrapper mb-30 text-center">
                        <img src="img/counter/counter_icon4.png" alt="">
                        <span class="counter">354</span>
                        <h3>Expert Advisors</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter end -->
    <!-- latest_news start -->
    <div id="blog" class="latest_news-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-md-8 offset-md-2">
                    <div class="section-title mb-50 text-center">
                        <?php
                            $query ="SELECT * FROM web_content WHERE content_id='6'";
                            $s = mysqli_query($con,$query);
                            while ($sel6=mysqli_fetch_assoc($s)) {
                        ?>
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color"><?= $sel6['content_title'];?></h1>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color"><?= $sel6['content_subtitle'];?></p>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $query ="SELECT * FROM web_blog limit 0,3";
                    $s = mysqli_query($con,$query);
                    while ($blog=mysqli_fetch_assoc($s)) {
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-wrapper mb-30">
                        <div class="blog-thumb mb-25">
                            <a href="news_details.html"><img src="admin/upload/<?= $blog['blog_image'];?>" alt=""></a>
                            <span class="blog-category"><?= $blog['blog_category'];?></span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span>Auguest 25, 2018</span>
                            </div>
                            <h5><a href="news_details.html"><?= $blog['blog_title'];?></a></h5>
                            <p><?= $blog['blog_subtitle'];?></p>
                            <div class="read-more-btn">
                                <button>Read more</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-xl-12">
                <div class="view-all-events text-center">
                    <a href="blog.php" class="btn white-bg-btn">view all news<span>&rarr;</span></a>
                </div>
            </div>

            </div>
        </div>
    </div>
<?php
    get_footer();
?>
