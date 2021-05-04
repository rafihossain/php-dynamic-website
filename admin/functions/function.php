<?php
    require_once('../config.php');

    function get_header(){
        require_once('config/header.php');
    }

    function get_footer(){
        require_once('config/footer.php');
    }

    function userid(){
        return $_SESSION['id']? true:false;
    }

    function logindorker(){
        $c = userid();
        if(!$c){
            header('location:login.php');
        }
    }
?>