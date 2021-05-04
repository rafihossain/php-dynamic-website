<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    $id = $_GET['e'];
    $sel = "SELECT * FROM web_testimonial WHERE test_id='$id'";
    $be = mysqli_query($con,$sel);
    $test = mysqli_fetch_assoc($be);

    if(!empty($_POST)){
        $id=$_POST['id'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $subtitle = $_POST['subtitle'];
        $photo = $_FILES['photo'];

    if ($photo['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        $update="UPDATE web_testimonial SET test_name='$name',test_subject='$subject',test_subtitle='$subtitle' WHERE test_id='$id'";

        $imgEdit = "UPDATE web_testimonial SET test_image='$imgName' WHERE test_id='$id'";

        if(mysqli_query($con,$update)){
            if ($photo['name']!='') {
                mysqli_query($con,$imgEdit);
                move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
                echo "Successfully update testimonial.";
            }
            
            header ('location: test-all.php');
        }else{
        echo "Opps! event testimonial failed.";
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
                            <p><i class="fa fa-user"></i>UPDATE TESTIMONIAL</p>
                        </div>
                        <div class="col-md-5">
                            <p><a href="test-all.php"><i class="fa fa-user"></i>ALL TESTIMONIAL INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Client Name:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="id" value="<?= $test['test_id']; ?>">
                            <input type="text" class="form-control" name="name"
                            value="<?= $test['test_name']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Client Subject:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subject"
                            value="<?= $test['test_subject']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Client Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle"
                            value="<?= $test['test_subtitle']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Client Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo"
                            <?= $test['test_image']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php if($test['test_image']!=''){?>
                            <img height="50px" src="upload/<?= $test['test_image']; ?>">
                            <?php }else{?>
                                <img height="50px" src="img/avatar.png">
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary">Upload</button>
            </div>

        </form>
    </div>
</div>

<?php
    get_footer();
?>