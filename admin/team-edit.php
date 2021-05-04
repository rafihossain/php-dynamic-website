<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>
<?php
    $id=$_GET['e'];
    $sel="SELECT * FROM web_team WHERE team_id='$id'";
    $Q=mysqli_query($con,$sel);
    $team=mysqli_fetch_assoc($Q);

    if(!empty($_POST)){
        $id=$_POST['id'];
        $details = $_POST['details'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $photo = $_FILES['photo'];

    if ($photo['name']!='') {
        $imgName='img-'.time().'-'.rand(100000,10000000).'.'.pathinfo($photo['name'],PATHINFO_EXTENSION);
    }
        $update="UPDATE web_team SET team_details='$details',team_name='$name',
        team_subject='$subject' WHERE team_id='$id'";

        $imgEdit = "UPDATE web_team SET team_image='$imgName' WHERE team_id='$id'";

        if(mysqli_query($con,$update)){
            if ($photo['name']!='') {
                mysqli_query($con,$imgEdit);
                move_uploaded_file($photo['tmp_name'],'upload/'.$imgName);
                echo "Successfully complete team update.";
            }
            
            header ('location: team-all.php');
        }else{
        echo "Opps! team update failed.";
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
                            <p><i class="fa fa-user"></i>EDIT TEAM MEAMBER</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="team-all.php"><i class="fa fa-user"></i>VIEW ALL TEAM MEAMBER</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Details:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="id" value="<?= $team['team_id']; ?>">
                            <input type="text" class="form-control" name="details"
                            value="<?= $team['team_details']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Name:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name"
                            value="<?= $team['team_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subject:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subject"
                            value="<?= $team['team_subject']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Photo:</label>
                        <div class="col-sm-3">
                            <input type="file" name="photo"
                            value="<?= $team['team_image']; ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php if($team['team_image']!='') { ?>
                                <img height="200px" src="upload/<?= $team['team_image']; ?>" alt="team-photo">
                            <?php } else { ?>
                                <img height="200px" src="img/avatar.png" alt="team-photo">
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