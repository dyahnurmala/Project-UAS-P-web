<?php
    include 'db_connect.php';
    session_start();
    session_destroy();
    echo '<script>window.location="login.php"</script>';
?>