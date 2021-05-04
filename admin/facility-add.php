<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<?php
    
    if(!empty($_POST)){
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        
        $insert="INSERT INTO web_facility(facility_title,facility_subtitle)
        VALUES('$title','$subtitle')";

        if(!empty($title)){
        if(!empty($subtitle)){

        if(mysqli_query($con,$insert)){
        echo "facility insert Successfully complete";
            header ('location: facility-all.php');
        }else{
        echo "Opps! user facility insert failed.";
        }

        }else{
        echo "please enter facility subtitle";
        }

        }else{
        echo "please enter facility title";
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
                            <p><i class="fa fa-user"></i>Add FACILITY</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="facility-all.php"><i class="fa fa-user"></i>ALL FACILITY INFORMATION</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3">TITLE:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">SUBTITILE:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="subtitle" id="">
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