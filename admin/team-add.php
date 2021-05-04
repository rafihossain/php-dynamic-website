<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    if (!empty($_POST)) {
        $details = $_POST['details'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $photo = $_FILES['photo'];
        $imgName = '';

    if ($photo['name']!='') {
            $imgName = 'team_'.time().'-'.rand(10000,10000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
        }

        $insert = "INSERT INTO web_team (team_details,team_name,team_subject,team_image)
        VALUES ('$details','$name','$subject','$imgName')";

        if (mysqli_query($con,$insert)) {
            move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
            echo 'Mentor successfully upload';
            header('location:team-all.php');
        }else{
            echo 'Opps ! Mentor not upload';
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
                            <p><i class="fa fa-user"></i>UPLOAD MENTOR</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="team-all.php"><i class="fa fa-user"></i>ALL MENTOR INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Details:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="details">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Name:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subject:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subject">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo">
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