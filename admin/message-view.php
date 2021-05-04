<?php session_start();
    require_once('functions/function.php');
    get_header();
?>
<?php
        $id = $_GET['v'];
        $sel = "SELECT * FROM web_contact WHERE con_id='$id'";
        $query = mysqli_query($con,$sel);
        $info = mysqli_fetch_array($query);
    ?>
    
<div class="row">
    <div class="col-md-12 main_content">
        <form>

            <div class="card text-center">
                <div class="card-header">
                    <div class="row">
                       <div class="col-md-7">
                            <p><i class="fa fa-user"></i>VIEW FULL USER MESSAGE</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="message-all.php"><i class="fa fa-user"></i>VIEW</a></p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                           <table class="table table-bordered table-striped table-hover custom_view_table">
                               <tr>
                                  <td>Name</td>
                                  <td>:</td>
                                  <td><?= $info['con_name']; ?></td>
                              </tr>
                              <tr>
                                  <td>Phone</td>
                                  <td>:</td>
                                  <td><?= $info['con_phone']; ?></td>
                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td>:</td>
                                  <td><?= $info['con_email']; ?></td>
                              </tr>
                              <tr>
                                  <td>Subject</td>
                                  <td>:</td>
                                  <td><?= $info['con_sub']; ?></td>
                              </tr>
                              <tr>
                                  <td>Message</td>
                                  <td>:</td>
                                  <td><?= $info['con_mess']; ?></td>
                              </tr>
                           </table> 
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>


<?php
    get_footer();
?>