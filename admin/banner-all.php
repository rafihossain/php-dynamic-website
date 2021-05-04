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
                    <p><i class="fa fa-user"></i>ALL BANNNER INFORMATION</p>
                </div>
                <div class="col-md-3">
                    <p><a href="banner-add.php"><i class="fa fa-user"></i>ADD BANNNER</a></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Button Text</th>
                        <th scope="col">Button Url</th>
                        <th scope="col">Image</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $sql = "SELECT * FROM web_banner";
                        $a = mysqli_query($con,$sql);
                        while($rafi=mysqli_fetch_assoc($a)){

                    ?>
                    <tr>
                        <td><?php echo $rafi['ban_title']; ?></td>
                        <td><?php echo $rafi['ban_subtitle']; ?></td>
                        <td><?php echo $rafi['ban_btn']; ?></td>
                        <td><?php echo $rafi['ban_url']; ?></td>
                        
                        <td>
                           <?php if($rafi['ban_photo']!=''){ ?>
                           
                            <img height="50px" src="upload/<?= $rafi['ban_photo']; ?>" alt="banner-photo">
                           
                           <?php }else{ ?>
                           
                            <img height="50px" src="img/avatar.png" alt="banner-photo"> 
                              
                           <?php }?>
                        </td>
                        <td>
                            <a href="banner-edit.php?e=<?= $rafi['ban_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="banner-delete.php?d=<?= $rafi['ban_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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