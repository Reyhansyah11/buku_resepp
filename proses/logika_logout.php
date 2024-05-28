<?php
    
    session_start();

    session_destroy();

    header("Location: ../js/index.php");
    exit;

?>