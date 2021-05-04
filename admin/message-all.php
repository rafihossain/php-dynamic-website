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
                    <p><i class="fa fa-user"></i>ALL USER MESSAGE</p>
                </div>
                <div class="col-md-3">
                    <p><a href="#"><i class="fa fa-user"></i>LINK</a></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $sql = "SELECT * FROM web_contact";
                        $a = mysqli_query($con,$sql);
                        while($rafi=mysqli_fetch_assoc($a)){

                    ?>
                    <tr>
                        <td><?php echo $rafi['con_name']; ?></td>
                        <td><?php echo $rafi['con_phone']; ?></td>
                        <td><?php echo $rafi['con_email']; ?></td>
                        <td><?php echo substr($rafi['con_sub'],0,10); ?></td>
                        <td><?php echo substr($rafi['con_mess'],0,20); ?></td>
                        <td>
                            <a href="message-view.php?v=<?= $rafi['con_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <a href="message-delete.php?d=<?= $rafi['con_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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