<?php include('includes/head.php'); ?>

<div id="app">
    
    <?php

        if(isset($_SESSION['token'])) {
            require('views/config1.php');
        } else {
            require('views/login.php');
        }
    ?>

</div>