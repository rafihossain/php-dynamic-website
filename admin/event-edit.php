<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    $id = $_GET['e'];
    $sel = "SELECT * FROM web_event WHERE event_id='$id'";
    $be = mysqli_query($con,$sel);
    $event = mysqli_fetch_assoc($be);

    if(!empty($_POST)){
        $id=$_POST['id'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $speaker = $_POST['speaker'];
        $photo = $_FILES['photo'];

    if ($photo['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        $update="UPDATE web_event SET event_title='$title',event_subtitle='$subtitle',
        event_speaker='$speaker' WHERE event_id='$id'";

        $imgEdit = "UPDATE web_event SET event_image='$imgName' WHERE event_id='$id'";

        if(mysqli_query($con,$update)){
            if ($photo['name']!='') {
                mysqli_query($con,$imgEdit);
                move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
                echo "Successfully complete event update.";
            }
            
            header ('location: event-all.php');
        }else{
        echo "Opps! event update failed.";
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
                            <p><i class="fa fa-user"></i>UPDATE EVENT</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="event-all.php"><i class="fa fa-user"></i>EVENT INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Title:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="id" value="<?= $event['event_id']; ?>">
                            <input type="text" class="form-control" name="title"
                            value="<?= $event['event_title']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle"
                            value="<?= $event['event_subtitle']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Speaker:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="speaker"
                            value="<?= $event['event_speaker']; ?>"">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo"
                            <?= $event['event_image']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php if($event['event_image']!=''){?>
                            <img height="50px" src="upload/<?= $event['event_image']; ?>">
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