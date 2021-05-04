<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    $id = $_GET['e'];
    $sel = "SELECT * FROM web_course WHERE course_id='$id'";
    $be = mysqli_query($con,$sel);
    $course = mysqli_fetch_assoc($be);

    if(!empty($_POST)){
        $id=$_POST['id'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $category = $_POST['category'];
        $auth = $_FILES['auth'];
        $photo = $_FILES['photo'];

    if ($photo['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }

    if ($auth['name']!='') {
        $imgAuth='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($auth['name'],PATHINFO_EXTENSION);
    }
        $update="UPDATE web_course SET course_title='$title',course_subtitle='$subtitle',course_category='$category' WHERE course_id='$id'";

        $imgEdit = "UPDATE web_course SET course_photo='$imgName' WHERE course_id='$id'";
        $authImg = "UPDATE web_course SET course_auth='$imgAuth' WHERE course_id='$id'";

        if(mysqli_query($con,$update)){
            if ($photo['name']!='') {
                mysqli_query($con,$imgEdit);
                move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
                
                echo "Successfully complete course upload.";
            }
            if ($auth['name']!='') {
                mysqli_query($con,$authImg);
                move_uploaded_file($auth['tmp_name'],'upload/'.$imgAuth);
                
                echo "Successfully complete course upload.";
            }
            
            header ('location: course-all.php');
        }else{
        echo "Opps! course upload failed.";
        }
    }
?>

<div class="row">
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="card text-center">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            <p><i class="fa fa-user"></i>UPLOAD BANNER</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="course-all.php"><i class="fa fa-user"></i>VIEW ALL BANNER INFO</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Course Category:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="id" value="<?= $course['course_id']; ?>">
                            <input type="text" class="form-control" name="category"
                            value="<?= $course['course_category']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Author Img:</label>
                        <div class="col-sm-3">
                            <input type="file" name="auth"
                            value="<?= $course['course_auth']; ?>"">
                        </div>
                        <div class="col-sm-3">
                            <?php if($course['course_auth']!=''){?>
                            <img height="50px" src="upload/<?= $course['course_auth']; ?>">
                            <?php }else{?>
                                <img height="50px" src="img/avatar.png">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Course Title:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title"
                            value="<?= $course['course_title']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Course Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle"
                            value="<?= $course['course_subtitle']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Course Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo"
                            <?= $course['course_photo']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php if($course['course_photo']!=''){?>
                            <img height="50px" src="upload/<?= $course['course_photo']; ?>">
                            <?php }else{?>
                                <img height="50px" src="img/avatar.png">
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>

<?php
    get_footer();
?>