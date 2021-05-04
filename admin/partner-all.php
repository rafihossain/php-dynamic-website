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
                    <p><i class="fa fa-user"></i>ALL EVENT INFORMATION</p>
                </div>
                <div class="col-md-3">
                    <p><a href=""><i class="fa fa-user"></i>ADD EVENT</a></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $sql = "SELECT * FROM web_partner";
                        $a = mysqli_query($con,$sql);
                        while($partner=mysqli_fetch_assoc($a)){

                    ?>
                    <tr>
                        <td>
                           <?php if($partner['partner_image']!=''){ ?>
                           
                            <img height="50px" src="upload/<?= $partner['partner_image']; ?>" alt="partner-photo">
                           
                           <?php }else{ ?>
                           
                            <img height="50px" src="img/avatar.png" alt="partner-photo"> 
                              
                           <?php }?>
                        </td>
                        <td>
                            <a href="partner-edit.php?e=<?= $partner['partner_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <a href="partner-delete.php?d=<?= $partner['partner_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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