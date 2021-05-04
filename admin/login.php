<?php session_start();
    require_once('functions/function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!--meta tag-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--title-->
    <title>login</title>

    <!--font awesome-->
    <link rel="stylesheet" href="inc/css/font-awesome.min.css">

    <!--boostrap-->
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">

    <!--custome css-->
    <link rel="stylesheet" href="inc/css/style.css">
</head>

<body>
    

    <div class="card bg-light mb-3" style="max-width: 25rem; margin: 0 auto">
        <div class="card-header">Sign in to continue</div>
        <div class="card-body">
            <h5 class="card-title">Login</h5>
            <?php
                if(!empty($_POST)){
                    $username= $_POST['username'];
                    $password= $_POST['password'];
                    
                    $query = "SELECT * FROM web_rafi NATURAL JOIN web_role WHERE Username='$username' AND Password='$password'";
                    $rafi = mysqli_query($con,$query);
                    $afiqur = mysqli_fetch_assoc($rafi);
                    if($afiqur){
                        $_SESSION['id']=$afiqur['id'];
                        $_SESSION['name']=$afiqur['Name'];
                        $_SESSION['photo']=$afiqur['Photo'];
                        $_SESSION['role']=$afiqur['role_id'];
                        $_SESSION['role_name']=$afiqur['role_name'];
                        header('location:index.php');
                    }else{
                        echo 'oi meya vul username password dau kan?';
                    }
                }
            ?>
            <form method="post" action="">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>




    <!--proper js-->
    <script src="inc/js/popper.min.js"></script>
    <!--boostrap js-->
    <script src="inc/js/bootstrap.min.js"></script>
    <!--jquery-->
    <script src="inc/js/jquery-3.4.1.min.js"></script>

</body>

</html>