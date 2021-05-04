<?php session_start();
    require_once('functions/function.php');
    get_header();
    logindorker();

?>


<div class="row">
    <div class="col-md-12 main_content">
        <h5>Welcome Mr. <span style="font-size:28px; color:red"><?= $_SESSION['name']; ?></span> How Are You Today?</h5>
    </div>
</div>


<?php
    get_footer();
?>