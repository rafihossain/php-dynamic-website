<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>
<?php
    $id=$_GET['e'];
    $sel="SELECT * FROM web_facility WHERE facility_id='$id'";
    $Q=mysqli_query($con,$sel);
    $facility=mysqli_fetch_assoc($Q);

    if(!empty($_POST)){
        $eid = $_POST['eid'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        
        $update = "UPDATE web_facility SET facility_title='$title', facility_subtitle='$subtitle'
        WHERE facility_id ='$eid' ";

        
        if(mysqli_query($con,$update)){
            echo "facility update successfully";
            header('location:facility-all.php');
        }else{
            echo "facility not updated";
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
                            <p><i class="fa fa-user"></i>EDIT USER REGISTRATION INFORMATION</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="facility-all.php"><i class="fa fa-user"></i>VIEW ALL USER INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">Title:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="eid" value="<?= $facility['facility_id']; ?>">
                            <input type="text" class="form-control" name="title"
                            value="<?= $facility['facility_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle"
                            value="<?= $facility['facility_subtitle']; ?>">
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