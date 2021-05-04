<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();
?>

<div class="row">
    <div class="col-md-12 main_content">

        <!-- table section start -->
    <div class="card text-center">
        <div class="card-header">
            <div class="row">
               <div class="col-md-7">
                    <p><i class="fa fa-user"></i>ALL MENTOR INFORMATION</p>
                </div>
                <div class="col-md-3">
                    <p><a href="team-add.php"><i class="fa fa-user"></i>ADD MENTOR</a></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mentor Details</th>
                        <th scope="col">Mentor Name</th>
                        <th scope="col">Mentor Subject</th>
                        <th scope="col">Mentor Image</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $sql = "SELECT * FROM web_team";
                        $a = mysqli_query($con,$sql);
                        while($team=mysqli_fetch_assoc($a)){

                    ?>
                    <tr>
                        <td><?php echo $team['team_details']; ?></td>
                        <td><?php echo $team['team_name']; ?></td>
                        <td><?php echo $team['team_subject']; ?></td>
                        
                        <td>
                           <?php if($team['team_image']!=''){ ?>
                           
                            <img height="50px" src="upload/<?= $team['team_image']; ?>" alt="team-photo">
                           
                           <?php }else{ ?>
                           
                            <img height="50px" src="img/avatar.png" alt="team-photo"> 
                              
                           <?php }?>
                        </td>
                        <td>
                            <a href="team-edit.php?e=<?= $team['team_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="team-delete.php?d=<?= $team['team_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
                        </td>
                    </tr>
                    
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>
</div>


<?php
    get_footer();
?>