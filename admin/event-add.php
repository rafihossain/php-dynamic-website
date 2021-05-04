<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    
    if(!empty($_POST)){
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $speaker = $_POST['speaker'];
        $photo = $_FILES['photo'];
    if ($photo['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        $insert="INSERT INTO web_event(event_title,event_subtitle,event_speaker,event_image)
        VALUES('$title','$subtitle','$speaker','$imgName')";

        if(mysqli_query($con,$insert)){
            move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
        echo "Successfully complete event upload.";
            header ('location: event-all.php');
        }else{
        echo "Opps! event upload failed.";
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
                            <p><i class="fa fa-user"></i>UPLOAD EVENT</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="event-all.php"><i class="fa fa-user"></i>ALL EVENT INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Title:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Speaker:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="speaker">
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